<?php
class NyaaTemplaterResourceString extends NyaaTemplaterResource
{
	public $expire = 20;

	function get( $path, $templater )
	{
		return $path;
	}

	function getCacheName( $path, $templater )
	{
		return md5($path);
	}
}
?>
