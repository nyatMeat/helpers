<?php


class Files
{

	/**
	 * Поиск файла по дереву
	 * @param $path
	 * @param $pattern
	 * @param null $basePath
	 * @return array
	 */
	public static function searchFile($path, $pattern, $basePath = null)
	{
		if (is_null($basePath))
		{
			$basePath = '';
		}
		else
		{
			$basePath .= basename($path) . '/';
		}

		$out = array();
		foreach (glob($path . '/' . $pattern, GLOB_BRACE) as $file)
		{
			$out[] = $basePath . basename($file);
		}

		foreach (glob($path . '/*', GLOB_ONLYDIR) as $file)
		{
			$out = array_merge($out, self::searchFile($file, $pattern, $basePath));
		}

		return $out;
	}
}
