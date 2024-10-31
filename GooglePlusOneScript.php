<?php
  require("../../../wp-load.php");
  
    $googleplusone_config = array();
    $googleplusone_config['display'] = get_option( "GooglePlusOne_display", "" );
    $googleplusone_config['size'] = get_option( "GooglePlusOne_size", 1 );
    $googleplusone_config['count'] = get_option( "GooglePlusOne_count", 0 );
    $googleplusone_config['align'] = get_option( "GooglePlusOne_align", 0 );
    $googleplusone_config['top'] = get_option( "GooglePlusOne_top", 5 );
    $googleplusone_config['side'] = get_option( "GooglePlusOne_side", 5 );
    $googleplusone_config['alternate_display'] = get_option( "GooglePlusOne_alternate_display", "body" );
  
    $size = "";
    if($googleplusone_config['size'] == 1) $size = ' data-size="small"';
    if($googleplusone_config['size'] == 2) $size = ' data-size="medium"';
    if($googleplusone_config['size'] == 4) $size = ' data-size="tall"';
    
    $count = "";
    if($googleplusone_config['count'] != 1) $count = ' data-annotation="none"';
    
    $align = "right";
    if($googleplusone_config['align'] == 1) $align = 'left';
    
    $top = $googleplusone_config['top'];
    $side = $googleplusone_config['side'];
    
    #$content  = '<script type="text/javascript">'."\n";

    $content  = 'function cstmGetElementsByClassName(obj, class_name) {'."\n";
    $content .= '  var docList = obj.getElementsByTagName("*");'."\n";
    $content .= '  var matchArray = new Array();'."\n";

    $content .= '  var re1 = new RegExp("(^| )"+class_name+"( |$)");'."\n";
    $content .= '  for (var i = 0; i < docList.length; i++) {'."\n";
    $content .= '    if (re1.test(docList[i].className)) {'."\n";
    $content .= '      matchArray[matchArray.length] = docList[i];'."\n";
    $content .= '    }'."\n";
	  $content .= '  }'."\n";

    $content .= '  return matchArray;'."\n";
    $content .= '}'."\n";

    
    $content .= 'function addGooglePlusOne(id, url) {'."\n";
    
    $content .= '  var googleElement = document.createElement("div");'."\n";
    $content .= '  googleElement.className = "GooglePlusOne";'."\n";
    $content .= '  googleElement.style.display = "inline";'."\n";
    $content .= '  googleElement.style.position = "relative";'."\n";
    $content .= '  googleElement.style.top = "'.$top.'px";'."\n";
    $content .= '  googleElement.style.'.$align.' = "'.$side.'px";'."\n";
    
    $content .= '  var googleu = \'<div class="g-plusone" '.$size.$count.'\';'."\n";
    
    $content .= '  if(url != "") {'."\n";
    $content .= '    googleu += \' data-href="\'+ url +\'"></div>\';'."\n";
    $content .= '  }'."\n";
    $content .= '  else {'."\n";
    $content .= '    googleu += \'></div>\';'."\n";
    $content .= '  }'."\n";
          
    $content .= '  googleElement.innerHTML = googleu;'."\n";
    
    $content .= '  if(typeof(document.getElementsByClassName) == "function")'."\n";
    $content .= '    var elements = document.getElementsByClassName("post-" + id);'."\n";
    $content .= '  else'."\n";
    $content .= '    var elements = cstmGetElementsByClassName(document, "post-" + id);'."\n";
    $content .= '  if(elements.length > 0){'."\n";
    $content .= '    if(typeof(document.getElementsByClassName) == "function")'."\n";
    $content .= '      var o = elements[0].getElementsByClassName("'.$googleplusone_config["display"].'");'."\n";
    $content .= '    else'."\n";
    $content .= '      var o = cstmGetElementsByClassName(elements[0], "'.$googleplusone_config["display"].'");'."\n";
    $content .= '    if(o.length > 0)'."\n";
    $content .= '      o[0].appendChild(googleElement);'."\n";
    $content .= '  }'."\n";
    
    
    $content .= '}'."\n";
    #$content .= '</script>'."\n";
    
    echo $content;
    
?>