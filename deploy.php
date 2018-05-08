<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Job4U');

// Project repository
set('repository', 'git@bitbucket.org:naimteehee/job4u.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);

set('ssh_multiplexing', false);

// Hosts

host('fyp.naimteehee.com')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/var/www/html/job4u');  
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');


