<?php  
    error_reporting(E_ALL);
    define('base_href', 'http://'.$_SERVER['HTTP_HOST'].'/');
    include_once('models/flickr_model.php');
    include_once('models/album_collection_model.php');
    include_once('models/album_model.php');
    include_once('models/photo_model.php');
    include_once('models/memcache_model.php');
    $page = $_REQUEST['page'];
    
    switch($page)
    {
        case 'album':
        {
            $album = album::album_from_slug($_REQUEST['album']);
            $photos = $album->photos();
            $photos_json = $album->album_as_json();
            break;
        }
        case 'albums':
        {
            $albums = album_collection::get_albums();
            break;
        }
        default:
        { 
            break;
        }
    }  
?>

<?php
    switch($_REQUEST['return_type'])
    {
        case 'html':
        {
?>
<!DOCTYPE html>
<html>
    <head>
        <? include_once('views/layout/_meta.php');?>
        <? include_once('views/layout/_assets.php');?>
    </head>
    <body>
        <section class="wrapper">
            <? include_once('views/layout/_header.php'); ?>
            <? include_once('views/layout/_nav.php'); ?>
            <? include_once('views/'.$_REQUEST['page'].'.php'); ?>    
        </section>
    </body>
</html>
<?php
            break;
        }
        case 'snppt':
        {
            include_once('views/'.$_REQUEST['page'].'.php');
            break;
        }
    }
?>


