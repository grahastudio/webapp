<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo $title ?></h3>

    </div>

    <?php
    //Notifikasi
    if ($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success custom-alert">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }

    ?>

    <div class="card-body">
        <div class="table-responsive">
            <table id="basic-datatables" class="table card-table table-vcenter text-nowrap">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1;
                    foreach ($member as $member) { ?>

                        <tr>
                            <td><?php echo $i ?></td>
                            <td><img src="<?php echo base_url('assets/upload/image/avatar/' . $member->foto_user) ?>" width="60" class="img img-thumbnail"></td>
                            <td><?php echo $member->nama ?></td>
                            <td><?php echo $member->email ?></td>
                            <td><?php echo $member->akses_level ?></td>
                            <td><?php
                                if ($member->active == 0) {
                                    echo "<span class='badge badge-danger'>";
                                    echo "Tidak Aktif";
                                    echo "</span>";
                                } else {
                                    echo "<span class='badge badge-success'>";
                                    echo "Aktif";
                                    echo "</span>";
                                }


                                ?></td>
                            <td>
                                <a href="<?php echo base_url('auth/member/detail/' . $member->id_user) ?>" title="Edit User" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
                            </td>
                        </tr>

                    <?php $i++;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>