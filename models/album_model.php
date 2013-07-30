<?php
class album 
{
    private $_id;
    private $_title;
    private $_description;
    private $_photos;
    private $_count;
    
    public function __construct($flickr_photoset)
    {
        $this->_id = $flickr_photoset->id;
        $this->_title = $flickr_photoset->title->_content;
        $this->_description = $flickr_photoset->description->_content;
        $this->_count = $flickr_photoset->photos;
        $this->_init_photos();
    }
    
    public static function album_from_slug($slug)
    {
        $mapping = album_collection::photoset_id_name_mapping();
        $photoset_id = $mapping[$slug];
        $flickr_model = new flickr_model();
        $flickr_photoset = $flickr_model->fetch_photo_set($photoset_id)->photoset;
        $album = new album($flickr_photoset);
        return $album;
    }
    
    private function _init_photos()
    {
        $this->_photos = array();
        $flickr_model = new flickr_model();
        $flickr_photos = $flickr_model->photoset_photos($this->_id)->photoset->photo;
        foreach($flickr_photos as $flickr_photo)
        {
            $flickr_photo_info = $flickr_model->photo_info($flickr_photo->id)->photo;
            $flickr_photo_sizes = $flickr_model->photo_sizes($flickr_photo->id)->sizes->size;
            $addable_photo = new photo($flickr_photo_info, $flickr_photo_sizes);
            
            if(!$addable_photo->orientation())
            {
                $this->_photos[] = $addable_photo;
            }
        }
    }
    
    public function id()
    {
        return $this->_id;
    }
    
    public function title()
    {
        return $this->_title;
    }
    
    public function description()
    {
        return $this->_description;
    }
    
    public function photos()
    {
        return $this->_photos;
    }
    
    public function count()
    {
        return $this->_count;
    }
}
?>
