<?php

/*
  Plugin Name: WooBulk Plugin
  Plugin URI: http://www.therssoftware.com/wp-plugins/Woo-Bulk
  Description: A plugings for WooCommerce product bulk edit
  Author: Hasan Ahmed Khan
  Version: 1.0
  Author URI: 
 */
//RS_BRAS_
define('RS_BRAS_Name', 'RS Birth Astrology');
define('RS_BRAS_Folder', 'rs_birth_astrology');
define('RS_BRAS_short', 'rs_birth_astrology');
define('RS_BRAS_DB', 'rs_birth_astrology_entries');
define('RS_BRAS_DB_AT', 'rs_birth_astrology_access_tracker');
define('RS_BRAS_short_plugins', RS_BRAS_short . '_plugins');

define('RS_BRAS_VERSION', '1.0.0');

if (!defined('RS_BRAS_PLUGIN_BASENAME'))
    define('RS_BRAS_PLUGIN_BASENAME', plugin_basename(__FILE__));

if (!defined('RS_BRAS_PLUGIN_NAME'))
    define('RS_BRAS_PLUGIN_NAME', trim(dirname(RS_BRAS_PLUGIN_BASENAME), '/'));

if (!defined('RS_BRAS_PLUGIN_DIR'))
    define('RS_BRAS_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . RS_BRAS_PLUGIN_NAME);

if (!defined('RS_BRAS_PLUGIN_URL'))
    define('RS_BRAS_PLUGIN_URL', WP_PLUGIN_URL . '/' . RS_BRAS_PLUGIN_NAME);

include_once(RS_BRAS_PLUGIN_DIR . '/include/functions.php');
include_once(RS_BRAS_PLUGIN_DIR . '/include/model/db_functions.php');
include_once(RS_BRAS_PLUGIN_DIR . '/include/woo_bulk_functions.php');
include_once(RS_BRAS_PLUGIN_DIR . '/include/shortcode.php');

include_once(RS_BRAS_PLUGIN_DIR . '/admin_page.php');
include_once(RS_BRAS_PLUGIN_DIR . '/admin_entry_list.php');
include_once(RS_BRAS_PLUGIN_DIR . '/sp_plugin.php');

add_action('admin_init', 'rs_datatable');
add_action( 'wp_enqueue_scripts', 'rs_datatable');


function rs_datatable() {  

    wp_register_script('datatable_script',plugins_url( '/assets/js/datatable/jquery.dataTables.js' , __FILE__ ), array( 'jquery' ),'',true);
    wp_enqueue_script( 'datatable_script' );

    wp_register_style('datatable_css', plugins_url( '/assets/js/datatable/jquery.dataTables.css' , __FILE__ ));
    wp_enqueue_style('datatable_css');  
    
    wp_register_style('font_awesome_css', plugins_url( '/assets/css/font-awesome/css/font-awesome.min.css' , __FILE__ ));
    wp_enqueue_style('font_awesome_css');
    
    wp_register_script('bootstrap_script',plugins_url( '/assets/js/bootstrap/bootstrap.min.js' , __FILE__ ), array( 'jquery' ),'',true);
    wp_enqueue_script( 'bootstrap_script' );
    
    wp_register_style('bootstrap_css', plugins_url( '/assets/css/bootstrap/bootstrap.min.css' , __FILE__ ));
    wp_enqueue_style('bootstrap_css');
    
    wp_register_style('custom_css', plugins_url( '/assets/css/custom/woo_bulk.css' , __FILE__ ));
    wp_enqueue_style('custom_css');
    
    wp_register_script('select2_script',plugins_url( '/assets/js/select2/js/select2.min.js' , __FILE__ ), array( 'jquery' ),'',true);
    wp_enqueue_script( 'select2_script' );
    
    wp_register_style('select2_css', plugins_url( '/assets/js/select2/css/select2.min.css' , __FILE__ ));
    wp_enqueue_style('select2_css');

    wp_register_script('my_voter_script',plugins_url( '/assets/js/custom-js/wb_filter_section.js' , __FILE__ ));   
    wp_localize_script( 'my_voter_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
    wp_enqueue_script( 'my_voter_script' );
    
    wp_register_script('wb_edit_section_script',plugins_url( '/assets/js/custom-js/wb_edit_section.js' , __FILE__ ));   
    wp_localize_script( 'wb_edit_section_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
    wp_enqueue_script( 'wb_edit_section_script' );

}

add_action("wp_ajax_pincode_check", "pincode_check");
add_action("wp_ajax_nopriv_pincode_check", "pincode_check");

function pincode_check() {

	
	$attr = $_REQUEST["attr"];
        
        $r = get_global_attr_terms($attr);
        
        if($r){
            foreach($r as $row){
                $options[$row->name] = $row->name;
            } 

        } else {
            $options['No attributes found, please add some first'] = 'No attributes found, please add some first';
        }
        
        $options = json_encode($options);
        echo $options;
        die();
        

}

add_action("wp_ajax_get_attr_terms", "get_attr_terms");
add_action("wp_ajax_nopriv_get_attr_terms", "get_attr_terms");

function get_attr_terms() {

	
	$attr = $_REQUEST["attr"];
        
        $r = get_global_attr_terms($attr);
        
        
        if($r){
            foreach($r as $row){
                $options[$row->name] = $row->name;
            } 
            include_once(RS_BRAS_PLUGIN_DIR . '/include/view/select2.php'); 
            exit;
        } else {
            $option = 'No attributes found, please add some first';
            include_once(RS_BRAS_PLUGIN_DIR . '/include/view/select2.php'); 
            exit;
        }
        

        

}

add_action("wp_ajax_get_product_category", "get_product_category");
add_action("wp_ajax_nopriv_get_product_category", "get_product_category");

function get_product_category() {
    
        
        $catargs = array(
                'type'                     => 'post',
                'child_of'                 => 0,
                'parent'                   => '',
                'orderby'                  => 'name',
                'order'                    => 'ASC',
                'hide_empty'               => 0,
                'hierarchical'             => 1,
                'exclude'                  => '',
                'include'                  => '',
                'number'                   => '',
                'taxonomy'                 => 'product_cat',
                'pad_counts'               => false 

        ); 

        $categories = get_categories( $catargs );
        //print_r($categories);exit;
        
        foreach($categories as $row){
            $options[$row->name] = $row->name;
        } 
        //print_r($options);exit;
        $options = json_encode($options);
        echo $options;
        die();

}

add_action("wp_ajax_get_product_tag", "get_product_tag");
add_action("wp_ajax_nopriv_get_product_tag", "get_product_tag");

function get_product_tag() {
    
        $catargs = array(
                'type'                     => 'post',
                'child_of'                 => 0,
                'parent'                   => '',
                'orderby'                  => 'name',
                'order'                    => 'ASC',
                'hide_empty'               => 0,
                'hierarchical'             => 1,
                'exclude'                  => '',
                'include'                  => '',
                'number'                   => '',
                'taxonomy'                 => 'product_tag',
                'pad_counts'               => false 

        ); 

        $categories = get_categories( $catargs );
        //print_r($categories);exit;
        
        foreach($categories as $row){
            $options[$row->name] = $row->name;
        } 
        //print_r($options);exit;
        $options = json_encode($options);
        echo $options;
        die();

}

add_action("wp_ajax_get_product_tag", "get_product_tag");
add_action("wp_ajax_nopriv_get_product_tag", "get_product_tag");

function get_product_type() {
    
        $catargs = array(
                'type'                     => 'post',
                'child_of'                 => 0,
                'parent'                   => '',
                'orderby'                  => 'name',
                'order'                    => 'ASC',
                'hide_empty'               => 0,
                'hierarchical'             => 1,
                'exclude'                  => '',
                'include'                  => '',
                'number'                   => '',
                'taxonomy'                 => 'product_type',
                'pad_counts'               => false 

        ); 

        $categories = get_categories( $catargs );
        //print_r($categories);exit;
        
        foreach($categories as $row){
            $options[$row->name] = $row->name;
        } 
        //print_r($options);exit;
        $options = json_encode($options);
        echo $options;
        die();

}


add_action("wp_ajax_get_shipping_class", "get_shipping_class");
add_action("wp_ajax_nopriv_get_shipping_class", "get_shipping_class");

function get_shipping_class() {
    
        $catargs = array(
                'type'                     => 'post',
                'child_of'                 => 0,
                'parent'                   => '',
                'orderby'                  => 'name',
                'order'                    => 'ASC',
                'hide_empty'               => 0,
                'hierarchical'             => 1,
                'exclude'                  => '',
                'include'                  => '',
                'number'                   => '',
                'taxonomy'                 => 'product_shipping_class',
                'pad_counts'               => false 

        ); 

        $categories = get_categories( $catargs );
        //print_r($categories);exit;
        
        foreach($categories as $row){
            $options[$row->name] = $row->name;
        } 
        //print_r($options);exit;
        $options = json_encode($options);
        echo $options;
        die();

}










?>