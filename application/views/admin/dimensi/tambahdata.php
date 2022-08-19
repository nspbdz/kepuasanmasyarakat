
<!DOCTYPE html>
<html lang="en">
<style>
  .specialInput{
    height:500px;
    width:500px;
    word-break: break-word;
}
</style>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dimensi</title>


  <link href="<?php echo base_url();?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body >
  
  <div class="container mt-3">
    <h4 class="mt-4">Tambah Dimensi</h4>
    <p class="mb-4">Aplikasi Kepuasan Masyarakat </p>
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('success');?>. <u><a href="<?php echo base_url();?>admin/dimensi" style="color: #155724">Lihat data dimensi</a></u>
    </div>               
    <?php endif;?>
    <form method="POST" action="<?php echo base_url();?>admin/dimensi/simpandata" enctype="multipart/form-data">                        
      <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dimensi </h6>
        </div>
        <div class="card-body">
        <label for="nim">Kode Dimensi</label>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Masukkan Kode Dimensi" name="kode" required="">
          </div>
          <label for="nama">Nama Dimensi</label>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Masukkan Nama Dimensi" name="nama" required="">
          </div>
         
          <label for="detail">Detail</label>
          <div class="form-group">
          <textarea id="confirmationText" class="form-control form-control-user"  name="detail"  placeholder="Masukkan  Detail Dimensi" required=""></textarea>

          <!-- <textarea type="text" class="form-control form-control-user" placeholder="Masukkan  Detail Dimensi" name="detail" required=""> -->
          </textarea>
          </div>
        
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
          <a href="<?php echo base_url('admin/dimensi/index');?>" class="btn btn-default">Batal</a>
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

  <script src="<?php echo base_url(); ?>/assets/jquery/jquery.slim.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
