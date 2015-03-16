<?php 
/**
 * Implements template_preprocess_page().
 */
function cdi_preprocess_page(&$variables) {
  // Clears the copyright message variable from Radix default
  $variables['copyright'] = '';
}