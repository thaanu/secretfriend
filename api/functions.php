<?php 
function auth() {
    return apache_request_headers();
}
function consoleLog( $message ) {
    $file = __DIR__ .'/secretfriend.log';
    $old = file_get_contents($file);
    if ( is_array($message) || is_object($message) ) {
        $message = print_r($message, true);
    }
    $message = date("Y-m-d H:i:s") . "\t" . $message;
    $message = $message . $old;
    return file_put_contents($file, $message);
}