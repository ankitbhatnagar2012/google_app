<?php
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css';
admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP);
require (AT_INCLUDE_PATH.'header.inc.php');
?>

<div class="input-form">
	<fieldset class="group_form">
            <legend class="group_form">Administrator Panel</legend>
            <!-- Google Calendars settings -->
            <b><?php echo _AT('module_settings_title'); ?></b><br />
            <center><b><?php echo _AT('change_admin_settings_msg'); ?></b></center>
            <?php
	    // fetching module configs
            $query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
            $result = mysql_query($query, $db);
            $row = mysql_fetch_array($result) ;
            if(!$row){
            // no settings saved yet
            $doc = $cal = $you = 0;
            } else {
            // settings saved --> check boxes accordingly
            $my_string = $row['flags'];
            $bit = $my_string[0];
            $doc = $my_string[1];
            $cal = $my_string[2];
            $you = $my_string[3];       
	    }
	    // fetching calendar configs
            $query = "SELECT * FROM ".TABLE_PREFIX."calendar_settings";
            $result = mysql_query($query, $db);
            $row = mysql_fetch_array($result);              
            ?>
            <form name="service_check" action="mods/google_app/admin_settings.php" method="POST">
                <input type="checkbox" <?php if($doc) { ?> checked="true" <?php } ?> name="doc" value="1" /><?php echo _AT('key_docs'); ?><br />
                <input type="checkbox" <?php if($cal) { ?> checked="true" <?php } ?> name="cal" value="1" /><?php echo _AT('key_calendars'); ?><br />
                <input type="checkbox" <?php if($you) { ?> checked="true" <?php } ?> name="you" value="1" /><?php echo _AT('key_youtube'); ?><br /><br />                
            <!-- Google Calendars settings -->
            <b><?php echo _AT('calendar_settings_title'); ?></b><br />
            <center><b><?php echo _AT('change_calendar_settings_msg'); ?></b></center><br />
                
		<dl>
		    <dt><label for="client_id"><?php echo _AT('key_client_id'); ?>&nbsp;</label></dt>
		    <dd><input type="text" name="client_id" id="client_id" 
		      value="<?php echo $row['client_id'] ?>" size="160" /></dd>

		    <dt><label for="client_secret"><?php echo _AT('key_client_secret'); ?>&nbsp;</label></dt>
		    <dd><input type="text" name="client_secret" id="client_secret"
		      value="<?php echo $row['client_secret'] ?>" size="160" /></dd>

		    <dt><label for="redirect_uri"><?php echo _AT('key_redirect_uri'); ?>&nbsp;</label></dt>
		    <dd><input type="text" name="redirect_uri" id="redirect_uri"
		      value="<?php echo $row['redirect_uri'] ?>" size="160" /></dd>
    
		    <dt><label for="developer_key"><?php echo _AT('key_developer_key'); ?>&nbsp;</label></dt>
		    <dd><input type="text" name="developer_key" id="developer_key"
		      value="<?php echo $row['developer_key'] ?>" size="160" /></dd>
		</dl>
		<div class="row buttons"><input type="submit" value="<?php echo _AT('save_settings'); ?>" /></div>                 
            </form>
        </fieldset>	
</div>

<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>