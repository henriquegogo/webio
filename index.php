<?php
session_id($_REQUEST['channel'] != '' ? $_REQUEST['channel'] : 'default');
session_start();

if (!is_array($_SESSION['messages'])) {
    $_SESSION['messages'] = array();
}
else {
    $_SESSION['messages'] = array_filter($_SESSION['messages'],
        function($message) {
            return intval(microtime(true) - $message['timestamp']) < 15;
        }
    );
}

if (isset($_REQUEST['message'])) {
    array_push($_SESSION['messages'], array(
        'timestamp' => microtime(true),
        'message' => substr(htmlspecialchars($_REQUEST['message']), 0, 500)
    ));
}
else {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Content-Type: application/json');
    echo json_encode($_SESSION['messages']);
}
?>
