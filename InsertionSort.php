<?php 
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
InsertionSort($list);
print_r($list);

function InsertionSort(&$list)
{
	$length = count($list);
	for ($i = 1; $i < $length; $i++) { 
		if ($list[$i] < $list[$i-1]) {
			$target = $list[$i];
			for($j = $i - 1;$j >= 0 && $list[$j] >= $target;$j--) { 
				$list[$j+1] = $list[$j];
			}
			$list[$j+1] = $target;
		}
	}
}
?>