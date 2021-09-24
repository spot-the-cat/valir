<?php

namespace Drupal\valir\Normalizer;

use Drupal\serialization\Normalizer\ContentEntityNormalizer;

/**
 * Converts the Drupal entity object structures to a normalized array.
 */
class ValirEntityNormalizer extends ContentEntityNormalizer {
  protected $supportedInterfaceOrClass = 'Drupal\node\NodeInterface';

  /**
   * {@inheritdoc}
   */
  public function normalize($entity, $format = NULL, array $context = array()) {
    $attributes = parent::normalize($entity, $format, $context);

    $attributes['valir'] = 212;
    $attributes['velir'] = 212;
    ksort($attributes);

    return $attributes;
  }

}
