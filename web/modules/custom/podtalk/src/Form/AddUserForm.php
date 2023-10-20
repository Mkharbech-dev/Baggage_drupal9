<?php
namespace Drupal\podtalk\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * ajout d'un utilisateur.
 */

class AddUserForm extends FormBase{
  protected $load_data;

  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    // TODO: Implement getFormId() method.
    return 'add_user_form';
  }

  public function __construct(){
    $this->load_data = \Drupal::service('podtalk.db_insert_service');
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    //$this->load_data = \Drupal::service('podtalk.db_insert_service');
    //dump(\Drupal::getContainer()->get('podtalk.db_insert_service'));

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('nom utilisateur'),
      '#required' => TRUE,
    ];
    $form['mail'] = [
      '#type' => 'email',
      '#title' => $this->t('mail utilisateur'),
      '#required' => TRUE,
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Enregistrer'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $query = $this->load_data->setData($form_state);
    \Drupal::messenger()->addMessage(t("L'utilisateur".' '.'<b>'.$form_state->getValue('name').'</b>'.' '."à été bien enregistré."),'status');

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
}
