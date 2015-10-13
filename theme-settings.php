<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function adopted_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['adopted_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('adopted theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['adopted_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','adopted'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );
  $form['adopted_settings']['image_logo'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show <strong>Image Logo</strong> instead of text logo in a page'),
    '#default_value' => theme_get_setting('image_logo','adopted'),
    '#description'   => t("Check this option to show Image Logo in page. Uncheck to show the text logo."),
  );
  $form['adopted_settings']['slideshow'] = array(
    '#type' => 'fieldset',
    '#title' => t('Front Page Slideshow'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['adopted_settings']['slideshow']['slideshow_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show slideshow'),
    '#default_value' => theme_get_setting('slideshow_display','adopted'),
    '#description'   => t("Check this option to show Slideshow in front page. Uncheck to hide."),
  );
  $form['adopted_settings']['slideshow']['slide'] = array(
    '#markup' => t('You can change the description and URL of each slide in the following Slide Setting fieldsets.'),
  );
  $form['adopted_settings']['slideshow']['slide1'] = array(
    '#type' => 'fieldset',
    '#title' => t('Slide 1'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['adopted_settings']['slideshow']['slide1']['slide1_head'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide Headline'),
    '#default_value' => theme_get_setting('slide1_head','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide1']['slide1_desc'] = array(
    '#type' => 'textarea',
    '#title' => t('Slide Description'),
    '#default_value' => theme_get_setting('slide1_desc','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide1']['slide1_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide URL'),
    '#default_value' => theme_get_setting('slide1_url','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide2'] = array(
    '#type' => 'fieldset',
    '#title' => t('Slide 2'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['adopted_settings']['slideshow']['slide2']['slide2_head'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide Headline'),
    '#default_value' => theme_get_setting('slide2_head','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide2']['slide2_desc'] = array(
    '#type' => 'textarea',
    '#title' => t('Slide Description'),
    '#default_value' => theme_get_setting('slide2_desc','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide2']['slide2_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide URL'),
    '#default_value' => theme_get_setting('slide2_url','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide3'] = array(
    '#type' => 'fieldset',
    '#title' => t('Slide 3'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['adopted_settings']['slideshow']['slide3']['slide3_head'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide Headline'),
    '#default_value' => theme_get_setting('slide3_head','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide3']['slide3_desc'] = array(
    '#type' => 'textarea',
    '#title' => t('Slide Description'),
    '#default_value' => theme_get_setting('slide3_desc','adopted'),
  );
  $form['adopted_settings']['slideshow']['slide3']['slide3_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Slide URL'),
    '#default_value' => theme_get_setting('slide3_url','adopted'),
  );
  $form['adopted_settings']['slideshow']['slideimage'] = array(
    '#markup' => t('To change the Slide Images, Replace the slide-image-1.jpg, slide-image-2.jpg and slide-image-3.jpg in the images folder of the theme folder.'),
  );
  
  //adding copyright options
  $form['adopted_settings']['copyright'] = array(
  '#type' => 'fieldset',
  '#title' => t('Copyright'),
  '#collapsible' => TRUE,
  '#collapsed' => TRUE,
  );
    $form['adopted_settings']['copyright']['copyright_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show <strong>Copyright</strong> in pages'),
    '#default_value' => theme_get_setting('copyright_display','adopted'),
    '#description'   => t("Check this option to show Copyright in pages. Uncheck to hide."),
  );
   $form['adopted_settings']['copyright']['copyright_url']= array(
    '#type' => 'textfield',
    '#title' => t('Copyright URL'),
    '#default_value' => theme_get_setting('copyright_url','adopted'),
   );
   $form['adopted_settings']['copyright']['copyright_text']= array(
    '#type' => 'textfield',
    '#title' => t('Copyright Text'),
    '#default_value' => theme_get_setting('copyright_text','adopted'),
   );
   
   //adding social media link and icon
	/* $form['adopted_settings']['socmed_options'] = array(
		'#type' => 'fieldset',
		'#title' => t('Social media'),
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	);
	$form['adopted_settings']['socmed_options']['socmed_display'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show <strong>Social media</strong> in pages'),
    '#default_value' => theme_get_setting('socmed_display','adopted'),
    '#description'   => t("Check this option to show Social media in pages. Uncheck to hide."),
  );
   $form['adopted_settings']['socmed_options']['facebook']= array(
    '#type' => 'textfield',
    '#title' => t('Facebook Username'),
    '#default_value' => theme_get_setting('facebook_user','adopted'),
   );
   $form['adopted_settings']['socmed_options']['twitter']= array(
    '#type' => 'textfield',
    '#title' => t('Twitter Username'),
    '#default_value' => theme_get_setting('twitter_user','adopted'),
   );
   $form['adopted_settings']['socmed_options']['g_plus']= array(
    '#type' => 'textfield',
    '#title' => t('Google+ User ID'),
    '#default_value' => theme_get_setting('gplus_user','adopted'),
	'#description' => t('Just Copy and paste your G+ ID from your G+ profile. <br /><i>eg : https://plus.google.com/107917242434180089241 your G+ id is <strong>107917242434180089241</strong></i> '),
   );
   $form['adopted_settings']['socmed_options']['gplus_name']= array(
    '#type' => 'textfield',
    '#title' => t('Google+ Name'),
    '#default_value' => theme_get_setting('gplus_display_name','adopted'),
	'#description' => t('Display name is better than your Id. <i>eg: ahmed, sofyan, johny, smith, etc. </i>'),
   ); */
}
