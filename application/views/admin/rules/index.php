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
									<h3 class="mb-0">Tambah Rules</h3>
								</div>

								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<form action="<?php echo base_url() ?>index.php/admin/rules/store" method="POST">
							<div class="card-body border-0">
								<?php if ($this->session->flashdata('true')) {
									echo $this->session->flashdata('true');
									$this->session->unset_userdata('true');
								} else if ($this->session->flashdata('error')) {
									echo $this->session->flashdata('error');
									$this->session->unset_userdata('error');
								} ?>
								<div class="form-group">
									<!-- <label for="exampleFormControlInput1">Nama Penyakit</label>
									<input type="text" name="idPenyakit" class="form-control" id="exampleFormControlInput1" placeholder="Nama Penyakit"> -->
									<label>Nama Gejala</label>
									<select class="form-control" name="idGejala">
										<?php foreach ($gejala as $g) { ?>
											<option value="<?php echo $g['id']; ?>"><?php echo $g['NamaGejala']; ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<!-- <label for="exampleFormControlInput1">Nama Gejala</label>
									<input type="password" name="idGejala" class="form-control" id="exampleFormControlInput1" placeholder="Nama Gejala"> -->
									<label>Nama Penyakit</label>
									<select class="form-control" name="idPenyakit">
										<?php foreach ($penyakit as $p) { ?>
											<option value="<?php echo $p['id']; ?>"><?php echo $p['NamaPenyakit']; ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Nilai MB</label>
									<input type="text" name="mb" class="form-control" id="exampleFormControlInput1" placeholder="Nilai MB">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Nilai MD</label>
									<input type="text" name="md" class="form-control" id="exampleFormControlInput1" placeholder="Nilai MD">
								</div>
								<div class="form-group">
									<label for="exampleFormControlInput1">Nilai CF</label>
									<input type="text" name="cf" class="form-control" id="exampleFormControlInput1" placeholder="Nilai CF">
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
									<h3 class="mb-0">Data Rules</h3>
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

						<table class="table align-items-center table-flush">
							<thead class="thead-light">
								<tr>
									<th scope="col">No</th>
									<th scope="col">Gejala</th>
									<th scope="col">Penyakit</th>
									<th scope="col">MB</th>
									<th scope="col">MD</th>
									<th scope="col">CF</th>
									<th scope="col" width="10%"></th>
								</tr>
							</thead>
							<tbody class="list">
								<?php if ($rules != null) { ?>
									<?php foreach ($rules as $key => $value) { ?>
										<tr>
											<td><?php echo $key + 1 ?></td>
											<td><?php echo $value['NamaGejala'] ?></td>
											<td><?php echo $value['NamaPenyakit'] ?></td>
											<td><?php echo $value['nilaiMB'] ?></td>
											<td><?php echo $value['nilaiMD'] ?></td>
											<td><?php echo $value['nilaiCF'] ?></td>

											<td>
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="<?php echo base_url() ?>index.php/admin/rules/edit/<?php echo $value['id'] ?>">Edit</a>
														<!-- <a class="dropdown-item" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="<?php echo base_url() ?>index.php/admin/rules/delete/<?php echo $value['Id_Rules'] ?>">Delete</a> -->
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
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/rules/index/<?php echo $pagenumber - 1 ?>/<?php echo $search ?>" tabindex="-1">
											<i class="fas fa-angle-left"></i>
											<span class="sr-only">Previous</span>
										</a>
									</li>
									<?php for ($i = 1; $i <= ceil($rulescount / 10); $i++) { ?>
										<li class="page-item <?php echo $active = ($pagenumber == $i) ? "active" : "" ?>">
											<a class="page-link" href="<?php echo base_url() ?>index.php/admin/rules/index/<?php echo $i ?>/<?php echo $search ?>"><?php echo $i ?></a>
										</li>
									<?php } ?>
									<li class="page-item <?php echo $disabled = (($pagenumber + 1) > ceil($rulescount / 10)) ? "disabled" : "" ?>">
										<a class="page-link" href="<?php echo base_url() ?>index.php/admin/rules/index/<?php echo $pagenumber + 1 ?>/<?php echo $search ?>">
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