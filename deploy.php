<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'https://github.com/Nebja/testing.git');

add('shared_files', []);
add('shared_dirs', []);
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
    ->set('deploy_path', '/var/www/test.localnet/prod/webroot');

// Hooks

after('deploy:failed', 'deploy:unlock');
