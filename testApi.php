<?php

// class MyApiTest extends PHPUnit_Framework_TestCase {
use PHPUnit\Framework\TestCase;

class MyApiTest extends TestCase {

    public function setUp() {
        $this->filename = __DIR__ . "/reports/test-result.html";
        $this->fp = fopen($this->filename, 'w');

        $data = '<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td{
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;

            }
            thead tr {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                background-color: navy;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-bolt"></i> Performance Test</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Scenario</th>
                                    <th>Expected Result</th>
                                    <th>Actual Result</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Scenario</th>
                                    <th>Expected Result</th>
                                    <th>Actual Result</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>';

        fwrite($this->fp, $data);
    }

    public function testApi() {

        $this->validateCatalogService();

        $data = '</tbody></table>
                    </div>
                </div>
                <div class="card-footer small text-muted"></div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="js/sb-admin-datatables.min.js"></script>
    </body>
</html>';
        fwrite($this->fp, $data);
        fclose($this->fp);
    }

    public function validateCatalogService() {
        // $url = 'http://hydra-c3.usautoparts.com/v3.0/Catalog/?op={%22getCategories%22:[],%22search%22:{%22searchKeyword%22:%22mirror%22,%22shopId%22:%221%22}}&data={%22catalogType%22:%22Jcw%22,%22catalogSource%22:%22Endeca%22,%22site%22:%22jcwhitney.com%22,%22navparams%22:{%22Ns%22:%22universal|0%22},%22gobacklevels%22:{%22L2%22:%220%22}}';
        // $content = $this->loadCurl($url);
        // $content = json_decode($content, true);

        $Url = "http://webpagetest.alphard.dev.usautoparts.com/jsonResult.php?test=180221_D9_5";
        $content = $this->getContents($Url);
        $content = json_decode($content, true);

        // $actual = isset ($arr["data"]["runs"][1]["firstView"]["docTime"]);
        // $this->assertTrue($actual);
        // if($actual == true){
        // $actual = $arr["data"]["runs"][1]["firstView"]["docTime"];
        // $expected = 6608;
        // $this->assertLessThanOrEqual($expected, $actual);

        $dataArr = array(
            array(
                "scenario" => "Check if docTime is present",
                "expected" => true,
                "actual" => $content["data"]["runs"][1]["firstView"]["docTime"]
            ),
            array(
                "scenario" => "Check if loadTime is present",
                "expected" => false,
                "actual" => $content["data"]["runs"][1]["firstView"]["loadTime"]
            ),
            array(
                "scenario" => "Check if render is present",
                "expected" => true,
                "actual" => $content["data"]["runs"][1]["firstView"]["render"]
            ),
            array(
                "scenario" => "Check if requestsDoc is present",
                "expected" => false,
                "actual" => $content["data"]["runs"][1]["firstView"]["requestsDoc"]
            ),
            array(
                "scenario" => "Check if domElements is present",
                "expected" => true,
                "actual" => $content["data"]["runs"][1]["firstView"]["domElements"]
            ),
            array(
                "scenario" => "Check if bytesInDoc is present",
                "expected" => true,
                "actual" => $content["data"]["runs"][1]["firstView"]["bytesInDoc"]
            ),
            array(
                "scenario" => "Check if fullyLoaded is present",
                "expected" => true,
                "actual" => $content["data"]["runs"][1]["firstView"]["fullyLoaded"]
            ),
            array(
                "scenario" => "Check if bytesIn is present",
                "expected" => true,
                "actual" => $content["data"]["runs"][1]["firstView"]["bytesIn"]
            )
        );

        $performanceArr = array(
            array(
                "scenario" => "Check docTime performance",
                "expected" => 6608,
                "actual" => $content["data"]["runs"][1]["firstView"]["docTime"]
            ),
            array(
                "scenario" => "Check loadTime performance",
                "expected" => 6608,
                "actual" => $content["data"]["runs"][1]["firstView"]["loadTime"]
            ),
            array(
                "scenario" => "Check render performance",
                "expected" => 985,
                "actual" => $content["data"]["runs"][1]["firstView"]["render"]
            ),
            array(
                "scenario" => "Check requestsDoc performance",
                "expected" => 80,
                "actual" => $content["data"]["runs"][1]["firstView"]["requestsDoc"]
            ),
            array(
                "scenario" => "Check domElements performance",
                "expected" => 1351,
                "actual" => $content["data"]["runs"][1]["firstView"]["domElements"]
            ),
            array(
                "scenario" => "Check bytesInDoc performance",
                "expected" => 1196428,
                "actual" => $content["data"]["runs"][1]["firstView"]["bytesInDoc"]
            ),
            array(
                "scenario" => "Check fullyLoaded performance",
                "expected" => 10482,
                "actual" => $content["data"]["runs"][1]["firstView"]["fullyLoaded"]
            ),
            array(
                "scenario" => "Check bytesIn performance",
                "expected" => 2077839,
                "actual" => $content["data"]["runs"][1]["firstView"]["bytesIn"]
            )
        );

        foreach ($dataArr as $data) {
            // echo $data['scenario'];
            // print_r($data);
            $scenario = $data['scenario'];
            $expected = $data['expected'];
            $actual = isset($data['actual']);
            $this->writeReport($scenario, $expected, $actual);
        }
        foreach ($performanceArr as $data) {
            // echo $data['scenario'];
            // print_r($data);
            $scenario = $data['scenario'];
            $expected = $data['expected'];
            $actual = $data['actual'];
            $this->writeReport($scenario, $expected, $actual); //display TD by rows
        }
    }

    public function writeReport($scenario, $expected, $actual) {
        if (is_bool($expected) and ( $expected == true)) {
            $expected_text = "true";
        } elseif (is_bool($expected) and ( $expected == false)) {
            $expected_text = "false";
        } else {
            $expected_text = "$expected";
        }

        if (is_bool($actual) && ($actual == true)) {
            $actual_text = "true";
        } elseif (is_bool($actual) && ($actual == false)) {
            $actual_text = "false";
        } else {
            $actual_text = $actual;
        }
        if ($expected == $actual) {
            $status = "Passed";
            $color = "#629632";
        } else {
            $status = "Failed";
            $color = "#FF0000";
        }
        $data = '<tr>
                               <td>' . $scenario . '</td>
                               <td>' . $expected_text . '</td>
                               <td>' . $actual_text . '</td>
                               <td><b><font color =' . $color . '>' . $status . '</font></b></td>
                             </tr>';

        fwrite($this->fp, $data);
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

    public function loadCurl($url) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_PROXY, "10.10.70.150:8080");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1 usap_selenium');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLVERSION, 6);


        $content = curl_exec($ch);

        curl_close($ch);

        return $content;
    }

}
