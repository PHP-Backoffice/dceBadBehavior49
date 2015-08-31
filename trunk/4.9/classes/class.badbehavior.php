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

class cApiBadBehaviorCollection extends ItemCollection {

    public function __construct() {
        $cfgTab = cRegistry::getConfigValue("tab");
        parent::__construct($cfgTab['bad_behavior'], 'idbad_behavior');
        $this->_setItemClass('cApiShortUrl');
    }

}

class cApiBadBehavior extends Item {

    public function __construct($id = false) {
        $cfgTab = cRegistry::getConfigValue("tab");
        parent::__construct($cfgTab['bad_behavior'], 'idbad_behavior');
        if ($id !== false) {
            $this->loadByPrimaryKey($id);
        }
    }
}
