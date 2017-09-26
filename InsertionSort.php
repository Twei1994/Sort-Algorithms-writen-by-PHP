<?php 
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
$res = InsertionSort($list);
print_r($res);

function InsertionSort($list){
	$len = count($list);
	for ($i = 1; $i < $len; $i++) { 
		if ($list[$i] < $list[$i-1]) {
			$target = $list[$i];
			for($j = $i-1; $j >= 0 && $list[$j] >= $target; $j--) { 
				$list[$j+1] = $list[$j];
			}
			$list[$j+1] = $target;
		}
	}
	return $list;
}