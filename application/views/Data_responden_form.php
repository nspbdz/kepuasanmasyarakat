<!DOCTYPE html>
<html lang="en">
<style>
	.specialInput {
		height: 500px;
		width: 500px;
		word-break: break-word;
	}

</style>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Kuesioner</title>

	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<link href="<?php echo base_url();?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

	<div class="container mt-3">
		
		<h4 class="mt-4">Aplikasi Kepuasan Masyarakat</h4>
		
		<form method="POST" action="<?php echo base_url();?>RespondenUser/simpandata" enctype="multipart/form-data">
			
			<div class="card shadow-sm mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Masukan Data Anda </h6>
				</div>
				<div class="card-body">
					<label for="nama">Nama</label>
					<div class="form-group">
						<input type="text" class="form-control form-control-user" placeholder="Masukkan Nama Anda"
							name="nama" required="">
					</div>
					<label for="jenis_kelamin">Jenis Kelamin</label>
					<div class="form-group">
						<select  class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
							<option value="">Pilih Jenis Kelamin</option>
							<option value="1">Laki-Laki</option>
							<option value="2">Perempuan</option>
						</select>
					</div>

					<label for="alamat">Alamat</label>
					<div class="form-group">
						<select  class="form-control" id="alamat" name="alamat" required>
							<option value="">Pilih Alamat</option>
							<option value="tukdana">Tukdana</option>
							<option value="arahan">Arahan</option>
							<option value="juntinyuat">Juntinyuat</option>
							<option value="karangampel">Karangampel</option>
							<option value="pasekan">Pasekan</option>
							<option value="jatibarang">Jatibarang</option>
						</select>
					</div>

					<label for="detail">Pekerjaan</label>
					<div class="form-group">
						<input id="confirmationText" class="form-control form-control-user" name="pekerjaan"
							placeholder="Masukkan  Pekerjaan" required=""></input>
					</div>

				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
				</div>
			</div>
		</form>
		<footer class="mt-5 mb-3">
			<div class="container my-auto">
				<div class="text-center my-auto">
				</div>
			</div>
		</footer>
	</div>
	<!-- <script>
			var myCurrentDate = new Date();
			// console.log(myCurrentDate);
			// toLocaleTimeString
			console.log(myCurrentDate.toLocaleString())
			$('#tanggal').val(myCurrentDate.toLocaleString());
			$('#tanggal').hide()
		</script> -->
	<script src="<?php echo base_url(); ?>/assets/jquery/jquery.slim.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
