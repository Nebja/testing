<?php
namespace Deployer;

require 'recipe/symfony.php';
require 'contrib/yarn.php';

// Config

set('repository', 'https://github.com/Nebja/testing.git');

add('shared_files', []);
add('shared_dirs', []);
set('keep_releases', 3);
add('writable_dirs', []);

// Hosts
host('main')
    ->setHostname('45.84.206.195')
    ->setRemoteUser('u463018380')
    ->setPort(65002)
    ->set('deploy_path', '~/domains/nebja.eu/dev');

host('test-dev')
    ->setHostname('192.168.226.3')
    ->setRemoteUser('nebja')
    ->setPort(22)
    ->set('deploy_path', '/var/www/test.localnet/dev/webroot');

host('test-prod')
    ->setHostname('192.168.226.3')
    ->setRemoteUser('nebja')
    ->setPort(22)
    ->setDeployPath('/var/www/test.localnet/prod/webroot');

// Hooks
after('deploy:failed', 'deploy:unlock');

//tasks
task( 'deploy', [
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'yarn:install',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:cache:clear',
    'deploy:symlink',
    'deploy:unlock',
    'deploy:cleanup',
    'deploy:success',
    'build'
]);
task('build', function (){
    cd('/var/www/test.localnet/dev/webroot/current');
    run('yarn run build');
});
