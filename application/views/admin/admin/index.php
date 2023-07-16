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
									<h3 class="mb-0">Tambah Admin</h3>
								</div>

								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<form action="<?php echo base_url() ?>admin/admin/store" method="POST">
							<div class="card-body border-0">
								<?php if ($this->session->flashdata('true')) {
									echo $this->session->flashdata('true');
									$this->session->unset_userdata('true');
								} else if ($this->session->flashdata('error')) {
									echo $this->session->flashdata('error');
									$this->session->unset_userdata('error');
								} ?>
								<div class="form-group">
									<label for="exampleFormControlInput1">Username</label>
									<input type="text" name="Username" class="form-control" id="exampleFormControlInput1" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Password</label>
									<input type="password" name="Password" class="form-control" id="exampleFormControlInput1" placeholder="Password User" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Nama</label>
									<input type="text" name="Nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama User" min="50" max="50" pattern="[A-Za-z]+" required>
								</div>
								<!-- <div class="form-group">
								<label for="exampleFormControlInput1">Jenis Kelamin</label>
								<select name="Jenis_Kelamin" class="form-control" id="exampleFormControlSelect1">
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div> -->
								<div class="form-group">
									<label for="exampleFormControlInput1">Alamat</label>
									<input type="text" name="Alamat" class="form-control" id="exampleFormControlInput1" placeholder="Alamat User" required>
								</div>
								<!-- <div class="form-group">
								<label for="exampleFormControlInput1">Tanggal</label>
								<input type="date" name="Tanggal_Lahir" class="form-control" id="exampleFormControlInput1" placeholder="Tanggal Lahir">
							</div> -->
								<div class="form-group">
									<label for="exampleFormControlInput1">No Telp</label>
									<input type="number" name="No_Tlp" class="form-control" id="exampleFormControlInput1" placeholder="No Telp" min="12" max="13" pattern="[0-9]+" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Status</label>
									<select name="Status" class="form-control" id="exampleFormControlSelect1">
										<option value="1">Aktif</option>
										<option value="0">Tidak Aktif</option>
									</select>
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
									<h3 class="mb-0">Data Admin</h3>
								</div>

								<div class="col-4 text-right">
									<form action="<?php echo base_url() ?>index.php/user/search" method="POST">
										<input type="hidden" name="pagenumber" value="<?php echo $pagenumber ?>">
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
						<!-- Light table -->

						<table class="table align-items-center table-responsive">
							<thead class="thead-light">
								<tr>
									<th scope="col" width="10%">No</th>
									<th scope="col">Nama</th>
									<th scope="col">Alamat</th>
									<th scope="col">No Telp</th>
									<th scope="col" width="10%">Status</th>
									<th scope="col" width="10%"></th>
								</tr>
							</thead>
							<tbody class="list">
								<?php foreach ($admin as $key => $value) { ?>
									<tr>
										<td><?php echo $key + 1 ?></td>
										<td><?php echo $value['nama_admin'] ?></td>
										<td><?php echo $value['alamat'] ?></td>
										<td><?php echo $value['no_hp'] ?></td>
										<td><?php echo $stats = ($value['status'] == 1) ? '<span class="badge badge-default">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' ?></td>
										<td>
											<div class="dropdown">
												<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fas fa-ellipsis-v"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
													<a class="dropdown-item" href="<?php echo base_url() ?>index.php/admin/admin/edit/<?php echo $value['id_admin'] ?>">Edit</a>
													<!-- <a class="dropdown-item" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="<?php echo base_url() ?>index.php/admin/admin/delete/<?php echo $value['Id_Admin'] ?>">Delete</a> -->
												</div>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<!-- Card footer -->
						<div class="card-footer py-4">
							<nav aria-label="...">
								<ul class="pagination justify-content-end mb-0">
									<li class="page-item <?php echo $disabled = (($pagenumber - 1) < 1) ? "disabled" : "" ?>">
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/admin/index/<?php echo $pagenumber - 1 ?>/<?php echo $search ?>" tabindex="-1">
											<i class="fas fa-angle-left"></i>
											<span class="sr-only">Previous</span>
										</a>
									</li>
									<?php for ($i = 1; $i <= ceil($admincount / 10); $i++) { ?>
										<li class="page-item <?php echo $active = ($pagenumber == $i) ? "active" : "" ?>">
											<a class="page-link" href="<?php echo base_url() ?>index.php/admin/admin/index/<?php echo $i ?>/<?php echo $search ?>"><?php echo $i ?></a>
										</li>
									<?php } ?>
									<li class="page-item <?php echo $disabled = (($pagenumber + 1) > ceil($admincount / 10)) ? "disabled" : "" ?>">
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/admin/index/<?php echo $pagenumber + 1 ?>/<?php echo $search ?>">
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
				<h4 class="modal-title">Confirm Delete</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete?</p>
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