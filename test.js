
 // a phantomjs example
 var ip = "221.88.67.31";
 var page = require('webpage').create();
 page.settings.userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36';
// page.customHeaders = {
//    "X-Forwarded-For":"221.88.67.31",
//    "HTTP_CLIENT_IP":"221.88.67.31",
//   "HTTP_X_FORWARDED_FOR":"221.88.67.31,191.254.133.122",
//    "REMOTE_ADDR":"221.88.67.31"
// };
// phantom.outputEncoding="gbk";
 page.open("http://www.9xiaowang.com", function(status) {
// page.open("http://tool.zzcard.cn/test.php", function(status) {
    if ( status === "success" ) {
        var text = page.title;
       console.log(text);
    } else {
       console.log(status);
       console.log("Page failed to load.");
    }
    phantom.exit(0);
 });