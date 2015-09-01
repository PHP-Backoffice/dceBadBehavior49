<?php
/**
 * File:
 * include.dceBadBehavior.overview.php
 * 
 * @package dceBadBehavior
 * @subpackage GuiPages
 * @version $Rev:$
 * @since 4.9.3
 * @author Ortwin Pinke <plugins@php-backoffice.de>
 * @copyright (c) 2012-2015, Ortwin Pinke <www.ortwinpinke.de>
 * 
 * $Id:$
 */

defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

// we use our own jquery version
$cfg['backend_template']['js_files'][0] = "{basePath}plugins/dceBadBehavior/scripts/jquery.min.js";

$oPage = new dceBadBehaviorGui("dceBadBehavior_overview", "dceBadBehavior", 0);
$oPage->addStyle($oPage->getAbsHtmlPath()."libs/DataTables/datatables.min.css");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/datatables.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/Buttons-1.0.1/js/buttons.flash.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/Buttons-1.0.1/js/buttons.html5.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/plugins/dataTables.select.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."scripts/jquery.plainmodal.min.js");

$user = new cApiUser($auth->auth["uid"]);

$oPage->set('s', 'LOG_SECTION_H3_HTML', i18n("Bad Behavior Log", "dceBadBehavior"));


$oPage->set('s', 'OPTIONS_SECTION_H3_HTML', i18n("Options", "dceBadBehavior"));

$oPage->render();
?>