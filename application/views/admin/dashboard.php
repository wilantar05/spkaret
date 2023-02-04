<?php $this->load->view('admin/template'); ?>
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Default</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $page ?></li>
						</ol>
					</nav>
				</div>
				<div class="col-lg-6 col-5 text-right">
					<a href="<?php echo base_url() ?>index.php/admin/dashboard/konsultasi" class="btn btn-md btn-neutral">Tambah Data</a>
					<a href="<?php echo base_url() ?>index.php/admin/dashboard/hasilkonsultasi" class="btn btn-md btn-neutral">Hasil Konsultasi</a>
					<!-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> -->
				</div>
			</div>

			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-10 col-md-8">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="mt-1 mx-1">
							</div>
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Data Konsultasi</h3>
								</div>

								<div class="col-4 text-right">
									<form action="<?php echo base_url() ?>index.php/user/search" method="POST">
										<input type="hidden" name="pagenumber">
										<div class="input-group mb-3">
											<input type="text" class="form-control form-control-sm" name="search" placeholder="Cari User">
											<div class="input-group-append">
												<button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<table class="table align-items-center table-flush">
							<thead class="thead-light">
								<tr>
									<th scope="col" width="10%">No</th>
									<th scope="col">Nama</th>
									<th scope="col">No. HP</th>
									<th scope="col" width="10%">Gejala</th>
									<th scope="col" width="10%"></th>
								</tr>
							</thead>
							<tbody class="list">

							</tbody>
						</table>
						<div class="card-footer py-4">
							<nav aria-label="...">
								<ul class="pagination justify-content-end mb-0">
									<li class="page-item">
										<a class="page-link" href="" tabindex="-1">
											<i class="fas fa-angle-left"></i>
											<span class="sr-only">Previous</span>
										</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="">
											<i class="fas fa-angle-right"></i>
											<span class="sr-only">Next</span>
										</a>
									</li>
								</ul>
							</nav>
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