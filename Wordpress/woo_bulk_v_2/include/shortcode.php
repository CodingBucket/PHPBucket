<?php

function rsbras_personal_shortcode_func($atts = null) {
    $short_form = 'form';
    $short = 'rsbras';
    $success = 0;
    $error = 0;

    extract(shortcode_atts(array(
                'form_name' => 'RS Birth Astrology',
                'form_id' => '0'
                    ), $atts));

    $enable = (int) get_option(RS_BRAS_short);


    $months = array(
        1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    );

    ob_start();
    //if (rsbras_isValidVisitor()) {
        if ($enable) {
            rsbras_insertVisitor();
            ?>
            <style type="text/css">
                .rsbras_form_main_block {
                    width: 100%;
                    margin: 0px;
                    padding: 0px;
                }
                .rsbras_form_main_block .rsbras_form_row {
                    margin: 0px;
                    padding: 10px 0px;
                    display: block;
                }
            </style>
            <?php
            $isOk = true;
            $err_arr = array();
            if (isset($_GET['rsbras'])) {
                
                if (!isset($_GET['rsbras']['name']) || empty($_GET['rsbras']['name'])) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Name";
                }
                if (!isset($_GET['rsbras']['date']) || empty($_GET['rsbras']['date']) || count($_GET['rsbras']['date']) != 3) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Date of Birth";
                }
                if (!isset($_GET['rsbras']['email']) || empty($_GET['rsbras']['email'])) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Email";
                } elseif (!filter_var($_GET['rsbras']['email'], FILTER_VALIDATE_EMAIL)) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Valid Email";
                }
            }

            if (isset($_GET['rsbras']) && $isOk) {
                $rsbras_data = $_GET['rsbras'];
                $rsbras_report = array();
                $rsbras_report['WesternAstrology'] = rsbras_getWesternAstrology($rsbras_data['date'][0], $rsbras_data['date'][1]);
                $rsbras_report['ChineseAstrology'] = rsbras_getChineseAstrology($rsbras_data['date'][2]);
                $rsbras_report['Tarot'] = rsbras_getTarot($rsbras_data['date']);
                $rsbras_report['Numerology'] = rsbras_getNumerology($rsbras_data['date']);
                
                
                // Random Number Create
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ';
                $randomString = '';
                $length = rand(6, 10);
                for ($i = 0; $i < 6; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
                
                $db_data = array();
                $db_data['code'] = $randomString;  
                $db_data['name'] = $rsbras_data['name'];
                $db_data['dob'] = sprintf('%4d-%02d-%02d', intval($rsbras_data['date'][2]), intval($rsbras_data['date'][0]), intval($rsbras_data['date'][1]));
                $db_data['email'] = $rsbras_data['email'];
                
                rsbras_db_entry_insert(RS_BRAS_DB, $db_data);
                
                $re = check_email($db_data['email']);
                //print_r($re);exit;
                if(isset($re) && $re != NULL){
                    if($re[0]->verification == 'active'){ ?>
            
                        <h1>Personal LoveProject Report for: <?php echo strtoupper($rsbras_data['name']); ?></h1>

                        <div class="rsbras_form_main_block">
                            <div class="rsbras_form_row">
                                Your Western Astrology Sign is: <a href="<?php echo rsbras_getPageUrl('wa', $rsbras_report['WesternAstrology']); ?>"><?php echo $rsbras_report['WesternAstrology']['name']; ?></a>
                            </div>

                            <div class="rsbras_form_row">
                                Your Chinese Astrology Sign is: <a href="<?php echo rsbras_getPageUrl('ca', $rsbras_report['ChineseAstrology']); ?>"><?php echo $rsbras_report['ChineseAstrology']['name']; ?></a>
                            </div>

                            <div class="rsbras_form_row">
                                Your Tarot Birth Cards are: <a href="<?php echo rsbras_getPageUrl('tc', $rsbras_report['Tarot']); ?>"><?php echo $rsbras_report['Tarot']['name']; ?></a>
                            </div>

                            <div class="rsbras_form_row">
                                Your Numerology Number is: <a href="<?php echo rsbras_getPageUrl('nl', $rsbras_report['Numerology']); ?>"><?php echo $rsbras_report['Numerology']['name']; ?></a>
                            </div>

                            <div class="rsbras_form_row">
                                Create another <a href="http://loveproject.com/personal-report-calculator/">Personal LoveProject Report</a> or a <a href="http://loveproject.com/compatibility-report-calculator/">LoveProject Compatibility Report</a>
                            </div>

                            <div class="rsbras_form_row">
                                For entertainment purposes only - Copyright LoveProject.com
                            </div>
                        </div>
                    
                <?php    }
                }else{
                        // write the email content
                        $header .= "MIME-Version: 1.0\n";
                        $header .= "Content-Type: text/html; charset=utf-8\n";
                        $header .= "From:" . 'hasankhan@sahajjo.com';

                        $to =  $db_data['email'];
                        $subject = 'Personal Report Calculator';
                        $message = 'Click this link to see your result '.site_url().'/personal-report-calculator?view=report&id='.$randomString;
                        wp_mail( $to, $subject, $message, $headers );

                        $msg = 'Please Check Your E-Mail';
                        rsbras_success_notification_view($msg);
                }
                
                ?>
            
                                                                         
                
                <?php
            } else {
                if (!$isOk) {
                    rsbras_error_notification_view($err_arr);
                }
                ?>
            
            
            
                <?php if($_GET['view'] == 'report'){ ?>
                    <?php 
                        if($_GET['id']){ 
                            $id = $_GET['id'];
                        }
                        $result = get_result($id);
                        //print_r($result);exit;
                         
                        insert_verification($id);
                        
                        
                        list($y1,$m1,$d1) = explode('-',$result[0]->dob);
                        $rsbras_data['name'] = $result[0]->name;
                        $rsbras_data['date'][0] = ltrim ($m1, '0');
                        $rsbras_data['date'][1] = ltrim ($d1, '0');
                        $rsbras_data['date'][2] = $y1; 
                        
                        
                        $rsbras_report['WesternAstrology'] = rsbras_getWesternAstrology($rsbras_data['date'][0], $rsbras_data['date'][1]);
                        $rsbras_report['ChineseAstrology'] = rsbras_getChineseAstrology($rsbras_data['date'][2]);
                        $rsbras_report['Tarot'] = rsbras_getTarot($rsbras_data['date']);
                        $rsbras_report['Numerology'] = rsbras_getNumerology($rsbras_data['date']);
                        
                        

                    ?>
            
            
            
                    <h1>Personal LoveProject Report for: <?php echo strtoupper($rsbras_data['name']); ?></h1>

                    <div class="rsbras_form_main_block">
                        <div class="rsbras_form_row">
                            Your Western Astrology Sign is: <a href="<?php echo rsbras_getPageUrl('wa', $rsbras_report['WesternAstrology']); ?>"><?php echo $rsbras_report['WesternAstrology']['name']; ?></a>
                        </div>

                        <div class="rsbras_form_row">
                            Your Chinese Astrology Sign is: <a href="<?php echo rsbras_getPageUrl('ca', $rsbras_report['ChineseAstrology']); ?>"><?php echo $rsbras_report['ChineseAstrology']['name']; ?></a>
                        </div>

                        <div class="rsbras_form_row">
                            Your Tarot Birth Cards are: <a href="<?php echo rsbras_getPageUrl('tc', $rsbras_report['Tarot']); ?>"><?php echo $rsbras_report['Tarot']['name']; ?></a>
                        </div>

                        <div class="rsbras_form_row">
                            Your Numerology Number is: <a href="<?php echo rsbras_getPageUrl('nl', $rsbras_report['Numerology']); ?>"><?php echo $rsbras_report['Numerology']['name']; ?></a>
                        </div>

                        <div class="rsbras_form_row">
                            Create another <a href="http://loveproject.com/personal-report-calculator/">Personal LoveProject Report</a> or a <a href="http://loveproject.com/compatibility-report-calculator/">LoveProject Compatibility Report</a>
                        </div>

                        <div class="rsbras_form_row">
                            For entertainment purposes only - Copyright LoveProject.com
                        </div>
                    </div>
                
                <?php } else { ?> 
            
            
            
                    <form method="get" action="">
                        <div class="rsbras_form_main_block">
                            <input type="hidden" name="rsbras[type]" value="personal-report" />
                            <h1>Personal Report Calculator</h1>
                            <div class="rsbras_form_row">
                                <strong>Your Name gsdnsn:</strong>&nbsp;<input type="text" name="rsbras[name]" />
                            </div>
                            <div class="rsbras_form_row">
                                <strong>Your Date of Birth:</strong>&nbsp;
                                <select name="rsbras[date][0]">
                                    <?php
                                    foreach ($months as $k => $v) {
                                        ?>
                                        <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select name="rsbras[date][1]">
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select name="rsbras[date][2]">
                                    <?php
                                    for ($i = 1901; $i <= (int) date('Y'); $i++) {
                                        ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="rsbras_form_row">
                                <strong>Your Email:</strong> <input type="text" name="rsbras[email]" />
                            </div>
                            <div class="rsbras_form_row">
                                By clicking submit you agree to our <a href="http://loveproject.com/terms-of-use/">Terms and Conditions</a>
                            </div>
                            <div class="rsbras_form_row">
                                <input type="submit" value="Submit" />
                            </div>
                        </div>
                    </form>
                    
                <?php } ?> 
                    
                <?php
            }
        } else {
            rsbras_error_notification_view('Not Enabled');
        }
    // } else {
        // rsbras_error_notification_view('Your Daliy Limit Exceeded');
    // }
    $x = ob_get_contents();
    ob_end_clean();
    return $x;
}

add_shortcode('rsbras_personal_shortcode', 'rsbras_personal_shortcode_func');
?>
<?php

function rsbras_compatibility_shortcode_func($atts = null) {
    $short_form = 'form';
    $short = 'rsbras';
    $success = 0;
    $error = 0;

    extract(shortcode_atts(array(
                'form_name' => 'RS Birth Astrology',
                'form_id' => '0'
                    ), $atts));

    $enable = (int) get_option(RS_BRAS_short);


    $months = array(
        1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    );

    ob_start();

    //if (rsbras_isValidVisitor()) {
        if ($enable) {
            rsbras_insertVisitor();
            ?>
            <style type="text/css">
                .rsbras_form_main_block {
                    width: 100%;
                    margin: 0px;
                    padding: 0px;
                }
                .rsbras_form_main_block .rsbras_form_row {
                    margin: 0px;
                    padding: 10px 0px;
                    display: block;
                }
            </style>
            <?php
            $isOk = true;
            $err_arr = array();
            if (isset($_GET['rsbras'])) {
                if (!isset($_GET['rsbras']['person1']['name']) || empty($_GET['rsbras']['person1']['name'])) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Name";
                }
                if (!isset($_GET['rsbras']['person1']['date']) || empty($_GET['rsbras']['person1']['date']) || count($_GET['rsbras']['person1']['date']) != 3) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Date of Birth";
                }
                if (!isset($_GET['rsbras']['person2']['name']) || empty($_GET['rsbras']['person2']['name'])) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Partner's Name";
                }
                if (!isset($_GET['rsbras']['person2']['date']) || empty($_GET['rsbras']['person2']['date']) || count($_GET['rsbras']['person2']['date']) != 3) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Partner's Date of Birth";
                }
                if (!isset($_GET['rsbras']['email']) || empty($_GET['rsbras']['email'])) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Your Email";
                } elseif (!filter_var($_GET['rsbras']['email'], FILTER_VALIDATE_EMAIL)) {
                    $isOk = false;
                    $err_arr[] = "Please Insert Valid Email";
                }
            }

            if (isset($_GET['rsbras']) && $isOk) {
                
                $rsbras_data = $_GET['rsbras'];
               // print_r($rsbras_data);exit;
//            mhs_print_arr($rsbras_data);
                $person1 = $rsbras_data['person1'];
                $person2 = $rsbras_data['person2'];
                $rsbras_report = array();
                $rsbras_report['person1']['WesternAstrology'] = rsbras_getWesternAstrology($person1['date'][0], $person1['date'][1]);
                $rsbras_report['person1']['ChineseAstrology'] = rsbras_getChineseAstrology($person1['date'][2]);
                $rsbras_report['person1']['Tarot'] = rsbras_getTarot($person1['date'], true);
                $rsbras_report['person1']['Numerology'] = rsbras_getNumerology($person1['date']);

                $rsbras_report['person2']['WesternAstrology'] = rsbras_getWesternAstrology($person2['date'][0], $person2['date'][1]);
                $rsbras_report['person2']['ChineseAstrology'] = rsbras_getChineseAstrology($person2['date'][2]);
                $rsbras_report['person2']['Tarot'] = rsbras_getTarot($person2['date'], true);
                $rsbras_report['person2']['Numerology'] = rsbras_getNumerology($person2['date']);
                $rsbras_report['final'] = rsbras_getCombineResult($rsbras_report['person1'], $rsbras_report['person2']);
                
                 

                
                // Random Number Create
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXYZ';
                $randomString = '';
                $length = rand(6, 10);
                for ($i = 0; $i < 6; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
                
                $db_data = array();
                $db_data['code'] = $randomString;                
                $db_data['name'] = $person1['name'];
                $db_data['dob'] = sprintf('%4d-%02d-%02d', intval($person1['date'][2]), intval($person1['date'][0]), intval($person1['date'][1]));
                $db_data['email'] = $rsbras_data['email'];
                rsbras_db_entry_insert(RS_BRAS_DB, $db_data);

                $db_data = array();
                $db_data['code'] = $randomString;
                $db_data['name'] = $person2['name'];
                $db_data['dob'] = sprintf('%4d-%02d-%02d', intval($person2['date'][2]), intval($person2['date'][0]), intval($person2['date'][1]));
                $db_data['email'] = $rsbras_data['email'];
                rsbras_db_entry_insert(RS_BRAS_DB, $db_data);
				

                
                $re = check_email($db_data['email']);
                //print_r($re[0]->verification);exit;
                if(isset($re) && $re != NULL){
                      if($re[0]->verification == 'active'){ ?>
            
                            <h1>LoveProject Compatibility Report for: <?php echo strtoupper($rsbras_data['person1']['name']); ?> and <?php echo strtoupper($rsbras_data['person2']['name']); ?></h1>

                            <div class="rsbras_form_main_block">
                                <?php
                                //mhs_print_arr($rsbras_data);
                                //mhs_print_arr($rsbras_report);
                                ?>
                                <div class="rsbras_form_row">
                                    <strong>Compatibility Western Astrology: <a href="<?php echo $rsbras_report['final']['WesternAstrology']['url']; ?>"><?php echo $rsbras_report['final']['WesternAstrology']['name']; ?></a></strong>
                                    <p>
                                        <?php echo $rsbras_report['final']['WesternAstrology']['desc']; ?>
                                        <?php if (!empty($rsbras_report['final']['WesternAstrology']['desc'])) { ?>
                                            <a href="<?php echo get_page_link($rsbras_report['final']['WesternAstrology']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                        <?php } ?>
                                    </p>
                                </div>

                                <div class="rsbras_form_row">
                                    <strong>Compatibility Chinese Astrology: <a href="<?php echo $rsbras_report['final']['ChineseAstrology']['url']; ?>"><?php echo $rsbras_report['final']['ChineseAstrology']['name']; ?></a></strong>
                                    <p>
                                        <?php echo $rsbras_report['final']['ChineseAstrology']['desc']; ?>
                                        <?php if (!empty($rsbras_report['final']['ChineseAstrology']['desc'])) { ?>
                                            <a href="<?php echo get_page_link($rsbras_report['final']['ChineseAstrology']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                        <?php } ?>
                                    </p>
                                </div>

                                <div class="rsbras_form_row">
                                    <strong>Tarot Birth Card Compatibility: <a href="<?php echo $rsbras_report['final']['Tarot']['url']; ?>"><?php echo $rsbras_report['final']['Tarot']['name']; ?></a></strong>
                                    <p>
                                        <?php echo $rsbras_report['final']['Tarot']['desc']; ?>
                                        <?php if (!empty($rsbras_report['final']['Tarot']['desc'])) { ?>
                                            <a href="<?php echo get_page_link($rsbras_report['final']['Tarot']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                        <?php } ?>
                                    </p>
                                </div>

                                <div class="rsbras_form_row">
                                    <strong>Numerology Compatibility: <a href="<?php echo $rsbras_report['final']['Numerology']['url']; ?>"><?php echo $rsbras_report['final']['Numerology']['name']; ?></a></strong>
                                    <p>
                                        <?php echo $rsbras_report['final']['Numerology']['desc']; ?>
                                        <?php if (!empty($rsbras_report['final']['Numerology']['desc'])) { ?>
                                            <a href="<?php echo get_page_link($rsbras_report['final']['Numerology']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                        <?php } ?>
                                    </p>
                                </div>

                                <div class="rsbras_form_row">
                                    Create another
                                    <a href="http://loveproject.com/compatibility-report-calculator/">LoveProject Compatibility Report</a>
                                    or a
                                    <a href="http://loveproject.com/personal-report-calculator/">Personal LoveProject Report</a>
                                </div>

                                <div class="rsbras_form_row">
                                    For entertainment purposes only - Copyright LoveProject.com
                                </div>
                            </div>
                    
                <?php }
                }else{
                        // write the email content
                        $header .= "MIME-Version: 1.0\n";
                        $header .= "Content-Type: text/html; charset=utf-8\n";
                        $header .= "From:" . 'hasankhan@sahajjo.com';

                        $to =  $db_data['email'];
                        $subject = 'Compatibility Report Calculator';
                        $message = 'Click this link to see your result '.site_url().'/compatibility-report-calculator?view=show&id='.$randomString;
                        wp_mail( $to, $subject, $message, $headers );



                        $msg = 'Please Check Your E-Mail';
                        rsbras_success_notification_view($msg);
                }
                
                ?>
            
                
                
                
                <?php
            } else {
                if (!$isOk) {
                    rsbras_error_notification_view($err_arr);
                }
                ?>
            
            
            
             <?php if($_GET['view'] == 'show'){ ?>
                    <?php 
                        if($_GET['id']){ 
                            $id = $_GET['id'];
                        }
                        
                        $result = get_result($id);
                        print_r($result);exit;
                        
                        insert_verification($id);
                      
                        list($y1,$m1,$d1) = explode('-',$result[0]->dob);
                        $person1['name'] = $result[0]->name;
                        $person1['date'][0] = ltrim ($m1, '0');
                        $person1['date'][1] = ltrim ($d1, '0');
                        $person1['date'][2] = $y1;                     
                        
                        list($y2,$m2,$d2) = explode('-',$result[1]->dob);
                        $person2['name'] = $result[1]->name;
                        $person2['date'][0] = ltrim ($m2, '0');
                        $person2['date'][1] = ltrim ($d2, '0');
                        $person2['date'][2] = $y2;                
                        
                //$person1 = $rsbras_data['person1'];
                //$person2 = $rsbras_data['person2'];
                $rsbras_report = array();
                $rsbras_report['person1']['WesternAstrology'] = rsbras_getWesternAstrology($person1['date'][0], $person1['date'][1]);
                $rsbras_report['person1']['ChineseAstrology'] = rsbras_getChineseAstrology($person1['date'][2]);
                $rsbras_report['person1']['Tarot'] = rsbras_getTarot($person1['date'], true);
                $rsbras_report['person1']['Numerology'] = rsbras_getNumerology($person1['date']);

                $rsbras_report['person2']['WesternAstrology'] = rsbras_getWesternAstrology($person2['date'][0], $person2['date'][1]);
                $rsbras_report['person2']['ChineseAstrology'] = rsbras_getChineseAstrology($person2['date'][2]);
                $rsbras_report['person2']['Tarot'] = rsbras_getTarot($person2['date'], true);
                $rsbras_report['person2']['Numerology'] = rsbras_getNumerology($person2['date']);
                $rsbras_report['final'] = rsbras_getCombineResult($rsbras_report['person1'], $rsbras_report['person2']);
 
                    ?>
                
                    <h1>LoveProject Compatibility Report for: <?php echo strtoupper($person1['name']); ?> and <?php echo strtoupper($person2['name']); ?></h1>

                    <div class="rsbras_form_main_block">
                        <?php
                        //mhs_print_arr($rsbras_data);
                        //mhs_print_arr($rsbras_report);
                        ?>
                        <div class="rsbras_form_row">
                            <strong>Compatibility Western Astrology: <a href="<?php echo $rsbras_report['final']['WesternAstrology']['url']; ?>"><?php echo $rsbras_report['final']['WesternAstrology']['name']; ?></a></strong>
                            <p>
                                <?php echo $rsbras_report['final']['WesternAstrology']['desc']; ?>
                                <?php if (!empty($rsbras_report['final']['WesternAstrology']['desc'])) { ?>
                                    <a href="<?php echo get_page_link($rsbras_report['final']['WesternAstrology']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                <?php } ?>
                            </p>
                        </div>

                        <div class="rsbras_form_row">
                            <strong>Compatibility Chinese Astrology: <a href="<?php echo $rsbras_report['final']['ChineseAstrology']['url']; ?>"><?php echo $rsbras_report['final']['ChineseAstrology']['name']; ?></a></strong>
                            <p>
                                <?php echo $rsbras_report['final']['ChineseAstrology']['desc']; ?>
                                <?php if (!empty($rsbras_report['final']['ChineseAstrology']['desc'])) { ?>
                                    <a href="<?php echo get_page_link($rsbras_report['final']['ChineseAstrology']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                <?php } ?>
                            </p>
                        </div>

                        <div class="rsbras_form_row">
                            <strong>Tarot Birth Card Compatibility: <a href="<?php echo $rsbras_report['final']['Tarot']['url']; ?>"><?php echo $rsbras_report['final']['Tarot']['name']; ?></a></strong>
                            <p>
                                <?php echo $rsbras_report['final']['Tarot']['desc']; ?>
                                <?php if (!empty($rsbras_report['final']['Tarot']['desc'])) { ?>
                                    <a href="<?php echo get_page_link($rsbras_report['final']['Tarot']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                <?php } ?>
                            </p>
                        </div>

                        <div class="rsbras_form_row">
                            <strong>Numerology Compatibility: <a href="<?php echo $rsbras_report['final']['Numerology']['url']; ?>"><?php echo $rsbras_report['final']['Numerology']['name']; ?></a></strong>
                            <p>
                                <?php echo $rsbras_report['final']['Numerology']['desc']; ?>
                                <?php if (!empty($rsbras_report['final']['Numerology']['desc'])) { ?>
                                    <a href="<?php echo get_page_link($rsbras_report['final']['Numerology']['page_id']); ?>">Continue reading <span class="meta-nav">&rarr;</span></a>
                                <?php } ?>
                            </p>
                        </div>

                        <div class="rsbras_form_row">
                            Create another
                            <a href="http://loveproject.com/compatibility-report-calculator/">LoveProject Compatibility Report</a>
                            or a
                            <a href="http://loveproject.com/personal-report-calculator/">Personal LoveProject Report</a>
                        </div>

                        <div class="rsbras_form_row">
                            For entertainment purposes only - Copyright LoveProject.com
                        </div>
                    </div>
                
                <?php }else{ ?>
            
                     <form method="get" action="">
                    <div class="rsbras_form_main_block">
                        <input type="hidden" name="rsbras[type]" value="compatibility-report" />
                        <h1>Compatibility Report Calculator</h1>
                        <div class="rsbras_form_row">
                            <strong>Your Name:</strong>&nbsp;<input type="text" name="rsbras[person1][name]" />
                        </div>
                        <div class="rsbras_form_row">
                            <strong>Your Date of Birth:</strong>&nbsp;
                            <select name="rsbras[person1][date][0]">
                                <?php
                                foreach ($months as $k => $v) {
                                    ?>
                                    <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select name="rsbras[person1][date][1]">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select name="rsbras[person1][date][2]">
                                <?php
                                for ($i = 1901; $i <= (int) date('Y'); $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="rsbras_form_row">
                            <strong>Your Partner's Name:</strong>&nbsp;<input type="text" name="rsbras[person2][name]" />
                        </div>
                        <div class="rsbras_form_row">
                            <strong>Your Partner's Date of Birth:</strong>&nbsp;
                            <select name="rsbras[person2][date][0]">
                                <?php
                                foreach ($months as $k => $v) {
                                    ?>
                                    <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select name="rsbras[person2][date][1]">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select name="rsbras[person2][date][2]">
                                <?php
                                for ($i = 1901; $i <= (int) date('Y'); $i++) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="rsbras_form_row">
                            <strong>Your Email:</strong> <input type="text" name="rsbras[email]" />
                        </div>
                        <div class="rsbras_form_row">
                            By clicking submit you agree to our <a href="http://loveproject.com/terms-of-use/">Terms and Conditions</a>
                        </div>
                        <div class="rsbras_form_row">
                            <input type="submit" value="Submit" />
                        </div>
                    </div>
                </form>
                    
                <?php } ?>
                   
                   
               
                <?php
            }
        } else {
            rsbras_error_notification_view('Not enabled');
        }
    // } else {
        // rsbras_error_notification_view('Your Daliy Limit Exceeded');
    // }
    $x = ob_get_contents();
    ob_end_clean();
    return $x;
}

add_shortcode('rsbras_compatibility_shortcode', 'rsbras_compatibility_shortcode_func');


?>