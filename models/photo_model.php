<?php
class photo 
{
    private $_id;
    private $_rotation;
    private $_orientation;
    private $_title;
    private $_description;
    private $_ispublic;
    private $_isfriend;
    private $_isfamily;
    private $_date_posted;
    private $_date_taken;
    private $_views;
    private $_sizes;
    /*More to come*/
    
    public function __construct($flickr_photo_info, $flickr_photo_sizes)
    {
        $this->_id = $flickr_photo_info->id;
        $this->_rotation = $flickr_photo_info->rotation;
        $this->_orientation = $flickr_photo_sizes[2]->height > $flickr_photo_sizes[2]->width ? true:false;
        $this->_title = $flickr_photo_info->title->_content;
        $this->_description = $flickr_photo_info->description->_content;
        $this->_ispublic = $flickr_photo_info->visibility->ispublic;
        $this->_isfriend = $flickr_photo_info->visibility->isfriend;
        $this->_isfamily = $flickr_photo_info->visibility->isfamily;
        $this->_date_posted = $flickr_photo_info->dates->posted;
        $this->_date_taken = $flickr_photo_info->dates->taken;
        $this->_views = $flickr_photo_info->views;
        $this->_sizes = $flickr_photo_sizes;
    }
    
    public static function photo_from_id($photo_id)
    {
        $flickr_model = new flickr_model();
        $photo_info = $flickr_model->photo_info($photo_id)->photo;
        $photo_sizes = $flickr_model->photo_sizes($photo_id)->sizes->size;        
        $photo = new photo($photo_info, $photo_sizes);
        return $photo;
    }
    
    public function id()
    {
        return $this->_id;
    }
    
    public function rotation()
    {
        return $this->_rotation;
    }
    
    public function orientation()
    {
        return $this->_orientation;
    }
    
    public function title()
    {
        return $this->_title;
    }
    
    public function description()
    {
        return $this->_description;
    }
    
    public function is_public()
    {
        return $this->_is_public;
    }
    
    public function is_friend()
    {
        return $this->_is_friend;
    }
    
    public function is_family()
    {
        return $this->_is_family;
    }
    
    public function date_posted()
    {
        return $this->_date_posted;
    }
    
    public function date_taken()
    {
        return $this->_date_taken;
    }
    
    public function views()
    {
        return $this->_views;
    }
    
    public function sizes()
    {
        return $this->_sizes;
    }
    
    public function json_encoded()
    {
        return json_encode(array('photo' => array(  'id' => $this->_id,
                                                    'rotation' => $this->_rotation,
                                                    'title' => $this->_title,
                                                    'description' => $this->_description,
                                                    'ispublic' => $this->_ispublic,
                                                    'isfriend' => $this->_isfriend,
                                                    'isfamily' => $this->_isfamily,
                                                    'date_posted' => $this->_date_posted,
                                                    'date_taken' => $this->_date_taken,
                                                    'views' => $this->_views,
                                                    'sizes' => $this->_sizes
        )));
    }
    
    public function as_array()
    {
        $photo = array( 'id' => $this->_id,
                        'rotation' => $this->_rotation,
                        'title' => $this->_title,
                        'description' => $this->_description,
                        'ispublic' => $this->_ispublic,
                        'isfriend' => $this->_isfriend,
                        'isfamily' => $this->_isfamily,
                        'date_posted' => $this->_date_posted,
                        'date_taken' => $this->_date_taken,
                        'views' => $this->_views,
                        'sizes' => array()
        );
        foreach($this->_sizes as $size){
            $photo['sizes'][] = (array)$size;
        }
        return $photo;
    }
}

?>
