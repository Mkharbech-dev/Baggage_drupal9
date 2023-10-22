<?php

namespace Drupal\podtalk\Service;

use Drupal\Core\Database\Connection;
use Exception;

class DbInsertService{

  protected $database;

  public function __construct(Connection $database){
    $this->database = $database;
  }

  /**
   * Set Data function
   */

  public function setData($form_state){
    try{
    $this->database->insert('customform')
      ->fields(array(
        'mail' => $form_state->getValue('mail'),
        'name' => $form_state->getValue('name'),
        'created' => time(),
      ))
      ->execute();

    } catch(Exception $ex){
      \Drupal::logger('podtalk')->error($ex->getMessage());
    }
  }

  /**
   * get Data function from customform (par exemple si on veut récupérer les utilisateurs de notre projet,
   * on remplace "customform" par " users_field_data"
   */

  public function getData(){
    $query = $this->database->select('customform', 'cf');
    $query->fields('cf');
    $result = $query->execute()->fetchAll();
    return $result;
  }
}
