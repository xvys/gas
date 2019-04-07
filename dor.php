
<?php
error_reporting(0);
function check($token){

	 $params ="md5=$token&submit=";

	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL,'https://api.ekawijanarka.info/regisreff/bigtoken/emailverif.php');
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	 curl_setopt($ch, CURLOPT_POST, TRUE);
	 curl_setopt($ch, CURLOPT_HTTPHEADER,array('POST /regisreff/bigtoken/emailverif.php HTTP/1.1;Host: api.ekawijanarka.info;Connection: keep-alive;Content-Length: 44;Cache-Control: max-age=0;Origin: https://api.ekawijanarka.info;Upgrade-Insecure-Requests: 1;DNT: 1;Content-Type: application/x-www-form-urlencoded;User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36;Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;Referer: https://api.ekawijanarka.info/regisreff/bigtoken/emailverif.php;Accept-Encoding: gzip, deflate, br
Accept-Language: en-US,en;q=0.9'));
	 curl_setopt($ch, CURLOPT_POSTFIELDS,"$params");
	 $x = curl_exec($ch);	

	 $gagal = "Belum ada Verifikasi";
	 $success = "Sukses Verify Email,";
	 $already = "Reward Already Claim";
	 $kata =  substr($x, 3256);

	 $kalimat = substr($kata, 0, 20);
	 if ($kalimat == $success){
	 	$response =  " \033[32m [Successfully] \033[0m Token => ".$token." ./M Irwansyah S \n";
	 }else if ($kalimat == $gagal){
	 	$response =  " \033[31m [Belum Verifikasi] \033[0m Token => ".$token." ./M Irwansyah S \n";
	 }else if ($kalimat == $already) {
	 	$response =  " \033[31m [Already] \033[0m Token => ".$token." ./M Irwansyah S \n";
	 }
	 
	 //echo $response." ".$kata."\n";
	 echo $response;
}



$fh = fopen("MD5CLI.txt", "r");
 
while (!feof($fh)) {
    $line = fgets($fh);
    check(trim($line));
}
 
fclose($fh);





?>

