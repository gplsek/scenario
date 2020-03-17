<?php

namespace Drupal\scenario_core\Form;

use Drupal\Core\Form\FormStateInterface;

/**
 * Form handler Class for ConfigForm.
 */
class ConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'scenario_core_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->getConfig();

    $form['scenario_ecom'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable E-Commerce'),
      '#default_value' => $config->get('scenario_ecom'),
    ];

    $form['elastic_path_api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Elastic Path API KEY'),
      '#default_value' => $config->get('elastic_path_api_key'),
      '#description' => $this->t('Elastic Path API KEY.'),
    ];

    $form['elastic_path_secret'] = [
      '#type' => 'key_select',
      '#title' => $this->t('Elastic Path Secret Key'),
      '#default_value' => $config->get('elastic_path_secret'),
      '#description' => $this->t('Select your Elastic Path Secret Key.'),
    ];

    $form['elastic_path_endpoint'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Elastic Path API Endpoint'),
      '#default_value' => $config->get('elastic_path_endpoint'),
      '#description' => $this->t('Enter full the API endpoint path'),
    ];

    return parent::buildForm($form, $form_state);
  }

}
