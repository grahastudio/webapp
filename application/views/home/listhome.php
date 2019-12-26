<?php

function get_CURL($url){

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);

}

$result = get_Curl('https://www.googleapis.com/blogger/v3/blogs/7193929514645243759/posts?key=AIzaSyCvBlnDeUVeyiY9TPJMocH6lZ8cm1LV9xg&maxResults=5');

?>

<?php $i=1; foreach ($slider as $slider) { ?>
<section class="boot-elemant-bg py-md-5 py-4" style="background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.8)), url(<?php echo base_url('assets/upload/image/'.$slider->gambar);?>);">
     <div class="container position-relative py-md-5 py-0">
         <div class="row">
             <div class="col-lg-8">
                 <h2 class="text-white display-3 font-weight-bold"><?php echo $slider->judul_galeri ?> </h2>
                 <p class="f-w-16 mb-4 text-white"><?php echo strip_tags($slider->isi_galeri) ?></p>
                 <a href="<?php echo $slider->website ?>" class="btn btn-pill btn-outline-secondary btn-lg"> Selengkapnya..</a>
             </div>
         </div>
     </div>
     <div class="elemant-bg-overlay black"></div>
 </section>
<?php } ?>
   <section class="section-1 py-4">
       <div class="container">

      <?php $i=1; foreach ($homepage as $homepage) { ?>

   	<div class="row">
      <div class="col-md-3 m-3" style="margin-top:0px;">
          <img class="img-fluid" src="<?php echo base_url('assets/upload/image/'.$homepage->gambar);?>" alt="">
      </div>
   		<div class="col-md-8">
   		    <h2><?php echo $homepage->judul_homepage;?></h2>
   		    <hr>
          <p><?php echo $homepage->isi_homepage;?> </p>
   		</div>
   	</div>

<?php } ?>

   </div>
   </section>



   <section class="section-2 pt-md-5 pb-md-5">
             <div class="container">
               <h3 class="text-center">Apa Yang Anda Butuhkan?</h3>
               <div class="list-spacer"></div>
                 <div class="row">
                   	<div class="col-md-4">
                           <div class="icon-box">
                               <div class="icon-left">
                                   <i class="fe fe-database"></i>
                               </div>
                               <h5><b>Website</b></h5>
                             <p>Jasa Pembuatan Website company profile, toko online, blog. Untuk bisnis online anda.</p>
                           </div>
                       </div>
                     	<div class="col-md-4">
                           <div class="icon-box">
                               <div class="icon-left">
                                   <i class="fe fe-film"></i>
                               </div>
                               <h5><b>Video Editing</b></h5>
                               <p>Lengkapi pemasaran online anda dengan video yang menarik.</p>
                           </div>
                         </div>
                     	<div class="col-md-4">
                             <div class="icon-box">
                                 <div class="icon-left">
                                     <i class="fe fe-slack"></i>
                                 </div>
                                 <h5><b>Desain Grafis</b></h5>
                                 <p>Salah satu hal yang bisa menarik perhatian orang adalah desain yang keren dan modern.</p>
                             </div>
                         </div>


                         </div>
                       </div>
               </section>



               <!-- Section Style 4 Start -->
                     <section class="style-4 section-padding">
                        <div class="container">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="section-title text-center">
                                    <h2>Mengapa Memilih Kami</h2>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="single-service">
                                    <i class="fa fa-globe"></i>
                                    <h3>Profesional</h3>
                                    <p>Kami merupakan penyedia layanan jasa digital online yang profeisonal.</p>

                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="single-service">
                                    <i class="fa fa-code"></i>
                                    <h3>Berpengalaman</h3>
                                    <p>Di dukung oleh desainer dan web developer yang sudah berpengalaman lebih dari 5 tahun.</p>
                                    
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="single-service">
                                    <i class="fa fa-crop"></i>
                                    <h3>Graphic Design</h3>
                                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</p>
                                    <a href="" class="border-btn">Read More</a>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="single-service">
                                    <i class="fa fa-star"></i>
                                    <h3>Branding</h3>
                                    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas faucibus mollis interdum.</p>
                                    <a href="" class="border-btn">Read More</a>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="single-service">
                                    <i class="fa fa-lightbulb-o"></i>
                                    <h3>User Friendly</h3>
                                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</p>
                                    <a href="" class="border-btn">Read More</a>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="single-service">
                                    <i class="fa fa-heart"></i>
                                    <h3>24/7 Support</h3>
                                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</p>
                                    <a href="" class="border-btn">Read More</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </section>
               	  <!-- Section Style 4 End -->





    <div class="container pt-md-5 pb-md-5">
       <h3 class="text-center">Artikel Blog</h3>
       <div class="list-spacer"></div>



       <div class="row row-cards row-deck">
         <?php foreach ($result['items'] as $list): ?>


         <div class="col-sm-6 col-xl-3">
           <div class="card">
             <a href="#"><img class="card-img-top" src=""></a>
             <div class="card-body d-flex flex-column">
               <h4><a href="<?php echo $list['url']?>"><?php echo strip_tags(character_limiter($list['title'],60))?></a></h4>
               <div class="text-muted"><?php echo strip_tags(character_limiter($list['content'],60))?></div>
               <div class="d-flex align-items-center pt-5 mt-auto">
                 <img class="avatar avatar-md mr-3" src="<?php echo $list['author']['image']['url']?>"></img>
                 <div>
                   <a href="<?php echo $list['author']['url']?>" class="text-default"><?php echo $list['author']['displayName']?></a>

                 </div>
                 <div class="ml-auto text-muted">
                   <div class="ml-auto text-muted">
                   <i class="fe fe-message-square mr-1"></i> <?php echo $list['replies']['totalItems']?>
                 </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

<?php endforeach; ?>

       </div>









       </div>
