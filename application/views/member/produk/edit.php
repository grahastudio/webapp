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
echo form_open_multipart(base_url('member/produk/edit/'.$produk->id_produk),$attribut);
?>


<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>

<div class="card-body">

<div class="row">
<div class="col-md-8">
  <div class="form-group form-group-lg">
    <label>Judul Produk</label>
    <input type="text" name="judul_produk" class="form-control" placeholder="Judul Produk"
    value="<?php echo $produk->judul_produk ?>" required>
  </div>

  <div class="form-group">
    <label>Isi Produk</label>
    <textarea name="isi_produk" class="form-control tinymce" placeholder="Isi Produk">
  <?php echo $produk->isi_produk ?>
    </textarea>
  </div>

  <div class="form-group">
    <label>Keyword Produk (Untuk SEO google)</label>
    <input type="text" name="keywords" class="form-control" placeholder="Keywords Produk" value="<?php echo $produk->keywords ?>">

  </div>




</div>

<div class="tile col-md-4">
  <div class="form-group form-group-lg">
    <label>Status Produk</label>
    <select name="status_produk" class="form-control custom-select">
      <option value="Publish">Publish</option>
      <option value="Draft" <?php if($produk->status_produk=="Draft"){echo "selected";}?> >Draft</option>
    </select>
  </div>


    <div class="form-group">
      <label>Jenis Produk</label>
      <select name="jenis_produk" class="form-control custom-select">
        <option value="Produk">Produk</option>
        <option value="Profil" <?php if($produk->jenis_produk=="Profil"){echo "selected";}?>>Profil</option>
      </select>
    </div>

    <div class="form-group">
      <label>kategori Produk</label>
      <select name="id_kategori" class="form-control custom-select">

        <?php foreach($kategori as $kategori) { ?>
        <option value="<?php echo $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori){echo "selected";}?> >
          <?php echo $kategori->nama_kategori ?>
        </option>
      <?php } ?>
      </select>
    </div>

    <div class="form-group">
      <label>Ganti Gambar</label><br>
      <input type="file" name="gambar"><br><br>
      <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" width="70%"
        class="img img-thumbnail">

    </div>

    <div class="form-group">
      <button type="submit" name="subit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Produk</button>
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
