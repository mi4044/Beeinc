<?php
$c_name = "###########";
conf::load('../../data/settings.inc.php');
$tenpayid = conf::get('tenpay_id');
$tenpaykey =  conf::get('tenpay_key');
//$tenpayid = "1211345301";
//$tenpaykey = "02c3c9ae126b555e616cb47f75068ecb";
$tenpay_return_url = conf::get('site_url')."/index.php?app=my_money&act=ten_return_url";
$tenpay_show_url = conf::get('site_url')."/index.php?app=my_money&act=paylist";
?>