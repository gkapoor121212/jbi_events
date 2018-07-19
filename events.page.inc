<?php

/**
 * @file
 * Contains events.page.inc.
 *
 * Page callback for Events entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Events templates.
 *
 * Default template: events.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_events(array &$variables) {
  // Fetch Events Entity Object.
  $events = $variables['elements']['#events'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
