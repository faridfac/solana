<?php
$cek = cek();
$json = json_decode($cek, true);
$participants = $json['participants'];
for ($i=0; $i < count($participants); $i++) {
  $id = $participants[$i]['id'];
  $rank = $participants[$i]['rank'];
  $email = $participants[$i]['email'];
  $count = $participants[$i]['referralCount'];
  echo "$rank|$id|$email|$count\n";
}

function cek(){
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.growsurf.com/api/v2/client/campaign/caa4sx/leaderboard?limit=50&page=1');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');


  $headers = array();
  $headers[] = 'Host: api.growsurf.com';
  $headers[] = 'Accept: application/json, text/plain, */*';
  $headers[] = 'Save-Data: on';
  $headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 9; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Mobile Safari/537.36';
  $headers[] = 'Origin: https://solana.com';
  $headers[] = 'Sec-Fetch-Site: cross-site';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Referer: https://solana.com/airdrop/ftx';
  $headers[] = 'Accept-Encoding: gzip, deflate, br';
  $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
  $headers[] = 'If-None-Match: W/ad9-VQx2w5xvAJvxOyng7A/Jo+OeSAQ\"\"';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  return $result;
}
?>
