<?php

namespace Drupal\scenario_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Site\Settings;

/**
 * Custom Acess class to check for admin role and enviroment.
 */
class ScenarioController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  private function getEnv() {

    return Settings::get('scenario_env', 'prod');
  }

  /**
   * {@inheritdoc}
   */
  private function getRole($account) {

    return in_array("administrator", $account->getRoles());
  }

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(AccountInterface $account) {

    return (($this->getEnv() == 'develop') || ($this->getRole($account))) ? AccessResult::allowed() : AccessResult::forbidden();
  }

}
