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
 *   $Id:$
 */

defined('CON_FRAMEWORK') or die('Illegal call');

// no table struct needed, handled by plugin
function bb2_table_structure($name) {
    return '';
}

// Insert a new record
function bb2_insert($settings, $package, $key) {
    if (!$settings['logging']) {
        return "";
    }
    $ip = bb2_db_escape($package['ip']);
    $date = bb2_db_date();
    $request_method = bb2_db_escape($package['request_method']);
    $request_uri = bb2_db_escape($package['request_uri']);
    $server_protocol = bb2_db_escape($package['server_protocol']);
    $user_agent = bb2_db_escape($package['user_agent']);
    $headers = "$request_method $request_uri $server_protocol\n";
    foreach ($package['headers'] as $h => $v) {
        $headers .= bb2_db_escape("$h: $v\n");
    }
    $request_entity = "";
    if (!strcasecmp($request_method, "POST")) {
        foreach ($package['request_entity'] as $h => $v) {
            $request_entity .= bb2_db_escape("$h: $v\n");
        }
    }
    return "INSERT INTO `" . bb2_db_escape($settings['log_table']) . "`
		(`ip`, `date`, `request_method`, `request_uri`, `server_protocol`, `http_headers`, `user_agent`, `request_entity`, `key`) VALUES
		('$ip', '$date', '$request_method', '$request_uri', '$server_protocol', '$headers', '$user_agent', '$request_entity', '$key')";
}