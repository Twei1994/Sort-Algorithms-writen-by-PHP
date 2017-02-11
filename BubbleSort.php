<?php 

$list = array(9, 1, 5, 8, 3, 7, 4, 6, 2);

$length = count($list);			// 获取数组长度


for ($i = 0; $i < $length; $i++) { 
	for ($j = $length-1; $j > $i; $j--) { 
		if ($list[$j-1] > $list[$j]) {
			swap($list, $j-1, $j);
			// print_r($list);
		}
	}
}

function swap(&$list, $i, $j)		// &表示传引用，同时改变变量的值
{
	$temp = $list[$i];
	$list[$i] = $list[$j];
	$list[$j] = $temp;
	// return $list;
}

foreach ($list as $key => $value) {
	echo "$value"."\n";
}
?>