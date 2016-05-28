<?php

namespace Drupal\qna\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

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
   * Create an answer.
   *
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Keep anonymous users from answering.
    $user = \Drupal::currentUser();
    if ($user->isAnonymous()) {
      return;
    }

    // Add the new answer.
    $node = Node::create(array(
      'type' => 'answer',
      'title' => $form_state->getValue('title'),
      'body' => [
        'value' => $form_state->getValue('details'),
      ],
      'uid' => $user->id(),
      'status' => NODE_PUBLISHED,
    ));
    $node->save();

    // TODO: Add the entity reference to the parent question.
//    if ($node->id()) {
//      $node->get('field_translations')->appendItem($translation->id());
//      $node->save();
//      drupal_set_message(t("Thank you for your contribution."), 'status');
//    }
  }

}
