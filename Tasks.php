<?php


class Tasks
{
	public static function getPatternIndexes($imageWidth, $imageHeight, array $image, $patternHeight, $patternWidth, array $pattern)
	{
		if (empty($image) || empty($pattern) || !$imageHeight || !$imageHeight || !$patternHeight || !$patternHeight || $imageWidth <= $patternWidth || $imageHeight <= $patternHeight)
		{
			return [-1, -1];
		}
		if ($pattern == $image)
		{
			return [0, 0];
		}

		$res = [-1, -1];
		for ($i = 0; $i < $imageHeight; $i++)
		{
			if ($imageHeight - $i < $patternHeight)
			{
				break;
			}
			$seekResult = strpos($image[$i], $pattern[0]);
			$offset = $seekResult;
			$found = true;
			while ($seekResult !== false)
			{
				$isValid = true;
				for ($j = 1; $j < $patternHeight; $j++)
				{
					$imageRow = $image[$i + $j];
					$imageRowPart = substr($imageRow, $offset, $patternWidth);
					$patternRow = $pattern[$j];
					if ($imageRowPart !== $patternRow)
					{
						$isValid = false;
						break;
					}
				}
				if (!$isValid)
				{
					$found = false;
				}
				if ($found)
				{
					$res = [$i, $seekResult];
					break;
				}
				$offset = $seekResult + 1;
				$seekResult = strpos($image[$i], $pattern[0], $offset);
			}

		}
		return $res;
	}
}
