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
					<h4 class="mt-3"> Data Laporan Hasil Rekapitulasi Harapan </h4>
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

							<button>
									<a href="<?php echo base_url('/admin/laporan/index'); ?>"> <h6 class="m-0 font-weight-bold text-primary">Data Persepsi </h6></a>
								</button>
								
								<button>
									<a href="<?php echo base_url('/admin/laporan/harapan'); ?>"> <h6 class="m-0 font-weight-bold text-primary">Data harapan </h6></a>
								</button>

								<button>
									<a href="<?php echo base_url('/admin/laporan/fuzifikasiPersepsi'); ?>"> <h6 class="m-0 font-weight-bold text-primary">Data Fuzifikasi Persepsi </h6></a>
								</button>
								<button>
									<a href="<?php echo base_url('/admin/laporan/fuzifikasiHarapan'); ?>"> <h6 class="m-0 font-weight-bold text-primary">Data Fuzifikasi Harapan </h6></a>
								</button>
								<button>
									<a href="<?php echo base_url('/admin/laporan/dataGap'); ?>"> <h6 class="m-0 font-weight-bold text-primary">Data Gap  </h6></a>
								</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<!-- <th style="width: 30px;">No.</th> -->
											<th>No. Pertanyaan</th>
											<th>C</th>
											<th>A</th>
											<th>B</th>
										</tr>
									</thead>
									<tbody>
										<?php 
              $no=1;
              $count=1;
              $count2=1;
              $count3=1;
              // print_r($kuesioner);
              
               if(empty($jawaban)){
                echo "  <tr> <td colspan='6'> data Kosong  </td>  </tr>";
              }
              else if(isset($jawaban)){
                
				for($iterate=0; $iterate<count($batasBawah); $iterate++) :?>
					<tr>
						<td><?php echo $kuesioner[$iterate]; ?></td>
						<td name="batas_bawah<?php echo $count++; ?>"><?php echo round($batasBawah[$iterate]); ?></td>
						<td name="batas_tengah<?php echo $count2++; ?>"><?php echo round($batasTengah[$iterate]); ?></td>
						<td name="batas_atas<?php echo $count3++; ?>"><?php echo round($batasAtas[$iterate]); ?></td>
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
