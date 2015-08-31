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

$sPluginName = 'dceBadBehavior';

$sPluginAutoloadClassPath = "contenido".DIRECTORY_SEPARATOR.$sPluginName.DIRECTORY_SEPARATOR."classes".DIRECTORY_SEPARATOR;
cAutoload::addClassmapConfig(array(
    "cApiBadBehaviorCollection" => $sPluginAutoloadClassPath."class.badbehavior.php",
    "cApiBadBehavior" => $sPluginAutoloadClassPath."class.badbehavior.php"
));

if(!cAutoload::isAutoloadable("phpbo".DIRECTORY_SEPARATOR."class.plugin.handler.php")) {
    cAutoload::addClassmapConfig(array(
        "phpboPluginHandler" => $sPluginAutoloadClassPath."phpbo".DIRECTORY_SEPARATOR."class.plugin.handler.php"
    ));
}

// define table names
$cfg['tab']['bad_behavior'] = $cfg['sql']['sqlprefix'] . '_pibad_behavior';
$cfg['tab']['bad_behavior_conf'] = $cfg['sql']['sqlprefix'] . '_pibad_behavior_conf';

if (strstr(session_name(), "frontend")) {
    $bb2_settings_defaults = array(
        'log_table' => $cfg['tab']['bad_behavior'],
        'display_stats' => false,
        'strict' => false,
        'verbose' => true,
        'logging' => true,
        'httpbl_key' => '',
        'httpbl_threat' => '25',
        'httpbl_maxage' => '30',
        'offsite_forms' => false,
	'eu_cookie' => false,
	'reverse_proxy' => false,
	'reverse_proxy_header' => 'X-Forwarded-For',
	'reverse_proxy_addresses' => array()
    );
    cInclude("plugins", "dceBadBehavior/bad-behavior-for-contenido.php");
    // Add function for hook "after plugins loaded" to Contenido Extension Chainer
    $_cecRegistry->addChainFunction('Contenido.Frontend.AfterLoadPlugins', 'bb2_startup');
}
unset($sPluginName);
?>
