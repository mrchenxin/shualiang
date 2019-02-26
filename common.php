<?php
function get_html($url){
	//抓取
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	/*if (ENV('PROXY')) {
	    curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_BASIC); //代理认证模式
	    curl_setopt($ch, CURLOPT_PROXY, "fs.hapac.altamob.com"); //代理服务器地址
	    curl_setopt($ch, CURLOPT_PROXYPORT, 9292); //代理服务器端口
	    // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTPS); //使用http代理模式
	}*/
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	$html = curl_exec($ch);
	$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	curl_close($ch);
	return $html;
}