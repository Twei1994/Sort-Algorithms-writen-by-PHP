<?php  

$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);
SelectionSort($list);
print_r($list);

function SelectionSort(&$list)
{
	$length = count($list);
	for ($i = 0; $i < $length; $i++) {
		$min = $i; 
		for ($j = $i; $j < $length; $j++) { 
			if ($list[$min] > $list[$j]) {
				$min = $j;
			}
		}
		if ($min != $i) {
			swap($list, $min, $i);
		}
	}
}

function swap(&$list, $i, $j)
{
	$temp = $list[$i];
	$list[$i] = $list[$j];
	$list[$j] = $temp;
}
?>