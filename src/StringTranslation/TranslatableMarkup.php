<?php

namespace Drupal\messenger_in\StringTranslation;

use Drupal\Core\StringTranslation as Core;

class TranslatableMarkup extends Core\TranslatableMarkup {
  
    public static function createFromTranslatable($string, array $arguments = [], array $options = []) {
      $arguments = $string->getArguments();
      $options = $string->getOptions();
      $string_translation = $string->getStringTranslation();
      
      $string = $string->getUntranslatedString();
      
      return new static($string, $arguments, $options, $string_translation);      
    }
    
    public function addOption($key, $value) {
      $this->options[$key] = $value;
    }
  
}
