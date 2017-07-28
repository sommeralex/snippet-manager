<?php
namespace Moonshiner\SnippetManager;

/**
*
*/
class SnippetManager
{
	private $namespace = "";
	private $snippets = ['test/lel' => "123"];
	function __construct()
	{
		$this->foo = $foo;
	}
	/**
	 * @param type $namespace
	 */
	public function setNamespace($namespace)
	{
	    $this->namespace = $namespace;
	}

	public function getSnippet($key, $default){
		$path = [$this->namespace, $key];
		$key = str_replace("'", "", implode('/', $path));

		$snippet = Cache::get($key, function () use ($this->namespace, $key){
		    return DB::table(...)->get();
		});

		return $snippet;
	}



}
