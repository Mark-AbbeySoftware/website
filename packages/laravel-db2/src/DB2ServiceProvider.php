<?php

namespace mpba\DB2;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Queue\QueueManager;
use Illuminate\Support\ServiceProvider;
use mpba\DB2\Database\Connectors\IBMCommunityODBCConnector;
use mpba\DB2\Database\Connectors\IBMConnector;
use mpba\DB2\Database\Connectors\ODBCConnector;
use mpba\DB2\Database\Connectors\ODBCZOSConnector;
use mpba\DB2\Database\DB2Connection;
use mpba\DB2\Queue\DB2Connector;

/**
 * Class DB2ServiceProvider
 */
class DB2ServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot(): void
    {
        $configPath = __DIR__ . '/config/db2.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // get the configs
        $conns = is_array(config('db2.connections')) ? config('db2.connections') : [];

        // Add my database configurations to the default set of configurations
        config(['database.connections' => array_merge($conns, config('database.connections'))]);

        // Extend the connections with pdo_odbc and pdo_ibm drivers
        foreach (config('database.connections') as $conn => $config) {
            // Only use configurations that feature a "odbc", "ibm" or "odbczos" driver
            if (!isset($config['driver']) || !in_array($config['driver'], [
                    'ibmi',
                    'ibmi_prod',
                    'ibmi_local',
                    'ibmi_osx',
                    'db2_ibmi_odbc',
                    'db2_ibmi_ibm',
                    'db2_zos_odbc',
                    'db2_expressc_odbc',
                    'db2_community_odbc',
                ])
            ) {
                continue;
            }

            // Create a connector
            $this->app['db']->extend($conn, function ($config, $name) {
                $config['name'] = $name;
                switch ($config['driver']) {
                    case 'ibmi':
                    case 'ibmi_local':
                    case 'ibmi_prod':
                    case 'ibmi_osx':
                    case 'db2_expressc_odbc':
                    case 'db2_ibmi_odbc':
                        $connector = new ODBCConnector;
                        break;
                    case 'db2_zos_odbc':
                        $connector = new ODBCZOSConnector;
                        break;
                    case 'db2_community_odbc':
                        $connector = new IBMCommunityODBCConnector;
                        break;
                    case 'db2_ibmi_ibm':
                    default:
                        $connector = new IBMConnector;
                        break;
                }

                $db2Connection = $connector->connect($config);

                return new DB2Connection($db2Connection, $config['database'], '', $config);
            });
        }

        $this->app->extend(
            'queue',
            function (QueueManager $queueManager) {
                $queueManager->addConnector('db2_odbc', function () {
                    return new DB2Connector($this->app['db']);
                });

                return $queueManager;
            }
        );
    }

    /**
     * Get the config path
     */
    protected function getConfigPath(): string
    {
        if ($this->app instanceof LaravelApplication) {
            return config_path('db2.php');
        }

        return '';
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
