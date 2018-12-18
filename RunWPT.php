<?php

$urlToTest = "http://www.jcwhitney.com/";
$key = "A.33e6926f34abb1a8d46893d111b332a7";
$wptUrl = "http://www.webpagetest.org/runtest.php?url=" . $urlToTest . "&f=xml&k=" . $key;
echo $wptUrl;

$content = getContents($wptUrl);

$xml = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$arrayResult = json_decode($json, TRUE);

echo "<pre>";
print_r($arrayResult);



function getContents($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1 usap_selenium');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);

    $content = curl_exec($ch);
    curl_close($ch);
    
    return $content;
}

?>