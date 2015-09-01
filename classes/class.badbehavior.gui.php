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

class dceBadBehaviorGui extends cGuiPage {
    
    private $_oPluginHandler;


    public function __construct($pageName, $pluginName = '', $subMenu = '') {
        parent::__construct($pageName, $pluginName, $subMenu);
        $this->_oPluginHandler = new phpboPluginHandler();
        if(!empty($pluginName)) {
            $this->_oPluginHandler->initByFolderName($pluginName);
        }
    }
    
    public function getAbsHtmlPath() {
        return cRegistry::getBackendUrl().cRegistry::getConfigValue("path", "plugins").$this->_pluginName.DIRECTORY_SEPARATOR;
    }
}