<?php 

// script by saepulfariz 09/04/2021 versi Database PHP

$server = "localhost";
$username = "root";
$password = "";
$database = "unsub_puasa";

$conn = mysqli_connect($server, $username, $password, $database);

// CREATE TABLE `unsub_puasa`.`tb_puasa` ( `id` INT NOT NULL AUTO_INCREMENT ,  `tanggal` INT NOT NULL ,  `imsak` VARCHAR(6) NOT NULL ,  `subuh` VARCHAR(6) NOT NULL ,  `terbit` VARCHAR(6) NOT NULL ,  `dhuha` VARCHAR(6) NOT NULL ,  `dzuhur` VARCHAR(6) NOT NULL ,  `ashar` VARCHAR(6) NOT NULL ,  `magrib` VARCHAR(6) NOT NULL ,  `isya` VARCHAR(6) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;

// INSERT INTO `tb_puasa`(`id`, `tanggal`, `imsak`, `subuh`, `terbit`, `dhuha`, `dzuhur`, `ashar`, `magrib`, `isya`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])

// $puasa = file_get_contents('puasa.json');

// $puasa = json_decode($puasa, true);

// script convert json/array ke insert database mysql
// foreach ($puasa as $key) {

// 	$sql = "INSERT INTO `tb_puasa` (`id`, `tanggal`, `imsak`, `subuh`, `terbit`, `dhuha`, `dzuhur`, `ashar`, `magrib`, `isya`) VALUES ('', '".$key['tanggal']."', '".$key['imsak']."', '".$key['subuh']."', '".$key['terbit']."', '".$key['dhuha']."', '".$key['dzuhur']."', '".$key['ashar']."', '".$key['magrib']."', '".$key['isya']."')";

// 	$result = mysqli_query($conn, $sql);

// 	if ($result) {
// 		echo "True";
// 	}else{
// 		echo "False";
// 	}
// 	echo "<br>";
// }

$result = mysqli_query($conn, "SELECT * FROM tb_puasa");

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Jadwal Imsakiyah | PROFA (Programmer Fasilkom)</title>

    <style>
    	@font-face{
			font-family:"IndieFlower";
			src:url("fonts/IndieFlower-Regular.ttf");
			font-weight:normal;
		}

		/*https://fonts.google.com/specimen/Indie+Flower?preview.text=Jadwal%20Imsakiyah&preview.text_type=custom*/

    	body{
    		background-image: url('images/bg.jpg');
    		background-size: cover;
			background-attachment: fixed;
			background-position: center;
    	}

    	h1{
    		font-family: IndieFlower;
    	}
    	
    	tr:nth-child(even) {
    		/*background: #CCC;*/
    		color: yellow;
    	}
		tr:nth-child(odd) {
			/*background: #FFF;*/
			/*color: red;*/
		}

		tr:hover{
			background-color: #00FFFFFF;
		}


		.table-responsive{
			height: 500px;
			overflow: auto;
		}

		/* fixed header https://adrianroselli.com/2020/01/fixed-table-headers.html */

		th {
		  position: -webkit-sticky;
		  position: sticky;
		  top: 0;
		  z-index: 2;
		}

		th[scope=row] {
		  position: -webkit-sticky;
		  position: sticky;
		  left: 0;
		  z-index: 1;
		  background-color: #eee;
		}

		th[scope=row] {
		  vertical-align: top;
		  color: inherit;
		  background-color: inherit;
		  background: linear-gradient(90deg, transparent 0%, transparent calc(100% - .05em), #d6d6d6 calc(100% - .05em), #d6d6d6 100%);
		}
    </style>
  </head>
  <body>
    <div class="container">
    	<div class="row mt-4 justify-content-center">
    		<div class="col-md-10 text-center bg-info">
    			<h1 class="text-danger pb-2 pt-4">Jadwal Imsakiyah | PROFA (Programmer Fasilkom)</h1>
    		</div>
    	</div>
    	<div class="row justify-content-center mt-4 mb-3">
    		<div class="col-md-8">
    			<div class="card bg-primary shadow-sm">
    				<div class="card-body">
    					<div class="table-responsive">
    						<!-- table-striped -->
    						<table class="table text-white table-hover ">
							  <thead>
							    <tr>
							      <th scope="col">Tanggal</th>
							      <th scope="col">IMSAK</th>
							      <th scope="col">SUBUH</th>
							      <th scope="col">TERBIT</th>
							      <th scope="col">DHUHA</th>
							      <th scope="col">DZUHUR</th>
							      <th scope="col">ASHAR</th>
							      <th scope="col">MAGRIB</th>
							      <th scope="col">ISYA</th>
							    </tr>
							  </thead>
							  <tbody>
							    <?php while ( $row = mysqli_fetch_assoc($result) ): ?>
							    	<tr>
							    		<td><?= $row['tanggal']; ?> Ramadan</td>
							    		<td class="bg-success"><?= $row['imsak']; ?></td>
							    		<td><?= $row['subuh']; ?></td>
							    		<td><?= $row['terbit']; ?></td>
							    		<td><?= $row['dhuha']; ?></td>
							    		<td><?= $row['dzuhur']; ?></td>
							    		<td><?= $row['ashar']; ?></td>
							    		<td class="bg-success"><?= $row['magrib']; ?></td>
							    		<td><?= $row['isya']; ?></td>
							    	</tr>
							    <?php endwhile ?>
							  </tbody>
							</table>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>


    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-6">
    			<!-- https://www.tickcounter.com/ -->
    			<div data-type="countdown" data-id="2498105" class="tickcounter" style="width: 100%; position: relative; padding-bottom: 25%;"><a href="//www.tickcounter.com/countdown/2498105/countdown-ramadhan" title="CountDown Ramadhan">CountDown Ramadhan</a><a href="//www.tickcounter.com/" title="Countdown">Countdown</a></div><script>(function(d, s, id) { var js, pjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//www.tickcounter.com/static/js/loader.js"; pjs.parentNode.insertBefore(js, pjs); }(document, "script", "tickcounter-sdk"));</script>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>