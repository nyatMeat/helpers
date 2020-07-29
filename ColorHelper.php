<?php


class ColorHelper
{
	/**
	 * Проверить что строка является валидным #hex цветом
	 * @param $hexString
	 * @return bool
	 */
	public static function isValidHexColor($hexString)
	{
		return preg_match('/#([a-f0-9]{3}){1,2}\b/i', $hexString);

	}

	/**
	 * Преобразовать hex в rgn
	 * @param $hex
	 * @return array|bool
	 */
	public static function convertHexToRgb($hex)
	{
		preg_match("/^#{0,1}([0-9a-f]{1,6})$/i", $hex, $match);
		if (!isset($match[1])) {
			return false;
		}
		$hex = $match[1];
		if (strlen($match[1]) == 6) {
			list($r, $g, $b) = array($hex[0] . $hex[1], $hex[2] . $hex[3], $hex[4] . $hex[5]);
		} elseif (strlen($match[1]) == 3) {
			list($r, $g, $b) = array($hex[0] . $hex[0], $hex[1] . $hex[1], $hex[2] . $hex[2]);
		} else if (strlen($match[1]) == 2) {
			list($r, $g, $b) = array($hex[0] . $hex[1], $hex[0] . $hex[1], $hex[0] . $hex[1]);
		} else if (strlen($match[1]) == 1) {
			list($r, $g, $b) = array($hex . $hex, $hex . $hex, $hex . $hex);
		} else {
			return false;
		}

		$color = array();
		$color['red'] = hexdec($r);
		$color['green'] = hexdec($g);
		$color['blue'] = hexdec($b);

		return $color;
	}

	/**
	 * Преобразовать rgb в #hex
	 * @param $rgb
	 * @return string
	 */
	public static function convertRgbToHex($rgb)
	{
		return '#'
			. sprintf('%02x', $rgb['red'])
			. sprintf('%02x', $rgb['green'])
			. sprintf('%02x', $rgb['blue']);

	}
}
