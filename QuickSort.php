<?php 

$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
QuickSort($list);
print_r($list);

function QuickSort(&$list) {
	Qsort($list, 0, count($list)-1);
}

function Qsort(&$list, $low, $high) {
	if ($low < $high) {
		$pivot = Partition($list, $low, $high);
		Qsort($list, $low, $pivot-1);
		Qsort($list, $pivot+1, $high);
	}
}

function Partition(&$list, $low, $high) {
	$length = count($list);
	$pvalue = $list[$low];

	while ($low < $high) {
		while ($low < $high && $list[$high] > $pvalue) {
			$high--;
		}
		$list[$low] = $list[$high];
		while ($low < $high && $list[$low] < $pvalue) {
			$low++;
		}
		$list[$high] = $list[$low];
	}
	$list[$low] = $pvalue;
	return $low;
}
?>
