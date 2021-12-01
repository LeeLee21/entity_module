<?php

namespace Drupal\leelee\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a leelee.front entity.
 *
 * @ingroup leelee.front
 */
class FormDelete extends ContentEntityConfirmFormBase {

  /**
   * Returns the question to ask the user.
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete comment?');
  }

  /**
   * Returns the route to go to if user cancels the action.
   */
  public function getCancelUrl() {
    return new Url('leelee.front');
  }

  /**
   * Text confirm.
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * We delete our review when confirming the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $entity->delete();
    \Drupal::messenger()->addStatus('You delete your review');
    $form_state->setRedirect('leelee.front');
  }

}
