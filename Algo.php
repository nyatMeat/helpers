<?php


class Algo
{
	/**
	 * Алгоритм Евклида
	 * @param $p
	 * @param $q
	 * @return mixed
	 */
	public static function gcd($p, $q)
	{
		return $q === 0 ? $p : self::gcd($q, $p % $q);
	}
	/**
	 * Число фибоначи
	 * @param $n
	 * @return int
	 */
	public function fib($n)
	{
		if ($n <= 2)
		{
			return 1;
		}
		$f1 = 1;
		$f2 = 1;
		for ($i = 2; $i < $n; $i++)
		{
			$f3 = $f2;
			$f2 = $f1 + $f2;
			$f1 = $f3;
			$f3 = 0;
		}
		return $f2;
	}

}
