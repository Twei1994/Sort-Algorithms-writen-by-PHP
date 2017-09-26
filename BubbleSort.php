<?php 
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
$res = BubbleSort($list);
print_r($res);

function BubbleSort($list) {
	$len = count($list);
	for ($i = 0; $i < $len; $i++) { 
		for ($j = $len-1; $j > $i; $j--) { 
			if ($list[$j-1] > $list[$j]) {
				swap($list, $j-1, $j);
			}
		}
	}
	return $list;
}

function swap(&$list, $i, $j) {
	$temp = $list[$i];
	$list[$i] = $list[$j];
	$list[$j] = $temp;
}