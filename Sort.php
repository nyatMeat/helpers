<?php


class Sort
{
	public static function bubbleSort($array)
	{
		$count = count($array);
		for ($i = 0; $i < $count; $i++)
		{
			$swapped = false;
			for ($j = 0; $j < $count - $i - 1; $j++)
			{
				if ($array[$j] > $array[$j + 1])
				{
					$temp = $array[$j];
					$array[$i + 1] = $temp;
					$array[$i] = $array[$i + 1];
					$swapped = true;
				}
			}
			if (!$swapped)
			{
				break;
			}
		}
		return $array;
	}

	public static function quickSort(&$array, $low, $high)
	{

		if (!count($array))
		{
			return;
		}
		if ($low >= $high)
		{
			return;
		}
		$middle = $low + ($high - $low) >> 1;
		$op = $array[$middle];
		$i = $low;
		$j = $high;
		while ($i <= $j)
		{
			while ($array[$i] < $op)
			{
				$i++;
			}
			while ($array[$j] > $op)
			{
				$j++;
			}
			if ($i <= $j)
			{
				$t = $array[$i];
				$array[$i] = $array[$j];
				$array[$j] = $t;
				$i++;
				$j--;
			}
		}
		if ($low < $j)
		{
			self::quickSort($array, $low, $j);
		}
		if($high > $i){
			self::quickSort($array, $i, $high);
		}
	}
}
