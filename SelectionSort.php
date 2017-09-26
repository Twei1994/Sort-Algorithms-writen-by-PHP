<?php  
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
$res = SelectionSort($list);
print_r($res);

function SelectionSort($list) {
	$len = count($list);
	for ($i = 0; $i < $len; $i++) {
		$min = $i; 
		for ($j = $i; $j < $len; $j++) { 
			if ($list[$min] > $list[$j]) {
				$min = $j;
			}
		}
		if ($min != $i) {
			swap($list, $min, $i);
		}
	}
	return $list;
}

function swap(&$list, $i, $j) {
	$temp = $list[$i];
	$list[$i] = $list[$j];
	$list[$j] = $temp;
}