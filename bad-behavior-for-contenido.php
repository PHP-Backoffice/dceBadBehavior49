<?php
/**
 * @package    Plugins
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

define('BB2_CWD', dirname(__FILE__).'/libs/bad-behavior');

plugin_include("dceBadBehavior", "includes/functions.badbehavior.mysql.php");
plugin_include("dceBadBehavior", "includes/functions.badbehavior.callback.php");

// Calls inward to Bad Behavor itself.
require_once(BB2_CWD . "/bad-behavior/core.inc.php");

//lets do the startup
function bb2_startup() {
    bb2_start(bb2_read_settings());
}