<?php 

error_reporting(0);
function getMD5(){

	 $params ="key=6c0109a2bedaf3356afaf6b852b65bd7&email=1&reff=BBBBBB6&submit=";

	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL,'https://api.ekawijanarka.info/regisreff/bigtoken/index.php');
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	 curl_setopt($ch, CURLOPT_POST, TRUE);
	 curl_setopt($ch, CURLOPT_HTTPHEADER,array('POST /regisreff/bigtoken/index.php HTTP/1.1;Host: api.ekawijanarka.info;Connection: keep-alive;Content-Length: 32;Cache-Control: max-age=0;Origin: https://api.ekawijanarka.info;Upgrade-Insecure-Requests: 1;DNT: 1;Content-Type: application/x-www-form-urlencoded;User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko);Chrome/73.0.3683.86 Safari/537.36;Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;Referer: https://api.ekawijanarka.info/regisreff/bigtoken/index.php;Accept-Encoding: gzip, deflate, br;Accept-Language: en-US,en;q=0.9'));
	 curl_setopt($ch, CURLOPT_POSTFIELDS,"$params");
	 $x = curl_exec($ch);	
	 $apikey = "Api Key Token I";
	 $refferal = '{"error":{"type';

	 $success = "Sukses Register";

	 $param = substr($x, 4871);
	 $param_succ = substr($param, 0, 15);
	 $kata =  substr($x, 4922);

	 $a = explode(":", $param);
	 $filter = str_replace("<font color=green onclick='copy(this)'>", "", $a[4]);
	 $filter2 = str_replace("</font><br />", "", $filter);
	 $md5 = $filter2."\n";
	 if ($param_succ == $success){
	 	echo  "\033[32m [Successfully] \033[0m Sukses Register! \n || MD5 TOKEN = $md5 \n";
	 }else if ($param_succ == $apikey){
	 	echo  "\033[31m [Not Valid] \033[0m Token => ".$a." \n || Api Key Token Is Not Valid! \n";
	 }else if ($param_succ == $refferal) {
	 	echo  "\033[31m [Format Invalid] \033[0m Token => ".$b." \n || Referral format is Invalid! \n";
	 }
	 
	 echo " \033[32m [Successfully] \033[0m Your MD5 => ".$filter2." ./M Irwansyah S \n";
	 file_put_contents("MD5CLI.txt", $md5, FILE_APPEND);
}



for ($i = 1; $i <= 10; $i++){
$md5[$i] = getMD5();
sleep(10);
}


