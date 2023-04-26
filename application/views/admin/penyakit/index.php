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
				<div class="col-xl-4 col-md-4">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="mt-1 mx-1">
							</div>
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Tambah Penyakit</h3>
								</div>

								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<form action="<?php echo base_url() ?>index.php/admin/penyakit/store" method="POST">
							<div class="card-body border-0">
								<?php if ($this->session->flashdata('true')) {
									echo $this->session->flashdata('true');
									$this->session->unset_userdata('true');
								} else if ($this->session->flashdata('error')) {
									echo $this->session->flashdata('error');
									$this->session->unset_userdata('error');
								} ?>
								<div class="form-group">
									<label for="exampleFormControlInput1">Penyakit</label>
									<input type="text" name="Nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Penyakit" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Deskripsi</label>
									<input type="text" name="Deskripsi" class="form-control" id="exampleFormControlInput1" placeholder="Deskripsi dari penyakit" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Solusi</label>
									<input type="text" name="Solusi" class="form-control" id="exampleFormControlInput1" placeholder="Solusi" required>
								</div>
							</div>
							<div class="card-footer py-4 text-right">
								<button class="btn btn-primary" type="submit">Simpan</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xl-8 col-md-8">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="mt-1 mx-1">
							</div>
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Data Penyakit</h3>
								</div>

								<div class="col-4 text-right">
									<form action="<?php echo base_url() ?>index.php/penyakit/search" method="POST">
										<input type="hidden" name="pagenumber" value="<?php echo $pagenumber ?>">
										<div class="input-group mb-3">
											<input type="text" class="form-control form-control-sm" name="search" placeholder="Cari Penyakit">
											<div class="input-group-append">
												<button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Light table -->

						<table class="table align-items-center table-responsive">
							<thead class="thead-light">
								<tr>
									<th scope="col" width="10%">No</th>
									<th scope="col">Nama</th>
									<th scope="col">Deskripsi</th>
									<th scope="col">Solusi</th>
									<th scope="col" width="10%"></th>
								</tr>
							</thead>
							<tbody class="list">
								<?php if ($penyakit != null && count($penyakit) > 0) { ?>
									<?php foreach ($penyakit as $key => $value) { ?>
										<tr>
											<td><?php echo $key + 1 ?></td>
											<td><?php echo $value['nama_penyakit'] ?></td>
											<td style="white-space: normal;"><?php echo $value['deskripsi'] ?></td>
											<td style="white-space: normal;"><?php echo $value['solusi'] ?></td>

											<td>
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="<?php echo base_url() ?>index.php/admin/penyakit/edit/<?php echo $value['id_penyakit'] ?>">Edit</a>
														<a class="dropdown-item" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="<?php echo base_url() ?>index.php/admin/penyakit/delete/<?php echo $value['id_penyakit'] ?>">Delete</a>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
						<!-- Card footer -->
						<div class="card-footer py-4">
							<nav aria-label="...">
								<ul class="pagination justify-content-end mb-0">
									<li class="page-item <?php echo $disabled = (($pagenumber - 1) < 1) ? "disabled" : "" ?>">
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/penyakit/index/<?php echo $pagenumber - 1 ?>/<?php echo $search ?>" tabindex="-1">
											<i class="fas fa-angle-left"></i>
											<span class="sr-only">Previous</span>
										</a>
									</li>
									<?php for ($i = 1; $i <= ceil($penyakitcount / 10); $i++) { ?>
										<li class="page-item <?php echo $active = ($pagenumber == $i) ? "active" : "" ?>">
											<a class="page-link" href="<?php echo base_url() ?>index.php/admin/penyakit/index/<?php echo $i ?>/<?php echo $search ?>"><?php echo $i ?></a>
										</li>
									<?php } ?>
									<li class="page-item <?php echo $disabled = (($pagenumber + 1) > ceil($penyakitcount / 10)) ? "disabled" : "" ?>">
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/penyakit/index/<?php echo $pagenumber + 1 ?>/<?php echo $search ?>">
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
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>