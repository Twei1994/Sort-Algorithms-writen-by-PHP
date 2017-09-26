<?php
// Sort Algorithms Using Strategy
abstract class Sort {
	protected $list;
	public function __construct($list) {
		$this->list = $list;
	}
	abstract function getRes();
}

class BubbleSort extends Sort {
	public function getRes() {
		$list = $this->list;
		$len = count($list);
		for ($i = 0; $i < $len; $i++) { 
			for ($j = $len-1; $j > $i; $j--) { 
				if ($list[$j] < $list[$j-1]) {
					$this->swap($list, $j-1, $j);	
				}
			}
		}
		return $list;
	}

	private function swap(&$list, $i, $j) {
		$temp = $list[$i];
		$list[$i] = $list[$j];
		$list[$j] = $temp;
	}
}

class SelectionSort extends Sort {
	public function getRes() {
		$list = $this->list;
		$len = count($list);
		for ($i = 0; $i < $len; $i++) { 
			$min = $i;
			for ($j = $i+1; $j < $len; $j++) { 
				if ($list[$j] < $list[$min]) {
					$min = $j;
				}
			}
			if ($min != $i) {
				$this->swap($list, $i, $min);	
			}
		}
		return $list;
	}

	private function swap(&$list, $i, $j) {
		list($list[$j], $list[$i]) = array($list[$i], $list[$j]);
	}
}

class InsertionSort extends Sort {
	public function getRes() {
		$list = $this->list;
		$len = count($list);
		for ($i = 1; $i < $len; $i++) { 
			$temp = $list[$i];
			for ($j = $i-1; $j >= 0 && $list[$j] > $temp; $j--) { 
				$list[$j+1] = $list[$j];
			}
			$list[$j+1] = $temp;
		}
		return $list;
	}
}

class ShellSort extends Sort {
	public function getRes() {
		$list = $this->list;
		$len = count($list);
		$increment = $len;
		do {
			$increment = floor($increment/3)+1;
			for ($i = $increment; $i < $len; $i++) { 
				$temp = $list[$i];
				for ($j = $i-$increment; $j >= 0 && $list[$j] > $temp; $j -= $increment) { 
					$list[$j+$increment] = $list[$j];
				}
				$list[$j+$increment] = $temp;
			}
		} while ($increment > 1);
		return $list;
	}
}

class HeapSort extends Sort {
	public function getRes() {
		$list = $this->list;
		$len = count($list);
		for ($i = floor(($len-2)/2); $i >= 0; $i--) { 
			$this->createHeap($list, $i, $len-1);
		}
		for ($i = $len-1; $i >= 0; $i--) { 
			$this->swap($list, $i, 0);
			$this->createHeap($list, 0, $i-1);
		}
		return $list;
	}

	private function createHeap(&$list, $i, $j) {
		$temp = $list[$i];
		for ($s = 2*$i+1; $s <= $j; $s = 2*$s+1) { 
			if ($s < $j && $list[$s] < $list[$s+1]) {
				$s++;
			}
			if ($list[$s] < $temp) {
				break;
			}
			$list[$i] = $list[$s];
			$i = $s;
		}
		$list[$i] = $temp;
	}

	private function swap(&$list, $i, $j) {
		// $list[$i] = $list[$i]+$list[$j];
		// $list[$j] = $list[$i]-$list[$j];
		// $list[$i] = $list[$i]-$list[$j];
		list($list[$i], $list[$j]) = array($list[$j], $list[$i]);
	}
}

class MergeSort extends Sort {
	public function getRes() {
		$list = $this->list;
		$len = count($list);
		$res = array();
		$this->Msort($list, $res, 0, $len-1);
		return $res;
	}

	private function Msort(&$list, &$res, $i, $j) {
		if ($i == $j) {
			$res[$i] = $list[$j];
		}else{
			$m = floor(($i+$j)/2);
			$this->Msort($list, $temp, $i, $m);
			$this->Msort($list, $temp, $m+1, $j);
			$this->Merge($temp, $res, $i, $m, $j);
		}
	}

	private function Merge(&$temp, &$res, $i, $m, $j) {
		for ($k = $i, $l = $m+1; $i <= $m && $l <= $j; $k++) { 
			if ($temp[$i] < $temp[$l]) {
				$res[$k] = $temp[$i++];
			}else{
				$res[$k] = $temp[$l++];
			}
		}
		if ($i <= $m) {
			for ($s = 0; $s <= $m-$i; $s++) { 
				$res[$k+$s] = $temp[$i+$s];
			}
		}
		if ($l <= $j) {
			for ($s = 0; $s <= $j-$l; $s++) { 
				$res[$k+$s] = $temp[$l+$s];
			}
		}
	}
}

class QuickSort_1 extends Sort {
	public function getRes() {
		$list = $this->list;
		$res = $this->Qsort($list);
		return $res;
	}

	private function Qsort($list) {
		$len = count($list);
		if ($len <= 1) {
			return $list;
		}
		$pivote = $list[0];
		$left = array();
		$right = array();
		for ($i = 1; $i < $len; $i++) { 
			if ($list[$i] < $pivote) {
				$left[] = $list[$i];
			}else{
				$right[] = $list[$i];
			}
		}
		$left = $this->Qsort($left);
		$right = $this->Qsort($right);
		return array_merge($left, array($pivote), $right);
	}
}

class QuickSort_2 extends Sort {
	public function getRes() {
		$list = $this->list;
		$len = count($list);
		$this->Qsort($list, 0, $len-1);
		return $list;
	}

	private function Qsort(&$list, $low, $high) {
		if ($low < $high) {
			$pivote = $this->partition($list, $low, $high);
			$this->Qsort($list, $low, $pivote-1);
			$this->Qsort($list, $pivote+1, $high);
		}
	}

	private function partition(&$list, $low, $high) {
		$temp = $list[$low];
		while ($low < $high) {
			while ($low < $high && $list[$high] >= $temp) {
				$high--;	
			}
			$this->swap($list, $low, $high);
			while ($low < $high && $list[$low] < $temp) {
				$low++;
			}
			$this->swap($list, $low, $high);
		}
		return $low;
	}

	private function swap(&$list, $i, $j) {
		$temp = $list[$i];
		$list[$i] = $list[$j];
		$list[$j] = $temp;
	}
}

class Client {
	public static function main() {
		$list = array(9, 4, 6, 5, 2, 7, 1, 8, 3, 12, 34);
		$bubble = new BubbleSort($list);
		print_r($bubble->getRes());
		echo "<br>";
		$select = new SelectionSort($list);
		print_r($select->getRes());
		echo "<br>";
		$insert = new InsertionSort($list);
		print_r($insert->getRes());
		echo "<br>";
		$shell = new ShellSort($list);
		print_r($shell->getRes());
		echo "<br>";
		$heap = new HeapSort($list);
		print_r($heap->getRes());
		echo "<br>";
		$merge = new MergeSort($list);
		print_r($merge->getRes());
		echo "<br>";
		$quick1 = new QuickSort_1($list);
		print_r($quick1->getRes());
		echo "<br>";
		$quick2 = new QuickSort_2($list);
		print_r($quick2->getRes());
		echo "<br>";
	}
}

Client::main();