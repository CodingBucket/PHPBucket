<?php        
    if('filter' == $_REQUEST['action']){

        add_filter( 'posts_where', 'wpse18703_posts_where', 10, 2 );
        function wpse18703_posts_where( $where, &$wp_query ){
            
            global $wpdb;
            //if ( $wpse18703_title = $wp_query->get( 'post_title' ) ) {name_drop_se
            // Drop1
            if ( $_REQUEST['name_drop_se'] == 'starts_with' ) {
                if ( $_REQUEST['name_drop_se_input'] ) {
                    //$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $_REQUEST['name_drop_se_input'] ) ) . '%\'';                       
                    $where .= ' AND '.$wpdb->posts.'.post_title LIKE \"'. $_REQUEST['name_drop_se_input'] .'%\"';
                }
            }
            if ( $_REQUEST['name_drop_se'] == 'ends_with' ) {
                if ( $_REQUEST['name_drop_se_input'] ) {
                    $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $_REQUEST['name_drop_se_input'] ) ) . '%\'';
                    $where.' AND '.$wpdb->posts.'.post_name LIKE "Episode_%"';
                }
            }
            // Drop2
            if ( $_REQUEST['name_drop_2'] == 'contains' ) {
                if ( $_REQUEST['name_drop_2_input'] ) {
                    //$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $_REQUEST['name_drop_se_input'] ) ) . '%\'';                       
                    $where .= ' AND '.$wpdb->posts.'.post_title LIKE \"'. $_REQUEST['name_drop_se_input'] .'%\"';
                }
            }
            if ( $_REQUEST['name_drop_2'] == 'does_not_contain' ) {
                if ( $_REQUEST['name_drop_2_input'] ) {
                    //$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $_REQUEST['name_drop_se_input'] ) ) . '%\'';                       
                    $where .= ' AND '.$wpdb->posts.'.post_title LIKE \"'. $_REQUEST['name_drop_se_input'] .'%\"';
                }
            }
            
            return $where;
        }


        $args=array(
           'post_type' => 'product',
            //'post_status' => 'publish',
            //'posts_per_page' => -1,
            //'caller_get_posts'=> 1, 
                                        //(int) - use post id.
              //'s' => 'hello' 

//                    'meta_query' => array(                  //(array) - Custom field parameters (available with Version 3.1).
//                        array(
//                          'key' => '_price',                  //(string) - Custom field key.
//                          'value' => '100',                 //(string/array) - Custom field value (Note: Array support is limited to a compare value of 'IN', 'NOT IN', 'BETWEEN', or 'NOT BETWEEN')                //(string) - Custom field type. Possible values are 'NUMERIC', 'BINARY', 'CHAR', 'DATE', 'DATETIME', 'DECIMAL', 'SIGNED', 'TIME', 'UNSIGNED'. Default value is 'CHAR'.
//                          'compare' => '=',                  //(string) - Operator to test. Possible values are '=', '!=', '>', '>=', '<', '<=', 'LIKE', 'NOT LIKE', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN'. Default value is '='.
//                        )
//                    ),
        );

        // The Query
        $the_query = new WP_Query( $args );

        /* Restore original Post Data */
        wp_reset_postdata();

    }else{

        $args=array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'caller_get_posts'=> 1,    
        );

        // The Query
        $the_query = new WP_Query( $args );

        /* Restore original Post Data */
        wp_reset_postdata();
    }    
?>