<?php 
/**
 * Implements template_preprocess_page().
 */
function cdi_preprocess_page(&$variables) {
  // Clears the copyright message variable from Radix default
  $variables['copyright'] = '';
  // Get the entire main menu tree
  $main_menu_tree = menu_tree_all_data('main-menu');
  // Add the rendered output to the $main_menu_expanded variable
  $menu_output = menu_tree_output($main_menu_tree);
  $variables['main_menu_expanded'] = $menu_output;
}