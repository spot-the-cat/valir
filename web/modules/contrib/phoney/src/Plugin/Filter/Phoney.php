<?php

namespace Drupal\phoney\Plugin\Filter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;
use Drupal\phoney\PhoneyHelper as Helper;

/**
 * Provide a filter to obfuscate tel anchor tags.
 *
 * @Filter(
 *   id = "phoney",
 *   title = @Translation("Obfuscate Phone"),
 *   description = @Translation("Transform <code>tel</code> anchors into obfuscated markup."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * )
 */
class Phoney extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($txt, $lang) {
    $result = new FilterProcessResult($txt);

    if (!strpos($txt, 'tel:')) {
      return $result;
    }
    $dom = Html::load($txt);
    $xpath = new \DOMXPath($dom);

    foreach ($xpath->query('//a[starts-with(@href, "tel:")]') as $element) {
      $href = str_replace('tel:', '', $element->getAttribute('href'));
      $element->setAttribute('href', '#');
      $phone = Helper::encrypt($href);
      $element->setAttribute('data-phone-to', $phone);
      $element->nodeValue = '@phone';
      $element->setAttribute('data-replace-inner', '@phone');
    }
    $result->setProcessedText(Html::serialize($dom));

    return $result;
  }
}
