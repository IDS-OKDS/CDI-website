<?php 
/**
 * Implements template_preprocess_page().
 */
function cdi_preprocess_page(&$variables) {
  // Clears the copyright message variable from Radix default
  $variables['copyright'] = '';
  $show_breadcrumb = false;
  if(isset($variables['node'])){
  	if(in_array($variables['node']->type, array('panopoly_news_article', 'publication', 'event', 'person', 'blog', 'partner', 'project'))){
  		$show_breadcrumb = true;
  	}
  }
  if(arg(0) == 'admin'){
  	$show_breadcrumb = true;
  }
  if(!$show_breadcrumb){
  	$variables['breadcrumb'] = '';
  }
  
}


/**
 * Implements theme_field().
 */

function cdi_field__field_other_resource($variables) {
	return cdi_field_link($variables);
}

function cdi_field__field_opendocs_link($variables) { 
	return cdi_field_link($variables);
}

function cdi_field_link($variables) {
	/* Only show link fields that actually have a URL (Because we defult the title and 
	 * so it tries to display without one as URL needs to be otional to save the node with a default title!!) */
	
  $has_a_link_to_show = FALSE;

  foreach ($variables ['items'] as $delta => $item) {
  	if($item['#element']['url']){
  		$has_a_link_to_show = TRUE;
  	}
  }
  
  
  $output = '';
  
  if($has_a_link_to_show){
	  // Render the label, if it's not hidden.
	  if (!$variables ['label_hidden']) {
	    $output .= '<div class="field-label"' . $variables ['title_attributes'] . '>' . $variables ['label'] . ':&nbsp;</div>';
	  }
	
	  // Render the items.
	  $output .= '<div class="field-items"' . $variables ['content_attributes'] . '>';
	  foreach ($variables ['items'] as $delta => $item) {
	  	if($item['#element']['url']){
		    $classes = 'field-item ' . ($delta % 2 ? 'odd' : 'even');
		    $output .= '<div class="' . $classes . '"' . $variables ['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
	  	}
	  }
	  $output .= '</div>';
	
	  // Render the top-level DIV.
	  $output = '<div class="' . $variables ['classes'] . '"' . $variables ['attributes'] . '>' . $output . '</div>';
  }

  return $output . ' ';
}



