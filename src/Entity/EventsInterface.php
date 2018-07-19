<?php

namespace Drupal\jbi_events\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Events entities.
 *
 * @ingroup jbi_events
 */
interface EventsInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Events name.
   *
   * @return string
   *   Name of the Events.
   */
  public function getName();

  /**
   * Sets the Events name.
   *
   * @param string $name
   *   The Events name.
   *
   * @return \Drupal\jbi_events\Entity\EventsInterface
   *   The called Events entity.
   */
  public function setName($name);

  /**
   * Gets the Events creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Events.
   */
  public function getCreatedTime();

  /**
   * Sets the Events creation timestamp.
   *
   * @param int $timestamp
   *   The Events creation timestamp.
   *
   * @return \Drupal\jbi_events\Entity\EventsInterface
   *   The called Events entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Events published status indicator.
   *
   * Unpublished Events are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Events is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Events.
   *
   * @param bool $published
   *   TRUE to set this Events to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\jbi_events\Entity\EventsInterface
   *   The called Events entity.
   */
  public function setPublished($published);

}
