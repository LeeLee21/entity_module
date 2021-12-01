<?php

namespace Drupal\leelee\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 *
 */
class LeeLeeGuestBookForm extends ContentEntityForm {

  /**
   *
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = parent::buildForm($form, $form_state);
    $entity = $this->getEntity();

    $form['name']['widget'][0]['value']['#ajax'] = [
      'callback' => '::nameAjaxValidate',
      'event'    => 'change',
    ];
    $form['name_message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="name_message"></div>',
    ];
    $form['email']['widget'][0]['value']['#ajax'] = [
      'callback' => '::emailAjaxValidate',
      'event' => 'change',
      '#weight' => '20',
    ];
    $form['email_message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="email_message"></div>',
    ];
    $form['phone_number']['widget'][0]['value']['#ajax'] = [
      'callback' => '::numberAjaxValidate',
      'event' => 'change',
    ];
    $form['phone_number_message'] = [
      '#type' => 'markup',
      '#markup' => '<div class="phone_number_message"></div>',
    ];
    return $form;
  }

  /**
   * Validation for name.
   */
  public function nameAjaxValidate(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $nameVal = $form_state->getValue('name')[0]['value'];
    if (strlen($nameVal) < 2) {
      $response->addCommand(new HtmlCommand('.name_message', 'Your name is too short')
      );
    }
    else {
      $response->addCommand(new HtmlCommand('.name_result_message', 'ok',)
      );
    }
    return $response;
  }

  /**
   * Validation for email.
   */
  public function emailAjaxValidate(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $emailVal = $form_state->getValue('email')[0]['value'];
    if ((!filter_var($emailVal, FILTER_VALIDATE_EMAIL))) {
      $response->addCommand(new HtmlCommand('.email_message', 'Your email is not correct.')
      );
    }
    else {
      $response->addCommand(new HtmlCommand('.email_message', 'ok',)
      );
    }
    return $response;
  }

  /**
   * Validation for telephone.
   */
  public function numberAjaxValidate(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $telephoneVal = $form_state->getValue('telephone')[0]['value'];
    if (!filter_var($telephoneVal, FILTER_VALIDATE_INT) || !preg_match('/^\+?3?8?(0\d{9})$/', $telephoneVal)) {
      $response->addCommand(new HtmlCommand('.phone_number_message', 'Enter the phone number correctly'));
    }
    else {
      $response->addCommand(new HtmlCommand('.phone_number_message', 'ok',)
      );
    }
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    parent::save($form, $form_state);
    $entity = $this->getEntity();
    $entity_type = $entity->getEntityType();
    $arguments = [
      '@entity_type' => $entity_type->getSingularLabel(),
      '%entity' => $entity->label(),
      'link' => $entity->toLink($this->t('View'), 'canonical')->toString(),
    ];
    $this->logger($entity->getEntityTypeId())->notice('Form was submited', $arguments);
    $this->messenger()->addStatus($this->t('Successfully.', $arguments));
    $form_state->setRedirectUrl(Url::fromRoute('leelee.front'));
  }

}
