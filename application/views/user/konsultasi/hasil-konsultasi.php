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
				<div class="col-lg-6 col-5 text-right">

				</div>
			</div>

			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-12 col-md-12">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="mt-1 mx-1">
							</div>
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Hasil Konsultasi</h3>
								</div>
								
							</div>
						</div>
						<div class="col-12 text-justify">
						<?php if ($hasilcf != null) { 
									$i = 1;
									//print_r($gejala) 
									$maxcf = max($hasilcf);
									$key = array_search($maxcf,$hasilcf);
								?>

								<div class="col-8">
								<h4>Nama Penyakit</h4>
								<dd><?php echo $key ?></dd>
								<h4>Tingkat Keyakinan</h4>
								<dd><?php echo $maxcf . " %"?></dd>
								</div>
								<?php } ?>
						</div>
						<div class="col-12 text-justify">
						<?php if ($penyakit != null && count($penyakit) > 0) { ?>
									<?php foreach ($penyakit as $key => $value) { ?>
										<div class="col-12">
											<h4>Deskripsi Penyakit</h4>
											<dd><?php echo $value['deskripsi'] ?></dd>
											<h4>Solusi</h4>
											<dd><?php echo $value['solusi'] ?></dd>
										</div>
									<?php } ?>
								<?php } ?>
						</div>
					</div>
					
					<form method="post" action="<?php echo base_url()?>user/dashboard/tabeldetail">
   						<input type="hidden" name="hasilcf" value="<?php echo htmlentities(serialize($hasilcf)); ?>">
						<input type="submit" value="Lihat Tabel Hasil" class="btn btn-md btn-neutral">
						
					</form>

					<form method="post" action="<?php echo base_url()?>user/auth">
						<input type="submit" value="Konsultasi Kembali" class="btn btn-md btn-neutral">
					</form>

				</div>
			</div>

		</div>
	</div>
</div>
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>
