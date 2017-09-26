<?php  
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
$res = HeapSort($list);
print_r($res);

function HeapSort($list) {
	$len = count($list);
	for ($i = floor(($len-2)/2); $i >= 0; $i--) { 
		createHeap($list, $i, $len-1);
	}
	for ($i = $len-1; $i >=0 ; $i--) { 
		swap($list, $i, 0);
		createHeap($list, 0, $i-1);
	}
	return $list;
}

function createHeap(&$list, $i, $j) {
	$target = $list[$i];
	for ($m=$i*2+1; $m <= $j ; $m = $m*2+1) { 
		if ($m < $j && $list[$m] < $list[$m+1]) {
			$m++;
		}
		if ($target > $list[$m]) {
			break;
		}
		$list[$i] = $list[$m];
		$i = $m;
	}
	$list[$i] = $target;
}

function swap(&$list, $i, $j) {
	$temp = $list[$i];
	$list[$i] = $list[$j];
	$list[$j] = $temp;
}