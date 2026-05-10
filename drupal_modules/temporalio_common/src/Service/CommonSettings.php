<?php

namespace Drupal\temporalio_common\Service;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\ImmutableConfig;

/**
 * Common settings for Temporal.
 */
class CommonSettings {

  protected ImmutableConfig $config;

  public function __construct(ConfigFactoryInterface $configFactory) {
    $this->config = $configFactory->get('temporalio_common.settings');
  }

  public function sidecarBaseUrl(): string {
    $url = (string) $this->config->get('temporal_url');
    return rtrim($url ?: 'http://localhost:3000', '/');
  }

  public function hmacSecret(): string {
    return (string) $this->config->get('hmac_secret');
  }

}
