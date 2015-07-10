<?php defined('SYSPATH') or die('No direct access allowed.');
	class javascript_Core{
		public static function alert($message)
		{
			return "alert('$message');\n";
		}
	}
?>