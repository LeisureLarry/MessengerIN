<?php

namespace Drupal\messenger_in\StringTranslation;

use Drupal\Core\StringTranslation as Core;

class PluralTranslatableMarkup extends Core\PluralTranslatableMarkup {
  
    public static function createFromTranslatable($string, array $arguments = [], array $options = []) {
      $count = $string->count;
      $arguments = $string->getArguments();
      $options = $string->getOptions();
      $string_translation = $string->getStringTranslation();

      $string = $string->string;
      
      $plural = new static($count, '', '', $arguments, $options, $string_translation);
      $plural->string = $string;
      
      return $plural;
    }
    
    public function addOption($key, $value) {
      $this->options[$key] = $value;
    }
  
}
