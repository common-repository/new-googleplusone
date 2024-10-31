<?php
/*
Plugin Name: New GooglePlusOne
Plugin URI: http://www.endd.eu/google-plus-one/
Version: 1.4
Description: Adds Google +1 button on your site. You don't need to modify your theme. Special thanks to <a href="http://www.lantian.eu/">Marian Vlad-Marian</a>.
Author: End Soft Design
Author URI: http://www.endd.ro/
License: GPL v.2

             GNU
   GENERAL PUBLIC LICENSE
    Version 2, June 1991

Copyright (C) 2011 endd.ro    
*/


  # WP version check
  global $wp_version;
  $exit_msg='Plugin requires WordPress 3.1 or newer.<a href="http://wordpress.org/" target="_blank">Please update!</a>';
  if(version_compare ($wp_version,"3.1","<")){exit($exit_msg);}
  
  add_action('admin_menu', 'googleplusone_menu');

  function googleplusone_menu() {
    add_options_page('New Google +1 Options', 'Google +1', 'manage_options', 'googleplusone', 'googleplusone_options');
  }

  function googleplusone_options() {
    if (!current_user_can('manage_options'))  {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    
    if(get_option("GooglePlusOne_display") == "") add_option( 'GooglePlusOne_display', 'entry-title', '', 'yes' );
    if(get_option("GooglePlusOne_htmltype") == "") add_option( 'GooglePlusOne_htmltype', "page", '', 'yes' );
    if(get_option("GooglePlusOne_alternate_display") == "") add_option( 'GooglePlusOne_alternate_display', 'body', '', 'yes' );
    if(get_option("GooglePlusOne_size") == "") add_option( 'GooglePlusOne_size', 3, '', 'yes' );
    if(get_option("GooglePlusOne_align") == "") add_option( 'GooglePlusOne_align', 2, '', 'yes' );
    if(get_option("GooglePlusOne_top") == "") add_option( 'GooglePlusOne_top', 5, '', 'yes' );
    if(get_option("GooglePlusOne_side") == "") add_option( 'GooglePlusOne_side', 5, '', 'yes' );
    
    echo '<div class="wrap">';
    echo '  <div id="icon-options-general" class="icon32"></div>';
    echo "  <h2>Google +1 Options</h2>";
    echo '  <div>';
    
    if($_POST['GooglePlusOne_action'] == "save"){
      echo "<br/><i style='color: red;'>Options saved!</i>\n";
      update_option( "GooglePlusOne_active", $_POST['GooglePlusOne_active'] );
      update_option( "GooglePlusOne_size", $_POST['GooglePlusOne_size'] );
      update_option( "GooglePlusOne_count", $_POST['GooglePlusOne_count'] );
      if($_POST['GooglePlusOne_display'] != "")
        update_option( "GooglePlusOne_display", $_POST['GooglePlusOne_display'] );
      else
        update_option( "GooglePlusOne_display", "entry-title");
      update_option( "GooglePlusOne_htmltype", $_POST['GooglePlusOne_htmltype'] );
      if($_POST['GooglePlusOne_alternate_display'] != "")
        update_option( "GooglePlusOne_alternate_display", $_POST['GooglePlusOne_alternate_display'] );
      else
        update_option( "GooglePlusOne_alternate_display", "body" );
      update_option( "GooglePlusOne_align", $_POST['GooglePlusOne_align'] );
      if($_POST['GooglePlusOne_top'] != "")
        update_option( "GooglePlusOne_top", $_POST['GooglePlusOne_top'] );
      else
        update_option( "GooglePlusOne_top", 5 );
      if($_POST['GooglePlusOne_side'] != "")
        update_option( "GooglePlusOne_side", $_POST['GooglePlusOne_side'] );
      else
        update_option( "GooglePlusOne_side", 5 );
    }
    
?>
<br/>
<form method="post" action="">
  <table width="100%" border="0">
  
    <tr>
      <td width="20%" valign="top" style="background-color:#eef5fb; padding:10px;"><strong>Show</strong></td>
      <td width="80%" style="background-color:#eee; padding:10px;">
        <?php if(get_option("GooglePlusOne_active")){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <input type="checkbox" name="GooglePlusOne_active" id="GooglePlusOne_active" value="1" <?php echo $checked; ?> />
        <i>Note: Shows the +1 buton if checked!</i>
      </td>
    </tr>
    
    <tr>
      <td width="20%" valign="top" style="background-color:#eef5fb; padding:10px;"><strong>Size</strong></td>
      <td width="80%" style="background-color:#eee; padding:10px;">
        
        <?php if(get_option("GooglePlusOne_size") == "" || get_option("GooglePlusOne_size") == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <div style="margin-top: 10px;">
          <div style="float: left; width: 23px; height: 15px;">
            <input type="radio" name="GooglePlusOne_size" class="GooglePlusOne_size" value="1" <?php echo $checked; ?> />
          </div>
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 24px; height: 15px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -100px -42px;" alt="" />
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 36px; height: 15px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -150px -42px;" alt="" />
        </div>
        
        <?php if(get_option("GooglePlusOne_size") == 2){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <div style="clear: both; margin-top: 10px;">
          <div style="float: left; width: 23px; height: 20px;">
            <input type="radio" name="GooglePlusOne_size" class="GooglePlusOne_size" value="2" <?php echo $checked; ?> />
          </div>
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 32px; height: 20px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -132px -21px;" alt="" />
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 47px; height: 20px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -207px -21px;" alt="" />
        </div>
        
        <?php if(get_option("GooglePlusOne_size") == 3){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <div style="clear: both; margin-top: 10px;">
          <div style="float: left; width: 23px; height: 24px;">
            <input type="radio" name="GooglePlusOne_size" class="GooglePlusOne_size" value="3" <?php echo $checked; ?> />
          </div>
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 38px; height: 24px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -156px -58px;" alt="" />
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 57px; height: 24px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -235px -58px;" alt="" />
        </div>
        
        <?php if(get_option("GooglePlusOne_size") == 4){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <div style="clear: both; margin-top: 10px;">
          <div style="float: left; width: 23px; height: 55px;">
            <input type="radio" name="GooglePlusOne_size" class="GooglePlusOne_size" value="4" <?php echo $checked; ?> />
          </div>
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 50px; height: 35px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -255px -21px;" alt="" />
          <br/>
          <img src="<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/spacer.gif" style="width: 50px; height: 20px; background: url('<?php echo WP_PLUGIN_URL; ?>/new-googleplusone/sprite.png') scroll -204px 0px;" alt="" />
        </div>
        
      </td>
    </tr>
    
    <?php if(get_option("GooglePlusOne_count")){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
    <tr>
      <td width="20%" valign="top" style="background-color:#eef5fb; padding:10px;"><strong>Counter</strong></td>
      <td width="80%" style="background-color:#eee; padding:10px;">
        <input type="checkbox" name="GooglePlusOne_count" id="GooglePlusOne_count" value="1" <?php echo $checked; ?> />
        <i>Note: Show the white boubble with +1 count!</i>
      </td>
    </tr>
    
    <tr>
      <td width="20%" valign="top" style="background-color:#eef5fb; padding:10px;"><strong>Display </strong></td>
      <td width="80%" style="background-color:#eee; padding:10px;">
        <ol>
          <li>
            <input type="radio" name="GooglePlusOne_htmltype" class="GooglePlusOne_htmltype" value="page" <?php if(get_option("GooglePlusOne_htmltype") == "page") echo 'checked="checked"'; ?>/> Show on each post and page.<br/>
            <input type="text" name="GooglePlusOne_display" class="GooglePlusOne_display" value="<?php echo get_option("GooglePlusOne_display"); ?>" /><i>The class of HTML object wich will contain Google+1 button.</i><br/>
            <i>Note: If displayed in a HTML element it must have relative or absolute CSS style!</i><br/><br/>
          </li>
          <li>
            <input type="radio" name="GooglePlusOne_htmltype" class="GooglePlusOne_htmltype" value="id" <?php if(get_option("GooglePlusOne_htmltype") == "id") echo 'checked="checked"'; ?> /> Show on specific HTML element<br/>
            <input type="text" name="GooglePlusOne_alternate_display" class="GooglePlusOne_alternate_display" value="<?php echo get_option("GooglePlusOne_alternate_display"); ?>" /><i>The ID of HTML object wich will contain Google+1 button.</i><br/>
          </li>
        </ol>
      </td>
    </tr>
    
    <tr>
      <td width="20%" valign="top" style="background-color:#eef5fb; padding:10px;"><strong>Align </strong></td>
      <td width="80%" style="background-color:#eee; padding:10px;">
        <?php if(get_option("GooglePlusOne_align") == 1){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <input type="radio" name="GooglePlusOne_align" class="GooglePlusOne_align" value="1" <?php echo $checked; ?> /> left
        <?php if(get_option("GooglePlusOne_align") == 2){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
        <input type="radio" name="GooglePlusOne_align" class="GooglePlusOne_align" value="2" <?php echo $checked; ?> /> right
      </td>
    </tr>
    
    <tr>
      <td width="20%" valign="top" style="background-color:#eef5fb; padding:10px;"><strong>Offset</strong></td>
      <td width="80%" style="background-color:#eee; padding:10px;">
        <input type="text" size="4" name="GooglePlusOne_top" id="GooglePlusOne_top" value="<?php echo get_option("GooglePlusOne_top"); ?>" />px top
        <br/>
        <i>Note: Set the number of pixels you want the button to be moved from the top down!</i>
        <br/>
        <input type="text" size="4" name="GooglePlusOne_side" id="GooglePlusOne_side" value="<?php echo get_option("GooglePlusOne_side"); ?>" />px side
        <br/>
        <i>Note: Set the number of pixels you want the button to be moved from the left or right alignment!</i>
      </td>
    </tr>
    
  </table>
  <p class="submit">
    <input name="save" type="submit" value="Save changes" />
    <input type="hidden" name="GooglePlusOne_action" value="save" />
  </p>
</form>
<?php
    echo '  </div>';
    echo '</div>';
  }
  
  function googleplusone_init_head() {
    
    global $googleplusone_config;
    $googleplusone_config = array();
    $googleplusone_config['display'] = get_option( "GooglePlusOne_display", "" );
    $googleplusone_config['size'] = get_option( "GooglePlusOne_size", 1 );
    $googleplusone_config['count'] = get_option( "GooglePlusOne_count", 0 );
    $googleplusone_config['align'] = get_option( "GooglePlusOne_align", 0 );
    $googleplusone_config['top'] = get_option( "GooglePlusOne_top", 5 );
    $googleplusone_config['side'] = get_option( "GooglePlusOne_side", 5 );
    $googleplusone_config['alternate_display'] = get_option( "GooglePlusOne_alternate_display", "body" );
  } 
  
  function googleplusone_init_foot() {
?>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<?php
    if(get_option("GooglePlusOne_htmltype", "page") == "id") {
      global $googleplusone_config;
      
      echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/new-googleplusone/GooglePlusOneScriptFooter.php?ver=1.0"></script>'."\n";
    }
  }
  
  function GooglePlusOne_button($content) {
    global $post;
   
    $content .= '<script type="text/javascript">'."\n";
    $content .= '  addGooglePlusOne('.$post->ID.', "'.get_permalink($post->ID).'");'."\n";
    $content .= '</script>'."\n";
    return $content;
  }
  
  function googleplusone_add_script() {
    echo '<script type="text/javascript" src="'.WP_PLUGIN_URL.'/new-googleplusone/GooglePlusOneScript.php?ver=1.0"></script>'."\n";
  }
  
  if(get_option( "GooglePlusOne_active") == 1) {
    add_action('init', 'googleplusone_init_head');
    add_action('wp_footer', 'googleplusone_init_foot');
    add_action('wp_head', 'googleplusone_add_script');
    
    if(get_option("GooglePlusOne_htmltype", "page") == "page")
      add_filter("the_content", "GooglePlusOne_button", 10, 1);
  }
?>
