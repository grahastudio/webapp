<div class="card">
  <div class="card-header">
                    <h3 class="card-title"><?php echo $title;?></h3>
                  </div>
                  <div class="card-body">

<?php
//Error warning
echo validation_errors('<div class="alert alert-danger"> <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>','</div>');
//Atribut
$attribut = 'class="alert alert-link"';
// Form Open
echo form_open_multipart(base_url('member/user/edit/'.$user->id_user),$attribut);
?>

<div class="row">
<div class="col-md-12">
  <div class="form-group">
    <label>Nama User</label>
    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama ?>" required>
  </div>
</div>

<div class="col-md-12">
<div class="form-group">
  <label>Telp </label>
  <input type="text" name="telp" class="form-control" placeholder="telp" value="<?php echo $user->telp ?>" required>
</div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Email User</label>
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" readonly>
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label>Level Akses User</label>
      <select name="akses_level" class="form-control custom-select">
        <option value="Superadmin">Superadmin</option>
        <option value="Admin" <?php if($user->akses_level=="Admin"){ echo "selected";}?>>Admin</option>
          <option value="Member" <?php if($user->akses_level=="Member"){ echo "selected";}?>>Member</option>
      </select>
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label>Status</label>
      <select name="status" class="form-control custom-select">
        <option value="1">Aktif</option>
        <option value="0" <?php if($user->active=="0"){ echo "selected";}?>>Tidak Aktif</option>
      </select>
  </div>
</div>

<!--<div class="col-md-12">-->
<!--  <div class="form-group">-->
<!--    <label>Password</label>-->
<!--    <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">-->
<!--  </div>-->
<!--</div>-->

<div class="col-md-12">
  <div class="form-group">
    <label>Upload Foto</label><br>
    <input type="file" name="foto_user"><br><br>

    <img src="<?php echo base_url('assets/upload/image/avatar/'.$user->foto_user) ?>" width="15%"
      class="img img-thumbnail">

  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
    
  </div>
</div>


</div>
</div>

<?php
//form Close
echo form_close();
?>

</div>
