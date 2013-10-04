<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<!--page-shop.tpl.php-->
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
		
		.shop-column-left {
			float:left;
		}
		.shop-column-right {
			width: 485px;
			float:right;
		}
		#content {
			padding: 16px 0px;
		}
		.shop-page-row {
			display:block;
			min-height: 332px;	
		}
		.release-title {
			font-weight:bold;
			font-family:Arial, Helvetica, sans-serif;
		}
		.release-sku {
			font-weight:normal;
			
		}
		.release-price {
			background:#333;
			color:#FFF;
			font-size:24px;
			text-align:center;
			font-family:Arial, Helvetica, sans-serif;
			padding-top: 12px;
		}
		.views-row {
			margin-bottom:20px;
			padding-bottom:15px;
			border-bottom:#333 1px dotted;
		}
		.views-row-last {
			margin-bottom:0px;
			border-bottom:none;
		}
		.add-to-cart {
			text-align:center;
			background: #333;
			padding: 5px;
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
    		<p style=" text-align:center; color:#699; border:1px solid #69C; background:#EFEFEF; padding:2px; margin-top:5px;">For worldwide distribution, please see who to contact on our <a href="/info"><em>info</em> page</a></p>
          <div class="clear-block">
            <?php print $content ?>
          </div>
              
    <div style="clear:both;"></div>
    </div><!--content-->
</div><!--#main-container-->

<?php print $closure ?>
  </body>
</html>
