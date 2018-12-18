<?php

use PHPUnit\Framework\TestCase;

class UnitTestSample extends TestCase {

    public function testHydraApi() {
        // 1. Test http status
        // $hydraUrl = 'http://platform.hydra.staging.usautoparts.com/v1.0/Catalog2/?op={%22getProducts%22:[]}&data={%22catalogSource%22:%22Endeca%22,%22searchKeyword%22:%22mirror%22,%22navParams%22:{%22N%22:%220%22,%22Ns%22:%22%22},%22addfitment%22:%221%22,%22srvspc%22:{%22Catalog%22:{%22search%22:{%22searchKeyword%22:%22mirror%22}}},%22site%22:%22autopartswarehouse.com%22,%22request_uri%22:%22%2Fsearch%2F%3FNtt%3Dmirror%26searchType%3Dglobal%26shopId%3D1%26N%3D0%26addfitment%3D1%22}';
        // $getHeaders = get_headers($hydraUrl);
        // // print_r($getHeaders);
        // $urlToTest = "http://www.autopartswarehouse.com/";
        // $key = "A.33e6926f34abb1a8d46893d111b332a7";
        $wptUrl = "http://webpagetest.alphard.dev.usautoparts.com/jsonResult.php?test=180221_D9_5";
        // echo $wptUrl;

        // $content = $this->getContents($wptUrl);
        // $arrayResult = $this->convertXmlToArray($content);
        // echo "<pre>";
        // print_r($arrayResult);
        //
        // $statusUrl = "http://www.webpagetest.org/" . "testStatus.php?f=json&test=" . $arrayResult["data"]["testId"];
        // echo $statusUrl . "\n";
        //
        // $content = $this->getContents($statusUrl);
        // $content = json_decode($content, true);
        //
        // print_r($content);
        $content = $this->getContents($wptUrl);

        //echo $content;

        $arr = json_decode($content, true);

        // echo "<pre>";
        // print_r($arr["data"]["runs"][1]["firstView"]);
        // print_r($arr);
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["docTime"] . "\n";
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["loadTime"] . "\n";
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["render"] . "\n";
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["requestsDoc"] . "\n";
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["domElements"] . "\n";
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["bytesInDoc"] . "\n";
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["fullyLoaded"] . "\n";
        // echo "DocTime: " . $arr["data"]["runs"][1]["firstView"]["bytesIn"] . "\n";
        // $actual = $getHeaders[0];
        // $expected = "200";
        //
        // $this->assertContains($expected, $actual);
        //
        // // pre-requsite
        // $content = $this->getContents($hydraUrl);
        // $content = json_decode($content, true);
        // print_r($content); //to see metainfo view source

        // 2. callstatus
        $this->MetaInfoValidation($arr);

    }

    public function MetaInfoValidation($arr){

        $actual = isset ($arr["data"]["runs"][1]["firstView"]["docTime"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["docTime"];
        $expected = 6608;
        $this->assertLessThanOrEqual($expected, $actual);
    }
        $actual = isset ($arr["data"]["runs"][1]["firstView"]["loadTime"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["loadTime"];
        $expected = 6608;
        $this->assertLessThanOrEqual($expected, $actual);
    }
        $actual = isset ($arr["data"]["runs"][1]["firstView"]["render"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["render"];
        $expected = 985;
        $this->assertLessThanOrEqual($expected, $actual);
    }
        $actual = isset ($arr["data"]["runs"][1]["firstView"]["requestsDoc"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["requestsDoc"];
        $expected = 80;
        $this->assertLessThanOrEqual($expected, $actual);
    }
        $actual = isset ($arr["data"]["runs"][1]["firstView"]["domElements"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["domElements"];
        $expected = 1351;
        $this->assertLessThanOrEqual($expected, $actual);
    }
        $actual = isset ($arr["data"]["runs"][1]["firstView"]["bytesInDoc"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["bytesInDoc"];
        $expected = 1196428;
        $this->assertLessThanOrEqual($expected, $actual);
    }
        $actual = isset ($arr["data"]["runs"][1]["firstView"]["fullyLoaded"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["fullyLoaded"];
        $expected = 10482;
        $this->assertLessThanOrEqual($expected, $actual);
    }
        $actual = isset ($arr["data"]["runs"][1]["firstView"]["bytesIn"]);
        $this->assertTrue($actual);
        if($actual == true){
        $actual = $arr["data"]["runs"][1]["firstView"]["bytesIn"];
        $expected = 2077839;
        $this->assertLessThanOrEqual($expected, $actual);
    }

    }



    public function convertXmlToArray($content){
    $xml = simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $arrayResult = json_decode($json, TRUE);

    return $arrayResult;
    echo "<pre>";
    print_r($arrayResult);
}


    public function getContents($url) {

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

}

?>
