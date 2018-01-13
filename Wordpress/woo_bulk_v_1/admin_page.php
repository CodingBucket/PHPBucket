<?php


function register_my_custom_submenu_page() {
    add_submenu_page( 'edit.php?post_type=product', 'Woo Bulk Editor', 'Woo Bulk Editor', 'manage_options', 'woo_bulk_editor', 'woo_bulk_editor' ); 
}
add_action('admin_menu', 'register_my_custom_submenu_page',99);


add_action('admin_menu', RS_BRAS_short_plugins . '_menu');

if (!function_exists('rs_birth_astrology_plugins_menu')) {

    function rs_birth_astrology_plugins_menu() {
        //add_menu_page('WooBulkEditor', 'WooBulkEditor', 'administrator', 'woo_bulk_editor', 'woo_bulk_editor','');

    }

}


function woo_bulk_editor() {
    
    ?>
    <div class='wrap'>
        <div class="icon32" style="background-image: url('<?php echo RS_BRAS_PLUGIN_URL; ?>/img/rsbras_icon-32.png');"></div>
        <h2>Woo Bulk Editor</h2>
        <br/>
        
        <?php if ($success == 1) { rsbras_updated_notification($success_txt); }  ?>

<div id="icon-themes" class="icon32"><br></div>

<h2></h2>



<div class="settingContent">

<?php 
   if(isset($msg) && $msg!=''):
   echo '<div class="rs_success">'.$msg.'</div>';
   endif;
?>
    
        <?php        
            if('filter' == $_REQUEST['action']){
                
                    //echo '<pre>';
                    //print_r($_REQUEST);
                    //echo '</pre>';
                    //exit;

                // Filter section
                add_filter( 'posts_where', 'wpse18703_posts_where', 10, 2 );
                function wpse18703_posts_where( $where, &$wp_query ){   
                    
                    global $wpdb;
                    
                   
                    if($wp_query->query['post_type'] == 'product'){
                       
                        // Drop1 Name multi
                        if(isset($_REQUEST['filter_type']) && $_REQUEST['filter_value'] != NULL){
                            foreach($_REQUEST['filter_type'] as $k=>$v){
                                
                                // Processing multiple input
                                $multi_value = explode(',', $_REQUEST['filter_value'][$k]);
                                $i = 0;
                                foreach($multi_value as $key=>$val){
                                    $i++;
                                    if($i == 1){
                                        
                                        if ( $v == 'starts_with' && $val ) {
                                            
                                                $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                        } elseif ( $v == 'ends_with'  && $val ) {
                                            
                                                $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql(  $val  ) . '\'';   

                                        } elseif ( $v == 'contains' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'does_not_contain'  && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_title NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        } elseif ( $v == 'is_empty' ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'\'';

                                        } elseif ( $v == 'is_not_empty' ) {
                                                $where .= ' AND ' . $wpdb->posts . '.post_title NOT LIKE \' \' ';                            
                                        }else{
                                           
                                        }
                                        
                                    } else {
                                        
                                         if ( $v == 'starts_with' && $val ) {
                                            
                                                $where .= ' OR ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                        } elseif ( $v == 'ends_with'  && $val ) {
                                            
                                                $where .= ' OR ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql(  $val  ) . '\'';   

                                        } elseif ( $v == 'contains' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'does_not_contain'  && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_title NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        } elseif ( $v == 'is_empty' && $val) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'is_not_empty' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_title NOT LIKE \'%' . esc_sql( $val ) . '%\'';                            

                                        }else{
                                            
                                        }
                                        
                                    }
                                    
                                    
                                }

                            }                           
                        }

                        // Drop4 sku multi
                        if(isset($_REQUEST['filter_type_sku']) && $_REQUEST['filter_type_sku'] != NULL){

                            foreach($_REQUEST['filter_type_sku'] as $k=>$v){
                                
                                // Processing multiple input
                                $multi_value = explode(',', $_REQUEST['filter_value_sku'][$k]);
                                $i = 0;
                                foreach($multi_value as $key=>$val){
                                    if($val != NULL){
                                        $i++;
                                        if($i == 1){

                                            if ( $v == 'sku_starts_with' && $val != NULL ) {

                                                $where .= ' AND wp_postmeta.meta_value LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                            } elseif ( $v == 'sku_ends_with' && $val != NULL ) {

                                                $where .= ' AND wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '\'';                              

                                            }  elseif ( $v == 'sku_contains' && $val != NULL ) {

                                                $where .= ' AND wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            }  elseif ( $v == 'sku_does_not_contain' && $val != NULL ) {

                                                $where .= ' AND wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            }  elseif ( $v == 'sku_is_empty' && $val != NULL ) {

                                                $where .= ' AND wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            }  elseif ( $v == 'sku_is_not_empty' && $val != NULL ) {

                                                $where .= ' AND wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            } else {

                                            }

                                        } else {

                                            if ( $v == 'sku_starts_with' && $val != NULL ) {

                                                $where .= ' OR wp_postmeta.meta_value LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                            } elseif ( $v == 'sku_ends_with' && $val != NULL ) {

                                                $where .= ' OR wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '\'';                              

                                            }  elseif ( $v == 'sku_contains' && $val != NULL ) {

                                                $where .= ' OR wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            }  elseif ( $v == 'sku_does_not_contain' && $val != NULL ) {

                                                $where .= ' OR wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            }  elseif ( $v == 'sku_is_empty' && $val != NULL ) {

                                                $where .= ' OR wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            }  elseif ( $v == 'sku_is_not_empty' && $val != NULL ) {

                                                $where .= ' OR wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                            } else {

                                            }

                                        }
                                    }

                                }
                            }

                        }

                        // Drop5 Long des multi
                        if(isset($_REQUEST['filter_type_long_des']) && $_REQUEST['filter_type_long_des'] != NULL){

                            foreach($_REQUEST['filter_type_long_des'] as $k=>$v){
                                
                                // Processing multiple input
                                $multi_value = explode(',', $_REQUEST['filter_value_long_des'][$k]);
                                $i = 0;
                                foreach($multi_value as $key=>$val){
                                    $i++;
                                    if($i == 1){

                                        if ( $v == 'long_des_starts_with' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_content LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                        } elseif ( $v == 'long_des_ends_with'  && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_content LIKE \'%' . esc_sql(  $val  ) . '\'';   

                                        } elseif ( $v == 'long_des_contains' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_content LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'long_des_does_not_contain'  && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_content NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        } elseif ( $v == 'long_des_is_empty') {

                                                //$where .= ' AND ' . $wpdb->posts . '.post_content LIKE \'%' . esc_sql( $val ) . '%\'';
                                                $where .= ' AND ' . $wpdb->posts . '.post_content LIKE \'\'';
                                            
                                        } elseif ( $v == 'long_des_is_not_empty') {

                                                //$where .= ' AND ' . $wpdb->posts . '.post_content NOT LIKE \'%' . esc_sql( $val ) . '%\'';                            
                                                $where .= ' AND ' . $wpdb->posts . '.post_content NOT LIKE \'\''; 
                                            
                                        }else{
                                           
                                        }  
                                        
                                    } else{
                                        
                                    }
                                    
                                }

                            }
                        }

                        // Drop6 Short des multi
                        if(isset($_REQUEST['filter_type_short_des']) && $_REQUEST['filter_type_short_des'] != NULL){

                            foreach($_REQUEST['filter_type_short_des'] as $k=>$v){
                                
                                // Processing multiple input
                                $multi_value = explode(',', $_REQUEST['filter_value_short_des'][$k]);
                                $i = 0;
                                foreach($multi_value as $key=>$val){
                                    $i++;
                                    if($i == 1){

                                        if ( $v == 'short_des_starts_with' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_excerpt LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                        } elseif ( $v == 'short_des_ends_with'  && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_excerpt LIKE \'%' . esc_sql(  $val  ) . '\'';   

                                        } elseif ( $v == 'short_des_contains' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_excerpt LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'short_des_does_not_contain'  && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.post_excerpt NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        } elseif ( $v == 'short_des_is_empty') {

                                                //$where .= ' AND ' . $wpdb->posts . '.post_excerpt LIKE \'%' . esc_sql( $val ) . '%\'';
                                                $where .= ' AND ' . $wpdb->posts . '.post_excerpt LIKE \'\'';
                                            
                                        } elseif ( $v == 'short_des_is_not_empty') {

                                                //$where .= ' AND ' . $wpdb->posts . '.post_excerpt NOT LIKE \'%' . esc_sql( $wpdb->esc_like( $val ) ) . '%\'';                            
                                                $where .= ' AND ' . $wpdb->posts . '.post_excerpt NOT LIKE \'\'';
                                                
                                        }else{
                              
                                        }   
                                        
                                    } else {
                                        
                                        if ( $v == 'short_des_starts_with' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_excerpt LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                        } elseif ( $v == 'short_des_ends_with'  && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_excerpt LIKE \'%' . esc_sql(  $val  ) . '\'';   

                                        } elseif ( $v == 'short_des_contains' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_excerpt LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'short_des_does_not_contain'  && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_excerpt NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        } elseif ( $v == 'short_des_is_empty' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_excerpt LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'short_des_is_not_empty' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.post_excerpt NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        }else{
                              
                                        }  
                                        
                                    }
                                }    
                            }
                        }

                        // Drop7 ids  
                        if(isset($_REQUEST['filter_type_ids']) && $_REQUEST['filter_type_ids'] != NULL){

                            foreach($_REQUEST['filter_type_ids'] as $k=>$v){
                                
                                // Processing multiple input
                                $multi_value = explode(',', $_REQUEST['filter_value_ids'][$k]);
                                $i = 0;
                                foreach($multi_value as $key=>$val){
                                    $i++;
                                    if($i == 1){

                                        if ( $v == 'ids_starts_with' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.ID LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                        } elseif ( $v == 'ids_ends_with'  && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.ID LIKE \'%' . esc_sql(  $val  ) . '\'';   

                                        } elseif ( $v == 'ids_contains' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.ID LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'ids_does_not_contain'  && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.ID NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        } elseif ( $v == 'ids_is_empty' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.ID LIKE \'%' . esc_sql( $val  ) . '%\'';

                                        } elseif ( $v == 'ids_is_not_empty' && $val ) {

                                                $where .= ' AND ' . $wpdb->posts . '.ID NOT LIKE \'%' . esc_sql( $wpdb->esc_like( $val ) ) . '%\'';                            

                                        }else{

                                        } 
                                        
                                    } else {
                                        
                                        if ( $v == 'ids_starts_with' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.ID LIKE \'' . esc_sql( $val  ) . '%\'';                              

                                        } elseif ( $v == 'ids_ends_with'  && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.ID LIKE \'%' . esc_sql(  $val  ) . '\'';   

                                        } elseif ( $v == 'ids_contains' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.ID LIKE \'%' . esc_sql( $val ) . '%\'';

                                        } elseif ( $v == 'ids_does_not_contain'  && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.ID NOT LIKE \'%' . esc_sql(  $val  ) . '%\'';                            

                                        } elseif ( $v == 'ids_is_empty' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.ID LIKE \'%' . esc_sql( $val  ) . '%\'';

                                        } elseif ( $v == 'ids_is_not_empty' && $val ) {

                                                $where .= ' OR ' . $wpdb->posts . '.ID NOT LIKE \'%' . esc_sql( $wpdb->esc_like( $val ) ) . '%\'';                            

                                        }else{

                                        }
                                        
                                    }
                                    
                                }    
                            }
                        }

                        // Drop10 purchase note multi
                        if(isset($_REQUEST['filter_type_purchase_note']) && $_REQUEST['filter_type_purchase_note'] != NULL){

                            foreach($_REQUEST['filter_type_purchase_note'] as $k=>$v){
                                
                                // Processing multiple input
                                $multi_value = explode(',', $_REQUEST['filter_value_purchase_note'][$k]);
                                $i = 0;
                                foreach($multi_value as $key=>$val){
                                    $i++;
                                    if($i == 1){
                                 
                                        if ( $v == 'purchase_note_starts_with' && $val != NULL ) {

                                            $where .= ' AND wp_postmeta.meta_value LIKE \'' . esc_sql( $val ) . '%\'';                              

                                        } elseif ( $v == 'purchase_note_ends_with' && $val != NULL ) {

                                            $where .= ' AND wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '\'';                              

                                        }  elseif ( $v == 'purchase_note_contains' && $val != NULL ) {

                                            $where .= ' AND wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                        }  elseif ( $v == 'purchase_note_does_not_contain' && $val != NULL ) {

                                            $where .= ' AND wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                        }  elseif ( $v == 'purchase_note_is_empty') {

                                            //$where .= ' AND wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';
                                            $where .= ' AND wp_postmeta.meta_value LIKE \'\'';

                                        }  elseif ( $v == 'purchase_note_is_not_empty') {

                                            //$where .= ' AND wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val ) . '%\'';
                                            $where .= ' AND wp_postmeta.meta_value NOT LIKE \'\'';

                                        } else {

                                        }
                                        
                                    } else {
                                        
                                        if ( $v == 'purchase_note_starts_with' && $val != NULL ) {

                                            $where .= ' OR wp_postmeta.meta_value LIKE \'' . esc_sql( $val ) . '%\'';                              

                                        } elseif ( $v == 'sku_ends_with' && $val != NULL ) {

                                            $where .= ' OR wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '\'';                              

                                        }  elseif ( $v == 'sku_contains' && $val != NULL ) {

                                            $where .= ' OR wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                        }  elseif ( $v == 'sku_does_not_contain' && $val != NULL ) {

                                            $where .= ' OR wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                        }  elseif ( $v == 'sku_is_empty' && $val != NULL ) {

                                            $where .= ' OR wp_postmeta.meta_value LIKE \'%' . esc_sql( $val  ) . '%\'';                              

                                        }  elseif ( $v == 'sku_is_not_empty' && $val != NULL ) {

                                            $where .= ' OR wp_postmeta.meta_value NOT LIKE \'%' . esc_sql( $val ) . '%\'';                              

                                        } else {

                                        } 
                                        
                                    }
                                }    
                            }
                         
                        }
                        
                        //echo $where;
                        return $where;
                        
                    }
                    

                }
                
                // Drop2 Price
                if(isset($_REQUEST['filter_type_price']) && $_REQUEST['filter_type_price'] != NULL){
                    
                    foreach($_REQUEST['filter_type_price'] as $k=>$v){
                        
                        if ( $v == 'price_smaller_than' && $_REQUEST['filter_value_price'][$k] != NULL ) {
                            
                                $f[] = array(
                                              'key' => '_price',                                              
                                              'value' => $_REQUEST['filter_value_price'][$k], 
                                              'type' => 'NUMERIC',
                                              'compare' => '<',                                               
                                            );
                                       
                        } elseif ($v == 'price_grater_then' && $_REQUEST['filter_value_price'][$k] != NULL) {
                            
                                $f[] = array(
                                              'key' => '_price',                                              
                                              'value' => $_REQUEST['filter_value_price'][$k], 
                                              'type' => 'NUMERIC',
                                              'compare' => '>',                                               
                                            );
                        } elseif ($v == 'price_is_between' && $_REQUEST['filter_value_price'][$k] != NULL && $_REQUEST['filter_value_second'][$k] != NULL) {
                                
                                $f[] = array(
                                              'key' => '_price',                                              
                                              'value' => array($_REQUEST['filter_value_price'][$k],$_REQUEST['filter_value_second'][$k]),                                               
                                              'type' => 'NUMERIC',
                                              'compare' => 'BETWEEN',                                              
                                            );
                        } elseif ($v == 'price_is_empty') {
                            
                                $f[] = array(
                                              'key' => '_price',                                              
                                              'value' => '', 
                                              'type' => 'NUMERIC',
                                              'compare' => '=',                                               
                                            );
                        } elseif ($v == 'price_is_not_empty') {
                            
                                $f[] = array(
                                              'key' => '_price',                                              
                                              'value' => '',      
                                              'type' => 'NUMERIC',
                                              'compare' => '!=',                                               
                                            );
                        } else {
                            
                        }
                    }
                    
                }

                // Drop3 Sale Price
                if(isset($_REQUEST['filter_type_sale_price']) && $_REQUEST['filter_type_sale_price'] != NULL){
                    
                    foreach($_REQUEST['filter_type_sale_price'] as $k=>$v){
                        
                        if ( $v == 'sale_price_smaller_than' && $_REQUEST['filter_value_sale_price'][$k] != NULL ) {
                                $f[] = array(
                                              'key' => '_sale_price',                                             
                                              'value' => $_REQUEST['filter_value_sale_price'][$k],    
                                              'type' => 'NUMERIC',
                                              'compare' => '<',                                               
                                            );
                                       
                        } elseif ($v == 'sale_price_grater_then' && $_REQUEST['filter_value_sale_price'][$k] != NULL) {
                                $f[] = array(
                                              'key' => '_sale_price',                                              
                                              'value' => $_REQUEST['filter_value_sale_price'][$k],   
                                              'type' => 'NUMERIC',
                                              'compare' => '>',                                               
                                            );
                        } elseif ($v == 'sale_price_is_between' && $_REQUEST['filter_value_sale_price'][$k] != NULL && $_REQUEST['filter_value_second'][$k] != NULL) {
                                
                                $f[] = array(
                                              'key' => '_sale_price',                                             
                                              'value' => array($_REQUEST['filter_value_sale_price'][$k],$_REQUEST['filter_value_second'][$k]),                                                           
                                              'type' => 'NUMERIC',
                                              'compare' => 'BETWEEN',                                               
                                            );
                        } elseif ($v == 'sale_price_is_empty') {
                                $f[] = array(
                                              'key' => '_sale_price',                                             
                                              'value' => '',   
                                              'type' => 'NUMERIC',
                                              'compare' => '=',                                              
                                            );
                        } elseif ($v == 'sale_price_is_not_empty') {
                                $f[] = array(
                                              'key' => '_sale_price',                                              
                                              'value' => '',    
                                              'type' => 'NUMERIC',
                                              'compare' => '!=',                                               
                                            );
                        } else {
                            
                        }
                    }
                    
                }
                
                // Drop4 sku 
                if(isset($_REQUEST['filter_type_sku']) && $_REQUEST['filter_type_sku'][0] != NULL){
                    
                    do {
                        $f[] = array(
                          'key' => '_sku',  
                          'type' => 'NUMERIC',
                        );
                        $x = 0;
                        $x++;
                    } while ($x < 1);

                }
                
                // Drop8 Weight
                if(isset($_REQUEST['filter_type_weight']) && $_REQUEST['filter_type_weight'] != NULL){
                    
                    foreach($_REQUEST['filter_type_weight'] as $k=>$v){
                         
                        if ( $v == 'weight_smaller_than' && $_REQUEST['filter_value_weight'][$k] != NULL ) {
                                $f[] = array(
                                              'key' => '_weight',                                              
                                              'value' => $_REQUEST['filter_value_weight'][$k], 
                                              'type' => 'NUMERIC',
                                              'compare' => '<',                                               
                                            );
                                       
                        } elseif ($v == 'weight_grater_then' && $_REQUEST['filter_value_weight'][$k] != NULL) {
                                $f[] = array(
                                              'key' => '_weight',                                              
                                              'value' => $_REQUEST['filter_value_weight'][$k], 
                                              'type' => 'NUMERIC',
                                              'compare' => '>',                                               
                                            );
                        } elseif ($v == 'weight_is_between' && $_REQUEST['filter_value_weight'][$k] != NULL) {
                             
                                $f[] = array(
                                              'key' => '_weight',                                              
                                              'value' => array($_REQUEST['filter_value_weight'][$k],$_REQUEST['filter_value_second'][$k]),                
                                              'type' => 'NUMERIC',
                                              'compare' => 'BETWEEN',                                               
                                            );
                        } elseif ($v == 'weight_is_empty') {
                                $f[] = array(
                                              'key' => '_weight',                                             
                                              'value' => '',  
                                              'type' => 'NUMERIC',
                                              'compare' => '=',                                               
                                            );
                        } elseif ($v == 'weight_is_not_empty') {
                                $f[] = array(
                                              'key' => '_weight',                                             
                                              'value' => '',  
                                              'type' => 'NUMERIC',
                                              'compare' => '!=',                                               
                                            );
                        } else {
                            
                        }
                    }
                    
                }

                // Drop9 Stock 
                if(isset($_REQUEST['filter_type_stock']) && $_REQUEST['filter_type_stock'] != NULL){
                   
                    foreach($_REQUEST['filter_type_stock'] as $k=>$v){
                        
                        if ( $v == 'stock_smaller_than' && $_REQUEST['filter_value_stock'][$k] != NULL ) {
                                $f[] = array(
                                              'key' => '_stock',                                              
                                              'value' => $_REQUEST['filter_value_stock'][$k],  
                                              'type' => 'NUMERIC',
                                              'compare' => '<',                                              
                                            );
                                       
                        } elseif ($v == 'stock_grater_then' && $_REQUEST['filter_value_stock'][$k] != NULL) {
                                $f[] = array(
                                              'key' => '_stock',                                              
                                              'value' => $_REQUEST['filter_value_stock'][$k],                 
                                              'type' => 'NUMERIC',
                                              'compare' => '>',                                               
                                            );
                        } elseif ($v == 'stock_is_between' && $_REQUEST['filter_value_stock'][$k] != NULL && $_REQUEST['filter_value_second'][$k] != NULL) {
                                
                                $f[] = array(
                                              'key' => '_stock',                                              
                                              'value' => array($_REQUEST['filter_value_stock'][$k],$_REQUEST['filter_value_second'][$k]),                 
                                              'type' => 'NUMERIC',
                                              'compare' => 'BETWEEN',                                              
                                            );
                        } elseif ($v == 'stock_is_empty') {
                                $f[] = array(
                                              'key' => '_stock',                                              
                                              'value' => '', 
                                              'type' => 'NUMERIC',
                                              'compare' => '=',                                               
                                            );
                        } elseif ($v == 'stock_is_not_empty') {
                                $f[] = array(
                                              'key' => '_stock',                                              
                                              'value' => '',  
                                              'type' => 'NUMERIC',
                                              'compare' => '!=',                                               
                                            );
                        } else {
                            
                        }
                    }
                    
                }
                
                // Drop10 Purchase note 
                if(isset($_REQUEST['filter_type_purchase_note']) && $_REQUEST['filter_type_purchase_note'] != NULL){

                    foreach($_REQUEST['filter_type_purchase_note'] as $k=>$v){
                         
                        if ( $v == 'purchase_note_starts_with' && $_REQUEST['filter_value_purchase_note'][$k] != NULL ) {
                                $f[] = array(
                                              'key' => '_purchase_note',        
                                            );
                        } elseif ( $v == 'purchase_note_ends_with' && $_REQUEST['filter_value_purchase_note'][$k] != NULL ) {
                                $f[] = array(
                                              'key' => '_purchase_note',        
                                            );
                        }  elseif ( $v == 'purchase_note_contains' && $_REQUEST['filter_value_purchase_note'][$k] != NULL ) {
                                $f[] = array(
                                              'key' => '_purchase_note',        
                                            );
                        }  elseif ( $v == 'purchase_note_does_not_contain' && $_REQUEST['filter_value_purchase_note'][$k] != NULL ) {
                                $f[] = array(
                                              'key' => '_purchase_note',        
                                            );
                        }  elseif ( $v == 'purchase_note_is_empty') {
                                $f[] = array(
                                              'key' => '_purchase_note',        
                                            );
                        }  elseif ( $v == 'purchase_note_is_not_empty') {
                                $f[] = array(
                                              'key' => '_purchase_note',        
                                            );
                        } else {

                        }
                    }

                }
                
                // Drop11 Status
                if(isset($_REQUEST['filter_type_status']) && $_REQUEST['filter_type_status'] != NULL){
                     
                    foreach($_REQUEST['filter_type_status'] as $k=>$v){

                        if ( $v == 'status_publish' ) {

                                $ps[] = 'publish';                             

                        } elseif ( $v == 'status_pending' ) {

                                $ps[] = 'pending';                               

                        }  elseif ( $v == 'status_draft' ) {

                                $ps[] = 'draft';                               

                        } else {
                                
                        }

                    }
                    
                        //echo '<pre>';
                        //print_r($ps);
                        //echo '</pre>';

                }
                
                // Drop12 Attribute 
                if(isset($_REQUEST['filter_type_attribute']) != NULL && $_REQUEST['filter_value_attribute_terms'] != NULL){

                            $tax_query = array(                     
                                        'relation' => 'AND',                                               
                                    );
                            
                    foreach($_REQUEST['filter_type_attribute'] as $k=>$v){
                         
                        if ( $_REQUEST['filter_value_attribute_terms'][$v] != NULL && $v != NULL) {
                                $f[] = array(
                                              'key' => '_product_attributes',        
                                            );
                                          
                                $tax_query[] = array(
                                                    'taxonomy' => 'pa_'.$v,               
                                                    'field' => 'name',                    
                                                    'terms' => $_REQUEST['filter_value_attribute_terms'][$v] ,    
                                                    'include_children' => true,           
                                                    'operator' => 'IN'                   
                                                  );
                                                             
                        } else {

                        } 
                        
                    }

                }
                
                // Drop13 Dimention 
                if(isset($_REQUEST['filter_type_dimention']) && $_REQUEST['filter_type_dimention'] != NULL){
                    
                    foreach($_REQUEST['filter_type_dimention'] as $k=>$v){
                        
                        if ( $v == 'dimention_width' &&  $_REQUEST['filter_value_dimention'][$k] != NULL ) {
                        
                                if($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_grater_than'){
                                    $f[] = array(
                                                  'key' => '_width',                                              
                                                  'value' => $_REQUEST['filter_value_dimention'][$k],  
                                                  'type' => 'NUMERIC',
                                                  'compare' => '>',                                               
                                                );
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_lower_than'){
                                    $f[] = array(
                                                  'key' => '_width',                                              
                                                  'value' => $_REQUEST['filter_value_dimention'][$k],  
                                                  'type' => 'NUMERIC',
                                                  'compare' => '<',                                               
                                                );  
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_between'){
                                    $f[] = array(
                                                  'key' => '_width',                                              
                                                  'value' => array($_REQUEST['filter_value_dimention'][$k],$_REQUEST['filter_value_second'][$k]),  
                                                  //'type' => 'NUMERIC',
                                                  'compare' => 'BETWEEN',                                               
                                                );  
                                }  elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_empty'){
                                    $f[] = array(
                                                  'key' => '_width',                                              
                                                  'value' => '',  
                                                  //'type' => 'NUMERIC',
                                                  'compare' => 'LIKE',                                               
                                                );  
                                }  elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_not_empty'){
                                    $f[] = array(
                                                  'key' => '_width',                                              
                                                  'value' => '',  
                                                  //'type' => 'NUMERIC',
                                                  'compare' => 'NOT LIKE',                                               
                                                );  
                                } else {
                                    
                                }
                                       
                        } elseif ($v == 'dimention_height' && $_REQUEST['filter_type_dimention_type'][$k] != NULL) {
                               
                                if($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_grater_than'){
                                    $f[] = array(
                                                  'key' => '_height',                                              
                                                  'value' => $_REQUEST['filter_value_dimention'][$k],  
                                                  'type' => 'NUMERIC',
                                                  'compare' => '>',                                               
                                                );
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_lower_than'){
                                    $f[] = array(
                                                  'key' => '_height',                                              
                                                  'value' => $_REQUEST['filter_value_dimention'][$k],  
                                                  'type' => 'NUMERIC',
                                                  'compare' => '<',                                               
                                                );  
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_between'){
                                    $f[] = array(
                                                  'key' => '_height',                                              
                                                  'value' => array($_REQUEST['filter_value_dimention'][$k],$_REQUEST['filter_value_second'][$k]),  
                                                  'compare' => 'BETWEEN',                                               
                                                );  
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_empty'){
                                    $f[] = array(
                                                  'key' => '_height',                                              
                                                  'value' => '',  
                                                  'compare' => 'LIKE',                                               
                                                );  
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_not_empty'){
                                    $f[] = array(
                                                  'key' => '_height',                                             
                                                  'value' => '',  
                                                  'compare' => 'NOT LIKE',                                               
                                                );  
                                }  else {
                                    
                                }
                            
                        } elseif ($v == 'dimention_depth' && $_REQUEST['filter_value_dimention'][$k] != NULL && $_REQUEST['filter_value_second'][$k] != NULL) {
                                
                                if($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_grater_than'){
                                    $f[] = array(
                                                  'key' => '_length',                                              
                                                  'value' => $_REQUEST['filter_value_dimention'][$k],  
                                                  'type' => 'NUMERIC',
                                                  'compare' => '>',                                               
                                                );
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_lower_than'){
                                    $f[] = array(
                                                  'key' => '_length',                                              
                                                  'value' => $_REQUEST['filter_value_dimention'][$k],  
                                                  'type' => 'NUMERIC',
                                                  'compare' => '<',                                               
                                                );  
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_between'){
                                    $f[] = array(
                                                  'key' => '_length',                                              
                                                  'value' => array($_REQUEST['filter_value_dimention'][$k],$_REQUEST['filter_value_second'][$k]),  
                                                  'compare' => 'BETWEEN',                                              
                                                );  
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_empty'){
                                    $f[] = array(
                                                  'key' => '_length',                                              
                                                  'value' => '',  
                                                  'compare' => 'LIKE',                                              
                                                );  
                                } elseif ($_REQUEST['filter_type_dimention_type'][$k] == 'dimention_is_not_empty'){
                                    $f[] = array(
                                                  'key' => '_length',                                              
                                                  'value' => '',  
                                                  'compare' => 'NOT LIKE',                                               
                                                );  
                                }  else {
                                    
                                }
                                
                        } else {
                            
                        }
                    }
                    
                }
                
                // Drop14 Category multi
                if(isset($_REQUEST['filter_type_category']) != NULL){
                    
                    foreach($_REQUEST['filter_type_category'] as $k=>$v){
                        
                        if ( $v == 'cat_is_empty' ) {

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

                                foreach($categories as $key){
                                    $cat[] = $key->term_id;
                                }
                                 
                                $tax_query[] = array(                    
                                'relation' => 'AND',                      
                                  array(
                                    'taxonomy' => 'product_cat',               
                                    'field' => 'id',                    
                                    'terms' => $cat,    
                                    'include_children' => false,           
                                    'operator' => 'NOT IN'                    
                                  )
                                );
                                
                        }  elseif ( $v == 'cat_is_not_empty' ) {

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

                                foreach($categories as $key){
                                    $cat[] = $key->term_id;
                                }
                                 
                                $tax_query[] = array(                    
                                'relation' => 'AND',                      
                                  array(
                                    'taxonomy' => 'product_cat',                
                                    'field' => 'id',                    
                                    'terms' => $cat,    
                                    'include_children' => false,           
                                    'operator' => 'IN'                    
                                  )
                                );
                                
                        } elseif ( $v == 'cat_has_certains_values' && $_REQUEST['filter_value_category_multi'][$k] != NULL ) {                   
                             
                                // Processing multiple input
                                //$multi_value = explode(',', $_REQUEST['filter_value_category'][$k]);
                                $multi_value = $_REQUEST['filter_value_category_multi'];
                                
                                //echo '<pre>';
                                //print_r($multi_value);
                                //echo '</pre>';
                                
                            
                                $tax_query[] = array(                    
                                'relation' => 'AND',                      
                                  array(
                                    'taxonomy' => 'product_cat',               
                                    'field' => 'slug',                    
                                    'terms' => $multi_value,    
                                    'include_children' => false,           
                                    'operator' => 'IN'                    
                                  )
                                );
                                
                        } else {

                        }
                    }

                }
                
                // Drop15 Tags multi
                if(isset($_REQUEST['filter_type_tag']) != NULL){
                    
                    foreach($_REQUEST['filter_type_tag'] as $k=>$v){
                         
                        if ( $v == 'tag_is_empty' ) {

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

                                foreach($categories as $key){
                                    $cat[] = $key->term_id;
                                }
                                 
                                $tax_query[] = array(                     
                                'relation' => 'AND',                  
                                  array(
                                    'taxonomy' => 'product_tag',                
                                    'field' => 'id',                    
                                    'terms' => $cat,    
                                    'include_children' => false,          
                                    'operator' => 'NOT IN'                   
                                  )
                                );
                                
                        }  elseif ( $v == 'tag_is_not_empty' ) {

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

                                foreach($categories as $key){
                                    $cat[] = $key->term_id;
                                }
                                 
                                $tax_query[] = array(                    
                                'relation' => 'AND',                     
                                  array(
                                    'taxonomy' => 'product_tag',              
                                    'field' => 'id',                    
                                    'terms' => $cat,   
                                    'include_children' => false,           
                                    'operator' => 'IN'                    
                                  )
                                );
                                
                        } elseif ( $v == 'tag_has_certains_values' && $_REQUEST['filter_value_tag_multi'] != NULL ) {                   
                                
                                // Processing multiple input
                                $multi_value = $_REQUEST['filter_value_tag_multi'];                                
                            
                                $tax_query[] = array(                    
                                'relation' => 'AND',                      
                                  array(
                                    'taxonomy' => 'product_tag',               
                                    'field' => 'slug',                   
                                    'terms' => $multi_value,    
                                    'include_children' => false,           
                                    'operator' => 'IN'                   
                                  )
                                );
                                
                        } else {

                        }
                    }

                }
                
                // Drop16 Product type multi 
                if(isset($_REQUEST['filter_type_product_type']) != NULL){
                    
                    foreach($_REQUEST['filter_type_product_type'] as $k=>$v){
                       
                        if ( $v == 'product_type_is_empty' ) {

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

                                foreach($categories as $key){
                                    $cat[] = $key->term_id;
                                }
                                 
                                $tax_query[] = array(                    
                                'relation' => 'AND',                      
                                  array(
                                    'taxonomy' => 'product_type',               
                                    'field' => 'id',                    
                                    'terms' => $cat,    
                                    'include_children' => false,           
                                    'operator' => 'NOT IN'                    
                                  )
                                );
                                
                        }  elseif ( $v == 'product_type_is_not_empty' ) {

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

                                foreach($categories as $key){
                                    $cat[] = $key->term_id;
                                }
                                 
                                $tax_query[] = array(                    
                                'relation' => 'AND',                     
                                  array(
                                    'taxonomy' => 'product_type',               
                                    'field' => 'id',                    
                                    'terms' => $cat,    
                                    'include_children' => false,           
                                    'operator' => 'IN'                   
                                  )
                                );
                                
                        } elseif ( $v == 'product_type_has_certains_values' && $_REQUEST['filter_value_product_type'] != NULL ) {                   
                                
                                // Processing multiple input
                                $multi_value = explode(',', $_REQUEST['filter_value_product_type'][$k]);
                            
                                $tax_query[] = array(                     
                                'relation' => 'AND',                      
                                  array(
                                    'taxonomy' => 'product_type',                
                                    'field' => 'slug',                    
                                    'terms' => $multi_value,    
                                    'include_children' => false,           
                                    'operator' => 'IN'                    
                                  )
                                );
                                
                        } else {

                        }
                    }

                }
                
                // Drop17 Availability 
                if(isset($_REQUEST['filter_type_availability']) && $_REQUEST['filter_type_availability'] != NULL){                   
                   
                    foreach($_REQUEST['filter_type_availability'] as $k=>$v){
                        
                        if ( $v == 'availability_in_stock' ) {
                                $f[] = array(
                                              'key' => '_stock_status',                                              
                                              'value' => 'instock',  
                                              'type' => 'CHAR',
                                              'compare' => '=',                                              
                                            );
                                       
                        } elseif ( $v == 'availability_out_of_stock' ) {
                                $f[] = array(
                                              'key' => '_stock_status',                                              
                                              'value' => 'outofstock',                 
                                              'type' => 'CHAR',
                                              'compare' => '=',                                               
                                            );
                        } else {
                            
                        }
                        
                    }
                    
                }
                
                // Drop18 Shipping Class
                if(isset($_REQUEST['filter_value_shipping_class']) != NULL){
                    
                    $multi_value = $_REQUEST['filter_value_shipping_class'];

                    $tax_query[] = array(                    
                    'relation' => 'AND',                      
                      array(
                        'taxonomy' => 'product_shipping_class',               
                        'field' => 'slug',                    
                        'terms' => $multi_value,    
                        'include_children' => false,           
                        'operator' => 'IN'                    
                      )
                    );

                }     
                
                
                
                $column_name_default = array(
                    'num' => 'ID',
                    'name' => 'Name',
                    'sku' => 'SKU',
                    'stock_status' => 'Stock  Status',
                    'price' => 'Price'
                );
                
                
                if($ps == NULL){
                    $ps = array(                       
                            'publish',                     
                            'pending',                     
                            'draft'                                             
                          );                  
                }
                

                
                // IF simple product
                if(isset($_REQUEST['do_not_include_variants']) && $_REQUEST['do_not_include_variants'] != NULL){
                    $terms = array( 2 );
                        $pro_tax_query = array(
                                            'taxonomy' => 'product_type',
                                            'field' => 'id',
                                            'terms' => $terms, 
                                            'include_children' => false,
                                            'operator' => 'IN'
                                        );
                    if(isset($tax_query[0]) && $tax_query[0] != NULL){
                        $tax_query[0][] = $pro_tax_query;  
                    } else {
                        $tax_query[] = $pro_tax_query;
                    }
                        
                // IF variable product   
                } else if (isset($_REQUEST['include_variants_only']) && $_REQUEST['include_variants_only'] != NULL){
                    $terms = array( 4 );
                        $pro_tax_query = array(
                                            'taxonomy' => 'product_type',
                                            'field' => 'id',
                                            'terms' => $terms, 
                                            'include_children' => false,
                                            'operator' => 'IN'
                                        );
                    if(isset($tax_query[0]) && $tax_query[0] != NULL){
                        $tax_query[0][] = $pro_tax_query;  
                    } else {
                        $tax_query[] = $pro_tax_query;
                    }  
                        
                // IF (variable product + simple product)   
                } else if (isset($_REQUEST['include_variants_as_well']) && $_REQUEST['include_variants_as_well'] != NULL){
                    $terms = array( 2,4 );
                        $pro_tax_query = array(
                                            'taxonomy' => 'product_type',
                                            'field' => 'id',
                                            'terms' => $terms, 
                                            'include_children' => false,
                                            'operator' => 'IN'
                                        );
                    if(isset($tax_query[0]) && $tax_query[0] != NULL){
                        $tax_query[0][] = $pro_tax_query;  
                    } else {
                        $tax_query[] = $pro_tax_query;
                    }
                        
                } else {
                    // do nothing
                }                         
                
                $args = array(
                   'post_type' => 'product',
                   //'post_status' => 'publish',
                   'posts_per_page' => -1,
                   'caller_get_posts'=> 1,                           
                    
                    'meta_query' =>  $f,
                    'post_status' => $ps,
                    'tax_query' => $tax_query
                );
                
                //echo '<pre>';
                //print_r($args);
                //echo '</pre>';

                // The Query
                $the_query = new WP_Query( $args );
                
                //echo '<pre>';
                //print_r($the_query);
                //echo '</pre>';
                
                    
        /* Bulk Edit Section */
        } elseif ('perform_changes' == $_REQUEST['action']) { 
            
            
                //echo '<pre>';
                //print_r($_REQUEST);
                //echo '</pre>';
                
            
            // update1 Title bulk edits
            if($_REQUEST['name_bulk_filter_type'] != NULL){
                
                foreach($_REQUEST['name_bulk_filter_type'] as $k=>$v){

                    foreach($_REQUEST['post_id'] as $key){ 
                        
                        if($v == 'name_bulk_starts_with' && $_REQUEST['name_bulk_filter_value'][$k] != NULL){
                            
                            $post_title = get_the_title( $key );
                            $post_title = $_REQUEST['name_bulk_filter_value'][$k].$post_title;

                            $my_post = array(
                                'ID'           => $key,
                                'post_title'   => $post_title,
                            );

                            // Update the post into the database
                            wp_update_post( $my_post );
                            $success = 1;
                            
                        } elseif ($v == 'name_bulk_ends_with' && $_REQUEST['name_bulk_filter_value'][$k] != NULL){
                            
                            $post_title = get_the_title( $key );
                            $post_title = $post_title.$_REQUEST['name_bulk_filter_value'][$k];

                            $my_post = array(
                                'ID'           => $key,
                                'post_title'   => $post_title,
                            );

                            // Update the post into the database
                            wp_update_post( $my_post );
                            $success = 1;
                            
                        } elseif ($v == 'name_bulk_replace' && $_REQUEST['name_bulk_filter_value'][$k] != NULL){
                            
                                $post_title = get_the_title( $key );

                                $post_title = str_replace($_REQUEST['name_bulk_filter_value'][$k], $_REQUEST['name_bulk_filter_value_second'][0], $post_title);

                                $my_post = array(
                                    'ID'           => $key,
                                    'post_title'   => $post_title,
                                );

                                // Update the post into the database
                                wp_update_post( $my_post );
                                $success = 1;
                                
                        } elseif ($v == 'name_bulk_define_new_text' && $_REQUEST['name_bulk_filter_value'][$k] != NULL){
                            
                                $post_title = $_REQUEST['name_bulk_filter_value'][$k];

                                //$post_title = str_replace($_REQUEST['name_bulk_filter_value'][$k], $_REQUEST['name_bulk_filter_value_second'][0], $post_title);

                                $my_post = array(
                                    'ID'           => $key,
                                    'post_title'   => $post_title,
                                );

                                // Update the post into the database
                                wp_update_post( $my_post );
                                $success = 1;
                                
                        }  else {

                        }
                    }
                }
            }
            
            // update2 Long des bulk edits
            if($_REQUEST['long_des_bulk_filter_type'] != NULL){
                
                foreach($_REQUEST['long_des_bulk_filter_type'] as $k=>$v){

                    foreach($_REQUEST['post_id'] as $key){
                        
                        if($v == 'long_des_bulk_starts_with' && $_REQUEST['long_des_bulk_filter_value'][$k] != NULL){
                            
                            //$post_content = get_the_content( $key );
                            $post = get_post( $key );
                            $post_content = $_REQUEST['long_des_bulk_filter_value'][$k].' '.$post->post_content;
                            $my_post = array(
                                'ID'           => $key,
                                'post_content'   => $post_content,
                            );
                            wp_update_post( $my_post );
                            $success = 1;
                            
                        } elseif ($v == 'long_des_bulk_ends_with' && $_REQUEST['long_des_bulk_filter_value'][$k] != NULL){
                            
                            //$post_content = get_the_content( $key );
                            $post = get_post( $key );
                            $post_content = $post->post_content.' '.$_REQUEST['long_des_bulk_filter_value'][$k];
                            $my_post = array(
                                'ID'           => $key,
                                'post_content'   => $post_content,
                            );
                            wp_update_post( $my_post );
                            $success = 1;
                            
                        } elseif ($v == 'long_des_bulk_define_new_text' && $_REQUEST['long_des_bulk_filter_value'][$k] != NULL){

                                
                                //$post_content = get_the_content( $key );
                                //$post = get_post( $key );
                                $post_content = $_REQUEST['long_des_bulk_filter_value'][$k];
                                $my_post = array(
                                    'ID'           => $key,
                                    'post_content'   => $post_content,
                                );
                                wp_update_post( $my_post );
                                $success = 1;
                                
                            
                        } elseif ($v == 'long_des_bulk_replace' && $_REQUEST['long_des_bulk_filter_value'][$k] != NULL){
                            
                            if($_REQUEST['long_des_bulk_filter_value_second'][0] != NULL){
                                
                                //$post_content = get_the_content( $key );
                                $post = get_post( $key );
                                $post_content = str_replace($_REQUEST['long_des_bulk_filter_value'][$k], $_REQUEST['long_des_bulk_filter_value_second'][0], $post->post_content);
                                $my_post = array(
                                    'ID'           => $key,
                                    'post_content'   => $post_content,
                                );
                                wp_update_post( $my_post );
                                $success = 1;
                                
                            }
                            
                        } else {

                        }
                    }
                }
            }
            
            // update3 Short des bulk edits
            if($_REQUEST['short_des_bulk_filter_type'] != NULL){
                
                foreach($_REQUEST['short_des_bulk_filter_type'] as $k=>$v){

                    foreach($_REQUEST['post_id'] as $key){    
                        if($v == 'short_des_bulk_starts_with' && $_REQUEST['short_des_bulk_filter_value'][$k] != NULL){
                            
                            //$post_content = get_the_excerpt( $key );
                            $post = get_post( $key );
                            $post_content = $post->post_excerpt;
                            $post_content = $_REQUEST['short_des_bulk_filter_value'][$k].' '.$post_content;
                            $my_post = array(
                                'ID'           => $key,
                                'post_excerpt'   => $post_content,
                            );
                            wp_update_post( $my_post );
                            $success = 1;
                            
                        } elseif ($v == 'short_des_bulk_ends_with' && $_REQUEST['short_des_bulk_filter_value'][$k] != NULL){
                            
                            //$post_content = get_the_excerpt( $key );
                            $post = get_post( $key );
                            $post_content = $post->post_excerpt;
                            $post_content = $post_content.' '.$_REQUEST['short_des_bulk_filter_value'][$k];
                            $my_post = array(
                                'ID'           => $key,
                                'post_excerpt'   => $post_content,
                            );
                            wp_update_post( $my_post );
                            $success = 1;
                            
                        } elseif ($v == 'short_des_bulk_replace' && $_REQUEST['short_des_bulk_filter_value'][$k] != NULL){

                            if($_REQUEST['short_des_bulk_filter_value_second'][0] != NULL){    
                                //$post_content = get_the_excerpt( $key );
                                $post = get_post( $key );
                                $post_content = $post->post_excerpt;
                                $post_content = str_replace($_REQUEST['short_des_bulk_filter_value'][$k], $_REQUEST['short_des_bulk_filter_value_second'][0], $post_content);
                                $my_post = array(
                                    'ID'           => $key,
                                    'post_excerpt'   => $post_content,
                                );
                                wp_update_post( $my_post );
                                $success = 1;
                            }
                            
                        } elseif ($v == 'short_des_bulk_define_new_text' && $_REQUEST['short_des_bulk_filter_value'][$k] != NULL){
                            
                           
                                
                                //$post_content = get_the_excerpt( $key );
                                //$post = get_post( $key );
                                $post_content = $_REQUEST['short_des_bulk_filter_value'][$k];
                                //$post_content = str_replace($_REQUEST['short_des_bulk_filter_value'][$k], $_REQUEST['short_des_bulk_filter_value_second'][0], $post_content);
                                $my_post = array(
                                    'ID'           => $key,
                                    'post_excerpt'   => $post_content,
                                );
                                wp_update_post( $my_post );
                                $success = 1;
                                
                            
                            
                        } else {

                        }
                    }
                }
            }
            
            // update4 Price bulk edits
            if($_REQUEST['price_bulk_filter_type'] != NULL){
                
                foreach($_REQUEST['price_bulk_filter_type'] as $k=>$v){

                    foreach($_REQUEST['post_id'] as $key){ 
                        
                        if($v == 'price_bulk_increase_by_value'){
                            
                            $post_meta_value = get_post_meta( $key, '_price' );
                            $post_meta_value = $_REQUEST['price_bulk_filter_value'][$k] + $post_meta_value[0];
                            update_post_meta($key, '_price', $post_meta_value);
                            
                            $post_meta_value = get_post_meta( $key, '_regular_price' );
                            $post_meta_value = $_REQUEST['price_bulk_filter_value'][$k] + $post_meta_value[0];
                            update_post_meta($key, '_regular_price', $post_meta_value);
                            
                            $success = 1;
                            
                        } elseif ($v == 'price_bulk_reduce_by_value' && $_REQUEST['price_bulk_filter_value'][$k] != NULL){
                           
                            $post_meta_value = get_post_meta( $key, '_price' );
                            $post_meta_value = $post_meta_value[0] - $_REQUEST['price_bulk_filter_value'][$k];                          
                            update_post_meta($key, '_price', $post_meta_value);
                            
                            $post_meta_value = get_post_meta( $key, '_regular_price' );
                            $post_meta_value = $post_meta_value[0] - $_REQUEST['price_bulk_filter_value'][$k];                          
                            update_post_meta($key, '_regular_price', $post_meta_value);
                            
                            $success = 1;
                            
                        } elseif ($v == 'price_bulk_define_new_price' && $_REQUEST['price_bulk_filter_value'][$k] != NULL){
                            
                            $post_meta_value = $_REQUEST['price_bulk_filter_value'][$k];
                            update_post_meta($key, '_price', $post_meta_value);
                            
                            $post_meta_value = $_REQUEST['price_bulk_filter_value'][$k];
                            update_post_meta($key, '_regular_price', $post_meta_value);
                            
                            $success = 1;
                            
                        } elseif ($v == 'price_bulk_increase_by_per' && $_REQUEST['price_bulk_filter_value'][$k] != NULL){
                            
                            $post_meta_value = get_post_meta( $key, '_price' );
                            $post_meta_value = $post_meta_value[0] + ($_REQUEST['price_bulk_filter_value'][$k] * $post_meta_value[0])/100 ;
                            update_post_meta($key, '_price', $post_meta_value);
                            
                            $post_meta_value = get_post_meta( $key, '_regular_price' );
                            $post_meta_value = $post_meta_value[0] + ($_REQUEST['price_bulk_filter_value'][$k] * $post_meta_value[0])/100 ;
                            update_post_meta($key, '_regular_price', $post_meta_value);
                            
                            $success = 1;
                            
                        } elseif ($v == 'price_bulk_reduce_by_per' && $_REQUEST['price_bulk_filter_value'][$k] != NULL){
                            
                            $post_meta_value = get_post_meta( $key, '_price' );
                            $post_meta_value = $post_meta_value[0] - ($_REQUEST['price_bulk_filter_value'][$k] * $post_meta_value[0])/100 ;
                            update_post_meta($key, '_price', $post_meta_value);
                            
                            $post_meta_value = get_post_meta( $key, '_regular_price' );
                            $post_meta_value = $post_meta_value[0] - ($_REQUEST['price_bulk_filter_value'][$k] * $post_meta_value[0])/100 ;
                            update_post_meta($key, '_regular_price', $post_meta_value);
                            
                            $success = 1;
                            
                        }  else {
                            // Do nothing
                        }
                    }
                }
            }
            
            // update5 Sale Price bulk edits
            if($_REQUEST['sale_price_bulk_filter_type'] != NULL){
                
                foreach($_REQUEST['sale_price_bulk_filter_type'] as $k=>$v){

                    foreach($_REQUEST['post_id'] as $key){ 
                        
                        if($v == 'sale_price_bulk_increase_by_value'){
                            
                            $post_meta_value = get_post_meta( $key, '_sale_price' );                           
                            $post_meta_value = $_REQUEST['sale_price_bulk_filter_value'][$k] + $post_meta_value[0];
                            update_post_meta($key, '_sale_price', $post_meta_value);
                            $success = 1;
                            
                        } elseif ($v == 'sale_price_bulk_reduce_by_value' && $_REQUEST['sale_price_bulk_filter_value'][$k] != NULL){
                            
                            $post_meta_value = get_post_meta( $key, '_sale_price' );
                            $post_meta_value = $post_meta_value[0] - $_REQUEST['sale_price_bulk_filter_value'][$k];
                            update_post_meta($key, '_sale_price', $post_meta_value);
                            $success = 1;
                            
                        } elseif ($v == 'sale_price_bulk_define_new_price' && $_REQUEST['sale_price_bulk_filter_value'][$k] != NULL){
                            
                            $post_meta_value = $_REQUEST['sale_price_bulk_filter_value'][$k];
                            update_post_meta($key, '_sale_price', $post_meta_value);
                            $success = 1;
                            
                        } elseif ($v == 'sale_price_bulk_increase_by_per' && $_REQUEST['sale_price_bulk_filter_value'][$k] != NULL){
                            
                            $post_meta_value = get_post_meta( $key, '_sale_price' );
                            $post_meta_value = $post_meta_value[0] + ($_REQUEST['sale_price_bulk_filter_value'][$k] * $post_meta_value[0])/100 ;
                            update_post_meta($key, '_sale_price', $post_meta_value);
                            $success = 1;
                            
                        } elseif ($v == 'sale_price_bulk_reduce_by_per' && $_REQUEST['sale_price_bulk_filter_value'][$k] != NULL){
                            
                            $post_meta_value = get_post_meta( $key, '_sale_price' );
                            $post_meta_value = $post_meta_value[0] - ($_REQUEST['sale_price_bulk_filter_value'][$k] * $post_meta_value[0])/100 ;
                            update_post_meta($key, '_sale_price', $post_meta_value);
                            $success = 1;
                            
                        }  else {

                        }
                    }
                }
            }
            
            // update6 Variation bulk edits 
            if($_REQUEST['variation_bulk_update_type'] != NULL){
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){ 
                
                    foreach($_REQUEST['variation_bulk_update_type'] as $k1=>$v1){
                    
                        // Variation Add
                        if($v1 == 'variation_bulk_add'){

                            if($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_sku'){

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k];
                                update_post_meta($post_id, '_sku', $post_meta_value);
                                $success = 1;
                            
                            // Change stock by percentage    
                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_stock') {
                                
                                if($_REQUEST['variation_bulk_update_param2'][$k1] == 'variation_increase_by_value'){
                                    
                                    $post_meta_value = get_post_meta( $post_id, '_stock' );
                                    $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1] + $post_meta_value[0];
                                    update_post_meta($key, '_stock', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_param2'][$k1] == 'variation_increase_by_per') {
                                                                                                 
                                    $post_meta_value = get_post_meta( $key, '_stock' );
                                    $post_meta_value = $post_meta_value[0] + ($_REQUEST['variation_bulk_update_value'][$k1] * $post_meta_value[0])/100 ;
                                    update_post_meta($key, '_stock', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_param2'][$k1] == 'variation_decrease_by_per') {
                                    
                                    $post_meta_value = get_post_meta( $key, '_stock' );
                                    $post_meta_value = $post_meta_value[0] - ($_REQUEST['variation_bulk_update_value'][$k] * $post_meta_value[0])/100 ;
                                    update_post_meta($key, '_stock', $post_meta_value);
                                    $success = 1;


                                } else {

                                }
                            
                            // Change Price by percentage  
                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_price') {
                                
                                if($_REQUEST['variation_bulk_update_price'][$k1] == 'variation_price_bulk_increase_by_value'){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1] + $post_meta_value[0];
                                    update_post_meta($post_id, '_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_price'][$k1] == 'variation_price_bulk_reduce_by_value' ){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $post_meta_value[0] - $_REQUEST['variation_bulk_update_value'][$k1];                          
                                    update_post_meta($post_id, '_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_price'][$k1] == 'variation_price_bulk_define_new_price' ){

                                    $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                    update_post_meta($post_id, '_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_price'][$k1] == 'variation_price_bulk_increase_by_per' ){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $post_meta_value[0] + ($_REQUEST['variation_bulk_update_value'][$k1] * $post_meta_value[0])/100 ;
                                    update_post_meta($post_id, '_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_price'][$k1] == 'variation_price_bulk_reduce_by_per'){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $post_meta_value[0] - ($_REQUEST['variation_bulk_update_value'][$k1] * $post_meta_value[0])/100 ;
                                    update_post_meta($post_id, '_price', $post_meta_value);
                                    $success = 1;

                                }  else {

                                }
                                
                            // Change Sale Price by percentage    
                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_sale_price') {
                                
                                if($_REQUEST['variation_bulk_update_sale_price'][0] == 'variation_sale_price_bulk_increase_by_value'){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1] + $post_meta_value[0];
                                    update_post_meta($post_id, '_sale_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_sale_price'][$k1] == 'variation_price_bulk_reduce_by_value' ){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $post_meta_value[0] - $_REQUEST['variation_bulk_update_value'][$k1];                          
                                    update_post_meta($post_id, '_sale_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_sale_price'][$k1] == 'variation_price_bulk_define_new_price' ){

                                    $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                    update_post_meta($post_id, '_sale_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_sale_price'][$k1] == 'variation_price_bulk_increase_by_per' ){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $post_meta_value[0] + ($_REQUEST['variation_bulk_update_value'][$k1] * $post_meta_value[0])/100 ;
                                    update_post_meta($post_id, '_sale_price', $post_meta_value);
                                    $success = 1;

                                } elseif ($_REQUEST['variation_bulk_update_sale_price'][$k1] == 'variation_price_bulk_reduce_by_per'){

                                    $post_meta_value = get_post_meta( $post_id, '_price' );
                                    $post_meta_value = $post_meta_value[0] - ($_REQUEST['variation_bulk_update_value'][$k1] * $post_meta_value[0])/100 ;
                                    update_post_meta($post_id, '_sale_price', $post_meta_value);
                                    $success = 1;

                                }  else {

                                }

                            }  elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_weight') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k];
                                update_post_meta($post_id, '_weight', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_height') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k];
                                update_post_meta($post_id, '_height', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_width') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k];
                                update_post_meta($post_id, '_width', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_depth') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k];
                                update_post_meta($post_id, '_length', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_availibility') {
                                
                                $post_meta_value = $_REQUEST['variation_bulk_update_availibility'][0];
                                update_post_meta($post_id, '_stock_status', $post_meta_value);
                                $success = 1;

                            } else {

                            }   

                        // Variation Remove    
                        } elseif ($v1 == 'variation_bulk_remove') {
                            
                             if($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_sku'){

                                $post_meta_value = '';
                                update_post_meta($post_id, '_sku', $post_meta_value);
                                $success = 1;
                                
                            // Change by percentage
                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_stock') {

                                $post_meta_value = '';
                                update_post_meta($post_id, '_stock', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_weight') {

                                $post_meta_value = '';
                                update_post_meta($post_id, '_weight', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_height') {

                                $post_meta_value = '';
                                update_post_meta($post_id, '_height', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_width') {

                                $post_meta_value = '';
                                update_post_meta($post_id, '_width', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_depth') {

                                $post_meta_value = '';
                                update_post_meta($post_id, '_length', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_availibility') {
                                
                                $post_meta_value = $_REQUEST['variation_bulk_update_availibility'][0];
                                update_post_meta($post_id, '_stock_status', $post_meta_value);
                                $success = 1;

                            } else {

                            } 


                        // Variation Set New    
                        } elseif ($v1 == 'variation_bulk_set_new') {

                            if($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_sku'){

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                update_post_meta($post_id, '_sku', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_stock') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                update_post_meta($post_id, '_weight', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_weight') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                update_post_meta($post_id, '_weight', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_height') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                update_post_meta($post_id, '_height', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_width') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                update_post_meta($post_id, '_width', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_depth') {

                                $post_meta_value = $_REQUEST['variation_bulk_update_value'][$k1];
                                update_post_meta($post_id, '_length', $post_meta_value);
                                $success = 1;

                            } elseif ($_REQUEST['variation_bulk_update_param'][$k1] == 'variation_bulk_availibility') {
                                
                                $post_meta_value = $_REQUEST['variation_bulk_update_availibility'][0];
                                update_post_meta($post_id, '_stock_status', $post_meta_value);
                                $success = 1;

                            } else  {

                            } 

                        } else {

                        }    
                    
                    } 
                    
                }
            }
            
            // update7 Attribute bulk edits  (working on it)
            if($_REQUEST['attribute_bulk_action_type'] != NULL){ 
                
                // action foreach 1
                foreach($_REQUEST['attribute_bulk_action_type'] as $k=>$v){
                   
                    // post foreach 2
                    foreach($_REQUEST['post_id'] as $post_id){ 
                        
                        // Add bulk Attribute
                        if($v == 'attribute_bulk_add'){
                            
                            // Attribute foreach 3 
                            foreach($_REQUEST['attribute_bulk_filter_type'] as $key=>$val){

                                // get post terms
                                //$term_list = wp_get_post_terms( $post_id, 'pa_'.$_REQUEST['attribute_bulk_filter_type'][$k], array("fields" => "names"));                                       
                                
                                // get product attribute
                                $pro_attr = get_post_meta($post_id,'_product_attributes', true);
                                
                                // IF Attribute Exist for the product
                                if(isset($pro_attr) && $pro_attr != NULL){        
                                
                                    $all_attr = get_all_global_attributes();

                                    if(isset($all_attr) && $all_attr != NULL){

                                        foreach($all_attr as $attr){

                                            if($val == $attr->attribute_name){
                                                
                                                $a = get_post_meta($post_id,'_product_attributes', true);
                                                    
                                                // Putting new data
                                                $a['pa_'.$val] = Array(
                                                    'name'=>'pa_'.$val,
                                                    'value'=>'',
                                                    'is_visible' => '1',
                                                    'is_variation' => '1',
                                                    'is_taxonomy' => '1'
                                                );
                                                
                                                // Updating Attribute
                                                update_post_meta( $post_id,'_product_attributes',$a);    
                                                
                                                $term_list = wp_get_object_terms($post_id, 'pa_'.$_REQUEST['attribute_bulk_filter_type'][$k], array("fields" => "names"));

                                                // putting terms (foreach 4)
                                                foreach($_REQUEST['filter_value_attribute_terms_bulk'][$val] as $ke=>$va){    
                                                   $term_list[] = $va;                                                                             
                                                }
                                                
                                                // Updating terms
                                                wp_set_object_terms( $post_id, $term_list, 'pa_'.$_REQUEST['attribute_bulk_filter_type'][$k] , true);
                                                $success = 1;
                                            } 
                                            
                                        }
                                    } 
                                
                                // IF Atrribute does not exist for the product
                                } else {
                                    
                                    // Adding new attribute terms
                                    if(isset($_REQUEST['filter_value_attribute_terms_bulk'][$val]) && $_REQUEST['filter_value_attribute_terms_bulk'][$val] != NULL){
                                        foreach($_REQUEST['filter_value_attribute_terms_bulk'][$val] as $ke=>$va){    
                                            $term_list[] = $va;                                                                             
                                        }
                                    }
                                    
                                    // creating multiple attribute
                                    foreach($_REQUEST['attribute_bulk_filter_type'] as $k1=>$v1){
                                        // Creating new attribute
                                        if(isset($v1) && $v1 != NULL){
                                            $c['pa_'.$v1] = array(
                                              'name'=>'pa_'.$v1,
                                              'value'=>'',
                                              'is_visible' => '1', 
                                              'is_variation' => '1',
                                              'is_taxonomy' => '1'
                                            );
                                        }    
                                    }
                                    
                                    foreach($c as $k1=>$v1){
                                        $thedata[$k1] = $v1;   
                                    }
                                    
                                    update_post_meta( $post_id,'_product_attributes',$thedata);
                                    
                                    // Inserting terms under attribute
                                    if(isset($term_list) && $term_list != NULL){
                                        wp_set_object_terms( $post_id, $term_list, 'pa_'.$val , false);
                                        $success = 1;
                                    }
                                    
                                }    
                            
                            }
                        
                        // Remove Bulk Attribute
                        }  elseif ($v == 'attribute_bulk_remove'){
                            
                            // Attribute foreach for remove
                            foreach($_REQUEST['attribute_bulk_filter_type'] as $k1=>$v1){                               
     
                                // Terms foreach for remove
                                if(isset($_REQUEST['filter_value_attribute_terms_bulk'][$v1]) && $_REQUEST['filter_value_attribute_terms_bulk'][$v1] != NULL){
                                    foreach($_REQUEST['filter_value_attribute_terms_bulk'][$v1] as $k2=>$v2){
 
                                        foreach($_REQUEST['filter_value_attribute_terms_bulk'] as $k3=>$v3){

                                            if($v1 == $k3){

                                                $term_list = wp_get_post_terms($post_id, 'pa_'.$v1, array("fields" => "names")); 
                                                $pos = array_search($v2, $term_list);
                                                unset($term_list[$pos]);
                                                wp_set_object_terms( $post_id, $term_list, 'pa_'.$v1 , false);
                                                $success = 1;

                                            }
                                            
                                        }

                                    }
                                }

                            }
                                                    
                        } else {

                        }
                    }
                }
            }
            
            // update8 Category bulk edits  
            if($_REQUEST['category_bulk_action_type'] != NULL){ 
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){ 
                
                    foreach($_REQUEST['category_bulk_action_type'] as $k1=>$v1){
                        
                        // Add new category for product
                        if($v1 != NULL && $v1.'_value' == 'category_bulk_add_value'){

                            $term_list = wp_get_post_terms($post_id, 'product_cat', array("fields" => "names"));
                            foreach($_REQUEST['category_bulk_add_value'] as $k3=>$v3){    
                                $term_list[] = $v3;                                                                             
                            }

                            wp_set_object_terms( $post_id, $term_list, 'product_cat' , false);
                            $success = 1;

                        // Remove category for product
                        } else if($v1 != NULL && $v1.'_value' == 'category_bulk_remove_value') {

                            $term_list = wp_get_post_terms($post_id, 'product_cat', array("fields" => "names")); 

                            if($term_list != NULL){
                                foreach($_REQUEST['category_bulk_remove_value'] as $k2=>$v2){
                                    $pos = array_search($v2, $term_list);
                                    unset($term_list[$pos]);
                                }

                                wp_set_object_terms( $post_id, $term_list, 'product_cat' , false);
                                $success = 1;
                            }
                        
                        // Set New category for product    
                        } else if ($v1 != NULL && $v1.'_value' == 'category_bulk_set_new_value') {
                            
                            $term_list = $_REQUEST['category_bulk_set_new_value'];

                            wp_set_object_terms( $post_id, $term_list, 'product_cat' , false);
                            $success = 1;

                        } else {

                        }

                    }
                }
                
            }
            
            // update9 Tag bulk edits  
            if($_REQUEST['tag_bulk_action_type'] != NULL){ 
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){ 
                
                    foreach($_REQUEST['tag_bulk_action_type'] as $k1=>$v1){
                        
                        // Add new category for product
                        if($v1 != NULL && $v1.'_value' == 'tag_bulk_add_value'){

                            $term_list = wp_get_post_terms($post_id, 'product_tag', array("fields" => "names"));
                            foreach($_REQUEST['tag_bulk_add_value'] as $k3=>$v3){    
                                $term_list[] = $v3;                                                                             
                            }

                            wp_set_object_terms( $post_id, $term_list, 'product_tag' , false);
                            $success = 1;

                        // Remove category for product
                        } else if($v1 != NULL && $v1.'_value' == 'tag_bulk_remove_value') {

                            $term_list = wp_get_post_terms($post_id, 'product_tag', array("fields" => "names")); 

                            if($term_list != NULL){
                                foreach($_REQUEST['tag_bulk_remove_value'] as $k2=>$v2){
                                    $pos = array_search($v2, $term_list);
                                    unset($term_list[$pos]);
                                }

                                wp_set_object_terms( $post_id, $term_list, 'product_tag' , false);
                                $success = 1;
                            }
                        
                        // Set New category for product    
                        } else if ($v1 != NULL && $v1.'_value' == 'tag_bulk_set_new_value') {
                            
                            $term_list = $_REQUEST['tag_bulk_set_new_value'];

                            wp_set_object_terms( $post_id, $term_list, 'product_tag' , false);
                            $success = 1;

                        } else {

                        }

                    }
                }
                
            }
            
            // update10 Weight bulk edits 
            if($_REQUEST['weight_bulk_filter_type'] != NULL && $_REQUEST['weight_bulk_filter_value'][0] != NULL){
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){
                    $post_meta_value = $_REQUEST['weight_bulk_filter_value'][0];
                    update_post_meta($post_id, '_weight', $post_meta_value);
                    $success = 1;
                }
                
            }
            
            // update11 Height bulk edits 
            if($_REQUEST['height_bulk_filter_type'] != NULL && $_REQUEST['height_bulk_filter_value'][0] != NULL){
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){
                    $post_meta_value = $_REQUEST['height_bulk_filter_value'][0];
                    update_post_meta($post_id, '_height', $post_meta_value);
                    $success = 1;
                }
                
            }
            
            // update12 Depth bulk edits 
            if($_REQUEST['depth_bulk_filter_type'] != NULL && $_REQUEST['depth_bulk_filter_value'][0] != NULL){
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){
                    $post_meta_value = $_REQUEST['depth_bulk_filter_value'][0];
                    update_post_meta($post_id, '_length', $post_meta_value);
                    $success = 1;
                }
                
            }
            
            // update13 Width bulk edits 
            if($_REQUEST['width_bulk_filter_type'] != NULL && $_REQUEST['width_bulk_filter_value'][0] != NULL){
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){
                    $post_meta_value = $_REQUEST['width_bulk_filter_value'][0];
                    update_post_meta($post_id, '_width', $post_meta_value);
                    $success = 1;
                }
                
            }
            
            // update14 SKU bulk edits 
            if($_REQUEST['sku_bulk_filter_type'] != NULL && $_REQUEST['sku_bulk_filter_value'][0] != NULL){
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){
                    $post_meta_value = $_REQUEST['sku_bulk_filter_value'][0];
                    update_post_meta($post_id, '_sku', $post_meta_value);
                    $success = 1;
                }
                
            }
            
            // update15 Stock bulk edits 
            if($_REQUEST['stock_bulk_filter_type'] != NULL && $_REQUEST['stock_bulk_filter_value'][0] != NULL){
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){
                    $post_meta_value = $_REQUEST['stock_bulk_filter_value'][0];
                    update_post_meta($post_id, '_stock', $post_meta_value);
                    $success = 1;
                }
                
            }
            
            // update16 Shipping Class  bulk edits  
            if($_REQUEST['shipping_class_bulk_action_type'] != NULL){ 
                
                // post foreach 1
                foreach($_REQUEST['post_id'] as $post_id){ 
                
                    foreach($_REQUEST['shipping_class_bulk_action_type'] as $k1=>$v1){
                        
                        // Add new Shippping class for product
                        if($v1 != NULL && $v1.'_value' == 'shipping_class_bulk_add_value'){

                            $term_list = wp_get_post_terms($post_id, 'product_shipping_class', array("fields" => "names"));
                            foreach($_REQUEST['shipping_class_bulk_add_value'] as $k3=>$v3){    
                                $term_list[] = $v3;                                                                             
                            }

                            wp_set_object_terms( $post_id, $term_list, 'product_shipping_class' , false);
                            $success = 1;

                        // Remove Shippping class for product
                        } else if($v1 != NULL && $v1.'_value' == 'shipping_class_bulk_remove_value') {

                            $term_list = wp_get_post_terms($post_id, 'product_shipping_class', array("fields" => "names")); 
                            

                            if($term_list != NULL){
                                foreach($_REQUEST['shipping_class_bulk_remove_value'] as $k2=>$v2){
                                    $pos = array_search($v2, $term_list);
                                    unset($term_list[$pos]);
                                }

                                wp_set_object_terms( $post_id, $term_list, 'product_shipping_class' , false);
                                $success = 1;
                            }
                        
                        // Set New Shippping class for product    
                        } else if ($v1 != NULL && $v1.'_value' == 'shipping_class_bulk_set_new_value') {
                            
                            $term_list = $_REQUEST['shipping_class_bulk_set_new_value'];

                            wp_set_object_terms( $post_id, $term_list , 'product_shipping_class' , false);
                            $success = 1;

                        } else {

                        }

                    }
                }
                
            } 
            
                // All products property
                $column_name_default = array(
                    'num' => 'ID',
                    'name' => 'Name',
                    'sku' => 'SKU',
                    'stock_status' => 'Stock Status',
                    'price' => 'Price',
                    'sale_price' => 'Sale Price',
                    'weight' => 'Weight',
                    'height' => 'Height',
                    'width' => 'Width',
                    'depth' => 'Depth',
                    'shipping_class' => 'Shipping Class',
                    'stock_quantity' => 'Stock Quantity',
                    'category' => 'Category',
                    'tag' => 'Tag'
                );
                
                // Removing non updated product property
                // 1 price
                if($_REQUEST['price_bulk_filter_type'][0] == 'Select Option'){
                    unset($column_name_default['price']);
                }
                // 2 sale price
                if($_REQUEST['sale_price_bulk_filter_type'][0] == 'Select Option'){
                    unset($column_name_default['sale_price']);
                }
                // 3 height price
                if($_REQUEST['height_bulk_filter_value'][0] == NULL){
                    unset($column_name_default['height']);
                }
                // 4 width
                if($_REQUEST['width_bulk_filter_value'][0] == NULL){                 
                    unset($column_name_default['width']);
                }
                // 5 weight
                if($_REQUEST['weight_bulk_filter_value'][0] == NULL){
                    unset($column_name_default['weight']);
                }
                // 6 depth
                if($_REQUEST['depth_bulk_filter_value'][0] == NULL){
                    unset($column_name_default['depth']);
                }
                // 7 sku
                if($_REQUEST['sku_bulk_filter_value'][0] == NULL){
                    unset($column_name_default['sku']);
                }
                // 8 shipping class
                if($_REQUEST['shipping_class_bulk_action_type'][0] == NULL){
                    unset($column_name_default['shipping_class']);
                }
                // 9 stock quantity
                if($_REQUEST['stock_bulk_filter_value'][0] == NULL){
                    unset($column_name_default['stock_quantity']);
                }
                // 10 category
                if($_REQUEST['category_bulk_action_type'][0] == NULL){
                    unset($column_name_default['category']);
                }
                // 11 tag
                if($_REQUEST['tag_bulk_action_type'][0] == NULL){
                    unset($column_name_default['tag']);
                }

                        
                $update = 1;
                $success_txt = 'All Data Updated Successfully';
                $error_txt = 'Data Update Failed';
                if($success != 1){
                    $error = 1;
                }
                
                // Argument for wp query
                $args = array(
                    'post__in' => $_REQUEST['post_id'],
                    'post_type' => 'product',
                    'post_status' => array(                       
                                        'publish',                     
                                        'pending',                     
                                        'draft'                                             
                                    ),
                    'posts_per_page' => -1,
                    'caller_get_posts'=> 1,  
                );

                // The Query
                $the_query = new WP_Query( $args );
                

            
        }else{
            
    
                // When no action is going on
                $column_name_default = array(
                    'num' => 'ID',
                    'name' => 'Name',
                    'sku' => 'SKU',
                    'stock_status' => 'Stock  Status',
                    'price' => 'Price'
                );
            
                // Argument for wp query
                $args = array(
                    'post_type' => 'product',
                    'post_status' => array(                       
                                            'publish',                     
                                            'pending',                     
                                            'draft'                                             
                                        ),
                    'posts_per_page' => -1,
                                
                                  
                );

                // The Query
                $the_query = new WP_Query( $args );
                
                //echo '<pre>';
                //print_r($the_query);
                //echo '</pre>';
                //exit;

            }    
       
    
    
    // Showing filter option
    include_once(RS_BRAS_PLUGIN_DIR . '/include/view/filter_options.php'); 
    
    if($the_query->have_posts()){
        //print_r($the_query->the_post());exit;
        //echo 'i am here';exit;
    
    
    ?>


        
    
                    
    <table  id="example"  cellspacing="0" width="100%">
        
        <thead>
            <tr>
                <?php foreach($column_name_default as $key){ ?>
                    <th><?php echo $key; ?></th>
                <?php } ?>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <?php foreach($column_name_default as $key){ ?>
                    <th><?php echo $key; ?></th>
                <?php } ?>
            </tr>
        </tfoot>
 
        <tbody>
		<?php
             
            if($the_query->have_posts()){ 
                
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    
                    // Getting product category
                    $cat = get_the_terms( get_the_ID(), 'product_cat' );
                    $category1 = array();
                    if($cat){
                        foreach($cat as $k){
                            $category1[] = $k->name;
                        }
                        $category = implode(',', $category1);
                    }
                    
                    // Getting product Tag
                    $tag = get_the_terms( get_the_ID(), 'product_tag' );
                    $tags1 = array();
                    if($tag){
                        foreach($tag as $k){
                            $tags1[] = $k->name;
                        }
                        $tags = implode(',', $tags1);
                    }
                    
                    // Getting Product Shipping Class
                    $shipping_class = get_the_terms( get_the_ID(), 'product_shipping_class' );
                    if($shipping_class[0]->name){
                       $shipping_class = $shipping_class[0]->name;
                    }else{
                       $shipping_class = '';
                    }
                    
                    // If product update action is done
                    if($update == 1){                                              
                        
                        // All Products Property
                        $column_value_default = array(
                            'num' => get_the_ID(),
                            'name' => get_the_title(),
                            'sku' => get_post_meta( get_the_ID(), '_sku', true ),
                            'stock_status' => get_post_meta( get_the_ID(), '_stock_status', true ),
                            'price' => get_post_meta( get_the_ID(), '_price', true ),
                            'sale_price' => get_post_meta( get_the_ID(), '_sale_price', true ),
                            'weight' => get_post_meta( get_the_ID(), '_weight', true ),
                            'height' => get_post_meta( get_the_ID(), '_height', true ),
                            'width' => get_post_meta( get_the_ID(), '_width', true ),
                            'depth' => get_post_meta( get_the_ID(), '_length', true ),
                            'shipping_class' => $shipping_class,
                            'stock_quantity' => get_post_meta( get_the_ID(), '_stock', true ),
                            'category' => $category,
                            'tag' => $tags
                        );
                        
                        // Removing non updated product property
                        //  1 price
                        if($_REQUEST['price_bulk_filter_type'][0] == 'Select Option'){
                            unset($column_value_default['price']);
                        }
                        //  2 sale price
                        if($_REQUEST['sale_price_bulk_filter_type'][0] == 'Select Option'){
                            unset($column_value_default['sale_price']);
                        }
                        //  3 height
                        if($_REQUEST['height_bulk_filter_value'][0] == ''){
                            unset($column_value_default['height']);
                        }
                        //  4 width
                        if($_REQUEST['width_bulk_filter_value'][0] == ''){
                            unset($column_value_default['width']);
                        }
                        //  5 weight
                        if($_REQUEST['weight_bulk_filter_value'][0] == ''){
                            unset($column_value_default['weight']);
                        }
                        //  6 depth
                        if($_REQUEST['depth_bulk_filter_value'][0] == ''){
                            unset($column_value_default['depth']);
                        }
                        // 7 sku
                        if($_REQUEST['sku_bulk_filter_value'][0] == ''){
                            unset($column_value_default['sku']);
                        }
                        // 8 shipping class
                        if($_REQUEST['shipping_class_bulk_action_type'][0] == ''){
                            unset($column_value_default['shipping_class']);
                        }
                        // 9 stock quantity
                        if($_REQUEST['stock_bulk_filter_value'][0] == ''){
                            unset($column_value_default['stock_quantity']);
                        }
                        // 10 category
                        if($_REQUEST['category_bulk_action_type'][0] == ''){
                            unset($column_value_default['category']);
                        }
                        // 11 tags
                        if($_REQUEST['tag_bulk_action_type'][0] == ''){
                            unset($column_value_default['tag']);
                        }
                        
                    } else {
                       
                        // When no action is going on
                        $column_value_default = array(
                            'num' => get_the_ID(),
                            'name' => get_the_title(),
                            'sku' => get_post_meta( get_the_ID(), '_sku', true ),
                            'stock_status' => get_post_meta( get_the_ID(), '_stock_status', true ),
                            'price' => get_post_meta( get_the_ID(), '_price', true )
                        );
                        
                    }
                
                ?>
		
            <tr>
                <?php foreach($column_value_default as $key){ ?>
                    <td><?php echo $key; ?></td>
                <?php } ?>
            </tr>

            <?php }} else { ?>
		<tr>
		<td colspan="6"><p style="text-align:center;"><?php _e('No data found', 'thepesta') ?></p></td>
		</tr>
            <?php } ?>
	</tbody>	
</table>
               

 <?php wp_reset_postdata(); 
 
    } else {
        echo 'Products';
        ?>
                <div class="postbox">                            
                    <div class="inside">  
                        <h3><b>There are no products meeting your filtering criteria. Please make some adjustments and try again.</b></h3>                           
                    </div>          
                </div>
    
    <?php 
    }
 
 ?>


</div>


    
    </div>
    <?php
}
