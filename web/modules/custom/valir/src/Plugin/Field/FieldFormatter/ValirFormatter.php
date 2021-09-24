<?php

namespace Drupal\valir\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * To upper string formatter.
 *
 * @FieldFormatter(
 *   id = "to_upper",
 *   label = @Translation("To upper text"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class ValirFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary[] = $this->t('To upper text.');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $data = [];

    foreach ($items as $i => $item) {
      $data[$i] = ['#markup' => strtoupper($item->value)];
    }
    return $data;
  }

}
