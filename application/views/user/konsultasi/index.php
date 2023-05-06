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
							<li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php/user/auth"><?php echo $title ?></a></li>
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
									<h3 class="mb-0">Mulai Konsultasi</h3>
								</div>

								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<form action="<?php echo base_url() ?>index.php/user/dashboard/detail_konsultasi" method="POST">
							<div class="card-body border-0">
								<?php if ($this->session->flashdata('true')) {
									echo $this->session->flashdata('true');
									$this->session->unset_userdata('true');
								} else if ($this->session->flashdata('error')) {
									echo $this->session->flashdata('error');
									$this->session->unset_userdata('error');
								} ?>


								<input type="text" name="id_user" class="form-control" id="exampleFormControlInput1" value="<?php echo ($user != null && count($user) > 0) ? $user[0]['id_user'] : 0 ?>" hidden>

								<div class="form-group">
									<label for="exampleFormControlInput1">Nama</label>
									<input type="text" min="50" max="50" pattern="[A-Za-z]+" name="Nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama" value="<?php if ($user != null && count($user) > 0) echo $user[0]['nama_user'] ?>" <?php if ($user != null && count($user) > 0) echo "readonly" ?> required>
								</div>

								<div class="form-group">
									<label for="exampleFormControlInput1">No HP</label>
									<input type="number" min="12" max="13" pattern="[0-9]+" name="NoHP" class="form-control" id="exampleFormControlInput1" placeholder="No HP" value="<?php if ($user != null && count($user) > 0) echo $user[0]['no_hp'] ?>" <?php if ($user != null && count($user) > 0) echo "readonly" ?> required>
								</div>

								<div class="form-group">
									<label for="exampleFormControlInput1">Gejala</label>
									<select class="form-control js-example-basic-multiple" name="gejala[]" id="" multiple>
										<?php foreach ($gejala as $key => $value) { ?>
											<option value="<?php echo $value['id_gejala'] ?>"><?php echo $value['nama_gejala'] ?></option>
										<?php } ?>
									</select>
									<!--<input type="text" name="Gejala" class="form-control" id="exampleFormControlInput1" placeholder="Gejala">-->
								</div>

							</div>
							<div class="card-footer py-4 text-right">
								<button class="btn btn-primary" type="submit">Kirim</button>
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