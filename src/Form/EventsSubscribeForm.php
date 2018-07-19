<?php

namespace Drupal\jbi_events\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\jbi_events\Entity\Events;

/**
 * Class EventsSubscribeForm.
 */
class EventsSubscribeForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'subscribe_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#description' => $this->t('Please enter your email to subscribe.'),
      '#default_value' => 'john@doe.com',
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $event_id = \Drupal::routeMatch()->getParameter('event_id');
    $event = Events::load($event_id);
    $event_subscribers = $event->get('field_subscribers')->getValue();
    array_push($event_subscribers,['value' => $form_state->getValue('email')]);
    $event->set('field_subscribers', $event_subscribers);
    $event->save();
    drupal_set_message('Thanks For Subscribing.');
  }

}
