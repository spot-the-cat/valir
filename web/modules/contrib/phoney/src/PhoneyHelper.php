<?php

namespace Drupal\phoney;

/**
 * Helper class for the phoney module.
 */
class PhoneyHelper {
  const CHARS = 19;

  /**
   * Encrypt the string by adding 19 to the ASCII value of each digit.
   */
  public static function encrypt($txt) {
    $crypted = '';
    $txt = preg_replace(array('/\D/s', '/^(1)/'), '', $txt);

    for ($i = 0; $i < strlen($txt); $i++) {
      $crypted .= chr(ord($txt[$i]) + static::CHARS);
    }
    return $crypted;
  }

  /**
   * Decrypt the string by subtracting 19 from the ASCII value of each digit.
   */
  public static function decrypt($txt) {
    $decrypted = '';
    $txt = preg_replace('/[^A-Z]+/s', '', $txt);

    for ($i = 0; $i < strlen($txt); $i++) {
      $decrypted .= chr(ord($txt[$i]) - static::CHARS);
    }
    return $decrypted;
  }

}
