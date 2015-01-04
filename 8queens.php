<?php
/**
 *	Eight Queens Puzzle in PHP by zairwolf
 * 
 * 	Demo: http://www.you4be.com/8queens.php
 *
 *	Source: https://github.com/zairwolf/Algorithms/blob/master/8queens.php
 *
 *	Author: Hai Zheng @ https://www.linkedin.com/in/zairwolf/
 *
 */

$N = 8;

//initialize
$_NArr = array();
for($i = 0; $i < $N; $i++) for($j = 0; $j < $N; $j++) $_NArr[] = array($i, $j);

//calculate
$output = array();
for($pos = 0; $pos < pow($N, 2); $pos++) {
	placeQueen($N, $pos, $_NArr, array());
}

//output
$divW = 11*$N;
echo "<style>div{float:left;width:{$divW}px;height:{$divW}px;line-height:11px;border:1px solid #0000ff;margin:5px;font-size:16px;}</style>";
echo "<h2>N=$N all=".count($output)."</h2>";
foreach($output as $val){
	printChess($val);
}

//********function***********//
function placeQueen($currentQueen, $pos, $_NArr, $res){
	$res[$currentQueen] = $pos;
	if($currentQueen == 1) {//push to the output
		global $output;
		$output[] = $res;
		return true;
	}
	//remove the invalid points
	list($i, $j) = $_NArr[$pos];
	foreach($_NArr as $key=>$val) if($key <= $pos || $val[0] == $i || $val[1] == $j || abs($val[0]-$i) == abs($val[1]-$j)) unset($_NArr[$key]);
	//continue next queen
	foreach($_NArr as $key=>$val){
		placeQueen($currentQueen-1, $key, $_NArr, $res);
	}
}

function printChess($res){
	global $N;
	echo "<div>";
	for($i = 0; $i < pow($N, 2); $i++) {
		if(in_array($i, $res)) echo 'x';
		elseif($i/$N+1 < $N) echo '_';
		else echo '&nbsp;&nbsp;';
		if($i%$N == $N-1) echo '<br />';
		else echo '|';
	}
	echo "</div>";
}