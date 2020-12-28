<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOKO BIMA</title>
  <style>
		body{
			display: flex;
			justify-content: center;
			margin: 0px;
			padding: 0px;
			width: 100vw;
			height: 100vh;
		}
		.container{
			width: 1000px;
			overflow: hidden;
		}
		.container-nav{
			display: flex;
			align-items: center;
			justify-content: space-between;
			background: #1f1f1f;
			height: 8vh;
			color: #f4f4f4;
		}
		.container-nav span{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 20px;
			font-weight: bold;
			background: rgb(52, 163, 0);
			padding: 10px;
			letter-spacing: 2px;
		}
		.container-nav button{
			background: red;
			border: none;
			outline: none;
			cursor: pointer;
			width: 130px;
			height: 30px;
			font-size: 16px;
			color: #fff;
			font-weight: bold;
			border-radius: 5px;
			margin-right: 10px;
		}
		.container-nav button:hover{
			border: 2px solid #fff;
		}
		.container-nav .control-link{
			display: flex;
			justify-content: space-between;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 18px;
			font-weight: bold;
			margin-right: 50px;
			width: 340px;
		}
		.container-content{
			display: flex;
			flex-wrap: wrap;
			/* align-items: center; */
			background: #f4f4f4;
			height: calc(100vh - 8vh);
			overflow-y: scroll;
		}
		.container-content .control-card{
			display: flex;
			justify-content: space-evenly;
			height: fit-content;
			margin: 20px 0px;
			flex: 0 0 33.333333%;
		}
		.container-content .card-produk{
			display: flex;
			flex-direction: column;
			width: 230px;
			height: 320px;
			padding: 10px;
			background: rgb(224, 216, 216);
			box-shadow: 0 0 10px 0 rgba(100, 100, 100, 0.26);
			border-radius: 5px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			font-weight: bold;
		}
		.container-content .card-produk img{
			width: 100%;
			height: 200px;
			margin-bottom: 10px;
		}
		.container-content .card-produk span{
			margin-bottom: 10px;
		}
		.container-content .card-produk a:hover{
			color: rgb(62, 62, 250);
		}
		.container-detail{
			width: 660px;
			height: calc(100vh - 8vh);
			background: rgba(0, 0, 0, 0.8);
			position: fixed;
		}
		.container-detail .detail-card{
			display: flex;
		}
		.container-detail .detail-card .detail-left{
			display: flex;
			flex-direction: column;
			flex: 1;
			padding: 30px;
			height: auto;
		}
		.container-detail .detail-card .detail-left img{
			width: 300px;
			height: 300px;
		}
		.container-detail .detail-card .detail-left span{
			margin-top: 10px;
			color: #f4f4f4;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			font-weight: bold;
			letter-spacing: 0.5px;
		}
		.container-detail .detail-card button{
			padding: 0px;
			margin: 0px;
			border: none;
			outline: none;
			background: rgba(255, 255, 255, 0.2);
			height: 100%;
			color: rgb(255, 255, 255);
			width: fit-content;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 20px;
			font-weight: bold;
			cursor: pointer;
			padding: 10px;
		}
		.container-detail .detail-card button:hover{
			background: rgb(62, 62, 250);
		}
		.card-produk .btn-produk{
			display: flex;
			justify-content: flex-end;
		}
		.btn-produk button{
			display: flex;
			justify-content: center;
			align-items: center;
			margin-left: 10px;
			width: 30px;
			height: 30px;
			border: none;
			outline: none;
			cursor: pointer;
		}
		.btn-produk button:hover{
			outline: 1px solid;
		}
		.btn-produk svg{
			height: 80%;
		}
		.edit-form div{
			display: flex;
		}
		.edit-form div span{
			display: flex;
			flex: 1;
		}
		.edit-form div input[type=text]{
			display: flex;
			flex: 2;
			margin-bottom: 10px;
		}
		.edit-form div input[type=number]{
			display: flex;
			flex: 2;
			margin-bottom: 10px;
		}
		.edit-form div input[type=file]{
			width: 120px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
  <div class="container">
    <div class="container-nav">
			<span>PRODUK TOKOBIMA</span>
			<button onclick="ClickTambah()">Tambah Data</button>
		</div>
		<div class="container-detail" id="detail">
      <div class="detail-card">
      </div>
    </div>
    <div class="container-content" id="content">
			<?php foreach($allProduk as $produk) : ?>
				<div class="control-card">
					<div class="card-produk">
					<img src="<?= base_url()?>images/<?= $produk['img_produk'];?>"/>
						<span>Nama Produk : <?= $produk["nama_produk"]; ?></span>
						<span>Harga Produk : <?= $produk["harga_produk"]; ?></span>
						<span>Stok Produk : <?= $produk["stok_produk"]; ?></span>
						<div class="btn-produk">
							<button style="background: red;" onclick="ClickDelete('<?= $produk['id_produk']; ?>', '<?= $produk['nama_produk']; ?>')">
								<svg id="svg8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 515.64 699"><defs><style>.cls-1{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:74px;}</style></defs><path class="cls-1" d="M191,223.89H509c34.15,0,61.83,20.58,61.83,46V616.92c0,25.39-27.68,46-61.83,46H191c-34.15,0-61.83-20.58-61.83-46V269.86C129.18,244.47,156.86,223.89,191,223.89Z" transform="translate(-92.18 -0.89)"/><line class="cls-1" x1="37" y1="82" x2="478.64" y2="82"/><line class="cls-1" x1="136.82" y1="37" x2="379.82" y2="37"/><line class="cls-1" x1="180.32" y1="353.5" x2="180.32" y2="531.5"/><line class="cls-1" x1="335.82" y1="353.5" x2="335.82" y2="531.5"/></svg>
							</button>
							<button style="background: green;" onclick="ClickEdit('<?= $produk['id_produk']; ?>', '<?= $produk['nama_produk']; ?>', '<?= $produk['harga_produk']; ?>', '<?= $produk['stok_produk']; ?>', '<?= $produk['img_produk']; ?>')">
								<svg id="svg8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 620.8 620.8"><defs><style>.cls-1{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:74px;}</style></defs><polygon class="cls-1" points="75.83 423.61 462.44 37 583.8 158.36 197.19 544.97 37 583.8 75.83 423.61"/><line class="cls-1" x1="104.19" y1="395.25" x2="225.55" y2="516.61"/></svg>
							</button>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
  </div>
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script>
		$("#detail").fadeOut();
		$(document).keyup(function(e) {
			if (e.key === "Escape") {
				$("#detail").fadeOut();
			}
		});
		
		function ClickDelete(id, nama) {
			$('<div></div>').appendTo('body')
			.html('<div><h6>Hapus Data '+ nama +' ?</h6></div>')
			.dialog({
				modal: true,
				title: 'Delete',
				zIndex: 10000,
				autoOpen: true,
				width: 'auto',
				resizable: false,
				buttons: {
					Yes: function() {
						window.location.href = "<?= base_url(); ?>produk/hapus/" + id;
						$(this).dialog("close");
					},
					No: function() {
						$(this).dialog("close");
					}
				},
					close: function(event, ui) {
					$(this).remove();
				}
			});
		};

		function readURL(value){
			if (value.substring(3,11) == 'fakepath') {
				$("#editUrl").text(value.substring(12));
			}
		}
		function validate(evt) {
			var theEvent = evt || window.event;

			// Handle paste
			if (theEvent.type === 'paste') {
					key = event.clipboardData.getData('text/plain');
			} else {
			// Handle key press
					var key = theEvent.keyCode || theEvent.which;
					key = String.fromCharCode(key);
			}
			var regex = /[0-9]|\./;
			if( !regex.test(key) ) {
				theEvent.returnValue = false;
				if(theEvent.preventDefault) theEvent.preventDefault();
			}
		}

		function ClickEdit(id, nama, harga, stok, url){
			$('<div></div>').appendTo('body')
			.html('<div class="edit-form"><div><span>Nama Produk</span><input id="namaProduk" type="text" value="'+ nama +'"></div><div><span>Harga Produk</span><input id="hargaProduk" type="text" onkeypress="validate(event)" value="'+ harga +'"></div><div><span>Stok Produk</span><input id="stokProduk" type="text" onkeypress="validate(event)" value="'+ stok +'"></div><div><span>Img Url</span><div style="display: flex; flex: 2;"><input id="imgProduk" style="color:transparent;" type="file" onchange="readURL(this.value)"><span id="editUrl">'+ url +'</span></div></div><span id="notiv" style="display: none; color: red;">Lengkapi Data!</span></div>')
			.dialog({
				modal: true,
				title: 'Edit',
				zIndex: 10000,
				autoOpen: true,
				width: '450px',
				resizable: false,
				buttons: {
					Edit: function() {
						let namaProduk = $("#namaProduk").val();
						let hargaProduk = $("#hargaProduk").val();
						let stokProduk = $("#stokProduk").val();
						let filename = $("#imgProduk").val();
						if (filename.substring(3,11) == 'fakepath') {
								filename = filename.substring(12);
						}
						if(filename == ""){
							filename = $("#editUrl").text();
						}
						if(namaProduk == "" || hargaProduk == "" || stokProduk == ""){
							$("#notiv").css("display", "flex");
						}else{
							window.location.href = "<?= base_url(); ?>produk/edit/" + id + "/"+ namaProduk + "/"+ hargaProduk + "/"+ stokProduk + "/"+ filename;
							$(this).dialog("close");	
						}
					}
				},
					close: function(event, ui) {
					$(this).remove();
				}
			});
		};

		function ClickTambah(){
			$('<div></div>').appendTo('body')
			.html('<div class="edit-form"><div><span>Nama Produk</span><input id="namaProduk_tambah" type="text" value=""></div><div><span>Harga Produk</span><input id="hargaProduk_tambah" type="text" onkeypress="validate(event)" value=""></div><div><span>Stok Produk</span><input id="stokProduk_tambah" type="text" onkeypress="validate(event)" value=""></div><div><span>Img Url</span><input id="imgProduk_tambah" type="file" style="display: flex; flex: 2;"></div><span id="notiv" style="display: none; color: red;">Lengkapi Data!</span></div>')
			.dialog({
				modal: true,
				title: 'Edit',
				zIndex: 10000,
				autoOpen: true,
				width: '450px',
				resizable: false,
				buttons: {
					Tambah: function() {
						let namaProduk = $("#namaProduk_tambah").val();
						let hargaProduk = $("#hargaProduk_tambah").val();
						let stokProduk = $("#stokProduk_tambah").val();
						let filename = $("#imgProduk_tambah").val();
						if (filename.substring(3,11) == 'fakepath') {
								filename = filename.substring(12);
						}
						if(filename == ""){
							filename = "default.jpg";
						}
						if(namaProduk == "" || hargaProduk == "" || stokProduk == ""){
							$("#notiv").css("display", "flex");
						}else{
							window.location.href = "<?= base_url(); ?>produk/tambah/" + namaProduk + "/"+ hargaProduk + "/"+ stokProduk + "/"+ filename;
							$(this).dialog("close");	
						}
					}
				},
					close: function(event, ui) {
					$(this).remove();
				}
			});
		};
	</script>
</body>
</html>