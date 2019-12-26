<div class="card">
  <div class="card-header">
                  <h3 class="card-title"><?php echo $title?></h3>

                </div>

<?php
//Notifikasi
if($this->session->flashdata('sukses'))
{
  echo '<div class="alert alert-success custom-alert">';
  echo $this->session->flashdata('sukses');
  echo '</div>';
}

 ?>


<div class="table-responsive">
<table class="table card-table table-vcenter text-nowrap datatable">
<thead>
<tr>
  <th width="5%">No</th>
    <th>Nama</th>
  <th width="20%">Email</th>
  <th>Tanggal Post</th>
  <th width="20%">Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kontak as $kontak) { ?>

<tr>
  <td><?php echo $i ?></td>
    <td><?php echo $kontak->nama ?>

      <?php if($kontak->status_read == 0) {
        echo '<span class="badge badge-danger">';
        echo "Pesan Baru";
        echo '</span>';
      }else {
        // echo '<span class="badge badge-success">';
        // echo "Ok";
        // echo '</span>';
      } ?>


    </td>
  <td><?php echo $kontak->email ?></td>
  <td><?php echo shortdate_indo($kontak->tanggal_post) ?></td>
  <td><a href="<?php echo base_url('member/kontak/lihat/' .$kontak->id_kontak) ?>" title="Edit Berita" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> view</a>

      <?php
      //link Delete
      include('delete.php');
      ?>

  </td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
