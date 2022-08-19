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

		
				<div class="container">
						<div class="row">
							<div class="col-md-8">
							<h4 class="mt-3"> Data Laporan Hasil Gap Per Variable Pertanyaan </h4>
							<p class="mb-4">Aplikasi Kepuasan Masyarakat</p>

						</div>

						<div class="col-md-4">
							<br>
							<a href="<?php echo base_url('/admin/laporan/gapPvpPdf'); ?>">
							<button type="button"  class="btn btn-success">Laporan Export PDF</button>
							</a>
						</div>

					</div>
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
											<th>No. Pertanyaan</th>
											<th>Defuzzyfikasi Persepsi </th>
											<th>Defuzzyfikasi Harapan </th>
											<th>Gap</th>
											<th>Rank</th>
										</tr>
									</thead>
									<tbody>
										<?php 
              $no=1;
              $count=1;
              $count2=1;
              $count3=1;
              $count4=1;

              // print_r($kuesioner);
              if(count($hasilDefuzifikasiHarapan))
               if(empty($jawaban)){
                echo "  <tr> <td colspan='6'> data Kosong  </td>  </tr>";
              }
              else if(isset($jawaban)){
                
				for($iterate=0; $iterate<count($hasilDefuzifikasiHarapan); $iterate++) :?>
					<tr>
						<td><?php echo $kuesioner[$iterate]; ?></td>
						<td name="batas_bawah<?php echo $count++; ?>"><?php echo number_format($hasilDefuzifikasiPersepsi[$iterate], 2, '.', '');  ?></td>
						<td name="batas_tengah<?php echo $count2++; ?>"><?php echo number_format($hasilDefuzifikasiHarapan[$iterate], 2, '.', '');  ?></td>
						
						<td name="gapPvp<?php echo $count4++; ?>"><?php echo number_format($gapPvp[$iterate], 2, '.', ''); ?></td>
						<td name="rank<?php echo $count4++; ?>"><?php echo $rankValuesGap[$iterate] ?></td>
											
					</tr>
					<?php endfor;?>
					<?php    }  ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- <footer class="mt-5 mb-3"> -->

					<!-- </footer>  -->
				</div>



			</div>

		</div>

	</div>

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
