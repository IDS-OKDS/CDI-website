<?php

/**
 * @file
 * Definition of the 'cdi publication' panel style.
 */

$plugin = array(
  'title' => t('CDI Publication'),
  'description' => t('Wraps panes and regions in Publication style.'),
  'render pane' => 'cdimod_publication_render_pane',
  'render region' => 'cdimod_publication_render_region',
  'weight' => -10,
);

/**
 * Theme function for the pane style.
 */
function theme_cdimod_publication_render_pane($vars) {
  $content = $vars['content'];
  $pane = $vars['pane'];
  $display = $vars['display'];
  $plugin = $vars['style'];
  
  $content->css_class .= ' cdi-style-publication';
  
  // if the style is gone or has no theme of its own, just display the output.
  return theme('panels_pane', array('content' => $content, 'pane' => $pane, 'display' => $display));
}

/**
 * Theme function for the region style.
 */
function theme_cdimod_publication_render_region($vars) {
  $display = $vars['display'];
  $region_id = $vars['region_id'];
  $panes = $vars['panes'];
  $settings = $vars['settings'];

  $output = '';
  $output .= '<div class="region region-' . $vars['region_id'] . ' cdi-style-publication">';
  $output .= implode('<div class="panel-separator"></div>', $panes);
  $output .= '</div>';
  return $output;
}
