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
echo form_open_multipart(base_url('member/homepage/tambah_section'),$attribut);
?>

<div class="row">
<div class="col-md-8">
<div class="row">

<div class="col-md-12">
  <div class="form-group form-group-lg">
    <label>Judul Homepage</label>
    <input type="text" name="judul_homepage" class="form-control" placeholder="Judul Homepage"
    value="<?php echo set_value('judul_homepage') ?>">
  </div>
</div>

<input type="hidden" name="posisi" class="form-control" placeholder="Judul Homepage"
value="Section">





<div class="col-md-12">
  <div class="form-group">
    <label>Link / URL</label>
    <input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo
    base_url() ?>" >
  </div>
</div>

</div>
</div>


<div class="col-md-3">
      <div class="form-group form-group-lg" style="font-family:'FontAwesome','Tahoma';">
        <label>Pilih Icon</label>
        <select name="icon" class="form-control custom-select">
          <option value="fa fa-car">&#xf1b9; Car</option>
          <option value="fa fa-address-book">&#xf2b9; Address Book</option>
          <option value="fa fa-archive">&#xf187; Archive</option>
          <option value="fa fa-balance-scale">&#xf24e; Balance</option>
          <option value="fa fa-bank">&#xf19c; Bank</option>
          <option value="fa fa-bars">&#xf0c9; Bars</option>
          <option value="fa fa-bath">&#xf2cd; Bath</option>
          <option value="fa fa-bed">&#xf236; Bed</option>
          <option value="fa fa-beer">&#xf0fc; Beer</option>
          <option value="fa fa-bell">&#xf0f3; Bell</option>
          <option value="fa fa-bicycle">&#xf206; Bicycle</option>
          <option value="fa fa-birthday-cake">&#xf1fd; Birthday Cake</option>
          <option value="fa fa-apple">&#xf179; Apple</option>
          <option value="fa fa-bitbucket">&#xf171; Bitbucket</option>
          <option value="fa fa-bolt">&#xf0e7; Bold</option>
          <option value="fa fa-book">&#xf02d; Book</option>
          <option value="fa fa-bookmark">&#xf02e; Bookmark</option>
          <option value="fa fa-briefcase">&#xf0b1; Briefcase</option>
          <option value="fa fa-bus">&#xf207; Bus</option>
          <option value="fa fa-cab">&#xf1ba; Cab</option>
          <option value="fa fa-calendar">&#xf073; Calendar</option>
          <option value="fa fa-camera">&#xf030; Camera</option>
          <option value="fa fa-camera-retro">&#xf083; Camera Retro</option>
          <option value="fa fa-chain">&#xf0c1; Chain</option>
          <option value="fa fa-check">&#xf00c; Check</option>
          <option value="fa fa-check-circle">&#xf058; Check Circle</option>
          <option value="fa fa-check-square">&#xf14a; Check Square</option>
        </select>
      </div>
</div>

</div>

<div class="row">



  <div class="col-md-12">
    <div class="form-group">
      <label>Deskripsi</label>
      <textarea name="isi_homepage" class="form-control tinymce" placeholder="Isi Homepage">
  <?php echo set_value('isi_homepage') ?>
      </textarea>
    </div>
  </div>
<div class="col-md-12">
  <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan Homepage</button>
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
