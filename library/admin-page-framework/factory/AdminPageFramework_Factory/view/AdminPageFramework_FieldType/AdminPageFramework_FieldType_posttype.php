<?php
/**
 Admin Page Framework v3.5.5b01 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AdminPageFramework_FieldType_posttype extends AdminPageFramework_FieldType_checkbox {
    public $aFieldTypeSlugs = array('posttype',);
    protected $aDefaultKeys = array('slugs_to_remove' => null, 'query' => array(), 'operator' => 'and', 'attributes' => array('size' => 30, 'maxlength' => 400,), 'select_all_button' => true, 'select_none_button' => true,);
    protected $aDefaultRemovingPostTypeSlugs = array('revision', 'attachment', 'nav_menu_item',);
    protected function getStyles() {
        $_sParentStyles = parent::getStyles();
        return $_sParentStyles . <<<CSSRULES
/* Posttype Field Type */
.admin-page-framework-field input[type='checkbox'] {
    margin-right: 0.5em;
}     
.admin-page-framework-field-posttype .admin-page-framework-input-label-container {
    padding-right: 1em;
}    
CSSRULES;
        
    }
    protected function getField($aField) {
        $this->_sCheckboxClassSelector = '';
        $aField['label'] = $this->_getPostTypeArrayForChecklist(isset($aField['slugs_to_remove']) ? $this->getAsArray($aField['slugs_to_remove']) : $this->aDefaultRemovingPostTypeSlugs, $aField['query'], $aField['operator']);
        return parent::getField($aField);
    }
    private function _getPostTypeArrayForChecklist($aSlugsToRemove, $asQueryArgs = array(), $sOperator = 'and') {
        $_aPostTypes = array();
        foreach (get_post_types($asQueryArgs, 'objects') as $_oPostType) {
            if (isset($_oPostType->name, $_oPostType->label)) {
                $_aPostTypes[$_oPostType->name] = $_oPostType->label;
            }
        }
        return array_diff_key($_aPostTypes, array_flip($aSlugsToRemove));
    }
}