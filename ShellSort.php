<?php
$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
ShellSort($list);
print_r($list);

function ShellSort(&$list) {
	$length = count($list);
	$increment = $length;
	do {
		$increment = floor($increment/3) + 1;		// 向下取整，否则会变成浮点型，1.5，超时
		for ($i = $increment; $i < $length; $i++) { 
			if ($list[$i] < $list[$i-$increment]) {
				$target = $list[$i];
				for ($j = $i - $increment; $j >= 0 && $list[$j] > $target ; $j -= $increment) { 
					$list[$j+$increment] = $list[$j];
				}
				$list[$j+$increment] = $target;
				// print_r($list);
			}
		}
		echo "$increment";
	}while($increment > 1);
}
?>