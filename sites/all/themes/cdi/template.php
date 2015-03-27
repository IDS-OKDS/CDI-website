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