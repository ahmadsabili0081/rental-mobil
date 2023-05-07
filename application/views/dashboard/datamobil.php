 <!-- Page Content -->
 <div class="page-heading about-heading header-text" style="background-image: url(./assets/car-rental-website-template/assets/images/heading-6-1920x500.jpg);">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="text-content">
           <h4>Lorem ipsum dolor sit amet</h4>
           <h2>Offers</h2>
         </div>
       </div>
     </div>
   </div>
 </div>

 <div class="products">
   <div class="container">
     <div class="row">
       <?php foreach ($getMobil as $mobil) : ?>
         <div class="col-md-4">
           <div class="product-item">
             <img style="height: 200px;" src="<?= base_url('assets/images/') . $mobil['gambar']; ?>" alt="">

             <div class="down-content">
               <h3><?= $mobil['nama']; ?></h3>
               <h6 class="text-warning mt-2">RP.<?= number_format($mobil['harga']); ?>/Hari</h6>
               <small>
                 <strong title="passegengers"><i class="fa fa-user"></i> 5</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                 <strong title="luggages"><i class="fa fa-briefcase"></i> 4</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                 <strong title="doors"><i class="fa fa-sign-out"></i> 4</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                 <strong title="transmission"><i class="fa fa-cog"></i> A</strong>
               </small>
             </div>
             <div class="down-content">
               <?php if ($mobil['status'] == "1") : ?>
                 <a href="<?= base_url('dashboard/tambahRental/') . $mobil['id_mobil']; ?>" class="btn btn-primary">Sewa</a>
               <?php else : ?>
                 <a href="" class="btn btn-danger">Telah Disewakan</a>
               <?php endif; ?>
               <a class="btn btn-warning" href="<?= base_url('dashboard/detail/') . $mobil['id_mobil']; ?>">Detail</a>
             </div>
           </div>
         </div>
       <?php endforeach; ?>
     </div>
   </div>
 </div>