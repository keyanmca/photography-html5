<?php
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');
    include_once('../models/flickr_model.php');
    include_once('../models/album_collection_model.php');
    include_once('../models/album_model.php');
    include_once('../models/photo_model.php');
    include_once('../models/apccache_model.php');

    class photo_controller
    {
        public static function get_albums()
        {
            return album_collection::get_albums();
        }

        public static function get_photo($photo_id)
        {
            $flickr = new flickr_model();
            $photo_info = $flickr->photo_info($photo_id)->photo;
            $photo_sizes = $flickr->photo_sizes($photo_id);
            $photo = new photo($photo_info, $photo_sizes);
            return $photo->json_encoded();
        }
    }

    $action = $_REQUEST['action'];
    switch($action)
    {
        case 'albums':
        {
            break;
        }
        case 'photo':
        {   
            $photo_id = $_REQUEST['id'];
            $photo = photo_controller::get_photo($photo_id);
            echo $photo;
            break;
        }
        default:
        {
            echo json_encode(array('message' => 'no_function'));
            break;
        }
    }

    //$albums = album_collection::get_albums();

?>