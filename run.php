<?php
date_default_timezone_set('Asia/Jakarta');
function randomuser(){
    randomuser:
    $randomuser = file_get_contents('https://wirkel.com/data.php?qty=1&domain=xsingles.site');
    $json = json_decode($randomuser, true);
    $data = $json['result']['0'];
    return $data;
}
function color($color = "default" , $text) {
   $arrayColor = array(
     'grey' 		=> '1;30',
     'red' 		=> '1;31',
     'green' 	=> '1;32',
     'yellow' 	=> '1;33',
     'blue' 		=> '1;34',
     'purple' 	=> '1;35',
     'nevy' 		=> '1;36',
     'white' 	=> '1;0',
   );
   return "\033[".$arrayColor[$color]."m".$text."\033[0m";
}
function rand_numb($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function views($reff){
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://solana.com/earn/huobi?grsf='.$reff.'');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'Host: solana.com';
  $headers[] = 'Cache-Control: max-age=0';
  $headers[] = 'Upgrade-Insecure-Requests: 1';
  $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 7.1.2; G011A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36';
  $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
  $headers[] = 'Sec-Fetch-Site: none';
  $headers[] = 'Sec-Fetch-Mode: navigate';
  $headers[] = 'Sec-Fetch-User: ?1';
  $headers[] = 'Sec-Fetch-Dest: document';
  $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
  $headers[] = 'Cookie: ajs_anonymous_id=%22bf7f4c0b-eb0b-464a-9e96-e2e419d7b54b%22; caa4sx.ref=o9loy3; caa4sx.ref_ts=1601519260185; _ga=GA1.2.506813210.1601519285; _gid=GA1.2.1372231443.1601519285; _hp2_id.3845541524=%7B%22userId%22%3A%221964313165437743%22%2C%22pageviewId%22%3A%223596992039804870%22%2C%22sessionId%22%3A%224537877411081294%22%2C%22identity%22%3Anull%2C%22trackerVersion%22%3A%224.0%22%7D; _hp2_ses_props.3845541524=%7B%22ts%22%3A1601519284774%2C%22d%22%3A%22solana.com%22%2C%22h%22%3A%22%2Fearn%2Fhuobi%22%2C%22q%22%3A%22%3Fgrsf%3Do9loy3%22%7D; caa4sx.accessToken=not-required; caa4sx.participantId='.$reff.'';
  $headers[] = 'If-None-Match: W/\"5f7367c9-539e6\"';
  $headers[] = 'If-Modified-Since: Tue, 29 Sep 2020 16:58:49 GMT';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  return $result;
}

echo color("blue", "[?] Refferal : ");
$reff = trim(fgets(STDIN));
while (true) {

  $users = randomuser();
  $first = $users['firstname'];
  $last = $users['lastname'];
  $username = $first.rand(10,999);
  $pecah = explode("@",$users['email']);
  $email = $pecah[0]."@gmail.com";
  $time = strtotime("now");
  $uid = rand_numb(8);
  // $detik=array('120', '285', '376', '459', '587');
  $detik=array('2', '3');
  shuffle($detik);
  $acaksec = array_shift($detik);

#Views
  $views = views($reff);
  if (preg_match('/huobi/i', $views)) {
    echo color($color = "green" , "| ".date('H:i:s')." | Success to view page\n");
  } else{
    echo color($color = "red" , "| ".date('H:i:s')." | Failed to view page\n");
  }

#Register
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.growsurf.com/api/v2/client/campaign/caa4sx/participant');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '{"fingerprint":"3f91224c48877a25a5c0cb471222a689","referredBy":"'.$reff.'","referredAt":1607000285454,"referrerUrl":"https://solana.com/earn/huobi?grsf='.$reff.'","metadata":{"twitter":"@'.$username.'","telegramId":"@'.$username.'","huobi":"'.$uid.'","gdprAgreements":[{"text":"I agree to receive future marketing materials and communications","agreed":true},{"text":"I accept the terms and conditions","agreed":true}]},"reCaptchaResponse":null,"email":"'.$email.'","firstName":"'.$first.'","lastName":"'.$last.'"}');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'Authority: api.growsurf.com';
  $headers[] = 'Sec-Ch-Ua: ^^Google';
  $headers[] = 'Accept: application/json, text/plain, */*';
  $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
  $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36';
  $headers[] = 'Content-Type: application/json;charset=UTF-8';
  $headers[] = 'Origin: https://solana.com';
  $headers[] = 'Sec-Fetch-Site: cross-site';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Referer: https://solana.com/';
  $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);

  if (preg_match('/accessToken/i', $result)) {
    echo color($color = "green" , "| ".date('H:i:s')." | Berhasil Mendaftar\n");
    echo color($color = "blue" , "[!] Sleep $acaksec seconds!!\n");
    sleep($acaksec);
  } else {
    echo color($color = "red" , "| ".date('H:i:s')." | Gagal Mendaftar\n");
  }
}
?>
