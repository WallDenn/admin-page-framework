<?php
/**
 Admin Page Framework v3.5.3 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AdminPageFramework_FieldType_taxonomy extends AdminPageFramework_FieldType_checkbox {
    public $aFieldTypeSlugs = array('taxonomy',);
    protected $aDefaultKeys = array('taxonomy_slugs' => 'category', 'height' => '250px', 'max_width' => '100%', 'show_post_count' => true, 'attributes' => array(), 'select_all_button' => true, 'select_none_button' => true, 'label_no_term_found' => null, 'label_list_title' => '', 'query' => array('child_of' => 0, 'parent' => '', 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => false, 'hierarchical' => true, 'number' => '', 'pad_counts' => false, 'exclude' => array(), 'exclude_tree' => array(), 'include' => array(), 'fields' => 'all', 'slug' => '', 'get' => '', 'name__like' => '', 'description__like' => '', 'offset' => '', 'search' => '', 'cache_domain' => 'core',), 'queries' => array(),);
    protected function setUp() {
        new AdminPageFramework_Script_CheckboxSelector;
    }
    protected function getScripts() {
        $_aJSArray = json_encode($this->aFieldTypeSlugs);
        return <<<JAVASCRIPTS
/* For tabs */
var enableAPFTabbedBox = function( nodeTabBoxContainer ) {
    jQuery( nodeTabBoxContainer ).each( function() {
        jQuery( this ).find( '.tab-box-tab' ).each( function( i ) {
            
            if ( 0 === i ) {
                jQuery( this ).addClass( 'active' );
            }
                
            jQuery( this ).click( function( e ){
                     
                // Prevents jumping to the anchor which moves the scroll bar.
                e.preventDefault();
                
                // Remove the active tab and set the clicked tab to be active.
                jQuery( this ).siblings( 'li.active' ).removeClass( 'active' );
                jQuery( this ).addClass( 'active' );
                
                // Find the element id and select the content element with it.
                var thisTab = jQuery( this ).find( 'a' ).attr( 'href' );
                active_content = jQuery( this ).closest( '.tab-box-container' ).find( thisTab ).css( 'display', 'block' ); 
                active_content.siblings().css( 'display', 'none' );
                
            });
        });     
    });
};        

jQuery( document ).ready( function() {
         
    enableAPFTabbedBox( jQuery( '.tab-box-container' ) );

    /* The repeatable event */
    jQuery().registerAPFCallback( {     
        /**
         * The repeatable field callback for the add event.
         * 
         * @param object node
         * @param string    the field type slug
         * @param string    the field container tag ID
         * @param integer    the caller type. 1 : repeatable sections. 0 : repeatable fields.
         */     
        added_repeatable_field: function( oClonedField, sFieldType, sFieldTagID, iCallType ) {

            /* If it is not the color field type, do nothing. */
            if ( jQuery.inArray( sFieldType, $_aJSArray ) <= -1 ) { return; }

            oClonedField.nextAll().andSelf().each( function() {     
                jQuery( this ).find( 'div' ).incrementIDAttribute( 'id' );
                jQuery( this ).find( 'li.tab-box-tab a' ).incrementIDAttribute( 'href' );
                jQuery( this ).find( 'li.category-list' ).incrementIDAttribute( 'id' );
                enableAPFTabbedBox( jQuery( this ).find( '.tab-box-container' ) );
            });     
            
        },
        /**
         * The repeatable field callback for the remove event.
         * 
         * @param object    the field container element next to the removed field container.
         * @param string    the field type slug
         * @param string    the field container tag ID
         * @param integer    the caller type. 1 : repeatable sections. 0 : repeatable fields.
         */     
        removed_repeatable_field: function( oNextFieldConainer, sFieldType, sFieldTagID, iCallType ) {

            /* If it is not the color field type, do nothing. */
            if ( jQuery.inArray( sFieldType, $_aJSArray ) <= -1 ) { return; }

            oNextFieldConainer.nextAll().andSelf().each( function() {
                jQuery( this ).find( 'div' ).decrementIDAttribute( 'id' );
                jQuery( this ).find( 'li.tab-box-tab a' ).decrementIDAttribute( 'href' );
                jQuery( this ).find( 'li.category-list' ).decrementIDAttribute( 'id' );
            });    
                                    
        }
    });
});     
JAVASCRIPTS;
        
    }
    protected function getStyles() {
        return <<<CSSRULES
/* Taxonomy Field Type */
.admin-page-framework-field .taxonomy-checklist li { 
    margin: 8px 0 8px 20px; 
}
.admin-page-framework-field div.taxonomy-checklist {
    padding: 8px 0 8px 10px;
    margin-bottom: 20px;
}
.admin-page-framework-field .taxonomy-checklist ul {
    list-style-type: none;
    margin: 0;
}
.admin-page-framework-field .taxonomy-checklist ul ul {
    margin-left: 1em;
}
.admin-page-framework-field .taxonomy-checklist-label {
    /* margin-left: 0.5em; */
    white-space: nowrap;     
}    
/* Tabbed box */
.admin-page-framework-field .tab-box-container.categorydiv {
    max-height: none;
}
.admin-page-framework-field .tab-box-tab-text {
    display: inline-block;
}
.admin-page-framework-field .tab-box-tabs {
    line-height: 12px;
    margin-bottom: 0;
}
/* .admin-page-framework-field .tab-box-tab {     
    vertical-align: top;
} */
.admin-page-framework-field .tab-box-tabs .tab-box-tab.active {
    display: inline;
    border-color: #dfdfdf #dfdfdf #fff;
    margin-bottom: 0px;
    padding-bottom: 2px;
    background-color: #fff;
    
}
.admin-page-framework-field .tab-box-container { 
    position: relative; 
    width: 100%; 
    clear: both;
    margin-bottom: 1em;
}
.admin-page-framework-field .tab-box-tabs li a { color: #333; text-decoration: none; }
.admin-page-framework-field .tab-box-contents-container {  
    padding: 0 0 0 1.8em;
    padding: 0.55em 0.5em 0.55em 1.8em;
    border: 1px solid #dfdfdf; 
    background-color: #fff;
}
.admin-page-framework-field .tab-box-contents { 
    overflow: hidden; 
    overflow-x: hidden; 
    position: relative; 
    top: -1px; 
    height: 300px;  
}
.admin-page-framework-field .tab-box-content { 

    /* height: 300px; */
    display: none; 
    overflow: auto; 
    display: block; 
    position: relative; 
    overflow-x: hidden;
}
.admin-page-framework-field .tab-box-content .taxonomychecklist {
    margin-right: 3.2em;
}
.admin-page-framework-field .tab-box-content:target, 
.admin-page-framework-field .tab-box-content:target, 
.admin-page-framework-field .tab-box-content:target { 
    display: block; 
}  
/* tab-box-content */
.admin-page-framework-field .tab-box-content .select_all_button_container, 
.admin-page-framework-field .tab-box-content .select_none_button_container
{
    margin-top: 0.8em;
}
/* Nested Checkbox Items */
.admin-page-framework-field .taxonomychecklist .children {
    margin-top: 6px;
    margin-left: 1em;
}
CSSRULES;
        
    }
    protected function getIEStyles() {
        return <<<CSSRULES
.tab-box-content { display: block; }
.tab-box-contents { overflow: hidden;position: relative; }
b { position: absolute; top: 0px; right: 0px; width:1px; height: 251px; overflow: hidden; text-indent: -9999px; }
CSSRULES;
        
    }
    protected function getField($aField) {
        $aField['label_no_term_found'] = $this->getElement($aField, 'label_no_term_found', $this->oMsg->get('no_term_found'));
        $_aTabs = array();
        $_aCheckboxes = array();
        foreach ($this->getAsArray($aField['taxonomy_slugs']) as $sKey => $sTaxonomySlug) {
            $_aTabs[] = $this->_getTaxonomyTab($aField, $sKey, $sTaxonomySlug);
            $_aCheckboxes[] = $this->_getTaxonomyCheckboxes($aField, $sKey, $sTaxonomySlug);
        }
        return "<div id='tabbox-{$aField['field_id']}' class='tab-box-container categorydiv' style='max-width:{$aField['max_width']};'>" . "<ul class='tab-box-tabs category-tabs'>" . implode(PHP_EOL, $_aTabs) . "</ul>" . "<div class='tab-box-contents-container'>" . "<div class='tab-box-contents' style='height: {$aField['height']};'>" . implode(PHP_EOL, $_aCheckboxes) . "</div>" . "</div>" . "</div>";
    }
    private function _getTaxonomyCheckboxes(array $aField, $sKey, $sTaxonomySlug) {
        return "<div id='tab_{$aField['input_id']}_{$sKey}' class='tab-box-content' style='height: {$aField['height']};'>" . $this->getElement($aField, array('before_label', $sKey)) . "<div " . $this->generateAttributes($this->_getCheckboxContainerAttributes($aField)) . "></div>" . "<ul class='list:category taxonomychecklist form-no-clear'>" . $this->_getTaxonomyChecklist($aField, $sKey, $sTaxonomySlug) . "</ul>" . "<!--[if IE]><b>.</b><![endif]-->" . $this->getElement($aField, array('after_label', $sKey)) . "</div><!-- tab-box-content -->";
    }
    private function _getTaxonomyChecklist(array $aField, $sKey, $sTaxonomySlug) {
        return wp_list_categories(array('walker' => new AdminPageFramework_WalkerTaxonomyChecklist, 'name' => is_array($aField['taxonomy_slugs']) ? "{$aField['_input_name']}[{$sTaxonomySlug}]" : $aField['_input_name'], 'selected' => $this->_getSelectedKeyArray($aField['value'], $sTaxonomySlug), 'echo' => false, 'taxonomy' => $sTaxonomySlug, 'input_id' => $aField['input_id'], 'attributes' => $this->getElement($aField, array('attributes', $sKey), array()) + $aField['attributes'], 'show_post_count' => $aField['show_post_count'], 'show_option_none' => $aField['label_no_term_found'], 'title_li' => $aField['label_list_title'],) + $this->getAsArray($this->getElement($aField, array('queries', $sTaxonomySlug), array()), true) + $aField['query']);
    }
    private function _getSelectedKeyArray($vValue, $sTaxonomySlug) {
        $vValue = ( array )$vValue;
        if (!isset($vValue[$sTaxonomySlug])) {
            return array();
        }
        if (!is_array($vValue[$sTaxonomySlug])) {
            return array();
        }
        return array_keys($vValue[$sTaxonomySlug], true);
    }
    private function _getTaxonomyTab(array $aField, $sKey, $sTaxonomySlug) {
        return "<li class='tab-box-tab'>" . "<a href='#tab_{$aField['input_id']}_{$sKey}'>" . "<span class='tab-box-tab-text'>" . $this->_getLabelFromTaxonomySlug($sTaxonomySlug) . "</span>" . "</a>" . "</li>";
    }
    private function _getLabelFromTaxonomySlug($sTaxonomySlug) {
        $_oTaxonomy = get_taxonomy($sTaxonomySlug);
        return isset($_oTaxonomy->label) ? $_oTaxonomy->label : null;
    }
}