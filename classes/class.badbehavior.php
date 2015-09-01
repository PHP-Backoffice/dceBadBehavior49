<?php
/**
 * @package    plugins
 * @subpackage dceBadBehavior
 * @version    $Rev$
 * @author     Ortwin Pinke
 * @copyright  Ortwin Pinke <www.dceonline.de>
 * @license    GPL
 * @link       http://www.dceonline.de
 *
 *   $Id$
 */

defined('CON_FRAMEWORK') or die('Illegal call');

class cApiBadBehaviorCollection extends ItemCollection {

    public function __construct() {
        $aPluginConf = cRegistry::getConfigValue("plugins", "dceBadBehavior");
        parent::__construct($aPluginConf['tab']['bad_behavior'], 'idbad_behavior');
        $this->_setItemClass('cApiShortUrl');
    }

}

class cApiBadBehavior extends Item {

    public function __construct($id = false) {
        $aPluginConf = cRegistry::getConfigValue("plugins", "dceBadBehavior");
        parent::__construct($aPluginConf['tab']['bad_behavior'], 'idbad_behavior');
        if ($id !== false) {
            $this->loadByPrimaryKey($id);
        }
    }
}
