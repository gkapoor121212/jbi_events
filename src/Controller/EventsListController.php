<?php

namespace Drupal\jbi_events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\taxonomy\Entity\Term;
use Drupal\jbi_events\Entity\Events;


/**
 * Class EventsListController.
 */
class EventsListController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function content() {
    $markup = '';
    $category_query = \Drupal::entityQuery('taxonomy_term');
    $category_query->condition('vid', 'event_category');
    $category_result = $category_query->execute();
    foreach ($category_result as $key => $value) {
      $category = Term::load($key);
      $markup .= '<h1>'.$category->getName().'</h1>';
      $events_query = \Drupal::entityQuery('events');
      $events_query->condition('field_event_category', $key);
      $events_result = $events_query->execute();
      foreach ($events_result as $event_id) {
        $event = Events::load($event_id);
        $event_name = $event->getName();
        $markup .= '<a href=/admin/structure/events/'.$event_id.'>'.$event_name.'</a>-------<a href=/admin/structure/events/'.$event_id.'/subscribe > Subscribe</a><br>';
      }
    }
    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];
  }

}
