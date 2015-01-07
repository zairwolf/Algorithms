<?php
/**
 *	Convert id to short URL in PHP by zairwolf
 *
 * 	Demo: http://www.you4be.com/id2ShortURL.php
 *
 *	Source: https://github.com/zairwolf/Algorithms/blob/master/id2ShortURL.php
 *
 *	Author: Hai Zheng @ https://www.linkedin.com/in/zairwolf/
 *
 */
//basic define
$_charArr = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$_len = strlen($_charArr);

//test
for($i=0;$i<$_len*3;$i++) echo "<br>$i:".id2ShortURL($i);
echo "<br>c8:".shortURL2Id('c8');

//*****************function*********************//
//convert id to url
function id2ShortURL($id){
	global $_charArr, $_len;
	$url = $id >= $_len ? id2ShortURL(floor($id/$_len)) : '';
	$url .= $_charArr[$id%$_len];
	return $url;
}

//convert url to id
function shortURL2Id($url){
	global $_charArr, $_len;
	$id = pow($_len, strlen($url)-1)*strpos($_charArr, substr($url, 0, 1));
	if(strlen($url) > 1) $id += shortURL2Id(substr($url, 1));
	return $id;
}
