
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Aplikasi Kepuasan Masyarakat</title>
  <link href="<?php echo base_url();?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>

<body>  
  <div class="container">
    <h4 class="mt-4"></h4>
    <p class="mb-4">Aplikasi Kepuasan Masyarakat</p>
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('success');?>. <u><a href="<?php echo base_url();?>admin/kuesioner" style="color: #155724">Lihat data kuesioner</a></u>
    </div>               
    <?php endif;?>
    <form method="POST" action="<?php echo base_url();?>admin/kuesioner/updatedata" enctype="multipart/form-data">                        
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dimensi </h6>
        </div>
        <div class="card-body">
          <input type="hidden" name="id" value="<?php echo $kuesioner->id;?>">
          <label for="kode">kode Dimensi</label>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" placeholder="Masukkan kode Dimensi" name="kode" required="" value="<?php echo $kuesioner->kode;?>">
            </div>
            <label for="dimensi_id">Dimensi Kuesioner</label>
          <div class="form-group">

        

          <select class="form-control" id="dimensi_id" name="dimensi_id" required>
               <option value="0">Pilih Dimensi</option>
                <?php foreach($dimensi as $items) { ?>
                <option value="<?php echo $items->id; ?>"<?php if($items->id==$kuesioner->dimensi_id) echo 'selected="selected"'; ?>><?php echo $items->nama; ?></option>

                    <?php } ?>
                    </select>
                    
            <!-- <input type="text" class="form-control form-control-user" placeholder="Masukkan Nama Kuesioner" name="dimensi_id" required=""> -->
          </div>
          
            <div class="form-group">
              <Textarea id="myTextarea" class="form-control form-control-user" placeholder="<?php echo $kuesioner->pertanyaan;?>" name="pertanyaan" required="" value="<?php echo $kuesioner->pertanyaan;?>">
            </Textarea>
            </div>
  <script>
  var idText=$("#myTextarea").val("<?php echo $kuesioner->pertanyaan;?>")
</script>
          
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
          <a href="<?php echo base_url('admin/kuesioner/index');?>" class="btn btn-default">Batal</a>
          
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
