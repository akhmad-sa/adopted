<?php 
function adopted_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function adopted_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
$breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode(' » ', $breadcrumb) . '</nav>';
    return $output;
  }
}

function adopted_preprocess_page(&$vars) {
  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  } 
  if(!empty($vars['node'])){
	  $node = $vars['node'];	 
	  $og_title = array(	  '#tag' => 'meta',	  '#attributes' => array(		'property' => 'og:title',		'content' => $node->title,	  ),	);	
	  $keyword = array('#tag' => 'meta', '#attributes' => array('name' => 'keywords', 'content' => $node->title, ), );
	  drupal_add_html_head($og_title, 'og_title');
	  drupal_add_html_head($keyword, 'keyword');

	  if($node->type =='article' || $node->type =='article'){
		$img = field_get_items('node', $vars['node'], 'field_image');	
		$img_url = file_create_url($img[0]['uri']);	
		$og_image = array(	
		'#tag' => 'meta',	
		'#attributes' => array(	
			'property' => 'og:image',	
			'content' => $img_url,		  ),	);	
		drupal_add_html_head($og_image, 'og_image');
		}
  
  if($node->type=='product'){
	  $img = $node-> field_product_images['und'][0]['uri'];
	  $img_url = file_create_url($img);	
	  $og_image = array(	
	  '#tag' => 'meta',	
	  '#attributes' => array(	
		'property' => 'og:image',	
		'content' => $img_url,	 ),	);	
	drupal_add_html_head($og_image, 'og_image');
	}	
	
	$body_field  = field_view_field('node', $vars['node'], 'body', array('type' => 'full_html'));
	$body_field_stripped  = strip_tags($body_field[0]['#markup']);  // remove html element, so facebook post clear.
	$og_description = array(	 
		'#tag' => 'meta',	
		'#attributes' => array(	  
			'property' => 'og:description',
			'content' => text_summary($body_field_stripped),	 ),	);	
			drupal_add_html_head($og_description, 'og_description');  
	}
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function adopted_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function adopted_preprocess_node(&$variables, $vars) {
  $node = $variables['node'];
  //print_r($node);
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  $variables['date'] = t('!datetime', array('!datetime' =>  date('j F Y', $variables['created']))); 
  //print_r($node);
	$nid = $node->nid;
	$stats = statistics_get($nid);
	$vars['stats_total_count'] = $stats['totalcount'];
	print($vars['stats_total_count']);
}



function adopted_page_alter($page) {
  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
 $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
    'name' =>  'viewport',
    'content' =>  'width=device-width, initial-scale=1, maximum-scale=2.0, user-scalable=yes'
    )
  );
  drupal_add_html_head($viewport, 'viewport');     
}



function adopted_menu_tree__main_menu($variables) {
  return '<ul class="menu sf-menu">' . $variables['tree'] . '</ul>';
}

?>