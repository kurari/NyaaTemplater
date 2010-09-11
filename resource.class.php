<?php
// Use As Cache Handler
require_once 'cache/cache.class.php';

class NyaaTemplaterResource
{
	function __construct( )
	{
		$this->ch = NyaaCache::current( );
	}

	function init( $templater )
	{
	}

	function hasCache( $path, $templater )
	{
		if($templater->cache == false)
			return false;
		$tpldir = $templater->getTemplateDir( );
		$org    = $tpldir.'/'.$path;
		$name   = $this->getCacheName( $path, $templater );
		if(filemtime($org) > $this->ch->get("{$name}_create")){
			$this->ch->delete($name);
			$this->ch->delete("{$name}_create");
		}
		return false != $this->ch->get($name) ? true: false;
	}

	function getCache( $path, $templater)
	{
		$name = $this->getCacheName( $path, $templater );
		return $this->ch->get($name);
	}

	function writeCache( $path, $data, $templater )
	{
		$name = $this->getCacheName( $path, $templater );
		$this->ch->set($name, $data);
		$this->ch->set("{$name}_create", time());
	}

}
?>
