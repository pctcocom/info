# info
Obtain various software and equipment information data!

## HttpUserAgent
https://github.com/cbschuld/Browser.php

```
use Pctco\Info\HttpUserAgent;
$agent = new HttpUserAgent();
if( $agent->getBrowser() == HttpUserAgent::BROWSER_FIREFOX && $agent->getVersion() >=10 ) {
	echo 'You have FireFox version 10 or greater';
}
```

|Function|Note|
|:-|:-|
|->getUserAgent()|获取用于确定浏览器的用户代理值|
|->getBrowser()|获取浏览器名称 Chrome|
|->getVersion()|获取浏览器版本 84.0.4147.105|
|->getAolVersion()|获取浏览器AOL版本|
|->getPlatform()|获取平台名称 Apple|

|Function|Note|
|:-|:-|
|->isBrowser('Chrome')|判断浏览器名称 true|
|->isAol()|浏览器是来自AOL吗?|
|->isMobile()|浏览器是否来自移动设备？|
|->isTablet()|浏览器是否来自平板电脑设备？|
|->isRobot()|浏览器是否来自机器人（例如Slurp，GoogleBot）?|
|->isChromeFrame()|用于确定浏览器是否实际上是“ chromeframe”|
|->isFacebook()|浏览器是来自facebook吗？|

|Const Name|Browser Name|Website|
|:-|:-|:-|
|BROWSER_OPERA|'Opera'|http://www.opera.com/|
|BROWSER_OPERA_MINI|'Opera Mini'|http://www.opera.com/mini/|
|BROWSER_WEBTV|'WebTV'|http://www.webtv.net/pc/|
|BROWSER_EDGE|'Edge'|https://www.microsoft.com/edge|
|BROWSER_IE|'Internet Explorer'|http://www.microsoft.com/ie/|
|BROWSER_POCKET_IE|'Pocket Internet Explorer'|http://en.wikipedia.org/wiki/Internet_Explorer_Mobile|
|BROWSER_KONQUEROR|'Konqueror'|http://www.konqueror.org/|
|BROWSER_ICAB|'iCab'|http://www.icab.de/|
|BROWSER_OMNIWEB|'OmniWeb'|http://www.omnigroup.com/applications/omniweb/|
|BROWSER_FIREBIRD|'Firebird'|http://www.ibphoenix.com/|
|BROWSER_FIREFOX|'Firefox'|http://www.mozilla.com/en-US/firefox/firefox.html|
|BROWSER_ICEWEASEL|'Iceweasel'|http://www.geticeweasel.org/|
|BROWSER_SHIRETOKO|'Shiretoko'|http://wiki.mozilla.org/Projects/shiretoko|
|BROWSER_MOZILLA|'Mozilla'|http://www.mozilla.com/en-US/|
|BROWSER_AMAYA|'Amaya'|http://www.w3.org/Amaya/|
|BROWSER_LYNX|'Lynx'|http://en.wikipedia.org/wiki/Lynx|
|BROWSER_SAFARI|'Safari'|http://apple.com|
|BROWSER_IPHONE|'iPhone'|http://apple.com|
|BROWSER_IPOD|'iPod'|http://apple.com|
|BROWSER_IPAD|'iPad'|http://apple.com|
|BROWSER_CHROME|'Chrome'|http://www.google.com/chrome|
|BROWSER_ANDROID|'Android'|http://www.android.com/|
|BROWSER_GOOGLEBOT|'GoogleBot'|http://en.wikipedia.org/wiki/Googlebot|
|===|===|===|
|BROWSER_YANDEXBOT|'YandexBot'|http://yandex.com/bots|
|BROWSER_YANDEXIMAGERESIZER_BOT|'YandexImageResizer'|http://yandex.com/bots|
|BROWSER_YANDEXIMAGES_BOT|'YandexImages'|http://yandex.com/bots|
|BROWSER_YANDEXVIDEO_BOT|'YandexVideo'|http://yandex.com/bots|
|BROWSER_YANDEXMEDIA_BOT|'YandexMedia'|http://yandex.com/bots|
|BROWSER_YANDEXBLOGS_BOT|'YandexBlogs'|http://yandex.com/bots|
|BROWSER_YANDEXFAVICONS_BOT|'YandexFavicons'|http://yandex.com/bots|
|BROWSER_YANDEXWEBMASTER_BOT|'YandexWebmaster'|http://yandex.com/bots|
|BROWSER_YANDEXDIRECT_BOT|'YandexDirect'|http://yandex.com/bots|
|BROWSER_YANDEXMETRIKA_BOT|'YandexMetrika'|http://yandex.com/bots|
|BROWSER_YANDEXNEWS_BOT|'YandexNews'|http://yandex.com/bots|
|BROWSER_YANDEXCATALOG_BOT|'YandexCatalog'|http://yandex.com/bots|
|===|===|===|
|BROWSER_SLURP|'Yahoo! Slurp'|http://en.wikipedia.org/wiki/Yahoo!_Slurp|
|BROWSER_W3CVALIDATOR|'W3C Validator'|http://validator.w3.org/|
|BROWSER_BLACKBERRY|'BlackBerry'|http://www.blackberry.com/|
|BROWSER_ICECAT|'IceCat'|http://en.wikipedia.org/wiki/GNU_IceCat|
|BROWSER_NOKIA_S60|'Nokia S60 OSS Browser'|http://en.wikipedia.org/wiki/Web_Browser_for_S60|
|BROWSER_NOKIA|'Nokia Browser'|* all other WAP-based browsers on the Nokia Platform|
|BROWSER_MSN|'MSN Browser'|http://explorer.msn.com/|
|BROWSER_MSNBOT|'MSN Bot'|http://search.msn.com/msnbot.htm|
|BROWSER_BINGBOT|'Bing Bot'|http://en.wikipedia.org/wiki/Bingbot|
|BROWSER_VIVALDI|'Vivaldi'|https://vivaldi.com/|
|BROWSER_YANDEX|'Yandex'|https://browser.yandex.ua/|
|===|===|===|
|BROWSER_NETSCAPE_NAVIGATOR|'Netscape Navigator'|http://browser.netscape.com/ (DEPRECATED)|
|BROWSER_GALEON|'Galeon'|http://galeon.sourceforge.net/ (DEPRECATED)|
|BROWSER_NETPOSITIVE|'NetPositive'|http://en.wikipedia.org/wiki/NetPositive (DEPRECATED)|
|BROWSER_PHOENIX|'Phoenix'|http://en.wikipedia.org/wiki/History_of_Mozilla_Firefox (DEPRECATED)|
|BROWSER_PLAYSTATION|"PlayStation"|
|BROWSER_SAMSUNG|"SamsungBrowser"|
|BROWSER_SILK|"Silk"|
|BROWSER_I_FRAME|"Iframely"|
|BROWSER_COCOA|"CocoaRestClient"|

|Const Name|Platform Name|
|:-|:-|
|PLATFORM_UNKNOWN|'unknown'|
|PLATFORM_WINDOWS|'Windows'|
|PLATFORM_WINDOWS_CE|'Windows CE'|
|PLATFORM_APPLE|'Apple'|
|PLATFORM_LINUX|'Linux'|
|PLATFORM_OS2|'OS/2'|
|PLATFORM_BEOS|'BeOS'|
|PLATFORM_IPHONE|'iPhone'|
|PLATFORM_IPOD|'iPod'|
|PLATFORM_IPAD|'iPad'|
|PLATFORM_BLACKBERRY|'BlackBerry'|
|PLATFORM_NOKIA|'Nokia'|
|PLATFORM_FREEBSD|'FreeBSD'|
|PLATFORM_OPENBSD|'OpenBSD'|
|PLATFORM_NETBSD|'NetBSD'|
|PLATFORM_SUNOS|'SunOS'|
|PLATFORM_OPENSOLARIS|'OpenSolaris'|
|PLATFORM_ANDROID|'Android'|
|PLATFORM_PLAYSTATION|"Sony PlayStation"|
|PLATFORM_ROKU|"Roku"|
|PLATFORM_APPLE_TV|"Apple TV"|
|PLATFORM_TERMINAL|"Terminal"|
|PLATFORM_FIRE_OS|"Fire OS"|
|PLATFORM_SMART_TV|"SMART-TV"|
|PLATFORM_CHROME_OS|"Chrome OS"|
|PLATFORM_JAVA_ANDROID|"Java/Android"|
|PLATFORM_POSTMAN|"Postman"|
|PLATFORM_I_FRAME|"Iframely"|
