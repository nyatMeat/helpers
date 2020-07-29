<?php


class StringHelper
{
	/**
	 * @param $str1
	 * @param $str2
	 * @param null $encoding
	 * @return int
	 */
	public static function mb_strcasecmp($str1, $str2, $encoding = null)
	{
		if (null === $encoding)
		{
			$encoding = mb_internal_encoding();
		}
		return strcmp(mb_strtoupper($str1, $encoding), mb_strtoupper($str2, $encoding));
	}

	/** Преобразовать строку из camelCase в snake_case
	 * @param string $string
	 * @param bool $toUpperCase
	 * @return string
	 */
	public static function camelCaseToSnake(string $string, $toUpperCase = true)
	{
		if (preg_match('/[A-Z]/', $string) === 0)
		{
			return $string;
		}
		$pattern = '/([a-z])([A-Z])/';
		$r = strtolower(preg_replace_callback($pattern, function ($a)
		{
			return $a[1] . "_" . strtolower($a[2]);
		}, $string));
		return $toUpperCase ? strtoupper($r) : $r;
	}

	public static function snakeToCamel($str)
	{
		$str = strtolower($str);
		// Remove underscores, capitalize words, squash, lowercase first.
		return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $str))));
	}
}
