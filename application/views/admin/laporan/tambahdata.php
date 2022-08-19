
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

  <title>Kuesioner</title>


  <link href="<?php echo base_url();?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body >
  
  <div class="container mt-3">
    <h4 class="mt-4">Tambah Laporan</h4>
    <p class="mb-4">Aplikasi Kepuasan Masyarakat </p>
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('success');?>. <u><a href="<?php echo base_url();?>admin/kuesioner" style="color: #155724">Lihat data kuesioner</a></u>
    </div>               
    <?php endif;?>
    <form method="POST" action="<?php echo base_url();?>admin/kuesioner/simpandata" enctype="multipart/form-data">                        
      <div class="card shadow-sm mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kuesioner </h6>
        </div>
        <div class="card-body">
        <label for="nim">Kode Kuesioner</label>
          <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Masukkan Kode Kuesioner" name="kode" required="">
          </div>
          <label for="dimensi_id">Dimensi Kuesioner</label>
          <div class="form-group">
          <select class="form-control" id="dimensi_id" name="dimensi_id" required>
               <option value="0">Pilih Dimensi</option>
                <?php foreach($dimensi as $items) { ?>
                        <option value=" <?php echo $items->id; ?>"> <?php echo $items->nama; ?></option>
                    <?php } ?>
                    </select>
                    
            <!-- <input type="text" class="form-control form-control-user" placeholder="Masukkan Nama Kuesioner" name="dimensi_id" required=""> -->
          </div>
         
          <label for="detail">Pertanyaan</label>
          <div class="form-group">
          <textarea id="confirmationText" class="form-control form-control-user"  name="pertanyaan"  placeholder="Masukkan  Pertanyaan Kuesioner" required=""></textarea>
          </textarea>
          </div>
        
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
          <a href="<?php echo base_url('kuesioner');?>" class="btn btn-default">Batal</a>
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
