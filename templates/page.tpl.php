<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="wrap" class="clr container">
  <div id="header-wrap" class="">
			

	 <?php 
		  /* 
		  * Hard coding site navigation, no need to load site navigation over block configuration.
		  */
		  ?>
		<div id="site-navigation-wrap">			
			<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
				<div id="navigation-toggle" ><i class= "icon-menu"></i></div>
		 
				<?php 
				$main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
				print drupal_render($main_menu_tree);
				?>
		  
			</nav>
			
	  
	  </div>
	  <?php // end site navigation ?>
    <header id="header" class="site-header">

      <div id="logo" class="clr">
        <?php if (theme_get_setting('image_logo','adopted')): ?>
        <?php if ($logo): ?><div class="site-img-logo clr"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a></div><?php endif; ?>
        <?php else: ?>
        <div class="site-text-logo clr">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
          <?php if ($site_slogan): ?><div class="blog-description"><?php print $site_slogan; ?></div><?php endif; ?>
        </div>
        <?php endif; ?>
		<?php if ( $page['header']): ?>
			  <?php print render($page['header']); ?>
		 <?php endif; ?>
      </div>

    </header>
	  
	</div>

  <div id="main" class="site-main clr">
  <div id = "banner" class = "content-top clr">      
		<?php if(!$is_front && $page['content_top']): print render($page['content_top']); endif; ?>
  </div>
  
    <div id="primary" class="content-area clr">
      <?php $sidebarclass = ""; if($page['sidebar_first']) { $sidebarclass="left-content"; } ?>     
      <section id="content" role="main" class="site-content  clr">


        <?php if (theme_get_setting('breadcrumbs')): ?><?php if ($breadcrumb): ?><div id="breadcrumbs"><?php print $breadcrumb; ?></div><?php endif;?><?php endif; ?>
        <?php print $messages; ?>
		
     <?php if ($page['sidebar_first']): ?>
        <div id="sidebar_first" class="sidebar-container <?php print $sidebarclass; ?>" >
         <?php print render($page['sidebar_first']); ?>
        </div> 
      <?php endif; ?> 
	  
	  
        <div id="content-wrap" class="main-content <?php print $sidebarclass; ?>">
        <?php //start slideshow in main content ?>
		<?php if ($is_front): ?>
        <?php if (theme_get_setting('slideshow_display','adopted')): ?>
        <?php           
		  $slide1_url = check_plain(theme_get_setting('slide1_url','adopted'));
          $slide2_url = check_plain(theme_get_setting('slide2_url','adopted'));
          $slide3_url = check_plain(theme_get_setting('slide3_url','adopted'));
        ?>
        <div id="featured-slider-wrap" class="">
          
            <div id="flexslider-home" class="flexslider">
              <ul class="slides">
                <li class="featured-slider-slide">
                  <div class="featured-slider-img">
                    <a href="<?php print url($slide1_url); ?>">
                      <img src="<?php print base_path() . drupal_get_path('theme', 'adopted') . '/images/slide-image-1.jpg'; ?>" />
                    </a>
                  </div>               
                </li>
                <li class="featured-slider-slide">
                  <div class="featured-slider-img">
                    <a href="<?php print url($slide2_url); ?>">
                      <img src="<?php print base_path() . drupal_get_path('theme', 'adopted') . '/images/slide-image-2.jpg'; ?>" />
                    </a>
                  </div>                 
                </li>
                <li class="featured-slider-slide">
                  <div class="featured-slider-img">
                    <a href="<?php print url($slide3_url); ?>">
                      <img src="<?php print base_path() . drupal_get_path('theme', 'adopted') . '/images/slide-image-3.jpg'; ?>" />
                    </a>
                  </div>                
                </li>
              </ul>
            </div>
         
        </div>     
        <?php endif; ?>
        <?php endif; ?> 
		<?php // end of slideshow ?>
		  <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clr"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
        </div>
		
	<?php if ($page['sidebar_second']): ?>
        <div id="sidebar_second" class="sidebar-container ">
         <?php print render($page['sidebar_second']); ?>
        </div> 
     <?php endif; ?>
	
      </section>

      
    </div>
  </div>

  
  <footer id="footer-wrap" class="site-footer clr">
   <?php if ( $page['footer']): ?>
			  <?php print render($page['footer']); ?>
	 <?php endif; ?>	 
	
  </footer>
  <?php if (theme_get_setting('copyright_display','adopted')): ?>
	<?php
	//sets variable copyright
	$copyright_url =  check_plain(theme_get_setting('copyright_url', 'adopted'));
	$copyright_text=  check_plain(theme_get_setting('copyright_text', 'adopted'));
	?>
    <div id="copyright" role="contentinfo" class="clr"><?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>  <a href="<?php print $copyright_url ?>" title="<?php print $copyright_text ?>" target="_blank"><?php print $copyright_text ?></a>.</div>
	<?php endif; ?>

</div>