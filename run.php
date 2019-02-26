<?php
/**
  * @autor chen
  * 刷量
  */
//exec("phantomjs --proxy=114.249.116.88:9000 test.js");
//die;
require("common.php");
// $doc = phpQuery::newDocument('<div/>');
$dir = __DIR__;
$date = date("Ymd");
$ip_file = $dir."/ip{$date}.log";
$sort = isset($argv[0])?$argv[0]:'';
$begin = isset($argv[1])?(int)$argv[1]:0;

$ips = file_get_contents($ip_file);
$ips_arr = explode("\r\n", $ips);

if ($begin) {
	$ips_arr = array_slice($ips_arr,$begin);
}
if ($sort && $sort=="desc") {
        $ips_arr = array_reverse($ips_arr);
}
foreach ($ips_arr as $k=>$v) {
//      echo $k."\r\n";
        if(!$v){continue;}
        shell_exec("phantomjs --proxy={$v} {$dir}/test.js >>t.log & { sleep 4 ; kill $! & }");
        sleep(1);
}
echo "done!";
die;