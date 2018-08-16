<?php

namespace Drupal\messenger_in;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Modifies the default messenger service.
 */
class MessengerInServiceProvider extends ServiceProviderBase {

  public function alter(ContainerBuilder $container) {
    if (\Drupal::hasService('messenger')) {
      $definition = $container->getDefinition('messenger');
      $definition->setClass('Drupal\messenger_in\Messenger\MessengerMultilingual');
    }
  }
  
}
