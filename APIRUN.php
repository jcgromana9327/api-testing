<?php


$wptUrl = "http://www.webpagetest.org/jsonResult.php?test=180222_BH_e159ba341fb3ab18bf3a1239cf2a0fb8";

$content= getcontents($wptUrl);
echo "<pre>";
echo $wptUrl;echo "\n";
$arr = json_decode($content, true);

echo "\n";
echo "First View:\n";
echo "\n";
echo "DocTime: ";
print_r($arr["data"]["runs"][1]["firstView"]["docTime"]);
echo "\n";
echo "loadTime: ";
print_r($arr["data"]["runs"][1]["firstView"]["loadTime"]);
echo "\n";
echo "render: ";
print_r($arr["data"]["runs"][1]["firstView"]["render"]);
echo "\n";
echo "requestsDoc: ";
print_r($arr["data"]["runs"][1]["firstView"]["requestsDoc"]);
echo "\n";
echo "domElements: ";
print_r($arr["data"]["runs"][1]["firstView"]["domElements"]);
echo "\n";
echo "bytesInDoc: ";
print_r($arr["data"]["runs"][1]["firstView"]["bytesInDoc"]);
echo "\n";
echo "fullyLoaded: ";
print_r($arr["data"]["runs"][1]["firstView"]["fullyLoaded"]);
echo "\n";
echo "bytesIn: ";
print_r($arr["data"]["runs"][1]["firstView"]["bytesIn"]);
echo "\n";
echo "\n";
echo "\n";

echo "Repeat View:\n";
echo "\n";
echo "DocTime: ";
print_r($arr["data"]["runs"][1]["repeatView"]["docTime"]);
echo "\n";
echo "loadTime: ";
print_r($arr["data"]["runs"][1]["repeatView"]["loadTime"]);
echo "\n";
echo "render: ";
print_r($arr["data"]["runs"][1]["repeatView"]["render"]);
echo "\n";
echo "requestsDoc: ";
print_r($arr["data"]["runs"][1]["repeatView"]["requestsDoc"]);
echo "\n";
echo "domElements: ";
print_r($arr["data"]["runs"][1]["repeatView"]["domElements"]);
echo "\n";
echo "bytesInDoc: ";
print_r($arr["data"]["runs"][1]["repeatView"]["bytesInDoc"]);
echo "\n";
echo "fullyLoaded: ";
print_r($arr["data"]["runs"][1]["repeatView"]["fullyLoaded"]);
echo "\n";
echo "bytesIn: ";
print_r($arr["data"]["runs"][1]["repeatView"]["bytesIn"]);
echo "\n";
echo "\n";

function getContents($url)
{
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