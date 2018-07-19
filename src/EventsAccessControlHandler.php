<?php

namespace Drupal\jbi_events;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Events entity.
 *
 * @see \Drupal\jbi_events\Entity\Events.
 */
class EventsAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\jbi_events\Entity\EventsInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished events entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published events entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit events entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete events entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add events entities');
  }

}
