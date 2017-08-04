<?php
final class MemcacheSingleton
{
	private static $memcache;

	private function __construct()
	{
		throw Exception('Cannot Instance Memcache Lib.');
	}

	public static function getInstance()
	{
		if (static::$memcache instanceof sfMemcacheCache) {
			return static::$memcache;
		} else {
			static::$memcache = new sfMemcacheCache();
			return static::$memcache;
		}
	}
}
