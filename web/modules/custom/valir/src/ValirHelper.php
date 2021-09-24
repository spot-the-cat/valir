<?php

namespace Drupal\valir;

/**
 * Provides helper methods.
 */
class ValirHelper {

  /**
   * Configuration get wrapper.
   *
   * @param string $key
   *   The field name.
   *
   * @return mixed
   *   The value of the supplied field.
   */
  public static function getConfig($key = '') {
    $cfg = &drupal_static(__CLASS__ . '_' . __FUNCTION__, \Drupal::configFactory()->get('valir.config'));

    return $key ? $cfg->get($key) : (object) $cfg->get();
  }

  /**
   * Configuration get wrapper.
   *
   * @param string $key
   *   The field name.
   * @param mixed $val
   *   The field value.
   *
   * @return mixed
   *   The value of the supplied field.
   */
  public static function setConfig($key = '', $val = NULL) {
    $cfg = &drupal_static(__CLASS__ . '_' . __FUNCTION__, \Drupal::configFactory()->getEditable('valir.config'));

    return $key ? $cfg->set($key, $val)->save() : NULL;
  }

  /**
   * Get the current user ID.
   *
   * @return int
   *   The current user ID.
   */
  public static function getUid() {
    return \Drupal::currentUser()->id();
  }

  /**
   * Get the name of the user name with the supplid ID.
   *
   * @param int $uid
   *   The field name.
   *
   * @return string
   *   The name of the user name with the supplid ID.
   */
  public static function getUsrName($uid) {
    $usr = intval($uid) ? \Drupal\user\Entity\User::load($uid) : NULL;

    return $usr ? $usr->get('name')->value : '';
  }

}
