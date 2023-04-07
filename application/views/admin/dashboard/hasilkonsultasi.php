<?php $this->load->view('admin/template'); ?>
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
								
								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<table class="table align-items-center table-responsive">
							<thead class="thead-light">
								<tr>
									<th scope="col" width="10%">No</th>
									<th scope="col">Nama Penyakit</th>
									<th scope="col">Persentase Keyakinan</th>

									<th scope="col" width="10%"></th>
								</tr>
							</thead>
							<tbody class="list">
								<?php if ($hasilcf != null) { 
									$i = 1;
									//print_r($gejala) 
								?>
									<?php foreach ($hasilcf as $key => $value) { ?>
										<tr>
											<td><?php echo $i ?></td>
											<td><?php echo $key ?></td>
											<td><?php echo $value . " %"?></td>
										</tr>
									<?php $i++;} ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				

			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>
