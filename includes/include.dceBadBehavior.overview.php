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

$aCfgBB = cRegistry::getConfigValue('plugins', 'dceBadBehavior');

$oPage = new dceBadBehaviorGui("dceBadBehavior_overview", "dceBadBehavior", 0);
$oPage->set('s', 'INFO_URL', 'http://php-backoffice.de');
$oPage->set('s', 'DOKU_URL', 'http://php-backoffice.de');
$oPage->addStyle($oPage->getAbsHtmlPath()."libs/DataTables/datatables.min.css");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/datatables.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/Buttons-1.0.1/js/buttons.flash.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/Buttons-1.0.1/js/buttons.html5.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."libs/DataTables/plugins/dataTables.select.min.js");
$oPage->addScript($oPage->getAbsHtmlPath()."scripts/jquery.plainmodal.min.js");

// set labels and content
$oPage->set('s', 'LOG_SECTION_H3_HTML', i18n("Bad Behavior Log", "dceBadBehavior"));
$oPage->set('s', 'TXT_MORE_INFO', i18n("more Informations", "dceBadBehavior"));
$oPage->set('s', 'TXT_TH_0', i18n("ID", "dceBadBehavior"));
$oPage->set('s', 'TXT_TH_1', i18n("Key", "dceBadBehavior"));
$oPage->set('s', 'TXT_TH_2', i18n("Date", "dceBadBehavior"));
$oPage->set('s', 'TXT_TH_3', i18n("Agent", "dceBadBehavior"));
$oPage->set('s', 'OPTIONS_SECTION_H3_HTML', i18n("Options", "dceBadBehavior"));
$oPage->set('s', 'TXT_LABEL_CLIENT', i18n("Activate BB for current Client", "dceBadBehavior"));
$oPage->set('s', 'TXT_LABEL_LOG', i18n("enable Log", "dceBadBehavior"));
$oPage->set('s', 'TXT_LABEL_VERBOSE', i18n("for all visits", "dceBadBehavior"));

if($aCfgBB['settings']['logging'] === TRUE) {
    $oPage->set('s', 'INPUT_LOG_ACTIVE_SELECTED', ' checked="checked"');
} else {
    $oPage->set('s', 'INPUT_LOG_ACTIVE_SELECTED', "");
}

if($aCfgBB['settings']['verbose'] === TRUE) {
    $oPage->set('s', 'INPUT_LOG_VERBOSE_SELECTED', ' checked="checked"');
} else {
    $oPage->set('s', 'INPUT_LOG_VERBOSE_SELECTED', "");
}

$oPage->render();
?>