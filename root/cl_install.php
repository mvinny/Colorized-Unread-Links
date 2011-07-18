<?php

/**
* @author _Vinny_ vinny@suportephpbb.com.br http://www.suportephpbb.com.br
* @author RMcGirr83 (Rich McGirr) rmcgirr83@gmail.com
* @package colorized_unread_links
* @version $Id cl_install.php
* @copyright (c) 2011 _Vinny_, RMcGirr83 ( http://www.rmcgirr83.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();


if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
   trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

/*
* The language file which will be included when installing
* Language entries that should exist in the language file for UMIL (replace $mod_name with the mod's name you set to $mod_name above)
* $mod_name
* 'INSTALL_' . $mod_name
* 'INSTALL_' . $mod_name . '_CONFIRM'
* 'UPDATE_' . $mod_name
* 'UPDATE_' . $mod_name . '_CONFIRM'
* 'UNINSTALL_' . $mod_name
* 'UNINSTALL_' . $mod_name . '_CONFIRM'
*/
$language_file = 'mods/info_acp_colorized_unread_links';

// The name of the mod to be displayed during installation.
$mod_name = 'ACP_COLORIZED';

/*
* The name of the config variable which will hold the currently installed version
* You do not need to set this yourself, UMIL will handle setting and updating the version itself.
*/
$version_config_name = 'cl_version';

/*
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/
$versions = array(
   // Version 1.0.0
   '1.0.0'   => array(
      // Lets add a config setting
      'config_add' => array(
         array('colorized_links'),
      ),
   ),
   
   
   // Version 1.1.0
   '1.1.0'   => array(
      // Lets add a config setting
      'config_add' => array(
         array('enable_colorized_links'),
      ),
   
   // Now add the module
	'module_add' => array(
		// First, lets add a new category named ACP_COLORIZED to ACP_CAT_DOT_MODS
		array('acp', 'ACP_CAT_DOT_MODS', 'ACP_COLORIZED'),
		// next let's add our module
		array('acp', 'ACP_COLORIZED', array(
				'module_basename'	=> 'colorized_unread_links',
				'modes'				=> array('settings'),
			),
		),
	),
), 
   
);

// Include the UMIF Auto file and everything else will be handled automatically.
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);

?>