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
 * Creates a root menu page.
 * 
 * @package     AdminPageFramework
 * @subpackage  Example
 */
class APF_Demo extends AdminPageFramework {

    /**
     * Constructor.
     */
    public function start() {
                
        /**
         * ( optional ) Pointer tool boxes
         */            
        new AdminPageFramework_PointerToolTip(
            array( 
                // screen ids
                'plugins', 
                'index.php', 
                'admin.php',
                'edit.php?post_type=apf_posts',
                
                // page slugs below
                'apfl_addons',
                'apfl_contact',
                'apf_first_page',
                'apf_second_page',
                'apfl_tools',   
            ),     
            'apf_demo_pointer_tool_box', // unique id for the pointer tool box
            array(    // pointer data
                'target'    => array(
                    '#menu-posts-apf_posts > a',
                    // '#button-deactivate-demo', // multiple targets can be set with an array
                ), 
                'options'   => array(
                    'content' => sprintf( '<h3> %1$s </h3> <p> %2$s </p>',
                        __( 'Admin Page Framework Demo' ,'admin-page-framework-loader '),
                        __( 'Check out the functionality of Admin Page Framework.','admin-page-framework-loader' )
                    ),
                    'position'  => array( 'edge' => 'left', 'align' => 'middle' )
                )
            )
        );
        
    }

    /**
     * Sets up pages.
     * 
     * ( Required ) In this `setUp()` method, you will define admin pages.
     */
    public function setUp() { 

        /* ( optional ) this can be set via the constructor. For available values, see https://codex.wordpress.org/Roles_and_Capabilities */
        $this->setCapability( 'read' );
        
        /* ( required ) Set the root page */
        $this->setRootMenuPageBySlug( 'edit.php?post_type=' . AdminPageFrameworkLoader_Registry::$aPostTypes['demo'] );
                                                    
        /*
         * ( optional ) Add links in the plugin listing table. ( .../wp-admin/plugins.php )
         */
        /* 
        $this->addLinkToPluginDescription( 
            "<a href='http://en.michaeluno.jp/donate'>Donate</a>",
            "<a href='https://github.com/michaeluno/admin-page-framework' title='Contribute to the GitHub repository!' >Repository</a>"
        );
        $this->addLinkToPluginTitle(
            "<a href='http://en.michaeluno.jp'>miunosoft</a>"
        );
        */
       
        // Disable the action link in the plugin listing table.
        $this->setPluginSettingsLinkLabel( '' );    
        // $this->setPluginSettingsLinkLabel( __( 'Built-in Field Types', 'admin-page-framework-loader' ) );
        
        // Add pages    
        new APF_Demo_BuiltinFieldType( $this );
        new APF_Demo_AdvancedUsage( $this );
        new APF_Demo_CustomFieldType( $this );
 
        new APF_Demo_HiddenPage;
        new APF_Demo_Contact;
 
        // Add an external link.
        $this->addSubMenuItem(
            array(
                'href'  => 'http://admin-page-framework.michaeluno.jp/en/v3/package-AdminPageFramework.AdminPage.html',
                'title' => __( 'Documentation', 'admin-page-framework-loader' ),
            )
        );
        
    }
    
    /**
     * The pre-defined callback method triggered when one of the added pages loads
     * 
     * @callback        action      load_{instantiated class name}
     */
    public function load_APF_Demo( $oAdminPage ) { 
    
        /* ( optional ) Determine the page style */
        $this->setPageHeadingTabsVisibility( false ); // disables the page heading tabs by passing false.
        $this->setInPageTabTag( 'h2' ); // sets the tag used for in-page tabs     
    
    }
          
    /*
     * Built-in Field Types Page
     * 
     * @callback        action      do_{page slug}
     * */
    public function do_apf_builtin_field_types() { 
    
        if ( isset( $_GET[ 'tab' ] ) && 'system' === $_GET[ 'tab' ] ) {
            return;
        }
        submit_button();
        
    }
        
    /**
     * Modifies the left footer text.
     * 
     * @callback        filter      footer_left_{class name}
     */
    public function footer_left_APF_DEMO( $sHTML ) {
        return "<span>" . sprintf(
                    __( 'Custom text inserted with the <code>%1$s</code> filter.', 'admin-page-framework-loader' ),
                    'footer_left_{class name}'
                ) 
            . "</span><br />" 
            . $sHTML;
    }
    /**
     * Modifies the left footer text.
     * 
     * @callback        filter      footer_left_{class name}
     */
    public function footer_right_APF_DEMO( $sHTML ) {
        return "<span>" . sprintf(
                    __( 'Inserted with the <code>%1$s</code> filter.', 'admin-page-framework-loader' ),
                    'footer_right_{class name}'
                ) 
            . "</span><br />" 
            . $sHTML;
    }    
    
    /**
     * Modifies the left footer text.
     * 
     * @callback        filter      footer_left_{class name}
     */
    public function footer_left_apf_builtin_field_types( $sHTML ) {
        return "<span>" . sprintf(
                    __( 'inserted with the <code>%1$s</code> filter.', 'admin-page-framework-loader' ),
                    'footer_left_{page slug}'
                ) 
            . "</span><br />" 
            . $sHTML;
    }
    /**
     * Modifies the right footer text.
     * 
     * @callback        filter      footer_right_{class name}
     */
    public function footer_right_apf_builtin_field_types( $sHTML ) {
        return "<span>" . sprintf(
                    __( 'Inserted with the <code>%1$s</code> filter.', 'admin-page-framework-loader' ),
                    'footer_right_{page slug}'
                ) 
            . "</span><br />" 
            . $sHTML;
    }
        
}

// Add pages and forms in the custom post type root page
new APF_Demo( 
    null,                       // the option key - when null is passed the class name in this case 'APF_Demo' will be used
    AdminPageFrameworkLoader_Registry::$sFilePath,               // the caller script path.
    'manage_options',           // the default capability
    'admin-page-framework-loader' // the text domain
);