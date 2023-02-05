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
				<div class="col-xl-12 col-xl-12">
					<?php if ($this->session->flashdata('true')) {
						echo $this->session->flashdata('true');
						$this->session->unset_userdata('true');
					} else if ($this->session->flashdata('error')) {
						echo $this->session->flashdata('error');
						$this->session->unset_userdata('error');
					} ?>
				</div>
				<div class="col-xl-12 col-md-12">
					<div class="card">
						<!-- Card header -->
						<div class="card-header border-0">
							<div class="mt-1 mx-1">
							</div>
							<div class="row align-items-center">
								<div class="col-8">
									<h3 class="mb-0">Edit Gejala</h3>
								</div>

								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<form action="<?php echo base_url() ?>index.php/admin/gejala/update" method="POST">
							<input type="hidden" name="id" value="<?php echo ($gejala != null) ? $gejala[0]['id'] : "" ?>">
							<div class="card-body border-0">
								<div class="form-group">
									<label for="exampleFormControlInput1">Gejala</label>
									<input type="text" name="NamaGejala" class="form-control" id="exampleFormControlInput1" placeholder="Nama Gejala" value="<?php echo ($gejala != null) ? $gejala[0]['NamaGejala'] : "" ?>">
								</div>

							</div>
							<div class="card-footer py-4">
								<div class="row">
									<div class="col-lg-8">
										<a href="<?php echo base_url() ?>index.php/admin/gejala">
											<button class="btn btn-default" type="button">Kembali</button>
										</a>
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-primary" type="submit">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>