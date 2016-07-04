<?php
/**
 * @package    plugins
 * @subpackage dceBadBehavior
 * @version    $Rev$
 * @author     Ortwin Pinke
 * @copyright  Ortwin Pinke <www.dceonline.de>
 * @license    GPL
 * @link       http://www.dceonline.de
 *
 *   $Id$
 */
defined('CON_FRAMEWORK') or die('Illegal call');

// define plugin cfg
$cfg['plugins']['dceBadBehavior'] = array(
    'name' => 'dceBadBehavior',
    'debug' => array(
        'skip_minify' => TRUE
    ),
    'contact_email' => 'bb_not_set@php-backoffice.de', // email is shown on 403-page, set to a valide email
    'tab' => array(
        'bad_behavior' => $cfg['sql']['sqlprefix'] . '_pibad_behavior'
    ),
    'settings' => array(
        'log_table' => $cfg['sql']['sqlprefix'] . '_pibad_behavior',
        'display_stats' => false, // not tested yet, do not change if you dont know what you are doing
        // you may change following values to your needs
        'logging' => true, // log or not
        'verbose' => true, // log every hit
        'strict' => false,
        'httpbl_key' => '',
        'httpbl_threat' => '25',
        'httpbl_maxage' => '30',
        'offsite_forms' => false,
	'eu_cookie' => false,
	'reverse_proxy' => false,
	'reverse_proxy_header' => 'X-Forwarded-For',
	'reverse_proxy_addresses' => array()
    )
);

$sPluginAutoloadClassPath = "contenido".DIRECTORY_SEPARATOR.cRegistry::getConfigValue('path', 'plugins').$cfg['plugins']['dceBadBehavior']['name'].DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR;
cAutoload::addClassmapConfig(array(
    "cApiBadBehaviorCollection" => $sPluginAutoloadClassPath."class.badbehavior.php",
    "cApiBadBehavior" => $sPluginAutoloadClassPath."class.badbehavior.php",
    "dceBadBehaviorGui" => $sPluginAutoloadClassPath."class.badbehavior.gui.php"
));

if(!cAutoload::isAutoloadable("phpbo".DIRECTORY_SEPARATOR."class.plugin.handler.php")) {
    cAutoload::addClassmapConfig(array(
        "phpboPluginHandler" => $sPluginAutoloadClassPath."phpbo".DIRECTORY_SEPARATOR."class.plugin.handler.php"
    ));
}


if (strstr(session_name(), "frontend")) {
    $aCfgBB = cRegistry::getConfigValue('plugins', 'dceBadBehavior');
    $bb2_settings_defaults = $aCfgBB['settings'];
    cInclude("plugins", "dceBadBehavior/bad-behavior-for-contenido.php");
    // Add function for hook "after plugins loaded" to Contenido Extension Chainer
    $_cecRegistry->addChainFunction('Contenido.Frontend.AfterLoadPlugins', 'bb2_startup');
}
?>
