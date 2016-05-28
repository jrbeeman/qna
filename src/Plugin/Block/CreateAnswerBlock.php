<?php

namespace Drupal\qna\Plugin\Block;

use Drupal\Core\Block\BlockBase;

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
    $build['create_answer_block']['#markup'] = 'Implement CreateAnswerBlock.';

    return $build;
  }

}
