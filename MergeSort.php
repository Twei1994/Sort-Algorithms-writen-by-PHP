<?php 

$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
MergeSort($list);
print_r($list);

function MergeSort(&$list) {
	Msort($list, $list, 0, count($list)-1);
}

function MSort(&$data, &$list, $s, $t) {
	if ($s == $t) {
		$list[$s] = $data[$s];
	}else{
		$m = floor(($s + $t)/2);
		$temp = array();		//新建一个空数组
		MSort($data, $temp, $s, $m);
		MSort($data, $temp, $m+1, $t);
		Merge($temp, $list, $s, $m, $t);
	}
}

function Merge(&$temp, &$out, $s, $m, $t) {
	for ($k = $s, $j = $m+1; $s <= $m && $j <= $t; $k++) { 
		if ($temp[$s] < $temp[$j]) {
			$out[$k] = $temp[$s];
			$s++;
		}else{
			$out[$k] = $temp[$j];
			$j++;
		}
	}
	if ($s <= $m) {
		for ($l = 0; $l <= $m-$s ; $l++) { 
			$out[$k+$l] = $temp[$s+$l];
		}
	}
	if ($j <= $t) {
		for ($l = 0; $l <= $t-$j ; $l++) { 
			$out[$k+$l] = $temp[$j+$l];
		}
	}
}

?>