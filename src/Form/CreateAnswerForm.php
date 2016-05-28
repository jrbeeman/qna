<?php

namespace Drupal\qna\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CreateAnswerForm.
 *
 * @package Drupal\qna\Form
 */
class CreateAnswerForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'create_answer_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['answer'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Answer'),
      '#maxlength' => 255,
      '#size' => 128,
    );
    $form['details'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Details'),
    );
    $form['add_answer'] = array(
      '#type' => 'submit',
      '#title' => $this->t('Add answer'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
