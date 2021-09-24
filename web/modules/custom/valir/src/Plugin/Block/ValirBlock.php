<?php

namespace Drupal\valir\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\valir\ValirHelper as Helper;

/**
 * Provides a 'Login' Block.
 *
 * @Block(
 *   id = "valir_login",
 *   admin_label = @Translation("Valir Login"),
 *   category = @Translation("Valir Login"),
 * )
 */
class ValirBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $uid = Helper::getUid();

    if ($uid) {
      $html = $this->t('Welcome @name!', ['@name' => Helper::getUsrName($uid)]);
    }
    else {
      $html = '<a href="/user/login">Login</a>';
    }
    return [
      '#markup' => $html,
      '#cache'  => ['max-age' => 0],
    ];
  }

}
