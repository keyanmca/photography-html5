<?php
class album_collection 
{
    public static function get_albums()
    { 
        $albums = array();
        $flickr_model = new flickr_model();
        $flickr_photosets_object = $flickr_model->fetch_photo_sets()->photosets->photoset;
        foreach($flickr_photosets_object as $flickr_photoset)
        {
            $albums[] = new album($flickr_photoset);
        }
        return $albums;
    }
    
    public static function photoset_id_name_mapping()
    {
        $album_collection = self::get_albums();
        $name_id_mapping = array();
        foreach($album_collection as $album)
        {
            $name_id_mapping[self::slug($album->title())] = $album->id();
        }
        return $name_id_mapping;
    }
    
    public static function slug($str)
    {
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
    }
}
?>
