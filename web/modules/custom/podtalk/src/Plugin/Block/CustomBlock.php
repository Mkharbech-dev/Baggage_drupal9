<?php


namespace Drupal\podtalk\Plugin\Block;

use Drupal\Core\Block\BlockBase;




/**
 * Provides a 'custom' Block.
 *
 * @Block(
 *   id = "podtalk_user",
 *   admin_label = @Translation("Nos utilisteurs"),
 *   category = @Translation("show users custom"),
 * )
 */

class CustomBlock extends BlockBase{

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $data = \Drupal::service('podtalk.db_insert_service')->getData();
    return [
      '#theme' => 'user-show',
      '#data' => $data,
      '#title' => 'Nos utilisateurs dans customform',
    ];
  }
}
