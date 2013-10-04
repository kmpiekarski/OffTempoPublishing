<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<!--page-front.tpl.php-->
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
	<link rel="stylesheet" href="/sites/all/themes/OFFTEMPOimprint/anythingslider.css">
	<link href="/sites/all/themes/OFFTEMPOimprint/css/fader.css" rel="stylesheet" type="text/css">
    <script src="/sites/all/themes/OFFTEMPOimprint/js/jquery.anythingfader.js" type="text/javascript" charset="utf-8"></script>
    
    
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
		#content a:hover {text-decoration:underline !important;}
		h1 {
			color:#000;
		}
		.news-created {
			font-style:italic;	
		}
		.home-blog-title,
		.home-blog-title a {
			color: #333;
			font-size:17px;
			text-decoration:underline;
		}
		.home-blog-date {
			color: #69C;
			font-size:10px;
			line-height: 9px;
		}

		#recent-new .home-page-blocks a {color:#333;}
		.home-page-blocks {
			border: 1px dotted #69C;
			margin: 16px 0px;
			padding: 10px;
			width: 218px;
			float: right;
			margin-left: 16px;
			min-height: 107px;
			margin-top:0px;
		}
		#recent-news {
			width: 506px;
			float: left;
			/*margin-left: 16px;*/
			margin-right: 0px;
			margin-left:0px !important;
		}
		#content {padding: 0px 0px;}
		#redeemer {
			background:#69C;
			color:#FFF;
			font-size:18px;
			font-style:italic;
			text-align:center;
			margin:16px 0px;
			padding:10px;
			border:1px dotted #06F;
		}
		a #redeemer {color:#FFF;} 
		a:hover #redeemer{
			background:#F6F;
			-webkit-transition: 0.25s ease-in-out;
			-moz-transition: 0.25s ease-in-out;
			transition: 0.25s ease-in-out;
			border:1px dotted #F00;
		}
		
		/*===NEWSLETTER===*/
		#mc_embed_signup input.email {
			display: block;
			padding: 8px 0;
			margin: 0 4% 10px 0;
			text-indent: 5px;
			min-width: 130px;
		}
		#mc_embed_signup input.button,
		#mc_embed_signup input.email  {
			width: 100%;
		}
		#mc_embed_signup form {
			padding:0px;
		}
		#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
		
		#slider { width: 784px; height: 400px; }
		.arrow, .back, .forward, #start-stop {display:none; visibility:hidden;}
		.ad-zone-text {
			position: absolute;
			top: 0px;
			margin-top: 27px;
			width: 784px;
			text-align: center;
		}
		#intro-text {
			font-size:36px;
			color:#FFF;
			padding-left:150px;
			padding-top: 34px;
			text-shadow:-2px 2px 2px #333;
		}
		#intro-subtext {
			font-size:16px;
			background:#000;	
			margin: 0px auto;
			width:218px;
		}
		.ad-subtitle {
			font-size: 16px;
			background: black;
			margin: 0px auto;
			width: 218px;
			color:#FFF;
			padding:4px;
			font-family:"Times New Roman", Times, serif
		}
		.ad-title {
			font-size: 36px;
			color: white;
			padding-top: 34px;
			text-shadow: -2px 2px 2px #333;
			font-family:"Times New Roman", Times, serif;
			line-height: 60px;
		}
		
		.anythingFader ul li {
		}
		.anythingFader .wrapper ul {
			padding:0px;
		}
	</style>
	<script type="text/javascript">
    
        function formatText(index, panel) {
		  return index + "";
	    }
    
        $(function () {
        
            $('.anythingFader').anythingFader({
                autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
                delay: 6000,                    // How long between slide transitions in AutoPlay mode
                startStopped: false,            // If autoPlay is on, this can force it to start stopped
                animationTime: 500,             // How long the slide transition takes
                hashTags: false,                 // Should links change the hashtag in the URL?
                buildNavigation: false,          // If true, builds and list of anchor links to link to each slide
                pauseOnHover: false,             // If true, and autoPlay is enabled, the show will pause on hover
                startText: "",                // Start text
                stopText: "",               // Stop text
                navigationFormatter: formatText   // Details at the top of the file on this use (advanced use)
            });
            
            $("#slide-jump").click(function(){
                $('.anythingFader').anythingFader(6);
            });
            
        });
		

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

    <div id="pageSlideshow">
        <div class="anythingFader">
            <div class="wrapper">
                <ul>
					<?php print views_embed_view('Front_Page_Blocks', 'block_2', arg(1)); ?>
                </ul>
            </div>
        </div>
    </div>
    <a href="http://decoder.offtempo.com"><div id="redeemer">&gt;&gt;&gt;&nbsp;<span>Have An OFF TEMPO Digital Download Code? Redeem It Here!</span>&nbsp;&lt;&lt;&lt;</div></a>
    
    <div id="content">
				  <?php if (arg(0)=='admin') :print $breadcrumb; endif; ?>
                  <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
                  <?php if ($title && arg(0)=='admin'): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
                  <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
                  <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
                  <?php if ($show_messages && $messages): print $messages; endif; ?>
                  
                  <?php print $help; ?>
              <div class="clear-block">
              	<div id="recent-news" class="home-page-blocks"><div style="position:absolute; margin-top:2px; margin-left:0px;"><img src="/sites/all/themes/OFFTEMPOimprint/images/rss.png" /></div><span style="padding-left: 19px;">News:</span><?php print views_embed_view('Front_Page_Blocks', 'block_1'); ?></div>
              	<div class="home-page-blocks"><span>Subscribe to the Newsletter:</span>
                
                <!-- Begin MailChimp Signup Form -->
                <div id="mc_embed_signup">
                <form action="http://offtempo.us2.list-manage.com/subscribe/post?u=0af5c73c22d362c960cc4c1a0&amp;id=c8ba73e60e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                    <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                </form>
                </div>
                
                <!--End mc_embed_signup-->
                

				</div>
                <div class="home-page-blocks">
                    <span>Social Things:</span>
                    <p style="margin: 0px; font-size: 12px;">Twitter: <a href="http://twitter.com/offtempo" target="_blank">twitter.com/offtempo</a></p>
                    <p style="margin: 0px; font-size: 12px;">Facebook: <a href="http://www.facebook.com/offtempo" target="_blank">facebook.com/offtempo</a></p>
                </div>
                <!--<div style="border: 1px dotted #69C; margin: 16px 0px; padding: 10px;">
                
                </div>-->
              </div>
    	           
    	<div style="clear:both;"></div>
    </div><!--content-->
</div><!--#main-container-->
<?php include('footer.php'); ?>
<?php print $closure ?>
  </body>
</html>
