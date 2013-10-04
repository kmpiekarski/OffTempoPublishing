<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<!--page-home.tpl.php-->
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
    <style>
		body {
		background-color:#000 !important;
		background-image:none;
		}
		a:link,
		a:active,
		a:hover {text-decoration:none;}
		#intro-zone {
			margin:80px auto;
			width:50%;
			font-family:"Times New Roman", Times, serif;
			text-align:center;	
			color:#FFF;
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
		#offtempo-imprint {
			width:125px;
			height:125px;
			position:absolute;
			background:url(/sites/all/themes/OFFTEMPOimprint/images/offtempo.png);
		}
		#splash {
			width:99%;
			background:#FFF;
			height:300px;
			vertical-align:central;
			position:absolute;
			top:35%;
			background:url(/sites/all/themes/OFFTEMPOimprint/images/slashed-tires-photo2.JPG) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
	</style>
  </head>
  <body>

<div id="splash">
	<a href="/home"><div id="intro-zone">
		<div id="offtempo-imprint"></div>
        <div id="intro-text">Slashed Tires "assure" EP
        	<div id="intro-subtext">AVAILABLE APRIL 15th</div>
        </div>
    </div>
    </a>
</div>
<?php print $closure ?>
  </body>
</html>
