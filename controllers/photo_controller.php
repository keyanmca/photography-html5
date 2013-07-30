<?php
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    include_once('../models/flickr_model.php');
    include_once('../models/album_collection_model.php');
    include_once('../models/album_model.php');
    include_once('../models/photo_model.php');
    include_once('../models/memcache_model.php');

    $action = $_REQUEST['action'];
    switch($action)
    {
        case 'photoasjson':
        {   
            $photo_id = $_REQUEST['photo_id'];
            $photo = photo::photo_from_id($photo_id);
            echo json_encode((array)$photo);
            break;
        }
        default:
        {
            echo json_encode(array('message' => 'no_function'));
            break;
        }
    }

?>