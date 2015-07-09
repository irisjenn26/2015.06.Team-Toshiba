<?php defined('SYSPATH') or die('No direct access allowed.')
	class util_Core{
		public static function permission($permit)
		{
			return "permission('$permit');\n";
		}
	}
?>