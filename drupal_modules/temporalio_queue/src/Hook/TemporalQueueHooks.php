<?php

namespace Drupal\temporalio_queue\Hook;

use Drupal\Core\Hook\Attribute\Hook;

/**
 * Temporalio_queue hook implementations.
 */
class TemporalQueueHooks {

  #[Hook('cron_queue_info_alter')]
  public function cronQueueInfoAlter(array &$queues): void {
    foreach ($queues as &$info) {
      $info['time'] = 0;
    }
  }

}
