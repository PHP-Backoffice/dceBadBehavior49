<?php
/**
 * phpboPluginHandler
 *
 * @package Plugins
 * @subpackage phpBO
 * @version $Rev: 6 $ *
 * @author Ortwin Pinke
 * @copyright PHP-Backoffice <www.php-backoffice.de>
 * 
 * $Id: class.plugin.handler.php 6 2014-11-17 15:25:32Z oldperl $
 */

defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

class phpboPluginHandler extends PimPlugin {
    
    protected $_iIdPlugin = FALSE;
    protected $_aCfgPlugin;


    public function __construct($iId = NULL) {
        if(!is_null($iId)) {
            $this->_iIdPlugin = $iId;
        }
        parent::__construct($this->_iIdPlugin);
        if($this->isLoaded()) {
            $this->_init();
        }
    }
    
    public function initByFolderName($sFolderName) {
        $this->loadBy("folder", $sFolderName);
        if($this->isLoaded()) {
            $this->_init();
            return TRUE;
        }
        return FALSE;
    }

    public function getId() {
        return $this->_iIdPlugin;
    }
    
    public function getVersion() {
        if($this->isLoaded()) {
            return $this->get("version");
        }
    }
    
    public function getName() {
        if($this->isLoaded()) {
            return $this->get("name");
        }
    }

    public function setId($iId) {
        $this->_iIdPlugin = (int) $iId;
    }
    
    private function _init() {
        $aPlugins = cRegistry::getConfigValue("plugins");
        $this->_aCfgPlugin = $aPlugins[$this->get("folder")];              
    }
}