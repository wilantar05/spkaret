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
						<div class="table-responsive">
							<table class="table table-hover">

								<tbody class="list">
									<?php if ($hasilcf != null) {
										$maxcf = max($hasilcf);
										$key = array_search($maxcf, $hasilcf);
										$deskripsi;
										$solusi;
										$nilaicf = $maxcf . " %";
										$obat;
									?>
										<tr>
											<td></td>
											<td><img src="<?php echo base_url() ?>/assets/img/penyakit/<?php echo $key ?>.png"> </img> </td>
										</tr>
										<?php


										foreach ($penyakit as $pkey => $pvalue) {
											$deskripsi = $pvalue['deskripsi'];
											$solusi = $pvalue['solusi'];
											$obat = $pvalue['obat'];
										}
										$dataHead = ["Nama Penyakit", "Tingkat Keyakinan", "Deskripsi Penyakit", "Solusi", "Rekomendasi Obat"];
										$dataValue = [$key, $nilaicf, $deskripsi, $solusi, $obat];
										//print_r($gejala) 

										for ($i = 0; $i < count($dataHead); $i++) {
										?>
											<tr>
												<td><strong> <?php echo $dataHead[$i] ?> </strong></td>
												<td style="white-space: normal; text-align: justify;">
													<?php echo $dataValue[$i] ?>
												</td>

											</tr>
									<?php }
									}

									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="button-container">
						<form method="post" action="<?php echo base_url() ?>user/dashboard/tabeldetail">
							<input type="hidden" name="hasilcf" value="<?php echo htmlentities(serialize($hasilcf)); ?>">
							<button type="submit" class="btn btn-md btn-neutral left-button">Lihat Tabel Hasil</button>
						</form>
						<button onclick="window.location.href='<?php echo base_url() ?>user/dashboard/konsultasi'" class="btn btn-md btn-neutral right-button"> Konsultasi Kembali</button>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>