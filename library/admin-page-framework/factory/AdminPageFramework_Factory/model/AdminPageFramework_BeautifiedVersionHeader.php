<?php
/**
 Admin Page Framework v3.5.3 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
if (php_sapi_name() === 'cli') {
    $_sFrameworkFilePath = dirname(dirname(dirname(dirname(__FILE__)))) . '/admin-page-framework.php';
    if (file_exists($_sFrameworkFilePath)) {
        include_once ($_sFrameworkFilePath);
    }
}
final class AdminPageFramework_BeautifiedVersionHeader extends AdminPageFramework_Registry_Base {
    const NAME = 'Admin Page Framework';
    const DESCRIPTION = 'Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>';
}