<?php

namespace Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Pages\Support\ModuleInfo;
use Config;

class PagesServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected string $moduleName = 'Pages';

    /**
     * @var string $moduleNameLower
     */
    protected string $moduleNameLower = 'pages';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot() : void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerHelpers();
        $this->registerCommands();
        $this->loadMigrationsFrom(module_path(ModuleInfo::name(), 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register the helpers.
     *
     * @return void
     */
    protected function registerHelpers(): void
    {
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Register System commands
    */
    private function registerCommands(): void
    {
        $this->commands([
        ]);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig(): void
    {
        $this->publishes([
            module_path(ModuleInfo::name(), 'Config/config.php') => config_path( ModuleInfo::nameLower(). '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path(ModuleInfo::name(), 'Config/config.php'),  ModuleInfo::nameLower()
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/' . ModuleInfo::nameLower());

        $sourcePath = module_path(ModuleInfo::name(), 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views',  ModuleInfo::nameLower() . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]),  ModuleInfo::nameLower());
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/' .  ModuleInfo::nameLower());

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath,  ModuleInfo::nameLower());
        } else {
            $this->loadTranslationsFrom(module_path(ModuleInfo::name(), 'Resources/lang'), ModuleInfo::nameLower());
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides():array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . ModuleInfo::nameLower())) {
                $paths[] = $path . '/modules/' . ModuleInfo::nameLower();
            }
        }
        return $paths;
    }
}
