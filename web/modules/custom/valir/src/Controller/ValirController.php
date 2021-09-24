<?php

namespace Drupal\valir\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\valir\ValirHelper as Helper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Valir menu callbacks.
 */
class ValirController extends ControllerBase {

  /**
   * Display name set in valir config.
   *
   * @param Symfony\Component\HttpFoundation\Request $request
   *   The Request object.
   *
   * @return object
   *   A Drupal markup array.
   */
  public function helloValir1(Request $request) {
    $cfg = Helper::getConfig();

    $first = !empty($cfg->name_f) ? $cfg->name_f : '';
    $last = !empty($cfg->name_l) ? $cfg->name_l : '';

    return [
      '#type'   => 'markup',
      '#markup' => $this->t('Hello, my name is @name.', ['@name' => trim("$first $last")]),
    ];
  }

  /**
   * Return a JSON object with the data set in valir config.
   *
   * @param Symfony\Component\HttpFoundation\Request $request
   *   The Request object.
   *
   * @return object
   *   A JSON object with the data set in valir config.
   */
  public function helloValir2(Request $request) {
    $cfg = Helper::getConfig();

    $data = [
      'first name' => !empty($cfg->name_f) ? $cfg->name_f : '',
      'last name'  => !empty($cfg->name_l) ? $cfg->name_l : '',
    ];
    $response = new Response(json_encode($data, JSON_UNESCAPED_UNICODE));
    $response->headers->set('Content-Type', 'application/json; charset=UTF-8');

    return $response;

  }

  /**
   * Display name set in valir config with "Administer Valir" permissions.
   *
   * @param Symfony\Component\HttpFoundation\Request $request
   *   The Request object.
   *
   * @return array
   *   A Drupal markup array.
   */
  public function helloValir3(Request $request) {
    return $this->helloValir1($request);
  }

}
