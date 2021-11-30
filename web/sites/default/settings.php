<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all environments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to ensure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Skipping permissions hardening will make scaffolding
 * work better, but will also raise a warning when you
 * install Drupal.
 *
 * https://www.drupal.org/project/drupal/issues/3091285
 */
// $settings['skip_permissions_hardening'] = TRUE;

/**
 * Set up config splits
 */

if (isset($_ENV['PANTHEON_ENVIRONMENT'])) {
  switch($_ENV['PANTHEON_ENVIRONMENT']) {
    case 'live':
      $config['config_split.config_split.live']['status'] = TRUE;
      $config['environment_indicator.indicator']['bg_color'] = '#990000';
      $config['environment_indicator.indicator']['fg_color'] = '#fff';
      $config['environment_indicator.indicator']['name'] = 'Live';
      break;

    case 'test':
      $config['config_split.config_split.test']['status'] = TRUE;
      $config['environment_indicator.indicator']['bg_color'] = '#ff9900';
      $config['environment_indicator.indicator']['fg_color'] = '#fff';
      $config['environment_indicator.indicator']['name'] = 'Test';
      break;

    case 'dev':
     $config['config_split.config_split.dev']['status'] = TRUE;
      $config['environment_indicator.indicator']['bg_color'] = '#006600';
      $config['environment_indicator.indicator']['fg_color'] = '#fff';
      $config['environment_indicator.indicator']['name'] = 'Dev';
      break;

    default :
      $config['config_split.config_split.dev']['status'] = TRUE;
      $config['environment_indicator.indicator']['bg_color'] = '#fff';
      $config['environment_indicator.indicator']['fg_color'] = '#006600';
      $config['environment_indicator.indicator']['name'] = 'MultiDev';
      break;
  }
} else { // LOCAL
  $config['config_split.config_split.local']['status'] = TRUE;
  // Environment indicator settings
  $config['environment_indicator.indicator']['bg_color'] = '#ca1a1a';
  $config['environment_indicator.indicator']['fg_color'] = '#faf6f6';
  $config['environment_indicator.indicator']['name'] = 'Local';

  /**
   * If there is a drupalvm settings file, then include it
   */
  $vm_settings = __DIR__ . "/settings.drupalvm.php";
  if (file_exists($vm_settings)) {
    include $vm_settings;
  }

  /**
   * If there is a local settings file, then include it
   */
  $docksal_settings = __DIR__ . "/settings.docksal.php";
  if (file_exists($docksal_settings)) {
    include $docksal_settings;
  }

  /**
   * If there is a local settings file, then include it
   */
  $local_settings = __DIR__ . "/settings.local.php";
  if (file_exists($local_settings)) {
    include $local_settings;
  }

}
