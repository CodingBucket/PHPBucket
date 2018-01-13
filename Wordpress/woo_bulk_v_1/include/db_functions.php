<?php

function rsbras_isEntryExists($table = '', $where = array()){
    global $wpdb;
    
    $count = $wpdb->get_var('SELECT COUNT(*) FROM '.$wpdb->prefix . $table.' WHERE name="'.$where['name'].'" AND dob="'.$where['dob'].'" AND email="'.$where['email'].'"');
    $count = intval($count);
    
    if($count){
        return true;
    }
    
    return false;
}

function rsbras_db_entry_insert($table = '', $data = array()) {    
    if (!rsbras_isEntryExists($table,$data)) {
        return rsbras_db_insert($table, $data);
    }

    return false;
}

function rsbras_db_query($sql='') {
    global $wpdb;    
    
    if (!empty($sql)) {
        $wpdb->query($sql);
    }

    return false;
}
    

function rsbras_db_insert($table = '', $data = array()) {
    global $wpdb;

    if (!isset($data['created'])) {
        $data['created'] = current_time('mysql');
    }

    if ($table && $data) {
        $wpdb->insert($wpdb->prefix . $table, $data);
        return $wpdb->insert_id;
    }

    return false;
}

function rsbras_db_update($table = '', $data = array(), $where = array()) {
    global $wpdb;

//    if (!isset($data['created'])) {
//        $data['created'] = current_time('mysql');
//    }

    if ($table && $data && $where) {
        $wpdb->update($wpdb->prefix . $table, $data, $where);
    }
}

function rsbras_db_select($table = '', $data = array(), $where = array()) {
    global $wpdb;

    if (!isset($data['created'])) {
        $data['created'] = current_time('mysql');
    }

    if ($table && $data && $where) {
        $wpdb->update($table, $data, $where);
    }
}

function rsbras_db_get_total_rows($table = '', $where = '') {
    global $wpdb;
    $count = 0;
    
    if(!empty($where)){
        $where = ' WHERE '.$where;
    }

    if ($table) {
        $count = $wpdb->get_var("SELECT COUNT(*) FROM " . $wpdb->prefix . $table . " " . $where);
    }

    return intval($count);
}

function get_result($id) {
    global $wpdb;
    
    return $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'rs_birth_astrology_entries WHERE code = "'.$id.'"');
}

function check_email($email) {
    global $wpdb;
    
    return $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'rs_birth_astrology_entries WHERE email = "'.$email.'" AND verification = "active" ');

}

function insert_verification($code) {
    global $wpdb;
    $wpdb->update( $wpdb->prefix.'rs_birth_astrology_entries', array( 'verification' => "active"), array( "code" => $code));
   // echo $wpdb->last_query;exit;
}

function get_entry() {
    global $wpdb;    
    return $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'rs_birth_astrology_entries');
    // return $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'rs_birth_astrology_entries where verification = "active" ');
}

function delete_entry($id) {
    global $wpdb;    
    $wpdb->query("DELETE FROM wp_rs_birth_astrology_entries where id =".$id);
    return true;
    //echo $wpdb->last_query;exit;
}

function delete_all_entry() {
    global $wpdb;   
    $wpdb->query("DELETE FROM wp_rs_birth_astrology_entries ");
    return true;
}

?>
