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
    
    private $_aCfgPlugin;


    public function __construct($pageName, $pluginName = '', $subMenu = '') {
        $this->_setCfgPlugin();
        parent::__construct($pageName, $pluginName, $subMenu);
        $this->_oPluginHandler = new phpboPluginHandler();
        if(!empty($pluginName)) {
            $this->_oPluginHandler->initByFolderName($pluginName);
            if(isset($this->_aCfgPlugin['debug']['skip_minify']) && $this->_aCfgPlugin['debug']['skip_minify'] !== TRUE) {
                $this->_useMinifiedJs($pageName, $pluginName);
            }
        }
    }
    
    public function getAbsHtmlPath() {
        return cRegistry::getBackendUrl().cRegistry::getConfigValue("path", "plugins").$this->_pluginName.DIRECTORY_SEPARATOR;
    }
    
    public function getRelHtmlPath() {
        return cRegistry::getConfigValue("path", "plugins").$this->_pluginName.DIRECTORY_SEPARATOR;
    }
    
    protected function _useMinifiedJs($pageName, $pluginName) {
        $cfg = cRegistry::getConfig();
        $scriptDir = cRegistry::getBackendPath() . $cfg['path']['plugins'] . $pluginName . '/' . $cfg['path']['scripts'];
        if(cFileHandler::exists($scriptDir)) {
            foreach($this->_scripts as $sKey => $sScript) {
                $sFilePath = dirname($sScript)."/";
                $sFilename = basename($sScript, ".js");
                $sMinifiedJs = $sFilename.'.min.js';
                if(cFileHandler::exists($scriptDir.$sMinifiedJs) && cFileHandler::readable($scriptDir.$sMinifiedJs)) {
                    $this->_scripts[$sKey] = $sFilePath.$sMinifiedJs;
                }                
            }            
        }
    }
    
    private function _setCfgPlugin() {
        $aPlugin = cRegistry::getConfigValue("plugins", "dceBadBehavior");
        if(is_array($aPlugin) && count($aPlugin) > 0) {
            $this->_aCfgPlugin = $aPlugin;
            return;
        }
        $this->_aCfgPlugin = array();
    }
}