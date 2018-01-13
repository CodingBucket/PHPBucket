<?php

function rsbras_getVisitorIp(){
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}

function rsbras_isValidVisitor(){
    $track_data = array();
    $track_data['visitor_ip'] = rsbras_getVisitorIp();
    $track_data['created'] = date('Y-m-d');
    
    $count = rsbras_db_get_total_rows(RS_BRAS_DB_AT,"visitor_ip='".$track_data['visitor_ip']."' AND created='".$track_data['created']."'");
    $calculate_limit = get_option(RS_BRAS_short.'_calculate_limit', 3);
    if($count<$calculate_limit){
        return true;
    }
    return false;
}

function rsbras_isNewDate($date=''){
    global $wpdb;
    
    $count = rsbras_db_get_total_rows(RS_BRAS_DB_AT,"created='".$date."'");
    
    if($count==0){
        rsbras_db_query('TRUNCATE TABLE '.$wpdb->prefix.RS_BRAS_DB_AT);
    }
}

function rsbras_insertVisitor(){
    $track_data = array();
    $track_data['visitor_ip'] = rsbras_getVisitorIp();
    $track_data['created'] = date('Y-m-d');
    rsbras_isNewDate($track_data['created']);
    rsbras_db_insert(RS_BRAS_DB_AT, $track_data);
}

function rsbras_excerpt_no_read_more($text) {
    //return str_replace('[...]', ' <a href="' . get_permalink() . '">Continue reading<span class="meta-nav">→</span></a>', $text);
    $text = str_replace('<a href="' . get_permalink() . '">Continue reading <span class="meta-nav">&rarr;</span></a>', '', $text);
    return $text;
}

function rsbras_isPageExists($page_title) {
    $exists = false;
    if (get_page_by_title($page_title)) {
        $exists = true;
    }
    return $exists;
}

function rsbras_string2slug($string) {
    $string = strtolower($string);
    $string = str_replace(' ', '-', $string);
    return $string;
}

function rsbras_getPageUrl($astrology_type = '', $person1 = array(), $person2 = array()) {
    $url = false;
    $url_host = get_home_url() . '/';
    if (empty($astrology_type) || empty($person1)) {
        return $url;
    }

    if (!empty($person2)) {
        $compatibility_arr = array();
        $compatibility_arr['page_id'] = 0;
        $compatibility_arr['desc'] = '';
        $compatibility_arr['url'] = '';
        add_filter('get_the_excerpt', 'rsbras_excerpt_no_read_more');
    }

    switch ($astrology_type) {
        case 'wa':
            if (!empty($person2)) {
                $tmp_slug = 'compatibility-' . strtolower($person1['name']) . '-' . strtolower($person2['name']);
                $tmp_page = get_page_by_path($tmp_slug);
                if ($tmp_page) {
                    setup_postdata($tmp_page);
                    $compatibility_arr['page_id'] = $tmp_page->ID;
                    $compatibility_arr['desc'] = the_ratings('div', $tmp_page->ID, false) . get_the_excerpt();
                }

                $compatibility_arr['url'] = $url_host . $tmp_slug;

                return $compatibility_arr;
            } else {
                return $url_host . strtolower($person1['name']) . '-personality-characteristics';
            }

            break;

        case 'ca':
            if (!empty($person2)) {
                $tmp_slug = strtolower($person1['name']) . '-and-' . strtolower($person2['name']);
                $tmp_page = get_page_by_path($tmp_slug);
                if ($tmp_page) {
                    setup_postdata($tmp_page);
                    $compatibility_arr['page_id'] = $tmp_page->ID;
                    $compatibility_arr['desc'] = the_ratings('div', $tmp_page->ID, false) . get_the_excerpt();
                }

                $compatibility_arr['url'] = $url_host . $tmp_slug;

                return $compatibility_arr;
            } else {
                return $url_host . strtolower($person1['name']) . '-personality-characteristics';
            }

            break;

        case 'tc':
            if (!empty($person2)) {
                $tmp_slug = $person1['slug'] . '-vs-' . $person2['slug'];
                $tmp_page = get_page_by_path($tmp_slug);
                if ($tmp_page) {
                    setup_postdata($tmp_page);
                    $compatibility_arr['page_id'] = $tmp_page->ID;
                    $compatibility_arr['desc'] = the_ratings('div', $tmp_page->ID, false) . get_the_excerpt();
                    $compatibility_arr['url'] = $url_host . $tmp_slug;
                } else {
                    $tmp_slug = $person2['slug'] . '-vs-' . $person1['slug'];
                    $tmp_page = get_page_by_path($tmp_slug);
                    setup_postdata($tmp_page);
                    $compatibility_arr['page_id'] = $tmp_page->ID;
                    $compatibility_arr['desc'] = 1;
                    $compatibility_arr['url'] = $url_host . $tmp_slug;
                }

                return $compatibility_arr;
            } else {
                return $url_host . 'tarot-birth-card-compatibility-' . $person1['slug'];
            }

            break;

        case 'nl':
            if (!empty($person2)) {
                $tmp_slug = 'numerology-compatibility-number-' . $person1['number'] . '-and-' . $person2['number'];
                $tmp_page = get_page_by_path($tmp_slug);
                if ($tmp_page) {
                    setup_postdata($tmp_page);
                    $compatibility_arr['page_id'] = $tmp_page->ID;
                    $compatibility_arr['desc'] = the_ratings('div', $tmp_page->ID, false) . get_the_excerpt();
                    $compatibility_arr['url'] = $url_host . $tmp_slug;
                } else {
                    $tmp_slug = 'numerology-compatibility-number-' . $person2['number'] . '-and-' . $person1['number'];
                    $tmp_page = get_page_by_path($tmp_slug);
                    setup_postdata($tmp_page);
                    $compatibility_arr['page_id'] = $tmp_page->ID;
                    $compatibility_arr['desc'] = 1;
                    $compatibility_arr['url'] = $url_host . $tmp_slug;
                }

                return $compatibility_arr;
            } else {
                return $url_host . 'numerology-compatibility-' . $person1['slug'];
            }

            break;

        default:
            break;
    }

    return $url;
}

function rsbras_getCombineResult($person1 = array(), $person2 = array()) {
    $url = false;
    if (empty($person1) || empty($person2)) {
        return $url;
    }

    $final_array = array();
    $final_array['WesternAstrology'] = array();
    $final_array['WesternAstrology']['name'] = $person1['WesternAstrology']['name'] . ' and ' . $person2['WesternAstrology']['name'];
    $tmp = rsbras_getPageUrl('wa', $person1['WesternAstrology'], $person2['WesternAstrology']);
    $final_array['WesternAstrology']['page_id'] = $tmp['page_id'];
    $final_array['WesternAstrology']['desc'] = $tmp['desc'];
    $final_array['WesternAstrology']['url'] = $tmp['url'];

    $final_array['ChineseAstrology'] = array();
    $final_array['ChineseAstrology']['name'] = $person1['ChineseAstrology']['name'] . ' and ' . $person2['ChineseAstrology']['name'];
    $tmp = rsbras_getPageUrl('ca', $person1['ChineseAstrology'], $person2['ChineseAstrology']);
    $final_array['ChineseAstrology']['page_id'] = $tmp['page_id'];
    $final_array['ChineseAstrology']['desc'] = $tmp['desc'];
    $final_array['ChineseAstrology']['url'] = $tmp['url'];

    $final_array['Tarot'] = array();
    $final_array['Tarot']['name'] = $person1['Tarot']['name'] . ' / ' . $person2['Tarot']['name'];
    $tmp = rsbras_getPageUrl('tc', $person1['Tarot'], $person2['Tarot']);
    $final_array['Tarot']['page_id'] = $tmp['page_id'];
    $final_array['Tarot']['desc'] = $tmp['desc'];
    $final_array['Tarot']['url'] = $tmp['url'];

    $final_array['Numerology'] = array();
    $final_array['Numerology']['name'] = $person1['Numerology']['name'] . ' and ' . $person2['Numerology']['name'];
    $tmp = rsbras_getPageUrl('nl', $person1['Numerology'], $person2['Numerology']);
    $final_array['Numerology']['page_id'] = $tmp['page_id'];
    $final_array['Numerology']['desc'] = $tmp['desc'];
    $final_array['Numerology']['url'] = $tmp['url'];

    return $final_array;
}

function rsbras_getWesternAstrology($month = 0, $day = 0) {
    $wa_signs = array(
        array(
            "name" => "Aries",
            "limits" => array("0321", "0419")
        ),
        array(
            "name" => "Taurus",
            "limits" => array("0420", "0520")
        ),
        array(
            "name" => "Gemini",
            "limits" => array("0521", "0620")
        ),
        array(
            "name" => "Cancer",
            "limits" => array("0621", "0722")
        ),
        array(
            "name" => "Leo",
            "limits" => array("0723", "0822")
        ),
        array(
            "name" => "Virgo",
            "limits" => array("0823", "0922")
        ),
        array(
            "name" => "Libra",
            "limits" => array("0923", "1022")
        ),
        array(
            "name" => "Scorpio",
            "limits" => array("1023", "1121")
        ),
        array(
            "name" => "Sagittarius",
            "limits" => array("1122", "1221")
        ),
        array(
            "name" => "Capricorn",
            "limits" => array("1222", "0119")
        ),
        array(
            "name" => "Aquarius",
            "limits" => array("0120", "0218")
        ),
        array(
            "name" => "Pisces",
            "limits" => array("0219", "0320")
        ),
    );
    $fulldate = sprintf("%02d%02d", intval($month), intval($day));
    $selected_sign = -1;
    foreach ($wa_signs as $sign_index => $sign_details) {
        if ($fulldate >= $sign_details['limits'][0] && $fulldate <= $sign_details['limits'][1]) {
            $selected_sign = $sign_index;
            break;
        }
    }

    if ($selected_sign == -1) {
        $selected_sign = 9;
    }

    return $wa_signs[$selected_sign];
}

function rsbras_getChineseAstrology2($year = 0) {
    $sexaCycle = ($year - 3) - (60 * (floor(( $year - 3) / 60)));

    $ca_signs = array(
        1 => array("name" => "Rat", "Zodiac" => "Yang Wood"),
        array("name" => "Ox", "Zodiac" => "Yin Wood"),
        array("name" => "Tiger", "Zodiac" => "Yang Fire"),
        array("name" => "Rabbit", "Zodiac" => "Yin Fire"),
        array("name" => "Dragon", "Zodiac" => "Yang Earth"),
        array("name" => "Snake", "Zodiac" => "Yin Earth"),
        array("name" => "Horse", "Zodiac" => "Yang Metal"),
        array("name" => "Goat", "name2" => "sheep", "Zodiac" => "Yin Metal"),
        array("name" => "Monkey", "Zodiac" => "Yang Water"),
        array("name" => "Rooster", "Zodiac" => "Yin Water"),
        array("name" => "Dog", "Zodiac" => "Yang Wood"),
        array("name" => "Pig", "Zodiac" => "Yin Wood")
    );

    $selected_sign = -1;
    $i = 1;
    while (ceil($sexaCycle / 12) > 0) {
        foreach ($ca_signs as $sign_i => $sign) {
            if ($i == $sexaCycle) {
                $selected_sign = $sign_i;
                break;
            }
            $i++;
        }
        if ($selected_sign > 0) {
            break;
        }
    }

    return $ca_signs[$selected_sign];
}

function rsbras_getChineseAstrology($year = 0) {
    
    $selected_sign = ($year-1900)%12;

    $ca_signs = array(
        array("name" => "Rat", "Zodiac" => "Yang Wood"),
        array("name" => "Ox", "Zodiac" => "Yin Wood"),
        array("name" => "Tiger", "Zodiac" => "Yang Fire"),
        array("name" => "Rabbit", "Zodiac" => "Yin Fire"),
        array("name" => "Dragon", "Zodiac" => "Yang Earth"),
        array("name" => "Snake", "Zodiac" => "Yin Earth"),
        array("name" => "Horse", "Zodiac" => "Yang Metal"),
        array("name" => "Sheep", "name2" => "Goat", "Zodiac" => "Yin Metal"),
        array("name" => "Monkey", "Zodiac" => "Yang Water"),
        array("name" => "Rooster", "Zodiac" => "Yin Water"),
        array("name" => "Dog", "Zodiac" => "Yang Wood"),
        array("name" => "Pig", "Zodiac" => "Yin Wood")
    );

    return $ca_signs[$selected_sign];
}

function rsbras_getTarot($new_date = array(), $single = false) {

    $TarotSigns = array(
        array(
            'name' => '',
            'init' => 18,
            'last' => 9,
            'cards' => array(
                array('number' => 18, 'name' => 'The Moon'),
                array('number' => 9, 'name' => 'The Hermit'),
            ),
        ),
        array(
            'name' => '',
            'init' => 17,
            'last' => 8,
            'cards' => array(
                array('number' => 17, 'name' => 'The Star'),
                array('number' => 8, 'name' => 'Strength'),
            ),
        ),
        array(
            'name' => '',
            'init' => 16,
            'last' => 7,
            'cards' => array(
                array('number' => 16, 'name' => 'The Tower'),
                array('number' => 7, 'name' => 'The Chariot'),
            ),
        ),
        array(
            'name' => '',
            'init' => 15,
            'last' => 6,
            'cards' => array(
                array('number' => 15, 'name' => 'The Devil'),
                array('number' => 6, 'name' => 'The Lovers'),
            ),
        ),
        array(
            'name' => '',
            'init' => 14,
            'last' => 5,
            'cards' => array(
                array('number' => 14, 'name' => 'Temperence', 'name2' => 'Temperance'),
                array('number' => 5, 'name' => 'The Hierophant'),
            ),
        ),
        array(
            'name' => '',
            'init' => 13,
            'last' => 4,
            'cards' => array(
                array('number' => 13, 'name' => 'Death'),
                array('number' => 4, 'name' => 'The Emperor'),
            ),
        ),
        array(
            'name' => '',
            'init' => 12,
            'last' => 3,
            'cards' => array(
                array('number' => 12, 'name' => 'The Hanged Man'),
                array('number' => 3, 'name' => 'The Empress'),
            ),
        ),
        array(
            'name' => '',
            'init' => 11,
            'last' => 2,
            'cards' => array(
                array('number' => 11, 'name' => 'Justice'),
                array('number' => 2, 'name' => 'The High Priestess'),
            ),
        ),
        array(
            'name' => '',
            'init' => 10,
            'last' => 1,
            'cards' => array(
                array('number' => 10, 'name' => 'The Wheel of Fortune'),
                array('number' => 1, 'name' => 'The Magician'),
            ),
        ),
        array(
            'name' => '',
            'init' => 19,
            'last' => 1,
            'cards' => array(
                array('number' => 19, 'name' => 'The Sun'),
                array('number' => 10, 'name' => 'The Wheel of Fortune'),
                array('number' => 1, 'name' => 'The Magician'),
            ),
        ),
        array(
            'name' => '',
            'init' => 20,
            'last' => 2,
            'cards' => array(
                array('number' => 20, 'name' => 'Judgement'),
                array('number' => 2, 'name' => 'The High Priestess'),
            ),
        ),
        array(
            'name' => '',
            'init' => 21,
            'last' => 3,
            'cards' => array(
                array('number' => 21, 'name' => 'The World'),
                array('number' => 3, 'name' => 'The Empress'),
            ),
        ),
    );

    $date_cal = $new_date[0] + $new_date[1] + intval($new_date[2] / 100) + intval($new_date[2] % 100);
    //pr($date_cal);
    $first_card = intval($date_cal / 10) + intval($date_cal % 10);
    //pr($first_card);

    $num_part_1 = intval($first_card / 10);
    $num_part_2 = intval($first_card % 10);
    $selected_sign = -1;
    if (!$num_part_1) {
        foreach ($TarotSigns as $k => $v) {
            if ($v['last'] == $num_part_2) {
                $selected_sign = $k;
                break;
            }
        }
    } else {
        foreach ($TarotSigns as $k => $v) {
            if ($v['init'] == $first_card) {
                $selected_sign = $k;
                break;
            }
        }
    }


    $final_array = array();
    if ($selected_sign == -1) {
        $final_array = array(
            'name' => '',
            'init' => 22,
            'cards' => array(
                array('number' => 22, 'name' => 'The Fool')
            ),
        );
    } else {
        $final_array = $TarotSigns[$selected_sign];
    }

    $final_array['name'] = '';
    foreach ($final_array['cards'] as $k => $v) {
        if ($k) {
            $final_array['name'] .= ' and ';
        }
        if ($single && isset($v['name2'])) {
            $final_array['name'] .= $v['name2'];
        } else {
            $final_array['name'] .= $v['name'];
        }
    }
    
    $final_array['slug'] = strtolower($final_array['name']);
    $final_array['slug'] = str_replace(' ', '-', $final_array['slug']);
    if($single && $final_array['slug']=='the-sun-and-the-wheel-of-fortune-and-the-magician'){
        $final_array['slug']= str_replace('and-','',$final_array['slug']);
    }

    return $final_array;
}

function rsbras_numberToOneDigit($num = 0) {
    while ($num > 9) {
        $num = intval($num / 10) + intval($num % 10);
    }

    return $num;
}

function rsbras_getNumerology($new_date = array()) {
    $num = rsbras_numberToOneDigit(rsbras_numberToOneDigit($new_date[0]) + rsbras_numberToOneDigit($new_date[1]) + rsbras_numberToOneDigit($new_date[2]));

    $final_array = array(
        'name' => 'Number ' . $num,
        'number' => $num
    );
    $final_array['slug'] = strtolower($final_array['name']);
    $final_array['slug'] = str_replace(' ', '-', $final_array['slug']);

    return $final_array;
}

function rsbras_isValidDate($new_date = array()) {
    $valid = true;
    if (empty($new_date) || count($new_date) != 3) {
        return false;
    }
    foreach ($new_date as $k => $v) {
        $new_date[$k] = intval($v);
    }
    if (!($new_date[0] >= 1 && $new_date[0] <= 12)) {
        $valid = false;
    }
    if (!($new_date[1] >= 1 && $new_date[1] <= 31)) {
        $valid = false;
    }
    if (!($new_date[2] >= 1901 && $new_date[0] <= 2099)) {
        $valid = false;
    }
    if ($valid) {
        return $new_date;
    }
    return $valid;
}

?>