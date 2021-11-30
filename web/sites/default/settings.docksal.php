<?php
# Docksal DB connection settings.
$databases['default']['default'] = array (
  'database' => 'default',
  'username' => 'user',
  'password' => 'user',
  'host' => 'db',
  'driver' => 'mysql',
);

# hash_salt
$settings['hash_salt'] = 'wahoo';

// Site Specific URL
$base_url = "http://tests-project.docksal";

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

$config['system.logging']['error_level'] = 'verbose';

$settings['rebuild_access'] = TRUE;

$settings['skip_permissions_hardening'] = TRUE;

# Trusted Host Settings
$settings['trusted_host_patterns'] = [
  '^tests-project\.docksal$',
];

# file path settings
$settings['file_temporary_path'] = '/tmp';
$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = 'sites/default/files/private';
