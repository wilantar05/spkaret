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
									<h3 class="mb-0">Tambah Gejala</h3>
								</div>

								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<form action="<?php echo base_url() ?>index.php/admin/gejala/store" method="POST">
							<div class="card-body border-0">
								<?php if ($this->session->flashdata('true')) {
									echo $this->session->flashdata('true');
									$this->session->unset_userdata('true');
								} else if ($this->session->flashdata('error')) {
									echo $this->session->flashdata('error');
									$this->session->unset_userdata('error');
								} 
									$num_kode = substr($last_kode,1);
									$num = (int)$num_kode;
									$newKodeGejala = $num+1 < 10 ? "G0" . ($num+1) : "G" . ($num+1);
								?>

								<div class="form-group">
									<label for="exampleFormControlInput1">Kode</label>
									<input type="text" name="KodeGejala" class="form-control" id="exampleFormControlInput1" placeholder="Kode Gejala" value="<?php echo $newKodeGejala ?>" readonly>
								</div>

								<div class="form-group">
									<label for="exampleFormControlInput1">Nama</label>
									<input type="text" name="NamaGejala" class="form-control" id="exampleFormControlInput1" placeholder="Nama Gejala" required>
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
									<h3 class="mb-0">Data Gejala</h3>
								</div>

								<div class="col-4 text-right">
									<form action="<?php echo base_url() ?>index.php/admin/gejala/search" method="POST">
										<input type="hidden" name="pagenumber" value="<?php echo $pagenumber ?>">
										<div class="input-group mb-3">
											<input type="text" class="form-control form-control-sm" name="search" placeholder="Cari Gejala">
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
									<th scope="col" width="10%">Kode</th>
									<th scope="col">Nama</th>
									<th scope="col" width="10%"></th>
								</tr>
							</thead>
							<tbody class="list">
								<?php if ($gejala != null) { //print_r($gejala) 
								?>
									<?php foreach ($gejala as $key => $value) { 
										$id_gejala = $value['id_gejala'];
										?>
										<tr>
											<td><?php echo $key + 1 ?></td>
											<td><?php echo $value['kode_gejala'] ?></td>
											<td><?php echo $value['nama_gejala'] ?></td>
											<td>
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="<?php echo base_url() ?>index.php/admin/gejala/edit/<?php echo $id_gejala ?>">Edit</a>
														<a href="<?php echo base_url() ?>index.php/admin/gejala/delete/<?php echo $id_gejala ?>" class="dropdown-item delete-button" data-toggle="modal" data-target="#confirmationModal" onclick="handleClick(this, <?php echo $id_gejala ?>)">Delete</a>
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
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/gejala/index/<?php echo $pagenumber - 1 ?>/<?php echo $search ?>" tabindex="-1">
											<i class="fas fa-angle-left"></i>
											<span class="sr-only">Previous</span>
										</a>
									</li>
									<?php for ($i = 1; $i <= ceil($gejalacount / 10); $i++) { ?>
										<li class="page-item <?php echo $active = ($pagenumber == $i) ? "active" : "" ?>">
											<a class="page-link" href="<?php echo base_url() ?>index.php/admin/gejala/index/<?php echo $i ?>/<?php echo $search ?>"><?php echo $i ?></a>
										</li>
									<?php } ?>
									<li class="page-item <?php echo $disabled = (($pagenumber + 1) > ceil($gejalacount / 10)) ? "disabled" : "" ?>">
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/gejala/index/<?php echo $pagenumber + 1 ?>/<?php echo $search ?>">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<div class="modal fade" id="confirmationModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Konfirmasi Hapus</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Yakin ingin menghapus data ini ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
			</div>
		</div>
	</div>
</div>

<script>

	var href;
	function handleClick(button, id){
		href = button.getAttribute('href');
    	console.log('Clicked button with ID:', id);
    	console.log('Button href:', href);
	}

	// Confirm delete action
	function confirmDelete() {
		window.location.href = href;
	}
</script>

<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>