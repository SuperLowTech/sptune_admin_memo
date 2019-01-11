<?php
/**
 * @version 1.0
 */
/*
Plugin Name:sp-tune admin memo2
Plugin URI:this plagin provide note like funciton for you.
Author: sparrow tune
Version: 1.0
Author URI: https:nigemizu.site
*/

class SPTUNEADMEMOSetting{
  
  public $memo;
  public $css_directly = "/plugins/sptune_admin_memo/css/sptune_admin_memo_setting.css";

  public function __construct(){
    add_action('admin_menu',array($this,'SPTUNE_ADMEMO_add_setting_page'));
    $this->memo = 'display your memo here.';  
  }

//To add this plugin's option page   
public function SPTUNE_ADMEMO_add_setting_page(){
  add_options_page(
    'admin memo', 
    'SPTUNE admin memo', 
    'manage_options', 
    'admin-memo-setting', 
    array($this,'hoge') );
}

  public function hoge(){
    if(isset($_POST['memo'])){
      $this->memo = $_POST['memo'];
    }
    echo $this->memo;
  } 
}

$class_setting = new SPTUNEADMEMOSetting;
?>

<!--setting page's HTML -->
<link rel="stylesheet" type="text/css" href="<?php content_url().$class_setting->css_directly?>">
<div class="wrap">
<h2>Memo zone</h2>
<?php echo $class_setting->memo;?>
<form action="" method="post">
  <input name="memo" type="text">
  <input type ="submit" value="Ok!">
</form>
