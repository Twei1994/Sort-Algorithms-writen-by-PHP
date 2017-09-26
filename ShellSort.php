<?php
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
$res = ShellSort($list);
print_r($res);

function ShellSort($list) {
	$len = count($list);
	$increment = $len;
	do {
		$increment = floor($increment/3) + 1;
		for ($i = $increment; $i < $len; $i++) { 
			if ($list[$i] < $list[$i-$increment]) {
				$target = $list[$i];
				for ($j = $i-$increment; $j >= 0 && $list[$j] > $target; $j -= $increment) { 
					$list[$j+$increment] = $list[$j];
				}
				$list[$j+$increment] = $target;
			}
		}
	}while($increment > 1);
	return $list;
}
?>