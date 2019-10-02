<?php

namespace Drupal\ckeditor_video\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "video" plugin.
 *
 * @CKEditorPlugin(
 *   id = "video",
 *   label = @Translation("Video"),
 *   module = "ckeditor_video"
 * )
 */
class Video extends CKEditorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'ckeditor_video') . '/js/plugins/video/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return [
      'Video' => [
        'label' => $this->t('Video'),
        'image' => drupal_get_path('module', 'ckeditor_video') . '/js/plugins/video/icons/video.png',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return ['fakeobjects'];
  }

}
