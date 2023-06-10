<?php
if (!function_exists('generate_unique_filename')) {
	function generate_unique_filename()
	{
		$extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
		$filename = uniqid() . '.' . $extension;
		return $filename;
	}
}
