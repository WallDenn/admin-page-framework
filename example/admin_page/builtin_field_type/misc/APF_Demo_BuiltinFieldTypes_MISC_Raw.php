<?php
/**
 * Admin Page Framework - Demo
 * 
 * Demonstrates the usage of Admin Page Framework.
 * 
 * http://en.michaeluno.jp/admin-page-framework/
 * Copyright (c) 2013-2015 Michael Uno; Licensed GPLv2
 * 
 */

/**
 * Adds a section in a tab.
 * 
 * @package     AdminPageFramework
 * @subpackage  Example
 */
class APF_Demo_BuiltinFieldTypes_MISC_Raw {
    
    /**
     * The page slug to add the tab and form elements.
     */
    public $sPageSlug   = 'apf_builtin_field_types';
    
    /**
     * The tab slug to add to the page.
     */
    public $sTabSlug    = 'misc';
    
    /**
     * The section slug to add to the tab.
     */
    public $sSectionID  = 'raw_html';        
        
    /**
     * Sets up a form section.
     */
    public function __construct( $oFactory ) {
    
        // Section
        $oFactory->addSettingSections(    
            $this->sPageSlug, // the target page slug                
            array(
                'tab_slug'          => $this->sTabSlug,
                'section_id'        => $this->sSectionID,
                'title'             => __( 'Custom HTML Output', 'admin-page-framework-loader' ),
                'description'       => __( 'You can insert custom HTML output along with the field output.', 'admin-page-framework-loader' ),
            )
        );   

        // Fields
        $oFactory->addSettingFields(
            $this->sSectionID, // the target section ID        
            array(
                'field_id'          => 'raw_html_example',
                'title'             => __( 'Raw HTML', 'admin-page-framework-loader' ),
                'type'              => 'my_custom_made_up_non_exisitng_field_type',
                'before_field'      => "<p>This is a custom output inserted with the <code>before_field</code> argument.</p>",
                'after_field'       => "<p>This is a custom output inserted with the <code>after_field</code> argument.</p>",
            )
        );              
      
    }

}