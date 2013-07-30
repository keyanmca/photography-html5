<?php
class flickr_model 
{
    private $_user_id;
    private $_api_url;
    private $_api_key;
    
    public function __construct()
    {
        $this->_user_id = '7994187@N06';
        $this->_api_url = 'http://api.flickr.com/services/rest/?';
        $this->_api_key = '613d9cb1d23d4f20d34cbb419dc0eef7';
    }
    
    private function _fetch_via_curl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);        
        curl_close($ch);
        return $output;
    }
    
    
    /*
     * @params: $format:string, $nojsoncallback:boolean
     * @return: photoset:array of objects
     */
    public function fetch_photo_sets($format = 'json', $nojsoncallback = 1, $json_decode = true)
    {
        if(!memcache_model::fetch('photosets'))
        {
            $api_call_params = array(   'method' => 'flickr.photosets.getList',
                                        'api_key' => $this->_api_key,
                                        'user_id' => $this->_user_id,
                                        'format' => $format,
                                        'nojsoncallback' => $nojsoncallback
            );

            $api_call_url = $this->_api_url . http_build_query($api_call_params);
            $api_call_response = $this->_fetch_via_curl($api_call_url);
            $data = $json_decode ? json_decode($api_call_response):$api_call_response;
            memcache_model::store('photosets', $data);
            return $data;
        }
        else
        {
            return memcache_model::fetch('photosets');
        }
    }
    
    public function fetch_photo_set($photoset_id, $format='json', $nojsoncallback = 1, $json_decode = true)
    {
        if(!memcache_model::fetch('photoset_'.$photoset_id))
        {
            $api_call_params = array(   'method' => 'flickr.photosets.getInfo',
                                        'api_key' => $this->_api_key,
                                        'photoset_id' => $photoset_id,
                                        'format' => $format,
                                        'nojsoncallback' => $nojsoncallback
            );

            $api_call_url = $this->_api_url . http_build_query($api_call_params);
            $api_call_response = $this->_fetch_via_curl($api_call_url);
            $data = $json_decode ? json_decode($api_call_response):$api_call_response;
            memcache_model::store('photoset_'.$photoset_id, $data);
            return $data;
        }
        else
        {
            return memcache_model::fetch('photoset_'.$photoset_id);
        }
    }
    
    public function photoset_photos($photoset_id, $format = 'json', $json_decode = true, $nojsoncallback = 1)
    {
        if(!memcache_model::fetch('photoset_photos_'.$photoset_id))
        {
            $api_call_params = array(   'method' => 'flickr.photosets.getPhotos',
                                        'api_key' => $this->_api_key,
                                        'photoset_id' => $photoset_id,
                                        'format' => $format,
                                        'nojsoncallback' => $nojsoncallback
            );
            $api_call_url = $this->_api_url . http_build_query($api_call_params);
            $api_call_response = $this->_fetch_via_curl($api_call_url);  
            $data = $json_decode ? json_decode($api_call_response):$api_call_response;
            memcache_model::store('photoset_photos_'.$photoset_id, $data);
            return $data;
        }
        else
        {
            return memcache_model::fetch('photoset_photos_'.$photoset_id);
        }
    }
    
    public function photo_info($photo_id, $format = 'json', $json_decode = true, $nojsoncallback = 1)
    {
        if(!memcache_model::fetch('photo_info_'.$photo_id))
        {
            $api_call_params = array(   'method' => 'flickr.photos.getInfo',
                                        'api_key' => $this->_api_key,
                                        'photo_id' => $photo_id,
                                        'format' => $format,
                                        'nojsoncallback' => $nojsoncallback
            );
            $api_call_url = $this->_api_url . http_build_query($api_call_params);
            $api_call_response = $this->_fetch_via_curl($api_call_url); 
            $data = $json_decode ? json_decode($api_call_response):$api_call_response;
            memcache_model::store('photo_info_'.$photo_id, $data);
            return $data;
        }
        else
        {
            $data = memcache_model::fetch('photo_info_'.$photo_id);
            return $data;
        }
    }
    
    public function photo_sizes($photo_id, $format = 'json', $json_decode = true, $nojsoncallback = 1)
    {
        if(!memcache_model::fetch('photo_sizes_'.$photo_id))
        {
            $api_call_params = array(   'method' => 'flickr.photos.getSizes',
                                        'api_key' => $this->_api_key,
                                        'photo_id' => $photo_id,
                                        'format' => $format,
                                        'nojsoncallback' => $nojsoncallback
            );
            $api_call_url = $this->_api_url . http_build_query($api_call_params);
            $api_call_response = $this->_fetch_via_curl($api_call_url);   
            $data = $json_decode ? json_decode($api_call_response):$api_call_response;
            memcache_model::store('photo_sizes_'.$photo_id, $data);
            return $data;
        }
        else
        {
            $data = memcache_model::fetch('photo_sizes_'.$photo_id);
            return $data;
        }
    }
    
    public function __destruct()
    {
    }
}
?>
