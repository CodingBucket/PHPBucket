<?php
if (!function_exists('mhs_print_arr')) {

    function mhs_print_arr($arr, $die = false) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        if ($die)
            die();
    }

}

if (!function_exists('rsbras_notification_output')) {

    function rsbras_notification_output($text) {
        $str = "";
        if (is_array($text)) {
            $str .= "<ul style='margin:0px;'>";
            foreach ($text as $v) {
                $str .= "<li>" . $v . "</li>";
            }
            $str .= "</ul>";
        } else {
            $str .= $text;
        }

        return $str;
    }

}

if (!function_exists('rsbras_updated_notification_view')) {

    function rsbras_updated_notification_view($text) {
        ?>
        <div style="background-color: #FFFFE0; border: 1px solid #E6DB55; font-weight: bold; padding: 10px; margin: 5px 0 15px; border-radius: 5px">
        <?php echo rsbras_notification_output($text); ?>
        </div>
        <?php
    }

}

if (!function_exists('rsbras_error_notification_view')) {

    function rsbras_error_notification_view($text) {
        ?>
        <div style="background-color: #FFEBE8; border: 1px solid #CC0000; font-weight: bold; padding: 10px; margin: 5px 0 15px; border-radius: 5px">
        <?php echo rsbras_notification_output($text); ?>
        </div>
        <?php
    }

}

if (!function_exists('rsbras_success_notification_view')) {

    function rsbras_success_notification_view($text) {
        ?>
        <div style="background-color: greenyellow; border: 1px solid green; font-weight: bold; padding: 10px; margin: 5px 0 15px; border-radius: 5px">
        <?php echo rsbras_notification_output($text); ?>
        </div>
        <?php
    }

}

if (!function_exists('rsbras_updated_notification')) {

    function rsbras_updated_notification($text) {
        ?>
        <div class="updated below-h2" style="width:99%; padding: 5px;">
            <p><?php echo rsbras_notification_output($text); ?></p>
        </div>
        <?php
    }

}

if (!function_exists('rsbras_error_notification')) {

    function rsbras_error_notification($text) {
        ?>
        <div class="error below-h2" style="width:99%; padding: 5px;">
            <p><?php echo rsbras_notification_output($text); ?></p>
        </div>
        <?php
    }

}
?>