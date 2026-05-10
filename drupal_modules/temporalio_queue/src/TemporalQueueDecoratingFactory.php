<?php

namespace Drupal\temporalio_queue;

use Drupal\Core\Queue\QueueFactory;
use GuzzleHttp\ClientInterface;
use Drupal\temporalio_common\Service\CommonSettings;

/**
 * The class extends QueueFactory only to type match, the parent is not used.
 */
class TemporalQueueDecoratingFactory extends QueueFactory {

  public function __construct(
    protected ClientInterface $http,
    protected CommonSettings $common,
    protected QueueFactory $inner,
  ) {}

  /**
   * {@inheritdoc}
   */
  public function get($name, $reliable = FALSE): TemporalQueue {
    return new TemporalQueue($name, $this->http, $this->common);
  }

}
