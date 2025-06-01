<?php

namespace Deployer;

require 'recipe/laravel.php';


// Config
set('application', 'Laravel Abbey Software Development Web Application');        // The Application Title
set('repository', 'git@abbeysoftware.github.com:Mark-AbbeySoftware/vcms.git');   // SCM Target
set('keep_releases',
    2);                                                           // Number of releases to keep on hosts
set('default_timeout', 1200);                                                      // default ssh timeout

add('shared_files', ['.env']);                                                             // shared files
add('shared_dirs', ['storage', 'vendor', 'bootstrap/cache']);              // Shared dirs between deploys
add('writable_dirs', ['storage', 'vendor', 'bootstrap/cache']);            // Writable dirs by web server


set('bin/php', function () {
    return '/usr/bin/php7.4';
});

// Core Tasks

task('npm:install', function () {
    run("cd {{release_path}} && /usr/bin/npm install");
})->desc('Running npm install');

task('npm:build', function () {
    run("cd {{release_path}} && /usr/bin/npm run build");
})->desc('Running npm build');

task('build', function () {
    #cd('{{release_path}}');
    #run('/usr/bin/npm install');
    #run('/usr/bin/npm run build');
});

// Hosts

host('prod')
    ->set('hostname', 'www.absdev.net')
    ->set('remote_user', 'mag')
    ->set('identityFile', '~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/absdev')
    ->set('writable_use_sudo', false)
    ->set('use_relative_symlink', true)
    ->set('http_user', 'mag')
    ->set('branch', 'main')
    ->set('ssh_multiplexing', true)
    ->set('git_tty', false)
    ->set('ssh_type', 'native');


// Hooks

after('deploy:update_code', 'build');
after('deploy:success', 'artisan:config:clear');
after('deploy:success', 'artisan:route:clear');
after('deploy:success', 'artisan:cache:clear');

after('deploy:failed', 'deploy:unlock');

