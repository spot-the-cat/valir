<?php

namespace Drupal\valir\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\valir\ValirHelper as Helper;

/**
 * Valir configuration form.
 */
class ValirAdminForm extends FormBase {

  /**
   * The valir configuration form.
   *
   * @param array $form
   *   A drupal form array.
   * @param Drupal\Core\Form\FormStateInterface $form_state
   *   A Drupal form state object.
   *
   * @return array
   *   A Drupal form array.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $cfg = Helper::getConfig();

    $form['name_f'] = [
      '#title'         => $this->t('First Name'),
      '#type'          => 'textfield',
      '#default_value' => !empty($cfg->name_f) ? $cfg->name_f : '',
      '#required'      => TRUE,
      '#weight'        => 10,
    ];
    $form['name_l'] = [
      '#title'         => $this->t('Last Name'),
      '#type'          => 'textfield',
      '#default_value' => !empty($cfg->name_l) ? $cfg->name_l : '',
      '#required'      => TRUE,
      '#weight'        => 20,
    ];
    $form['submit'] = [
      '#type'   => 'submit',
      '#value'  => $this->t('Submit'),
      '#weight' => 30,
    ];
    return $form;
  }

  /**
   * The form ID.
   *
   * @return string
   *   The form ID.
   */
  public function getFormId() {
    return 'valir_admin';
  }

  /**
   * Submit function for the valir configuration form.
   *
   * @param array $form
   *   A drupal form array.
   * @param Drupal\Core\Form\FormStateInterface $form_state
   *   A Drupal form state object.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    Helper::setConfig('name_f', trim($form_state->getValue('name_f')));
    Helper::setConfig('name_l', trim($form_state->getValue('name_l')));
  }

  /**
   * Validation function will test that the names begin with a letter.
   *
   * @param array $form
   *   A drupal form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   A Drupal FormStateInterface object.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!preg_match('/^[a-zA-Z].*/', trim($form_state->getValue('name_f')))) {
      $form_state->setErrorByName('name_f', $this->t('Please provide a first name beginning with a letter.'));
    }
    if (!preg_match('/^[a-zA-Z].*/', trim($form_state->getValue('name_l')))) {
      $form_state->setErrorByName('name_l', $this->t('Please provide a last name beginning with a letter.'));
    }
  }

}
