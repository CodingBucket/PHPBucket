<?php
class SP_Plugin {
 
    // class instance
    static $instance;
 
    // customer WP_List_Table object
    public $customers_obj;
 
    // class constructor
    public function __construct() {
        add_filter( 'set-screen-option', array( __CLASS__, 'set_screen' ), 10, 3 );
        add_action( 'admin_menu', array( $this, 'plugin_menu' ) );
    }
    
    public static function set_screen( $status, $option, $value ) {
        return $value;
    }
 
    public function plugin_menu() {
        //$hook = add_submenu_page(RS_BRAS_short_plugins . '_settings', "add", "Birth Astrology Entry", 0, "birth_astrology_entry", array( $this, 'plugin_settings_page' ));
        
        $hook = add_submenu_page( 'edit.php?post_type=product', 'Woo Bulk Editor', 'Woo Bulk Editor', 0, 'manage_product_terms', array( $this, 'plugin_settings_page' )  );
        
        add_action( "load-$hook", array( $this, 'screen_option' ) );

    }
    
    public function screen_option() {

        $option = 'per_page';
        $args   = array(
            'label'   => 'Customers',
            'default' => 5,
            'option'  => 'customers_per_page'
        );

        add_screen_option( $option, $args );

        $this->customers_obj = new Entry_List();
    }
    
    public function plugin_settings_page() {
        
        
        
            if($_GET['success']){
                    $success = 1;
                    $success_txt = 'Entry Successfully Deleted';
            }
        
        
            ?>








            
            <?php
            
            $args=array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'caller_get_posts'=> 1
            );

            // The Query
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts() ) {
                    echo '<ul>';
                    while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            echo '<li>' . get_the_title() .'  '. the_permalink(). '</li>';
                            
                    }
                    echo '</ul>';
            } else {
                    // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>












            <div class="wrap">
                <h2>WP_List_Table Class Example</h2>
                <?php
                if ($success == 1) {
                    rsbras_updated_notification($success_txt);
                }
                ?>

                <div id="poststuff">
                    <div id="post-body" class="metabox-holder columns-3">
                        <div id="post-body-content">
                            <div class="meta-box-sortables ui-sortable">
                                <form method="post">
                                    <?php
                                    $this->customers_obj->prepare_items();
                                    $this->customers_obj->display(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br class="clear">
                </div>
            </div>
        <?php
    }
    
    /** Singleton instance */
    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
}
?>