<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'BatoiLOGIC');

// Project repository
set('repository', 'https://github.com/VictorMonzo/BatoiLOGIC.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

task('artisan:optimize', function () {});


// Hosts

host('ec2-34-207-156-33.compute-1.amazonaws.com')
    ->user('backoffice')
    ->port(443)
    ->set('deploy_path', '/var/www/backoffice/html');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

//

after('deploy', ' sudo service php7.4-fpm restart');
