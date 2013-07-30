<?php
class apccache_model 
{
    public static function store($key, $data, $ttl)
    {
        return apc_store($key, serialize($data), $ttl);
    }
    
    public static function fetch($key)
    {
        return unserialize(apc_fetch($key));
    }
    
    public static function delete($key)
    {
        return apc_delete($key);
    }
}

?>
