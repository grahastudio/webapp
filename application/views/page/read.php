<div class="container my-md-5 mt-md-5">
  <div class="page-header pt-md-5">
    <a style="color:black;" href="<?php echo base_url('') ?>">
      <i class="flaticon-home"></i>
    </a>
    <ul class="breadcrumbs">
      <li class="nav-item">
        <a href="<?php echo base_url('page') ?>">
          <?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(1))) ?>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <?php echo $title ?>
      </li>
    </ul>
  </div>
  <div class="page-inner">

    <div class="row">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php echo $title ?></h3>
        </div>
        <div class="card-body">
          <?php echo $page->isi_page ?>
        </div>
      </div>
    </div>
  </div>
</div>