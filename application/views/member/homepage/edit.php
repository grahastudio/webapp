<div class="card">
    <div class="card-header">
                      <h3 class="card-title"><?php echo $title ?></h3>
                    </div>
  <div class="card-body">

<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Error Upload Gabar
if(isset($error_upload)){
  echo '<div class="alert alert-warning">'.$errors_upload.'</div>';
}


//Atribut
$attribut = '';
// Form Open
echo form_open_multipart(base_url('member/homepage/edit/'.$homepage->id_homepage),$attribut);
?>



<div class="row">

<div class="col-md-7">
  <div class="form-group form-group-lg">
    <label>Judul Homepage</label>
    <input type="text" name="judul_homepage" class="form-control" placeholder="Judul Homepage"
    value="<?php echo $homepage->judul_homepage ?>">
  </div>


<input type="hidden" name="posisi" class="form-control" placeholder="Judul Homepage"
value="Welcome">

  <div class="form-group">
    <label>Url / Link </label>
    <input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
    $homepage->url ?>" required>
  </div>

  <div class="form-group">
    <label>Deskripsi Homepage</label>
    <textarea name="isi_homepage" class="form-control tinymce" placeholder="Isi Homepage">
  <?php echo $homepage->isi_homepage ?>
    </textarea>
  </div>

</div>


<div class="col-md-4">
  <div class="form-group">
    <label>Ganti Gambar </label>
    <input type="file" name="gambar" class="form-control" style="border:0;">
    <img src="<?php echo base_url('assets/upload/image/'.$homepage->gambar) ?>"
      class="img img-thumbnail">
  </div>
</div>

</div>





<div class="row">
<div class="col-md-12">


  <div class="form-group">
    <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Welcome</button>
  </div>
</div>
</div>


<div class="clearfix"></div>
<?php
//Form close
echo form_close();
 ?>

</div>
</div>
