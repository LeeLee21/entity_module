<?php

namespace Drupal\leelee\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides route responses for the LeeLee module.
 */
class LeeLeeController extends ControllerBase {

  /**
   * Do some func.
   *
   * @var \Drupal\leelee\Controller\LeeLeeController
   */
  protected $formBuild;

  /**
   * Do some func.
   *
   * @var \Drupal\leelee\Controller\LeeLeeController
   */
  protected $entityBuild;

  /**
   * Creating a container for form rendering.
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->formBuild = $container->get('entity.form_builder');
    $instance->entityBuild = $container->get('entity_type.manager');
    return $instance;
  }

  /**
   * Getting the Form and render it.
   */
  public function buildForm() {
    $entity = $this->entityBuild
      ->getStorage('guestbook')
      ->create([
        'entity_type' => 'node',
        'entity' => 'guestbook',
      ]);
    $guestbookform = $this->formBuild->getForm($entity, 'add');

    $result = $this->load();
    $result = json_decode(json_encode($result), TRUE);
    $data = [];
    foreach ($result as $row) {
      if ($row['avatar__target_id'] !== NULL) {
        $avatar = File::load($row['avatar__target_id']);
        $avatarUri = $avatar->getFileUri();
        $avatarUrl = file_create_url($avatarUri);
        $avatarVariables = [
          '#theme' => 'image',
          '#uri' => $avatarUrl,
          '#alt' => 'Ava',
          '#title' => 'Ava',
          '#width' => '100',
        ];

      }
      else {
        $avatarVariables = [];
        $avatarUrl = '';
      }
      if ($row['image__target_id'] !== NULL) {
        $image = File::load($row['image__target_id']);
        $imageUri = $image->getFileUri();
        $imageUrl = file_create_url($imageUri);
        $imageVariables = [
          '#theme' => 'image',
          '#uri' => $imageUrl,
          '#alt' => 'image',
          '#title' => 'image',
          '#width' => '100',
        ];
      }
      else {
        $imageVariables = [];
        $imageUrl = '';
      }
      $data[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'email' => $row['email'],
        'phone_number' => $row['phone_number'],
        'response' => $row['response'],
        'avatar__target_id' => [
          'data' => $avatarVariables,
        ],
        'image__target_id' => [
          'data' => $imageVariables,
        ],
        'timestamp' => $row['timestamp'],
      ];
    }
    return [
      '#theme' => 'leeleeguestbook',
      '#form' => $guestbookform,
      '#rows' => $data,
    ];
  }

  /**
   * Data for table.
   */
  public function load() {
    $query = Database::getConnection()->select('gbdb', 'g');
    $query->fields('g', [
      'id',
      'uuid',
      'name',
      'email',
      'phone_number',
      'response',
      'avatar__target_id',
      'image__target_id',
      'timestamp',
    ]);
    $result = $query
      ->orderBy('timestamp', 'DESC')
      ->execute()
      ->fetchAll();
    return $result;
  }
}
