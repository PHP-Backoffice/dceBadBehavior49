<?php
/**
 * @package    plugins
 * @subpackage dceBadBehavior
 * @version    $Rev:$
 * @author     Ortwin Pinke
 * @copyright  Ortwin Pinke <www.dceonline.de>
 * @license    GPL
 * @link       http://www.dceonline.de
 *
 *   $Id$
 */

defined('CON_FRAMEWORK') or die('Illegal call');

$sPluginName = 'dceBadBehavior';

// define table names
$cfg['tab']['bad_behavior'] = $cfg['sql']['sqlprefix'] . '_pibad_behavior';
$cfg['tab']['bad_behavior_conf'] = $cfg['sql']['sqlprefix'] . '_pibad_behavior_conf';

if(strstr(session_name(), "frontend")) {
//echo "go";
    // we need db connection
    $db = cRegistry::getDb();

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
                             // ads only for future use with contenido
                             'conf_table' => $cfg['tab']['bad_behavior_conf'],
                             'support-email' => 'you@yourdomain.tld'
                         );


    cInclude("plugins", "dceBadBehavior/bad-behavior-for-contenido.php");
    // Add function for hook "after plugins loaded" to Contenido Extension Chainer
    $_cecRegistry->addChainFunction('Contenido.Frontend.AfterLoadPlugins', 'bb2_startup');
}

unset($sPluginName);
?>
