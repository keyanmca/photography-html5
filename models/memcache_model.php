<?php
class memcache_model
{
    private static $_memcache;
    private static $_connected = false;
    private static $_ttl = 86400;
    
    private static function _init()
    {   
        if(!self::$_connected)
        {
            self::$_memcache = new Memcache();
            self::$_memcache->connect('localhost', 11211) or die('Could not connect to memcache server');
            self::$_connected = true;
        }
    }
    
    public static function store($key, $item)
    {
        self::_init();
        return self::$_memcache->add($key, serialize($item), false, self::$_ttl);
    }
    
    public static function fetch($key)
    {
        self::_init();
        $memcache_stored = self::$_memcache->get($key);
        return unserialize($memcache_stored);
    }
}
?>
