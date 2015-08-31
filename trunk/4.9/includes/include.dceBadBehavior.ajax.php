<?php

defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

plugin_include("dceBadBehavior", "libs/DataTables/ssp.class.php");

if (isset($_REQUEST['ajax_action'])) {
    $aPluginConf = cRegistry::getConfigValue("plugins", "dceBadBehavior");
    $aCfgCurrentClient = cRegistry::getClientConfig(cRegistry::getClientId());

    switch ($_REQUEST['ajax_action']) {

        case 'get_log_data':
            $aColumns = array(
                array('db'=>'idbad_behavior', 'dt'=>0),
                array('db'=>'key','dt'=>1),
                array(
                    'db'=>'date',
                    'dt'=>'2',
                    'formatter'=>function($d, $row){
                        return date('jS M y', strtotime($d));
                    }
                ),
                array('db'=>'user_agent','dt'=>3)
            );
            $aDbCon = cRegistry::getConfigValue('db', 'connection');
            $aSqlParam = array(
                'user' => $aDbCon['user'],
                'pass' => $aDbCon['password'],
                'db' => $aDbCon['database'],
                'host' => $aDbCon['host']
            );
            echo json_encode(SSP::simple($_GET, $aSqlParam, $cfg['tab']['bad_behavior'],"idbad_behavior", $aColumns));
            break;

        default:
            echo "error:no action:" . $_REQUEST['ajax_action'];
    }
    cRegistry::shutdown(FALSE);
    die();
}