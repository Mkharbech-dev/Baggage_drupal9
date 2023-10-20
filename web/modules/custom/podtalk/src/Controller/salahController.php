<?php
namespace drupal\podtalk\Controller;
use Drupal\Core\Controller\ControllerBase;

class salahController extends ControllerBase{
    public function bienvenue(){
    $name= 'salah eddine';
    $phrase = 'bienvenue chez Drupal 9';
    return [
        '#theme' => 'salah',
        '#nom' => $name,
        '#items'=> $phrase,
        '#title' => $this->t('Bienvenue chez salahController')
      ];
    }

    public function bonjour() {
      return [
       '#type' => 'markup',
       '#markup' => $this->t('Bonjour tout le monde'),
      ];
     }
}