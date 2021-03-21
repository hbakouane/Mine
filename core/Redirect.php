<?php

namespace App\Core;

class Redirect
{
	public static function getBack() 
	{
		ob_start();
		header("Location: $_SERVER[HTTP_REFERER]");
	}
}