<?php 
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
$res = QuickSort($list);
print_r($res);

function QuickSort($list) {
	$len = count($list);
	Qsort($list, 0, $len-1);
	return $list;
}

function Qsort(&$list, $low, $high) {
	if ($low < $high) {
		$pivot = Partition($list, $low, $high);
		Qsort($list, $low, $pivot-1);
		Qsort($list, $pivot+1, $high);
	}
}

function Partition(&$list, $low, $high) {
	$pvalue = $list[$low];
	while ($low < $high) {
		while ($low < $high && $list[$high] > $pvalue) {
			$high--;
		}
		swap($list, $low, $high);
		while ($low < $high && $list[$low] < $pvalue) {
			$low++;
		}
		swap($list, $low, $high);
	}
	return $low;
}

function swap(&$list, $i, $j) {
	$temp = $list[$i];
	$list[$i] = $list[$j];
	$list[$j] = $temp;
}