<div style="width:784px; margin: 0px auto; font-family: helvetica, arial;"><!--HEADER-->
<div style="position:absolute; font-size: 12px; text-align: right; width: 764px; background-position:right; height:16px; background-repeat:no-repeat; background-image:url(/sites/all/themes/OFFTEMPOimprint/images/cart_16x16.png); letter-spacing:0.15 em; padding-right: 20px;"><a href="/cart">(<?php
  $items = 0;
  foreach (uc_cart_get_contents() as $item) {
    $items += $item->qty;
  }
print $items;
?>)</a></div>
<div style="margin:0px auto; width:125px; height:125px;"><a href="/"><div id="offtempo-imprint"><div style="position: absolute; font-family:Verdana, Geneva, sans-serif; margin-top:110px; margin-left:100px; font-size:9px; color:#F60; font-style: italic;">beta</div></div></a>
</div>
    <div id="offtempo-imprint-subtitle">the record label &amp; publishing divsion of NW music documentation project, <a href="http://offtempo.com" target="_new">OFF TEMPO</a></div>
  
</div>