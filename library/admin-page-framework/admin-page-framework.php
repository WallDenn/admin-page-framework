<?php
/**
 Admin Page Framework v3.5.3 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
abstract class AdminPageFramework_Registry_Base {
    const VERSION = '3.5.3';
    const NAME = 'Admin Page Framework';
    const DESCRIPTION = 'Facilitates WordPress plugin and theme development.';
    const URI = 'http://en.michaeluno.jp/admin-page-framework';
    const AUTHOR = 'Michael Uno';
    const AUTHOR_URI = 'http://en.michaeluno.jp/';
    const COPYRIGHT = 'Copyright (c) 2013-2015, Michael Uno';
    const LICENSE = 'MIT <http://opensource.org/licenses/MIT>';
    const CONTRIBUTORS = '';
}
final class AdminPageFramework_Registry extends AdminPageFramework_Registry_Base {
    const TEXT_DOMAIN = 'admin-page-framework';
    const TEXT_DOMAIN_PATH = '/language';
    static public $bIsMinifiedVersion = true;
    static public $sAutoLoaderPath;
    static public $sFilePath = '';
    static public $sDirPath = '';
    static public $sFileURI = '';
    static public function setUp($sFilePath = null) {
        self::$sFilePath = $sFilePath ? $sFilePath : __FILE__;
        self::$sDirPath = dirname(self::$sFilePath);
        self::$sFileURI = plugins_url('', self::$sFilePath);
        self::$sAutoLoaderPath = self::$sDirPath . '/factory/AdminPageFramework_Factory/utility/AdminPageFramework_RegisterClasses.php';
        self::$bIsMinifiedVersion = class_exists('AdminPageFramework_MinifiedVersionHeader');
    }
    static public function getVersion() {
        if (!isset(self::$sAutoLoaderPath)) {
            trigger_error('Admin Page Framework: ' . ' : ' . sprintf(__('The method is called too early. Perform <code>%2$s</code> earlier.', 'admin-page-framework'), __METHOD__, 'setUp()'), E_USER_WARNING);
            return self::VERSION;
        }
        return self::VERSION . (self::$bIsMinifiedVersion ? '.min' : '');
    }
    static public function getInfo() {
        $_oReflection = new ReflectionClass(__CLASS__);
        return $_oReflection->getConstants() + $_oReflection->getStaticProperties();
    }
}
final class AdminPageFramework_Bootstrap {
    public function __construct($sLibraryPath) {
        if (isset(self::$sAutoLoaderPath)) {
            return;
        }
        if (!defined('ABSPATH')) {
            return;
        }
        AdminPageFramework_Registry::setUp($sLibraryPath);
        if (AdminPageFramework_Registry::$bIsMinifiedVersion) {
            return;
        }
        $aClassFiles = null;
        include (AdminPageFramework_Registry::$sAutoLoaderPath);
        include (AdminPageFramework_Registry::$sDirPath . '/admin-page-framework-include-class-list.php');
        new AdminPageFramework_RegisterClasses(isset($aClassFiles) ? '' : AdminPageFramework_Registry::$sDirPath, array('exclude_class_names' => 'AdminPageFramework_MinifiedVersionHeader',), isset($aClassFiles) ? $aClassFiles : array());
    }
}
new AdminPageFramework_Bootstrap(__FILE__);