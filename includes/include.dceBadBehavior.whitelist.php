<?php
/**
 * File:
 * include.dceBadBehavior.overview.php
 * 
 * @package dceBadBehavior
 * @subpackage GuiPages
 * @version $Rev$
 * @since 4.9.3
 * @author Ortwin Pinke <plugins@php-backoffice.de>
 * @copyright (c) 2012-2015, Ortwin Pinke <www.ortwinpinke.de>
 * 
 * $Id$
 */

defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

// we use our own jquery version
$cfg['backend_template']['js_files'][0] = "{basePath}plugins/dceBadBehavior/scripts/jquery.min.js";

$oPage = new dceBadBehaviorGui("dceBadBehavior_blacklist", "dceBadBehavior", 1);
$oNoti = new cGuiNotification();
$oPage->setContent($oNoti->returnNotification('info', i18n("Only available in pro-version", "dceBadBehavior")));

$oPage->render();
?>