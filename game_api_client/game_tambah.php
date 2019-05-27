<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/game_api/api/game/tambah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil ditambah...!!');window.location.href=\"http://localhost/game_api_client/game.php\";</script>";
	}else{
		
		// print_r($_POST);
		// echo "Fafa";

		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api ?>
<h3>Tambah Data Kopi</h3>
<form class="form-horizontal" method="POST" action="http://localhost/game_api_client/game_tambah.php">
	Nama game* <br/>
	<input type="text" placeholder="nama game" name="nama_game" required/><br/>
	jumlah* <br/>
	<input type="text" placeholder="jumlah" name="jumlah" required/><br/>
	skin game* <br/>
	<input type="text" placeholder="skin game" name="skin_game" required/><br/>
	<button type="submit" type="button">
		Submit
	</button>
</form>