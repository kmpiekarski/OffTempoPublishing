<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<!--page-artists.tpl.php-->
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
    <style>
		#column-left { margin:0px !important;}
		/*artist page stuff*/
		
		/*.artist-photo:hover, .artist-names:hover {
			background:#FFF;
			opacity:0.75;
			-webkit-transition: 0.5s ease-in-out;
			-moz-transition: 0.5s ease-in-out;
			transition: 0.5s ease-in-out;
		}*/
		a:hover {text-decoration:none !important;}
		h1 {
			color:#000;
		}
		.news-created {
			font-style:italic;	
		}
		.artist-banner:hover {
			opacity:0.75;
			-webkit-transition: 0.25s ease-in-out;
			-moz-transition: 0.25s ease-in-out;
			transition: 0.25s ease-in-out;	
		}
	</style>
    <script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-17868999-1']);
	  _gaq.push(['_setDomainName', 'offtempo.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
  </head>
  <body<?php print phptemplate_body_class($left, $right); ?>>



    <?php include('header.php') ?>
	<div id="nav">
    	<?php if (isset($primary_links)) : ?>
          <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
        <?php endif; ?>
        <?php if (isset($secondary_links)) : ?>
          <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
        <?php endif; ?>
    </div><!--#nav-->
    
<div id="main-container">

    <div id="content">
				  <?php if (arg(0)=='admin') :print $breadcrumb; endif; ?>
                  <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
                  <?php if ($title && arg(0)=='admin'): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
                  <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
                  <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
                  <?php if ($show_messages && $messages): print $messages; endif; ?>
                  
                  <?php print $help; ?>
              <div class="clear-block">
                <?php print $content ?>
              </div>
    	           
    	<div style="clear:both;"></div>
    </div><!--content-->
</div><!--#main-container-->
<?php include('footer.php'); ?>
<?php print $closure ?>
  </body>
</html>
