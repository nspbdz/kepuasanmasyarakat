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
        <a class="nav-link" href="<?php echo base_url('/dimensi'); ?>" >
            <i class="fas fa-fw fa-users"></i>
            <span>Dimensi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/kuesioner'); ?>" >
            <i class="fas fa-fw fa-users"></i>
            <span>Kuesioner</span></a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/kuesioner'); ?>" >
            <i class="fas fa-fw fa-users"></i>
            <span>Kuesioner</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li> -->
</ul>
