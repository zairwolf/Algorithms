<?php
/**
 *	Convert ID to short URL in PHP by zairwolf
 *
 * 	Demo: http://www.you4be.com/ID2shortURL.php
 *
 *	Source: https://github.com/zairwolf/Algorithms/blob/master/ID2shortURL.php
 *
 *	Author: Hai Zheng @ https://www.linkedin.com/in/zairwolf/
 *
 */

$_charArr = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$_len = strlen($_charArr);

echo shortURL(100000000000000);

function shortURL($id){
	global $_charArr, $_len;
	$url = $id >= $_len ? shortURL(floor($id/$_len)) : '';
	$url .= $_charArr[$id % $_len];
	return $url;
}
