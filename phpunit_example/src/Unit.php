<?php

namespace Drupal\phpunit_example;

/**
 * Defines a Unit class.
 */
class Unit {

 public function getLocale($uri = '')
 {
   if(strpos($uri,'/en/') === 0){
     return EN;
   }elseif (strpos($uri,'/ar/') === 0){
     return AR;
   }elseif (\Drupal::request()->query->has('lang')){
    $lang = \Drupal::request()->query->get('lang');

    //return $this->isValidLocale($lang) ? $lang : AR;
   }
   elseif (\Drupal::request()->headers->has('x-locale')){
    $lang = \Drupal::request()->headers->get('x-locale');
    //return $this->isValidLocale($lang) ? $lang : AR;
  }
  return AR;
  }

  public function isValidLocale($lang){
    if (is_string($lang) && in_array($lang,ALLOWED_LANGUAGES)){
      return true;
    }
    return false;

  }

 }

