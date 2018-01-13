<?php

function get_all_global_attributes() {
    global $wpdb;
    
    return $wpdb->get_results('SELECT attribute_name FROM '.$wpdb->prefix.'woocommerce_attribute_taxonomies');
}

function get_global_attr_terms($attr) {
    
        global $wpdb;                
        $sql = "SELECT *
                FROM `" . $wpdb->prefix . "woocommerce_termmeta` AS wt
                LEFT JOIN `" . $wpdb->prefix . "terms` AS t ON (wt.woocommerce_term_id = t.term_id) 
                where wt.meta_key LIKE '%" . $attr . "'
               ";                   
        //print_r($sql);
        $res = $wpdb->get_results($sql);
        return $res;
        //print_r($res);exit;
        
}

?>
