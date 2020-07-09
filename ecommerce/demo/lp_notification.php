<?php

    $data = file_get_contents('php://input');

    if ($data) {
        $lp_notification_file = "lp_notification.json";
        if (is_writable($lp_notification_file)) {
            print_r("file is writable");
        } else {
            print_r("file is not writable");
        }
        $data = date('m/d/Y h:i:s a', time()) . ': ' . $data;
        file_put_contents($lp_notification_file, $data, FILE_APPEND | LOCK_EX);
        print_r($data);
    } else {
        $lp_notification_file = "lp_notification.json";
        $data = file_get_contents($lp_notification_file);
        if ($data) {
            print_r($data);
        } else {
            print_r("file not found");
        }
    }
    
?>
