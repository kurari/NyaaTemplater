<?php
class NyaaTemplaterResourceFile extends NyaaTemplaterResource
{
	public $expire = 86400; // 60 * 60 * 24
	public $dir = "";

	function init( $templater )
	{
		$this->dir = $templater->getTemplateDir( );
	}

	function get( $path, $templater )
	{
		$tpldir = $this->dir;
		$file   = $tpldir.'/'.$path;
		return file_get_contents( $file );
	}

	function getCacheName( $path, $templater )
	{
		$type = __CLASS__;
		$name = sprintf("%s.%s",$type,urlencode($path));
		return $name;
	}
}
?>
