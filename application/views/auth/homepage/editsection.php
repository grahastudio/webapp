<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo $title ?></h3>
  </div>
  <div class="card-body">

    <?php
    //Error warning
    echo validation_errors('<div class="alert alert-warning">', '</div>');
    //Error Upload Gabar
    if (isset($error_upload)) {
      echo '<div class="alert alert-warning">' . $errors_upload . '</div>';
    }


    // Form Open
    echo form_open_multipart(base_url('auth/homepage/editsection/' . $homepage->id_homepage));
    ?>

    <div class="row">
      <div class="col-md-8">
        <div class="row">

          <div class="col-md-12">
            <div class="form-group form-group-lg">
              <label>Judul Homepage</label>
              <input type="text" name="judul_homepage" class="form-control" placeholder="Judul Homepage" value="<?php echo $homepage->judul_homepage ?>">
            </div>
          </div>

          <input type="hidden" name="posisi" class="form-control" placeholder="Judul Homepage" value="Section">





          <div class="col-md-12">
            <div class="form-group">
              <label>Link / URL</label>
              <input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo $homepage->url ?>">
            </div>
          </div>

        </div>
      </div>


      <div class="col-md-4">
        <div class="form-group form-group-lg" style="font-family:'FontAwesome','Tahoma';">
          <label>Ganti Icon</label>
          <select name="icon" class="form-control custom-select">
            <option value="fa fa-car">&#xf1b9; Car</option>

            <option value="far fa-lightbulb" <?php if ($homepage->icon == "far fa-lightbulb") {
                                                echo "selected";
                                              } ?>>&#xf0eb; lightbulb</option>
            <option value="fe fe-film" <?php if ($homepage->icon == "fe fe-film") {
                                          echo "selected";
                                        } ?>><i class="fe fe-film"></i> Film</option>

            <option value="fa fa-address-book" <?php if ($homepage->icon == "fa fa-address-book") {
                                                  echo "selected";
                                                } ?>>&#xf2b9; Address Book</option>
            <option value="fa fa-archive" <?php if ($homepage->icon == "fa fa-archive") {
                                            echo "selected";
                                          } ?>>&#xf187; Archive</option>
            <option value="fa fa-balance-scale" <?php if ($homepage->icon == "fa fa-balance-scale") {
                                                  echo "selected";
                                                } ?>>&#xf24e; Balance</option>
            <option value="fa fa-bank" <?php if ($homepage->icon == "fa fa-bank") {
                                          echo "selected";
                                        } ?>>&#xf19c; Bank</option>
            <option value="fa fa-bars" <?php if ($homepage->icon == "fa fa-bars") {
                                          echo "selected";
                                        } ?>>&#xf0c9; Bars</option>
            <option value="fa fa-bath" <?php if ($homepage->icon == "fa fa-bath") {
                                          echo "selected";
                                        } ?>>&#xf2cd; Bath</option>
            <option value="fa fa-bed" <?php if ($homepage->icon == "fa fa-bed") {
                                        echo "selected";
                                      } ?>>&#xf236; Bed</option>
            <option value="fa fa-beer" <?php if ($homepage->icon == "fa fa-beer") {
                                          echo "selected";
                                        } ?>>&#xf0fc; Beer</option>
            <option value="fa fa-bell" <?php if ($homepage->icon == "fa fa-bell") {
                                          echo "selected";
                                        } ?>>&#xf0f3; Bell</option>
            <option value="fa fa-bicycle" <?php if ($homepage->icon == "fa fa-bicycle") {
                                            echo "selected";
                                          } ?>>&#xf206; Bicycle</option>
            <option value="fa fa-birthday-cake" <?php if ($homepage->icon == "fa fa-birthday-cake") {
                                                  echo "selected";
                                                } ?>>&#xf1fd; Birthday Cake</option>
            <option value="fa fa-apple" <?php if ($homepage->icon == "fa fa-apple") {
                                          echo "selected";
                                        } ?>>&#xf179; Apple</option>
            <option value="fa fa-bitbucket" <?php if ($homepage->icon == "fa fa-bitbucket") {
                                              echo "selected";
                                            } ?>>&#xf171; Bitbucket</option>
            <option value="fa fa-bolt" <?php if ($homepage->icon == "fa fa-bolt") {
                                          echo "selected";
                                        } ?>>&#xf0e7; Bold</option>
            <option value="fa fa-book" <?php if ($homepage->icon == "fa fa-book") {
                                          echo "selected";
                                        } ?>>&#xf02d; Book</option>
            <option value="fa fa-bookmark" <?php if ($homepage->icon == "fa fa-bookmark") {
                                              echo "selected";
                                            } ?>>&#xf02e; Bookmark</option>
            <option value="fa fa-briefcase" <?php if ($homepage->icon == "fa fa-briefcase") {
                                              echo "selected";
                                            } ?>>&#xf0b1; Briefcase</option>
            <option value="fa fa-bus" <?php if ($homepage->icon == "fa fa-bus") {
                                        echo "selected";
                                      } ?>>&#xf207; Bus</option>
            <option value="fa fa-cab" <?php if ($homepage->icon == "fa fa-cab") {
                                        echo "selected";
                                      } ?>>&#xf1ba; Cab</option>
            <option value="fa fa-calendar" <?php if ($homepage->icon == "fa fa-calendar") {
                                              echo "selected";
                                            } ?>>&#xf073; Calendar</option>
            <option value="fa fa-camera" <?php if ($homepage->icon == "fa fa-camera") {
                                            echo "selected";
                                          } ?>>&#xf030; Camera</option>
            <option value="fa fa-camera-retro" <?php if ($homepage->icon == "fa fa-camera-retro") {
                                                  echo "selected";
                                                } ?>>&#xf083; Camera Retro</option>
            <option value="fa fa-chain" <?php if ($homepage->icon == "fa fa-chain") {
                                          echo "selected";
                                        } ?>>&#xf0c1; Chain</option>
            <option value="fa fa-check" <?php if ($homepage->icon == "fa fa-check") {
                                          echo "selected";
                                        } ?>>&#xf00c; Check</option>
            <option value="fa fa-check-circle" <?php if ($homepage->icon == "fa fa-check-circle") {
                                                  echo "selected";
                                                } ?>>&#xf058; Check Circle</option>
            <option value="fa fa-check-square" <?php if ($homepage->icon == "fa fa-check-square") {
                                                  echo "selected";
                                                } ?>>&#xf14a; Check Square</option>
          </select>
        </div>

        <div style="font-size:50px" ;>
          <i class="<?php echo $homepage->icon ?>"></i>
        </div>


      </div>
    </div>

    <div class="row">



      <div class="col-md-12">
        <div class="form-group">
          <label>Deskripsi</label>
          <textarea name="isi_homepage" class="form-control summernote" placeholder="Isi Homepage"><?php echo $homepage->isi_homepage ?></textarea>
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