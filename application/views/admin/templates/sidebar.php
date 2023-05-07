<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
    <div class="sidebar-brand-text mx-3">RENTAL MOBIL</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= ($this->uri->segment(1) == "Admin") ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url('Admin'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Nav Item - Charts -->
  <li class="nav-item <?= ($this->uri->segment(1) == "DataMobil" || $this->uri->segment(2) == "tambahData") ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url('DataMobil'); ?>">
      <i class="fas fa-fw fa-car"></i>
      <span>Data Mobil</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item <?= ($this->uri->segment(1) == "DataType" || $this->uri->segment(2) == "tambahType") ? "active" : ""; ?> ">
    <a class="nav-link" href="<?= base_url('DataType'); ?>">
      <i class="fas fa-fw fa-grip-horizontal"></i>
      <span>Data Type</span></a>
  </li>
  <li class="nav-item <?= ($this->uri->segment(1) == "Customer" || $this->uri->segment(2) == "tambahDataCustomer") ? "active" : ""; ?>">
    <a class="nav-link " href="<?= base_url('Customer'); ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Customer</span></a>
  </li>
  <li class="nav-item <?= ($this->uri->segment(1) == "transaksi" || $this->uri->segment(2) == "tambahDataCustomer") ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url('transaksi'); ?>">
      <i class="fas fa-fw fa-random"></i>
      <span>Transaksi</span></a>
  </li>
  <li class="nav-item <?= ($this->uri->segment(1) == "laporan" || $this->uri->segment(2) == "tambahDataCustomer") ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url('laporan'); ?>">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Laporan</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/logout'); ?>">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->