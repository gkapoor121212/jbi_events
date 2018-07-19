<?php

namespace Drupal\jbi_events\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Events entities.
 */
class EventsViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
