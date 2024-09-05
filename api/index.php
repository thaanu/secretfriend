<?php 
$config = include __DIR__ . '/config.php';
include __DIR__ . '/functions.php';
include __DIR__ . '/Notion.php';
$response = [
    'status' => 200,
    'message' => 'OK'
];

$request = (object) json_decode(file_get_contents('php://input'), true);

try {

    $action = (array_key_exists('action', $_GET) ? $_GET['action'] : null);

    // Authorization
    $response['headers'] = auth();

    $response['data'] = $request->properties;

    // Sign Up
    if ( $action == 'signup' ) {
        $notion = new Notion($config['NOTION']);
        $notion->signUp( $request['name'], $request['password'], $request['email'] );
    }
    else {
        throw new Exception('Action not found', 404);
    }
    
}
catch ( Exception $e ) {
    $response['status'] = $e->getCode();
    $response['message'] = $e->getMessage();
}
finally {
    // Send response
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    header('Content-Type: application/json');
    echo json_encode($response);
}

