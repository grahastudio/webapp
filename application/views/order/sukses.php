<div class="container konten">
          <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url($this->uri->segment(1)) ?>">
                <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(1))) ?>
              </a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ul>

<div class="alert alert-success alert-dismissible">
  <button data-dismiss="alert" class="close"></button>
  <h4>Some Message</h4>
  <p>
    Lorem ipsum Minim ad pariatur eiusmod ea ut nulla aliqua est quis id dolore minim
    voluptate.
  </p>
  <div class="btn-list">
    <button class="btn btn-success" type="button">Okay</button>
    <button class="btn btn-secondary" type="button">No, thanks</button>
  </div>
</div>

</div>
