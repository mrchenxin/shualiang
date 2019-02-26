<?php
require("phpQuery/phpQuery.php");
require("common.php");
// $doc = phpQuery::newDocument('<div/>');
$dir = __DIR__;
$date = date("Ymd");

/*for ($i=1; $i <= 700; $i++) { 
	$html = get_html("https://www.xicidaili.com/nt/{$i}");
	$doc = phpQuery::newDocumentHtml($html);
	foreach (phpQuery::pq("#ip_list tr") as $k => $v) {
		if($k==0) continue;
		$str = $v->nodeValue;
		$str_arr = explode("\n", $str);
		$ip = str_replace(' ','',$str_arr[1]).":".str_replace(' ','',$str_arr[2]);
		file_put_contents($dir."/ip{$date}.log", $ip."\r\n",FILE_APPEND);
	}
}*/

for ($i=1; $i <= 2000; $i++) { 
	$html = get_html("https://www.kuaidaili.com/free/inha/{$i}/");
	$doc = phpQuery::newDocumentHtml($html);
	foreach (phpQuery::pq("#list tr") as $k => $v) {
		if($k==0) continue;
		$str = $v->nodeValue;
		$str_arr = explode("\n", $str);
		$ip = str_replace(' ','',$str_arr[0]).":".str_replace(' ','',$str_arr[1]);
		file_put_contents($dir."/ip{$date}.log", $ip."\r\n",FILE_APPEND);

	}
	sleep(1);
}

echo "done!";
die;
/*$num = 100;
for ($i=0; $i < $num; $i++) { 
	curl_r();
}

function curl_r(){
	$headers = [ // 构造百度蜘蛛IP
	'CLIENT-IP: 220.181.108.117',
	'X-FORWARDED-FOR: 220.181.108.117',];
	$UserAgent="Mozilla/5.0+(compatible;+Baiduspider/2.0)"; //构造百度蜘蛛UA
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://www.9xiaowang.com/');//这里写要访问的站点
	#curl_setopt($ch, CURLOPT_REFERER, 'http://www.baidu.com/'); // 构造来路
	curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent);
	curl_setopt($ch, CURLOPT_HTTPHEADER , $headers);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$back = curl_exec($ch);
	curl_close ($ch);
	return $back;
}
*/