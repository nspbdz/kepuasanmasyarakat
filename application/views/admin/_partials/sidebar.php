<!-- Sidebar -->
<ul class="sidebar navbar-nav ">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Dimensi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/products/add') ?>">New Product</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Product</a>
        </div>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/admin/dimensi/index'); ?>" >
            <i class="fas fa-fw fa-users"></i>
            <span>Dimensi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/admin/kuesioner/index'); ?>" >
            <i class="fas fa-fw fa-users"></i>
            <span>Kuesioner</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/admin/responden/index'); ?>" >
            <i class="fas fa-fw fa-users"></i>
            <span>Data Responden</span></a>
    </li>
 
    <li class="nav-item">
    <!-- <a class="nav-link" href="<?php echo base_url('/admin/laporan/index'); ?>" > -->

        <a class="nav-link dropdown-toggle"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-users"></i>
      
      <span> Data Laporan</span> 
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/index'); ?>" >Persepsi</a>
        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/harapan'); ?>" >Harapan</a>
        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/fuzifikasiPersepsi'); ?>" >Fuzzifikasi Persepsi</a>
        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/fuzifikasiHarapan'); ?>" >Fuzzifikasi Harapan</a>

        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/defuzifikasipersepsi'); ?>" >Defuzzifikasi Persepsi</a>

        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/defuzifikasiHarapan'); ?>" >Defuzzifikasi Harapan</a>
        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/gapPvp'); ?>" >Gap PVP</a>
        <a class="dropdown-item" href="<?php echo base_url('/admin/laporan/gapPd'); ?>" >Gap Per Dimensi</a>
    
    </div>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li> -->
</ul>
