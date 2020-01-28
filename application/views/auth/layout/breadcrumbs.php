<div class="page-header">
  <h4 class="page-title"><?php echo $title ?></h4>
  <ul class="breadcrumbs">
    <li class="nav-home">
      <a href="<?php echo base_url('auth/dasbor') ?>">
        <i class="flaticon-home"></i>
      </a>
    </li>
    <li class="separator">
      <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url('auth/' . $this->uri->segment(2)) ?>">
        <?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?>
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