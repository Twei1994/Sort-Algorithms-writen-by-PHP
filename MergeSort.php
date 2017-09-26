<?php 
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
$res = MergeSort($list);
print_r($res);

function MergeSort(&$list) {
	$len = count($list);
	$res = array();
	Msort($list, $res, 0, $len-1);
	return $res;
}

function MSort(&$list, &$res, $s, $t) {
	if ($s == $t) {
		$res[$s] = $list[$s];
	}else{
		$m = floor(($s + $t)/2);
		$temp = array();		//新建一个空数组
		MSort($list, $temp, $s, $m);
		MSort($list, $temp, $m+1, $t);
		Merge($temp, $res, $s, $m, $t);
	}
}

function Merge(&$temp, &$res, $s, $m, $t) {
	for ($k = $s, $j = $m+1; $s <= $m && $j <= $t; $k++) { 
		if ($temp[$s] < $temp[$j]) {
			$res[$k] = $temp[$s];
			$s++;
		}else{
			$res[$k] = $temp[$j];
			$j++;
		}
	}
	if ($s <= $m) {
		for ($l = 0; $l <= $m-$s ; $l++) { 
			$res[$k+$l] = $temp[$s+$l];
		}
	}
	if ($j <= $t) {
		for ($l = 0; $l <= $t-$j ; $l++) { 
			$res[$k+$l] = $temp[$j+$l];
		}
	}
}