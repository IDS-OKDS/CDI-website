<?php

/**
 * @file
 * Definition of the 'cdi blog' panel style.
 */

$plugin = array(
  'title' => t('CDI Blog'),
  'description' => t('Wraps panes and regions in Blog style.'),
  'render pane' => 'cdimod_blog_render_pane',
  'render region' => 'cdimod_blog_render_region',
  'weight' => -10,
);

/**
 * Theme function for the pane style.
 */
function theme_cdimod_blog_render_pane($vars) {
  $content = $vars['content'];
  $pane = $vars['pane'];
  $display = $vars['display'];
  $plugin = $vars['style'];
  
  $content->css_class .= ' cdi-style-blog';
  
  // if the style is gone or has no theme of its own, just display the output.
  return theme('panels_pane', array('content' => $content, 'pane' => $pane, 'display' => $display));
}

/**
 * Theme function for the region style.
 */
function theme_cdimod_blog_render_region($vars) {
  $display = $vars['display'];
  $region_id = $vars['region_id'];
  $panes = $vars['panes'];
  $settings = $vars['settings'];

  $output = '';
  $output .= '<div class="region region-' . $vars['region_id'] . ' cdi-style-blog">';
  $output .= implode('<div class="panel-separator"></div>', $panes);
  $output .= '</div>';
  return $output;
}
