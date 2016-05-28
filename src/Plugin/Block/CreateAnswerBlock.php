<?php

namespace Drupal\qna\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'CreateAnswerBlock' block.
 *
 * @Block(
 *  id = "create_answer_block",
 *  admin_label = @Translation("Create answer block"),
 * )
 */
class CreateAnswerBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    // Keep anonymous users from answering
    $user = \Drupal::currentUser();
    if ($user->isAnonymous()) {
      $build = [
        '#markup' => '<p>You must log in to provide answers.</p>',
      ];
    }
    else {
      $build = \Drupal::formBuilder()->getForm('Drupal\qna\Form\CreateAnswerForm');
    }

    return $build;
  }

}
