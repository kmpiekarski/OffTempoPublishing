<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<!-- page-node-artist.tpl.php -->
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
    <style>
		#artist-page-links,
		#artist-page-links a {
		color:#FFF;	
		}
		#artist-page-links {
			font-family: 'Times New Roman', Times, serif;
			font-size: 16px;
			background: #CCC;
			height: 21px;
			padding: 7px;
			width: 223px;
			position: absolute;
			margin-top: -44px;
			margin-left: 16px;
			text-align: right;
			background: url(/sites/all/themes/OFFTEMPOimprint/images/patterns/artist-links.png) repeat;
			border: 1px solid white;
			border-bottom: none;
		}
		#artist-page-links ul, 
		#artist-page-links ul li {
			list-style:none;
			padding:0px;
			font-family: 'Times New Roman', Times, serif;
			font-style:italic;
			margin: 0px;
			float:left;
		}
		#artist-page-links ul li {
			padding:0px 3px;
		}
		.artist-banner {
			background:#000;
			height:330px;
		}
		
		.artist-release {
			width:175px;
			height:175px;
			margin: 5px auto;
			border:1px solid #000;
			background:url(/sites/all/themes/OFFTEMPOimprint/images/IMG_0242.jpeg);
		}
		.artist-release-title {
			font-size: 14px;
			display:block;
			color:#FFF;
			padding:2px 5px;	
			background:url(/sites/all/themes/OFFTEMPOimprint/images/patterns/artist-links.png) repeat;	
		}
		#concert-dates {
			width: 499px;
			/*padding-left: 13px;*/
		}
		#concert-dates ul {
			display: inline;
			list-style: none;
		}
		
		#concert-dates ul li{
			width:467px;
		}
		.individual-artist-name {
			font-size: 34px;
			color: white;
			text-shadow: 1px 1px 0px black;
			min-width: 100px;
			font-style: italic;
			position: absolute;
			text-align: left;
			margin-top: 260px;
			margin-left: 16px;
			font-family:"Times New Roman", Times, serif;
		}
		blockquote {
			margin: 14px;
		}
		#column-right ul, #column-right ul li {
			list-style: none;
			font-size: 11px;
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
    </div><!--#nav-->
    
<div id="main-container">
    <div class="artist-banner">
    	<div class="individual-artist-name"><?php print $title; ?></div>
    	<?php print theme('imagecache', 'artist_page_banner', $node->field_press_photos[0]['filepath']); ?>
    	<div id="artist-page-links">
            <ul>
                <li><a href="#about">About</a> / </li>
                <li><a href="#concerts">Concerts</a> / </li>
                <li><a href="#press">Press</a> / </li>
                <li><a href="#photos">Photos</a></li>
            </ul>
        </div><!--#artist-page-links-->
    </div><!--.artist-banner-->
    <div id="content">
				  <?php if (arg(0)=='admin') :print $breadcrumb; endif; ?>
                  <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
                  <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
                  <?php if ($title && arg(0)=='admin'): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
                  <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
                  <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
                  <?php if ($show_messages && $messages): print $messages; endif; ?>
                  <?php print $help; ?>
        <div id="column-left">
              <div class="clear-block">
              	
                
            	<div class="artist-h"><a name="about"></a>About</div>
				<?php print $node->content[body]['#value']; ?>
                <div class="artist-h"><a name="concerts"></a>Concerts</div>
                <div id="concert-dates">
                <?php print views_embed_view('Artist_Page', 'block_1', arg(1)); //displays event dates ?>
                </div>
                <div class="artist-h"><a name="press"></a>Press</div>
                <?php print views_embed_view('Artist_Page', 'block_2', arg(1)); //displays event dates ?>
                <?php print views_embed_view('Artist_Page', 'block_5', arg(1)); //displays event dates ?>
                <div class="artist-h"><a name="photos"></a>Photos</div>
                <?php print views_embed_view('Artist_Page', 'block_3', arg(1)); //displays event dates ?>
              </div>
            </div><!--#column-left-->
            <div id="column-right">
              <h2>Contact &amp; External Affairs</h2>  
              <?php print views_embed_view('Artist_Page', 'block_4', arg(1)); //displays event dates ?>
              <?php if ($right): ?>
                <div id="sidebar-right" class="sidebar">
                  <?php if (!$left && $search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
                  <?php print $right ?>
                </div>
              <?php endif; ?>
        </div><!--#column-right-->
    <div style="clear:both;"></div>
    </div><!--content-->
</div><!--#main-container-->
<?php include('footer.php'); ?>
<?php print $closure ?>
  </body>
</html>
