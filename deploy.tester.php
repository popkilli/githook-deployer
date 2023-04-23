<?php

$data = '{"zen":"Non-blocking is better than blocking.","hook_id"...."site_admin":false}}'; //Start with "zen" until "site_admin"
$header = array('Accept: */*','Content-type: application/json','User-Agent: GitHub-Hookshot/ded62e5','X-GitHub-Delivery: 19d716f0-b0d2-11ec-8ceb-749330235434','X-GitHub-Event: ping','X-GitHub-Hook-ID: 350825890','X-GitHub-Hook-Installation-Target-ID: 428559037','X-GitHub-Hook-Installation-Target-Type: repository','X-Hub-Signature: sha1=32fadce637aac6a8aa6249e25a18e9b9c38ea296','X-Hub-Signature-256: sha256=128bd101b73742a8a54802ff169bfd9304b502ef368e98c4f1416de9269aa181');
$url = 'http://127.0.0.1/deploy.example.php';

$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "<pre>";
var_dump($httpcode);
echo "\n";
echo $result;
