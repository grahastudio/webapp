<?php

function get_CURL($url)
{

   $curl = curl_init();
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   $result = curl_exec($curl);
   curl_close($curl);

   return json_decode($result, true);
}

$result = get_Curl('https://www.googleapis.com/blogger/v3/blogs/7193929514645243759/posts?key=AIzaSyCvBlnDeUVeyiY9TPJMocH6lZ8cm1LV9xg&maxResults=5');

?>


<?php $i = 1;
foreach ($slider as $slider) { ?>
   <section class="boot-elemant-bg py-md-5 py-4 particles" id="particles-dots" style="background-color:darkblue;height: 500px; background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(<?php echo base_url('assets/upload/image/' . $slider->gambar); ?>);">
      <div class="container position-relative py-md-5 py-0">
         <div class="row">
            <div class="col-lg-8" style="position: absolute;">
               <h2 class="text-white display-3 font-weight-bold"><?php echo $slider->judul_galeri ?></h2>
               <p class="f-w-16 mb-4 text-white"><?php echo strip_tags($slider->isi_galeri) ?>
               </p>
               <a href="<?php echo $slider->website ?>" class="btn btn-white btn-border btn-round btn-lg px-4"> Read More </a>
            </div>
         </div>
      </div>
      <div class="elemant-bg-overlay black"></div>
   </section>
<?php } ?>



<section class="services-section">
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-sm-12">
            <div class="service-title">
               <?php if (empty($this->session->userdata('language')) or $this->session->userdata('language') == 'id') { ?>
                  Apa yang anda butuhkan saat ini?
               <?php } else { ?>
                  What do you need right now?
               <?php } ?>
            </div>
            <div class="seprator"></div>
            <div class="row">
               <?php foreach ($section as $section) { ?>

                  <div class="col-md-6 col-sm-6">
                     <div class="service-box">
                        <div class="service-icon">
                           <i class="<?php echo $section->icon; ?> fa-2x"></i>
                        </div>
                        <div class="service-content">
                           <h3><?php echo $section->judul_homepage; ?></h3>
                           <?php echo $section->isi_homepage; ?>
                        </div>
                     </div>
                  </div>

               <?php } ?>

            </div>
         </div>
         <div class="col-md-4">
            <img src="<?php echo base_url('assets/template/v3/img/features-2.svg'); ?>" class="img-fluid" alt="">
         </div>
      </div>
   </div>
</section>





<section class="about-us my-5 py-3 bg-white" id="about-us">
   <div class="container mt-5">
      <div class="row">
         <?php foreach ($homepage as $homepage) { ?>
            <div class="col-md-6">
               <img class="img-fluid" src="<?php echo base_url('assets/upload/image/' . $homepage->gambar); ?>" alt="">
            </div>


            <div class="col-md-6">

               <div class="service-title"><?php echo $homepage->judul_homepage; ?></div>
               <div class="seprator"></div>
               <?php echo $homepage->isi_homepage; ?>
               <button type="button" class="btn btn-success">Let's Know More</button>

            </div>
         <?php } ?>

      </div>
   </div>
</section>


<section class="services-section">
   <div class="container">


      <div class="service-title">
         <?php if (empty($this->session->userdata('language')) or $this->session->userdata('language') == 'id') { ?>
            Layanan
         <?php } else { ?>
            Services
         <?php } ?>
      </div>
      <div class="seprator"></div>

      <div class="row">
         <?php foreach ($layanan as $layanan) { ?>

            <div class="col-md-4">
               <div class="service-box">
                  <div class="service-icon">
                     <!-- <img class="img-fluid" src="<?php echo base_url('assets/upload/image/' . $layanan->gambar); ?>" alt=""> -->
                     <span style="font-size:60px;"><i class="flaticon-analytics"></i></span>
                  </div>
                  <div class="service-content">
                     <h3><?php echo $layanan->judul_layanan; ?></h3>
                     <?php echo strip_tags(character_limiter($layanan->isi_layanan, 60)); ?>
                  </div>
               </div>
            </div>

         <?php } ?>

      </div>
   </div>
</section>


<section class="my-5">
   <div class="container">
      <div class="service-title">Our Client</div>
      <div class="seprator"></div>
      <p class="text-muted">Kami memiliki klient yang percaya dengan kualitas pelayanan kami</p>
      <div class="row">
         <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
            <div class="MultiCarousel-inner">
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>

                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>
                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>

                  </div>
               </div>
               <div class="item">
                  <div class="pad16">
                     <p class="lead">Multi Item Carousel</p>

                  </div>
               </div>
            </div>
            <button class="btn btn-secondary leftLst">
               <i class="fe fe-chevron-left"></i></button> <button class="btn btn-secondary rightLst"><i class="fe fe-chevron-right"></i>
            </button>
         </div>
      </div>
   </div>
</section>






<section class="bg-white py-4">
   <div class="container">
      <div class="service-title">Artikel Terbaru?</div>
      <div class="seprator"></div>
      <div class="row">

         <?php foreach ($result['items'] as $list) : ?>
            <div class="col-md-4">
               <div class="card card-post card-round">
                  <div class="card-body">
                     <div class="d-flex">
                        <div class="info-post ml-2">
                           <!-- <img class="avatar avatar-md mr-3" src="<?php echo $list['author']['image']['url'] ?>"></img> -->
                           <span class="date text-muted"><i class="fe fe-user"></i> <a href="<?php echo $list['author']['url'] ?>"><?php echo $list['author']['displayName'] ?></a></span> <span class="date text-muted pull-right ml-3"><i class="fe fe-tag"></i>
                              <?php echo $list['labels']['0'] ?></span>
                        </div>
                     </div>
                     <div class="separator-solid"></div>
                     <h3 class="card-title">
                        <a href="<?php echo $list['url'] ?>">
                           <?php echo strip_tags(character_limiter($list['title'], 60)) ?>
                        </a>
                     </h3>
                     <p class="card-text"><?php echo strip_tags(character_limiter($list['content'], 60)) ?></p>
                     <a href="<?php echo $list['url'] ?>" class="btn btn-primary btn-rounded btn-sm">Read More</a>
                     <p class="date text-muted pull-right"><i class="fe fe-message-square"></i> <?php echo $list['replies']['totalItems'] ?> Comments
                     </p>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>

      </div>
   </div>
</section>