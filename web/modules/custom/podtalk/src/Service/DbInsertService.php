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
      /* try{
      $conn = Database::getConnection();

      $field = $form_state->getValues();

      $fields["name"] = $field['name'];
      $fields["mail"] = $field['mail'];
      $fields["created"] = time();

      $conn->insert('customform')
        ->fields($fields)->execute();
      \Drupal::messenger()->addMessage($this->t('Utilisateur à été bien enregistré'));

    } catch(Exception $ex){
      \Drupal::logger('podtalk')->error($ex->getMessage());
    }*/

  }

  /**
   * get Data function
   */

  public function getData(){
    $query = $this->database->select('customform', 'cf');
    $query->fields('cf');
    $result = $query->execute()->fetchAll();
    return $result;
  }
}
