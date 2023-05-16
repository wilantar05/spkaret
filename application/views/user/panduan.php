<?php $this->load->view('user/template'); ?>
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0"></h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $page ?></li>
						</ol>
					</nav>
				</div>
			</div>

			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="card-title">Panduan Konsultasi</h1>
                            <h3 class="text">Langkah 1 (khusus user)</h3>
                            <h3 class="text">Klik garis 3 yang ada di pojok kanan atas sampai menu di area kiri terlihat kemudian pilih menu Konsultasi.</h3>
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u1.png" class="img-fluid mb-3" alt="Image for Tutorial">
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u2.png" class="img-fluid mb-3" alt="Image for Tutorial">
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u3.png" class="img-fluid mb-3" alt="Image for Tutorial">
                        </div>

                        <div class="card-body text-center">
                        <h3 class="text">Langkah 2</h3>
                        <h3 class="text">Jika anda masuk sebagai guest, silahkan isi data diri yang diperlukan seperti pada gambar. User tidak perlu mengisi data lagi karena secara otomatis sudah terisi</h3>
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/g1.png" class="img-fluid mb-3" alt="Image for Tutorial">
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u3.png" class="img-fluid mb-3" alt="Image for Tutorial">
                        </div>

                        <div class="card-body text-center">
                        <h3 class="text">Langkah 3</h3>
                        <h3 class="text">Setelah mengisi data diri, silahkan klik area dibawah tulisan Gejala untuk menampilkan daftar gejala yang ada. Klik untuk mencatat gejala, dan klik lagi jika ingin membatalkan. Setelah semua gejala tercatat, klik tombol kirim yang ada di area kanan bawah</h3>
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u4.png" class="img-fluid mb-3" alt="Image for Tutorial">
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u5.png" class="img-fluid mb-3" alt="Image for Tutorial">
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u6.png" class="img-fluid mb-3" alt="Image for Tutorial">
                        </div>

                        <div class="card-body text-center">
                        <h3 class="text">Langkah 4</h3>
                        <h3 class="text">Silahkan isi tingkat keyakinan dari masing-masing gejala yang sudah dimasukkan tadi. Setelah semua terisi, klik tombol kirim.</h3>
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u7.png" class="img-fluid mb-3" alt="Image for Tutorial">
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u8.png" class="img-fluid mb-3" alt="Image for Tutorial">
                        </div>

                        <div class="card-body text-center">
                        <h3 class="text">Langkah 5</h3>
                        <h3 class="text">Hasil konsultasi akan terlihat. Klik 'Lihat Tabel Hasil' untuk melihat presentase dari penyakit lain.</h3>
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u9.png" class="img-fluid mb-3" alt="Image for Tutorial">
                            <img src="<?php echo base_url() ?>/assets/img/brand/panduan/u10.png" class="img-fluid mb-3" alt="Image for Tutorial">
                        </div>
                    </div>
				</div>

			</div>
		</div>
	</div>


</div>
</div>
</div>
</div>
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>