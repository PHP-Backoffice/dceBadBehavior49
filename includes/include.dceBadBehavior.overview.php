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
 * @copyright (c) 2012-2014, Ortwin Pinke <www.ortwinpinke.de>
 * 
 * $Id:$
 */

defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

class dceBadBehavior extends cGuiPage {
    
}

$oPage = new dceBadBehavior("dceBadBehavior_overview", "dceBadBehavior", "1");

$user = new cApiUser($auth->auth["uid"]);

$oPage->render();
?>