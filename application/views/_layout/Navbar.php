<!-- Navbar --> 
<nav class="main-header navbar navbar-expand navbar-dark">
  
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-sm-inline-block">
        <span class="nav-link"><?= $title; ?></span>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout'); ?>" role="button"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->