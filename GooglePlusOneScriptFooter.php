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
    
    $content .= '  var googleElement = document.createElement("div");'."\n";
    $content .= '  googleElement.className = "GooglePlusOne";'."\n";
    $content .= '  googleElement.style.display = "inline";'."\n";
    $content .= '  googleElement.style.position = "absolute";'."\n";
    $content .= '  googleElement.style.top = "'.$top.'px";'."\n";
    $content .= '  googleElement.style.'.$align.' = "'.$side.'px";'."\n";
    
    $content .= '  var googleu = \'<div class="g-plusone" '.$size.$count.'></div>\';'."\n";
    $content .= '  googleElement.innerHTML = googleu;'."\n";
    if($googleplusone_config["alternate_display"] == "body")
      $content .= '  document.getElementsByTagName("body")[0].appendChild(googleElement);'."\n";
    else
      $content .= '  document.getElementById("'.$googleplusone_config["alternate_display"].'").appendChild(googleElement);'."\n";
            
    #$content .= '</script>'."\n";
    
    echo $content;
?>