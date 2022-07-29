
<?php
// $mobile_number="8695803843";
// $application_number="TNUWWB000001694444";
// $webpage=file_get_contents("https://tnuwwb.tn.gov.in/applications/status");
// $webpage=str_replace('<input type="text" name="applcode">','<input type="text" name="applcode" value="'.$application_number.'">',$webpage);
// $webpage=str_replace('<input type="text" name="permanentmobile">','<input type="text" name="permanentmobile" value="'.$mobile_number.'">',$webpage);
// echo $webpage;
?>

<?php

header("Access-Control-Allow-Origin: *");                                                                            
header('Content-Type: application/json');
header('charset="utf-8"');
header( 'Content-Type: text/html; charset=utf-8' );
error_reporting(E_ERROR | E_PARSE);
$time_start = microtime(true);

$All = [];

$encodedData = file_get_contents('php://input');  // take data from react native fetch API
$obj = json_decode($encodedData,true);
$changeData = $obj;
// echo $changeData;

$username=str_replace("\r\n", '', "TNUWWB000001694444");
$password=str_replace("\r\n", '', "8695803843");
$url="https://tnuwwb.tn.gov.in/applications/status"; 
$cookie="cookie.txt"; 


$postdata = "applcode=".$username."&permanentmobile=".$password; 

$ch = curl_init(); 
curl_setopt ($ch, CURLOPT_URL, $url); 
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
curl_setopt ($ch, CURLOPT_REFERER, $url); 

curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
curl_setopt ($ch, CURLOPT_POST, 1); 
$result = curl_exec ($ch);


$start = stripos($result, '</thead>');

$end = stripos($result, '</tbody>', $offset = $start);

$length = $end - $start;

$htmlSection = substr($result, $start, $length);

 echo '<table>';
  echo $htmlSection;
  echo '</tbody></table>';

$dom = new DOMDocument;
$dom->loadHTML($htmlSection);

$tables = $dom->getElementsByTagName('tbody');
$tr     = $dom->getElementsByTagName('tr'); 

foreach ($tr as $element1) {        
    for ($i = 0; $i < count($element1); $i++) {

        $slno       = $element1->getElementsByTagName('td')->item(0)->textContent;
        $date     = $element1->getElementsByTagName('td')->item(1)->textContent;
        $remark     = $element1->getElementsByTagName('td')->item(2)->textContent;
        $status       = $element1->getElementsByTagName('td')->item(3)->textContent;
        

        $decoded_remark = utf8_decode($remark);
        
            array_push($All, array(
            "slno"      => str_ireplace(array("\n","\r","\t",'\r','\n', '\t'), '', '', $slno),
            "date"    => str_ireplace(array("\n","\r","\t",'\r','\n', '\t'), '', '', $date),
            "remark"    => str_ireplace(array("\n","\r","\t",'\r','\n', '\t'), '', $decoded_remark),
            "status"      => str_ireplace(array("\n","\r","\t",'\r','\n', '\t'), '', $status),
        ));
    }
}

 echo json_encode($All, JSON_PRETTY_PRINT | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);



curl_close($ch);

?>

