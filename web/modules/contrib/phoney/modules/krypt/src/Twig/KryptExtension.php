<?php

namespace Drupal\krypt\Twig;

use Twig_Extension;
use Twig_SimpleFilter;

/**
 * Twig extension to encrypt phone links.
 */
class KryptExtension extends Twig_Extension {

  /**
   * {@inheritdoc}
   */
  public function getFilters() {
    return array(
      new Twig_SimpleFilter('krypt', 'str_krypt'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return 'krypt_twig_extension';
  }

}
