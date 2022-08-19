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
  <h4 class="mt-3"> kuesioner </h4>
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
      <a class="btn btn-primary mb-2" href="<?php echo base_url();?>admin/kuesioner/inputdata"><i class="fa fa-upload"></i> Tambah Data kuesioner</a>
      <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data kuesioner </h6>
        </div>                        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width: 30px;">No.</th>
                  <th>kode</th>
                  <th>Dimensi</th>
                  <th>Detail</th>
                  <th style="width: 70px;">Aksi</th>                  
                </tr>
              </thead>                  
              <tbody>
              <?php $no=1;
               if(empty($kuesioner)){
                echo "  <tr> <td colspan='6'> data Kosong  </td>  </tr>";
              }
              else if(isset($kuesioner)){
                
              foreach ($kuesioner as $items) :?>
              <tr>
                <td style="text-align: center;"><?php echo $no++;?></td>
                <td><?php echo $items['kuesionerKode'];?></td>
                <td><?php echo $items['nama'];?></td>
                <td><?php echo $items['pertanyaan'];?></td>
                <td style="text-align: center;">
                  <a href="<?php echo base_url();?>admin/kuesioner/editdata/<?php echo $items['kuesionerId'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo base_url();?>admin/kuesioner/hapusdata/<?php echo $items['kuesionerId'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>                      
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

		

		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
