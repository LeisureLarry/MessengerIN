<?php

namespace Drupal\messenger_in\Messenger;

use Drupal\messenger_in\StringTranslation\TranslatableMarkup;
use Drupal\messenger_in\StringTranslation\PluralTranslatableMarkup;

use Drupal\Core\Messenger\Messenger;
use Drupal\Core\Language\LanguageInterface;

class MessengerMultilingual extends Messenger {

  public function addMessage($message, $type = self::TYPE_STATUS, $repeat = FALSE) { // dpm($message);
    if (is_object($message)) {
      $class = $this->parseClass(get_class($message));
    
      $translatableClass = '\\Drupal\\messenger_in\\StringTranslation\\' . $class['classname'];
    
      if (class_exists($translatableClass)) {
        $message = $translatableClass::createFromTranslatable($message);
        $message->addOption(
          'langcode',
          \Drupal::languageManager()->getCurrentLanguage(LanguageInterface::TYPE_CONTENT)->getId()
        );
      }
    }
    
    parent::addMessage($message, $type, $repeat);

    return $this;
  }

  /* Link: http://php.net/manual/de/function.get-class.php#107964 */
  protected function parseClass($class) {
    return [
      'namespace' => array_slice(explode('\\', $class), 0, -1),
      'classname' => join('', array_slice(explode('\\', $class), -1)),
    ];
  }

}
