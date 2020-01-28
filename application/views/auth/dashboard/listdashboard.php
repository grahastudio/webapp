<div class="row row-card-no-pd">
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-chart-pie text-warning"></i>
            </div>
          </div>
          <div class="col col-stats">
            <div class="numbers">
              <p class="card-category">Galery</p>
              <h4 class="card-title"><?php echo count($galeri) ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body ">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-coins text-success"></i>
            </div>
          </div>
          <div class="col col-stats">
            <div class="numbers">
              <p class="card-category">Download</p>
              <h4 class="card-title"><?php echo count($download) ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-envelope text-danger"></i>
            </div>
          </div>
          <div class="col col-stats">
            <div class="numbers">
              <p class="card-category">Pesan Masuk</p>
              <h4 class="card-title"><?php echo count($kontak) ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
      <div class="card-body">
        <div class="row">
          <div class="col-5">
            <div class="icon-big text-center">
              <i class="flaticon-users text-primary"></i>
            </div>
          </div>
          <div class="col col-stats">
            <div class="numbers">
              <p class="card-category">User</p>
              <h4 class="card-title"><?php echo count($user) ?></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Feed Activity</div>
      </div>
      <div class="card-body">
        <ol class="activity-feed">
          <li class="feed-item feed-item-secondary">
            <time class="date" datetime="9-25">Sep 25</time>
            <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
          </li>
          <li class="feed-item feed-item-success">
            <time class="date" datetime="9-24">Sep 24</time>
            <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
          </li>
          <li class="feed-item feed-item-info">
            <time class="date" datetime="9-23">Sep 23</time>
            <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
          </li>
          <li class="feed-item feed-item-warning">
            <time class="date" datetime="9-21">Sep 21</time>
            <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
          </li>
          <li class="feed-item feed-item-danger">
            <time class="date" datetime="9-18">Sep 18</time>
            <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
          </li>
          <li class="feed-item">
            <time class="date" datetime="9-17">Sep 17</time>
            <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
          </li>
        </ol>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="card-head-row">
          <div class="card-title">User Baru</div>
          <div class="card-tools">
            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="card-body">
        <?php foreach ($user_baru as $user_baru) { ?>

          <div class="d-flex">
            <div class="avatar avatar-online">
              <img src="<?php echo base_url('assets/upload/image/avatar/' . $user_baru->foto_user); ?>" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="flex-1 ml-3 pt-1">
              <h5 class="text-uppercase fw-bold mb-1"><?php echo $user_baru->nama; ?>
                <?php if ($user_baru->active == 0) { ?>
                  <span class="text-warning pl-3">Tidak Aktif</span>
                <?php } else { ?>
                  <span class="text-success pl-3">Aktif</span>
                <?php } ?>

              </h5>
              <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
            </div>
            <div class="float-right pt-1">
              <small class="text-muted"><?php echo $user_baru->tanggal; ?></small>
            </div>
          </div>
          <div class="separator-dashed"></div>

        <?php }; ?>


      </div>
    </div>
  </div>
</div>