<?php
/**
 * Project:
 * dceBadBehavior Plugin
 *
 * Description:
 *
 *
 * Requirements:
 * @con_php_req 5.0
 *
 *
 * @package    dceBadBehavior plugin
 * @version    0.1.0
 * @author     Ortwin Pinke
 * @copyright  Copyright (c) 2010, Ortwin Pinke <www.dceonline.de>
 * @license    GPL
 * @link       http://www.dceonline.de
 *
 * @todo       (adding todo's here)
 *
 * {@internal
 *   created 2010
 *
 *   $Id$
 * }}
 *
 */

defined('CON_FRAMEWORK') or die('Illegal call');

$sPluginName = 'dceBadBehavior';

if (!isset($GLOBALS['contenido'])) {

    // we need db connection
    $db = new DB_Contenido();

    $bb2_settings_defaults = array(
                            'log_table' => $cfg['sql']['sqlprefix'].'_bad_behavior',                             
                             'display_stats' => false,
                             'strict' => false,
                             'verbose' => false,
                             'logging' => true,
                             'httpbl_key' => '',
                             'httpbl_threat' => '25',
                             'httpbl_maxage' => '30',
                             'offsite_forms' => false,
                             // ads only for future use with contenido
                             'conf_table' => $cfg['sql']['sqlprefix'].'_bad_behavior_conf',
                             'support-email' => 'you@yourdomain.tld'
                         );


    cInclude("plugins", "dceBadBehavior/bad-behavior-for-contenido.php");
    // Add function for hook "after plugins loaded" to Contenido Extension Chainer
    $_cecRegistry->addChainFunction('Contenido.Frontend.AfterLoadPlugins', 'bb2_startup');
}

unset($sPluginName);
?>
