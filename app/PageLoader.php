<?php


namespace App;

use Twig_Environment;
use Twig_Loader_Filesystem;

class PageLoader
{
	private $twig;

	public function __construct()
	{
		$this->twig = new Twig_Environment(
			new Twig_Loader_Filesystem(PROJECT_ROOT . 'views')
		);
	}

	public function testPage()
	{
		echo $this->twig->render('testpage.twig', [
			'name' => getenv('name'),
		]);
	}
}
