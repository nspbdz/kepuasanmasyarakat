<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<!-- <div id="content-wrapper"> -->
		<br> </br>
		<div class="container-fluid">
				<!-- <br> </br>
				<br> </br> -->
				<div>

					<h2 class="textStyle">Selamat Datang di aplikasi Kepuasan Wajib Pajak Pada Pelayanan Samsat Keliling</h2>
					
				</div>

			<img src="<?php echo base_url('assets/images/dashboard.jpeg') ?>" alt="Paris" style="width:50%;">

		</div>

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

		<!-- </div> -->
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->
	<style>
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		.textStyle {
			margin-top: 100px;
			padding: 1rem;
			text-align: center;
		}

		/* .container-fluid {
			min-height: 100vh;
			background-color: black;
			background: url(assets/images/dashboard.jpeg) no-repeat center center fixed;

			background-size: 100% 100%;
			background-attachment: fixed;

		} */
	</style>

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>