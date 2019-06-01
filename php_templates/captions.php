<?php

// Load in env vars and connect to DB
// require_once __DIR__ . '/../db.php';

$temp = getcwd() . '/db.php';
require_once $temp;

// Handle http request
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        // Retrieve captions
        $caption_id = !!empty($_GET["caption_id"]) ? null : $_GET["caption_id"];
        get_captions($caption_id);
        break;
    case 'POST':
        // Insert caption
        $temp1 = $_POST;
        insert_caption();
        break;
    case 'PUT':
        // Update caption
        $caption_id = !!empty($_GET["caption_id"]) ? null : $_GET["caption_id"];
        update_caption($caption_id);
        break;
    case 'DELETE':
        // Delete caption
        $caption_id = !!empty($_GET["caption_id"]) ? null : $_GET["caption_id"];
        delete_caption($caption_id);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_captions($caption_id)
{
    global $connection;
    $query = "SELECT * FROM Captions";
    if ($caption_id !== null) {
        $query .= " WHERE caption_id='" . $caption_id . "' LIMIT 1";
    }
    $response = array();
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        $response[] = array('caption_id' => $row['caption_id'], 'caption' => $row['caption']);
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert_caption()
{
    global $connection;
    $POST_BODY = json_decode(file_get_contents("php://input"), true);
    $response = array();
    foreach ($POST_BODY as $DATA) {
        $caption_id = $DATA['caption_id'];
        $caption = $DATA['caption'];
        $query = "INSERT INTO captions (caption_id, caption)
        VALUES('{$caption_id}', '{$caption}') ON DUPLICATE KEY
        UPDATE caption_id='{$caption_id}', caption='{$caption}'; ";

        if (mysqli_query($connection, $query)) {
            $response[] = array(
                'status' => 1,
                'status_message' => 'caption Added Successfully.'
            );
        } else {
            $response[] = array(
                'status' => 0,
                'status_message' => 'caption Addition Failed.'
            );
        }

        $temp = $response;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function update_caption($caption_id)
{
    global $connection;
    parse_str(file_get_contents("php://input"), $post_vars);
    $PUT_BODY = json_decode(file_get_contents("php://input"), true);
    $caption  = $PUT_BODY["caption"];
    $query = "UPDATE captions SET caption='{$caption}' WHERE caption_id='" . $caption_id . "';";
    if (mysqli_query($connection, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'caption Updated Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'caption Updation Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function delete_caption($caption_id)
{
    global $connection;
    $query = "DELETE FROM captions WHERE caption_id='" . $caption_id . "';";
    if (mysqli_query($connection, $query)) {
        $response = array(
            'status' => 1,
            'status_message' => 'caption Deleted Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'caption Deletion Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
