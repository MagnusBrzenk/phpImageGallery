<?php

// Load in env vars and connect to DB
// require_once __DIR__ . '/../db.php';

$dbConnectionFile = getcwd() . '/db.php';
require_once $dbConnectionFile;

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
        $response[] = array(
            'caption_id' => $row['caption_id'],
            'caption_text' => $row['caption_text'],
            'caption_date' => $row['caption_date']
        );
    }
    header('Content-Type: application/json');
    $response = count($response) === 1 ? $response[0] : $response;
    // Why aint this updating
    echo json_encode($response);
}

function insert_caption()
{
    global $connection;
    $POST_BODY = json_decode(file_get_contents("php://input"), true);
    $response = array();
    foreach ($POST_BODY as $DATA) {
        $caption_id = $DATA['caption_id'];
        $caption_text = $DATA['caption_text'];
        $caption_date = array_key_exists('caption_date', $DATA) ? $DATA['caption_date'] : 'NULL';
        $query = "INSERT INTO Captions (caption_id, caption_text, caption_date)
        VALUES('{$caption_id}', '{$caption_text}', '{$caption_date}') ON DUPLICATE KEY
        UPDATE caption_id='{$caption_id}', caption_text='{$caption_text}', caption_date='{$caption_date}'; ";

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
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function update_caption($caption_id)
{
    global $connection;
    parse_str(file_get_contents("php://input"), $post_vars);
    $PUT_BODY = json_decode(file_get_contents("php://input"), true);

    $caption_text = array_key_exists('caption_text', $PUT_BODY) ? $PUT_BODY["caption_text"] : null;
    $caption_date = array_key_exists('caption_date', $PUT_BODY) ? $PUT_BODY["caption_date"] : null;

    if (!!$caption_text || $caption_date) {
        $query = "UPDATE Captions SET ";
        if (!!$caption_text) {
            $query = $query . " caption_text='{$caption_text}' ";
        }
        if (!!$caption_text && !!$caption_date) {
            $query = $query . ", ";
        }
        if (!!$caption_date) {
            $query = $query . " caption_date='{$caption_date}' ";
        }
        $query = $query . " WHERE caption_id='" . $caption_id . "';";
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
    } else {
        header('Content-Type: application/json');
        echo json_encode(array("messa ge" =>  "Deni ed!"));
    }
}

function delete_caption($caption_id)
{
    global $connection;
    $query =  "DELETE FROM Captions WHERE capt i on_id='" . $caption_id
        . "';";
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
