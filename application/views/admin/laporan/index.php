<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
				<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- Icon Cards-->
				<div class="container">
					<h4 class="mt-3"> Data Laporan Hasil Rekapitulasi Persepsi </h4>
					<p class="mb-4">Aplikasi Kepuasan Masyarakat</p>
					<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success');?>
					</div>
					<?php endif;?>
					<?php if ($this->session->flashdata('delete')): ?>
					<div class="alert alert-danger" role="alert">
						<?php echo $this->session->flashdata('delete');?>
					</div>
					<?php endif;?>
				
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3">
						<style>
					.btn {
						white-space: nowrap;
						text-align: center;
						display: inline-block;
						}
				</style>
					<div class="card shadow-sm mb-4">
						<div class="card-header py-3">

								
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<!-- <th style="width: 30px;">No.</th> -->
											<th>Pertanyaan</th>
											<th>Tidak Puas</th>
											<th>Kurang Puas</th>
											<th>Cukup Puas</th>
											<th>Puas</th>
											<th>Sangat Puas</th>
											<th>Jumlah</th>
										</tr>
									</thead>
									<tbody>
										<?php 
              $no=1;
              $count=1;
              // print_r($kuesioner);
              
               if(empty($kuesioner)){
                echo "  <tr> <td colspan='6'> data Kosong  </td>  </tr>";
              }
              else if(isset($kuesioner)){
                
              foreach ($jawaban as $index  => $items) :?>
										<tr>
											<!-- <td style="text-align: center;"><?php echo $no++;?></td> -->
											<input type="hidden" name="counter" value="<?php echo count($jawaban);?>">
											<td><?php echo $items['kode'];?></td>

											<td name="1<?php echo $index+1; ?>"><?php echo $items['nilaiPersepsi1'];?></td>
											<td name="2<?php echo $index+1; ?>"><?php echo $items['nilaiPersepsi2'];?></td>
											<td name="3<?php echo $index+1; ?>"><?php echo $items['nilaiPersepsi3'];?></td>
											<td name="4<?php echo $index+1; ?>"><?php echo $items['nilaiPersepsi4'];?></td>
											<td name="5<?php echo $index+1; ?>"><?php echo $items['nilaiPersepsi5'];?></td>
											<td name="jumlah<?php echo $count++; ?>"></td>
											<!-- <td style="text-align: center;">
                  <a href="<?php echo base_url();?>admin/kuesioner/editdata/<?php echo $items['kuesionerId'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo base_url();?>admin/kuesioner/hapusdata/<?php echo $items['kuesionerId'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>                       -->
										</tr>
										<?php endforeach;?>
										<?php    }  ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- <footer class="mt-5 mb-3"> -->

					<!-- </footer>  -->
				</div>
				<script>
			let kuesioner_length = $('input[name^="counter"]').val();
			console.log(kuesioner_length)
			let counter = 5
			var jumlah = [];
			var total = [];

			for (let x = 1; x <= kuesioner_length; x++) {
				for (let i = 1; i <= counter; i++) {
					jumlah.push(parseInt($('td[name="' + i + '' + x + '"]').html()));


				}
			}
			console.log(jumlah);
			const chunkSize = 5;
			const groups = jumlah.map((e, i) => {
				return i % chunkSize === 0 ? jumlah.slice(i, i + chunkSize) : null;
			}).filter(e => {
				return e;
			});

			var arrJumlah = [];
			var arrxJumlah = [];

			for (let y = 1; y <= kuesioner_length; y++) {
				arrJumlah.push(groups[y - 1].reduce((x, y) => x + y));
			}
			for (let z = 1; z <= arrJumlah.length; z++) {
				arrxJumlah.push(arrJumlah[z - 1]);
				$('td[name^="jumlah' + z + '"]').html(arrJumlah[z - 1])
			}
				</script>


			</div>

		</div>

	</div>
	

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
