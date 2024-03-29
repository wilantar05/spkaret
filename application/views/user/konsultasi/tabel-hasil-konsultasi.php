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
									<h3 class="mb-0">Tabel Hasil Konsultasi</h3>
								</div>

								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<div class = "table-responsive">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th scope="col" width="10%">No</th>
									<th scope="col" width="40%">Nama Penyakit</th>
									<th scope="col" width="40%">Persentase Keyakinan</th>
									<th scope="col" width="10%"></th>
								</tr>
							</thead>
							<tbody class="list">
								<?php if ($hasilcf != null) {
									$i = 1;
									//print_r($gejala) 
								?>

									<?php foreach ($penyakit as $pkey => $pvalue) {
										foreach ($hasilcf as $cfkey => $cfvalue) {
											$keyakinan = 0;
											if ($cfkey == $pvalue['nama_penyakit']) {
												$keyakinan = $cfvalue;
												break;
											}
										}
									?>
										<tr>
											<td><?php echo $i ?></td>
											<td><?php echo $pvalue['nama_penyakit'] ?></td>
											<td><?php echo $keyakinan . " %"  ?></td>
											<?php $i++;
											?>
										</tr>
									<?php
									}
									?>
								<?php } ?>

							</tbody>
						</table>
								</div>
					</div>
					<form method="post" action="<?php echo base_url() ?>user/dashboard/tabeldetailback">
						<input type="hidden" name="hasilcf" value="<?php echo htmlentities(serialize($hasilcf)); ?>">
						<input type="submit" value="Kembali" class="btn btn-md btn-neutral">
					</form>
				</div>


			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>