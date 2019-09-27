<?php
system('clear');
sleep(1);
echo "masukan email : ";
$email = trim(fgets(STDIN));
echo "masukan password : ";
$password = trim(fgets(STDIN));
function fat($email, $password) {
if(!empty($email && $password)) {
	if($email && $password) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://b-api.facebook.com/method/auth.login?access_token=237759909591655%25257C0f140aabedfb65ac27a739ed1a2263b1&format=json&sdk_version=2&email=".$email."&locale=en_US&password=".$password."&sdk=ios&generate_session_cookies=1&sig=3f555f99fb61fcd7aa0c44f58f522ef6");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$x = curl_exec($ch);
		$json_dec = json_decode($x, true);
		$fo = fopen("token.txt", 'w');
		fwrite($fo, $json_dec['access_token']."\n");
		fclose($fo);
		system('clear');
		sleep(1);
		echo "\e[1;32mtoken success di simpan token.txt\n\e[1;0m";
		}
	}else {
		system('clear');
		sleep(1);
		echo "\e[1;31mAnda belum memasukan data!\n\e[1;0m";
	}
}
fat($email, $password);
?>
