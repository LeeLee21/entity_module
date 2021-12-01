<?php

namespace Drupal\leelee\Entity;

use Drupal\Core\Entity\Annotation\ContentEntityType;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * @ContentEntityType(
 *   id = "guestbook",
 *   label = @Translation("guestbook"),
 *   handlers = {
 *     "access" = "Drupal\Core\Entity\EntityAccessControlHandler",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\leelee\Controller\LeeLeeGuestBook",
 *     "views_data" = "Drupal\Core\Views\EntityViewsData",
 *     "permission_provider" = "Drupal\Core\Entity\EntityPermissionProvider",
 *     "form" = {
 *       "add" = "Drupal\leelee\Form\LeeLeeGuestBookForm",
 *       "edit" = "Drupal\leelee\Form\LeeLeeGuestBookForm",
 *       "delete" = "Drupal\leelee\Form\FormDelete",
 *     },
 *   "route_provider" = {
 *       "default" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "gbdb",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/guestbook/add",
 *     "canonical" = "/guestbook/{guestbook}",
 *     "edit-form" = "/guestbook/edit/{guestbook}",
 *     "delete-form" = "/guestbook/delete/{guestbook}",
 *   },
 *   admin_permission = "administer nodes",
 * )
 */
class LeeLeeGuestBook extends ContentEntityBase {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('ID'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('UUID'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel('Name')
      ->setSetting('min_length', 2)
      ->setSetting('man_length', 100)
      ->setRequired(TRUE)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => 10,
        'settings' => [
          'placeholder' => 'minimum 2, maximum 100 symbols',
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => 10,
      ]);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel('Email')
      ->setDisplayOptions('form', [
        'label' => 'inline',
        'weight' => 20,
        'settings' => [
          'placeholder' => 'guestbook@gmail.com',
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'weight' => 20,
        'settings' => [
          'placeholder' => 'guestbook@gmail.com',
        ],
      ])
      ->setRequired(TRUE);

    $fields['phone_number'] = BaseFieldDefinition::create('string')
      ->setLabel('Phone number')
      ->setDisplayOptions('form', [
        'label' => 'inline',
        'weight' => 30,
        'settings' => [
          'placeholder' => '+380999999999',
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'weight' => 30,
        'settings' => [
          'placeholder' => '+380999999999',
        ],
      ])
      ->setRequired(TRUE);

    $fields['response'] = BaseFieldDefinition::create('string_long')
      ->setLabel('Your response')
      ->setDisplayOptions('form', [
        'label' => 'inline',
        'weight' => 40,
        'settings' => [
          'placeholder' => 'Your Response',
        ],
      ])
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'weight' => 40,
        'settings' => [
          'placeholder' => 'Your Response',
        ],
      ])
      ->setDescription('Your Response')
      ->setRequired(TRUE);

    $fields['avatar'] = BaseFieldDefinition::create('image')
      ->setLabel('Your avatar')
      ->setDisplayOptions('form', [
        'label' => 'above',
        'type' => 'string',
        'weight' => 50,
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => 50,
      ])
      ->setSettings([
        'max_filesize' => '2097152',
        'upload_location' => 'public://guestbook/avatars/',
        'file_extensions' => 'png jpg jpeg',
        'alt_field' => FALSE,
        'alt_field_required' => FALSE,
      ])
      ->setDescription('PNG, JPEG, JPG < 2MB')
      ->setRequired(FALSE);

    $fields['image'] = BaseFieldDefinition::create('image')
      ->setLabel('Your picture to response')
      ->setDisplayOptions('form', [
        'label' => 'inline',
        'weight' => 60,
      ])
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'weight' => 60,
      ])
      ->setSettings([
        'max_filesize' => '5242880',
        'upload_location' => 'public://guestbook/images/',
        'file_extensions' => 'png jpg jpeg',
        'alt_field' => FALSE,
        'alt_field_required' => FALSE,
      ])
      ->setRequired(FALSE);

    $fields['timestamp'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDisplayOptions('view', [
        'label' => 'inline',
        'weight' => 7,
        'type' => 'timestamp',
        'settings' => [
          'date_format' => 'custom',
          'custom_date_format' => 'm/d/Y H:i:s',
        ],
      ])
      ->setRequired(FALSE);

    return $fields;
  }

}
