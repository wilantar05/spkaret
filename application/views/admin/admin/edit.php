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
									<h3 class="mb-0">Edit Admin</h3>
								</div>
								
								<div class="col-4 text-right">
									<!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
								</div>
							</div>
						</div>
						<form action="<?php echo base_url() ?>index.php/admin/admin/update" method="POST">
                        <input type="hidden" name="Id_Admin" value="<?php echo $adminedit[0]['Id_Admin'] ?>">
						<div class="card-body border-0">
						<?php if($this->session->flashdata('true')) { echo $this->session->flashdata('true'); $this->session->unset_userdata('true');}else if($this->session->flashdata('error')){ echo $this->session->flashdata('error');$this->session->unset_userdata('error');} ?>
							<div class="form-group">
								<label for="exampleFormControlInput1">Username</label>
								<input type="text" name="Username" class="form-control" id="exampleFormControlInput1" placeholder="Username" value="<?php echo $adminedit[0]['Username'] ?>">
							</div>
                            <div class="form-group">
								<label for="exampleFormControlInput1">Password</label>
								<input type="password" name="Password" class="form-control" id="exampleFormControlInput1" placeholder="Password User" required>
							</div>
                            <div class="form-group">
								<label for="exampleFormControlInput1">Nama</label>
								<input type="text" name="Nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama User" value="<?php echo $adminedit[0]['Nama'] ?>">
							</div>
                            <!-- <div class="form-group">
								<label for="exampleFormControlInput1">Jenis Kelamin</label>
								<select name="Jenis_Kelamin" class="form-control" id="exampleFormControlSelect1">
									<option value="Laki-Laki" <?php if($adminedit[0]['Jenis_Kelamin']=="Laki-Laki"){ echo 'selected';} ?>>Laki-Laki</option>
									<option value="Perempuan" <?php if($adminedit[0]['Jenis_Kelamin']=="Perempuan"){ echo 'selected';} ?>>Perempuan</option>
								</select>
							</div> -->
                            <div class="form-group">
								<label for="exampleFormControlInput1">Alamat</label>
								<input type="text" name="Alamat" class="form-control" id="exampleFormControlInput1" placeholder="Alamat User" value="<?php echo $adminedit[0]['Alamat'] ?>">
							</div>
                            <!-- <div class="form-group">
								<label for="exampleFormControlInput1">Tanggal</label>
								<input type="date" name="Tanggal_Lahir" class="form-control" id="exampleFormControlInput1" placeholder="Tanggal Lahir" value="<?php echo $adminedit[0]['Tanggal_Lahir'] ?>">
							</div> -->
                            <div class="form-group">
								<label for="exampleFormControlInput1">No Telp</label>
								<input type="text" name="No_Tlp" class="form-control" id="exampleFormControlInput1" placeholder="No Telp" value="<?php echo $adminedit[0]['No_Tlp'] ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Status</label>
								<select name="Status" class="form-control" id="exampleFormControlSelect1">
									<option value="1" <?php if($adminedit[0]['Status']=="1"){ echo 'selected';} ?>>Aktif</option>
									<option value="0" <?php if($adminedit[0]['Status']=="0"){ echo 'selected';} ?>>Tidak Aktif</option>
								</select>
							</div>
						</div>
						<div class="card-footer py-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <a href="<?php echo base_url() ?>index.php/admin/admin">
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
