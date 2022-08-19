<!DOCTYPE html>
<html lang="en">
<style>
	/* .specialInput {
		height: 500px;
		width: 500px;
		word-break: break-word;
	} */

</style>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Kuesioner</title>

	<script src="https://code.jquery.com/jquery-3.6.0.slim.js"
		integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<link href="<?php echo base_url();?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

	<div class="container mt-3">

		<h4 class="mt-4">Aplikasi Kepuasan Masyarakat</h4>
		<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success');?>. <u><a href="<?php echo base_url();?>admin/kuesioner"
					style="color: #155724">Lihat data kuesioner</a></u>
		</div>
		<?php endif;?>
		<form method="POST" id="my_form" action="<?php echo base_url();?>RespondenUser/simpanjawaban"
			enctype="multipart/form-data">
			<input type="hidden" id="totalkuesioner" value="<?php echo count($kuesioner);?>" />

			<div class="card shadow-sm mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Masukan Data Anda </h6>
				</div>
				<div class="card-body">
				<h2>Petunjuk pengisian</h2>
				Jawablah pertanyaan-pertanyaan dibawah ini yang tersedia sesuai dengan pengalaman anda. Dengan kriteria penilaian kepuasan sebagai berikut:
				<br> </br>
				<table style=" solid black;margin-left:auto;margin-right:auto;">

					<tr>
						<td><b>Penilaian Kepuasan</b></td>
						<td><b>Skor</b></td>
					</tr>
					<tr>
						<td>Tidak Puas </td>
						<td style="text-align:center">1</td>
					</tr>
					<tr>
						<td>Kurang Puas </td>
						<td style="text-align:center">2</td>
					</tr>
					<tr>
						<td>Cukup Puas </td>
						<td style="text-align:center">3</td>
					</tr>
					<tr>
						<td>Puas </td>
						<td style="text-align:center">4</td>
					</tr>
					<tr>
						<td>Sangat Puas </td>
						<td style="text-align:center">5</td>
					</tr>
					</table>

					<div class="container table-responsive py-5">
						<table class="table table-bordered table-hover">
							<thead class="thead-dark">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Kriteria</th>
									<th scope="col">jawaban Persepsi</th>
									<th scope="col">jawaban Harapan</th>
								</tr>
							</thead>
							<tbody>
								<?php 	
	// print_r($responden['id']);
	$no=1;
	$noKuesioner=1;
	$number=1;

	if(empty($kuesioner)){
		echo "  <tr> <td colspan='6'> data Kosong  </td>  </tr>";
	}
	else if(isset($kuesioner)){
	foreach ($kuesioner as $indexs => $items): ?>

								<input type="hidden" value="<?php echo $items['kuesionerId'];?>" form="my_form"
									name="kuesioner_id[<?php echo $indexs+1;?>]" />
								<input type="hidden" value="<?php echo $responden['id'];?>" form="my_form"
									name="responden_id" />

								<tr>
									<td style="text-align: center;">

										<?php echo $number++;?></td>
									<td><?php echo $items['pertanyaan'];?></td>
									<td><?php echo $items['nama'];?></td>
									<td id="cekid">

										<?php 
  	$count=1;
  	// $mark=1;

	foreach ($jawaban as $key => $data):
	?>

										<input required type="radio" id="html" name="persepsi[<?php echo $indexs+1;?>]"
											value="<?php echo $key+1;?>"> <?php echo $data['nama'];?>

										<?php endforeach;?>
									</td>

									<td>

										<?php 
	foreach ($jawaban as $index => $data):
	?>
										<input required type="radio" id="html" name="harapan[<?php echo $indexs+1;?>]"
											value="<?php echo $index+1;?>"> <?php echo $data['nama'];?>

										<!-- <input type="radio" id="html" name="harapan<?php echo $no+1;?>" value="<?php echo $no+1;?>"> <?php echo $data['nama'];?> -->

										<?php endforeach;?>
									</td>
								</tr>
								<?php endforeach;?>
								<?php    }  ?>
							</tbody>
						</table>
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

	<script>

	</script>
	<script src="<?php echo base_url(); ?>/assets/jquery/jquery.slim.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
