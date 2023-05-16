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
                                    <h3 class="mb-0">Isi Tingkat Keyakinan</h3>
                                </div>

                                <div class="col-4 text-right">
                                    <!-- <button class="btn btn-sm btn-primary" data-toggle="modal"
										data-target="#tambah">Tambah Data</button> -->
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo base_url() ?>index.php/user/dashboard/hitung" method="POST">
                            <div class="card-body border-0">
                                <?php if ($this->session->flashdata('true')) {
                                    echo $this->session->flashdata('true');
                                    $this->session->unset_userdata('true');
                                } else if ($this->session->flashdata('error')) {
                                    echo $this->session->flashdata('error');
                                    $this->session->unset_userdata('error');
                                } ?>
                                <input type="text" value="<?php echo $form_id; ?>" name="id_user" class="form-control" id="exampleFormControlInput1" hidden>
                                <input type="text" value="<?php echo $form_nama; ?>" name="Nama" class="form-control" id="exampleFormControlInput1" hidden>
                                <input type="text" value="<?php echo $form_nohp; ?>" name="NoHP" class="form-control" id="exampleFormControlInput1" hidden>
                                <?php
                                $nama = json_decode(json_encode($nama_gejala), true);
                                foreach ($nama as $key => $values) {
                                ?>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><?php echo $values['NamaGejala'] ?></label>
                                        <input type="text" value="<?php echo $values['id_gejala'] ?>" name="gejala[]" hidden>

                                        <select class="form-control js-example-basic" name="usercf[]" required>
                                            <option value="" disabled selected hidden>Pilih Tingkat Keyakinan</option>
                                            <option value="0">Tidak</option>
                                            <option value="0.2">Tidak Tahu</option>
                                            <option value="0.4">Sedikit Yakin</option>
                                            <option value="0.6">Cukup Yakin</option>
                                            <option value="0.8">Yakin</option>
                                            <option value="1">Sangat Yakin</option>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="button-container">
						            <button onclick="window.location.href='<?php echo base_url() ?>user/dashboard/konsultasi'" class="btn btn-primary kembali-button">Kembali</button>
                                    <button class="btn btn-primary right-button" type="submit">Kirim</button>

                                </div>

                                <!-- <div class="button-container">
						            <form method="post" action="<?php echo base_url() ?>user/dashboard/tabeldetail">
							        <input type="hidden" name="hasilcf" value="<?php echo htmlentities(serialize($hasilcf)); ?>">
							        <button type="submit" class="btn btn-md btn-neutral left-button">Lihat Tabel Hasil</button>
						        </form>
						<button onclick="window.location.href='<?php echo base_url() ?>user/auth'" class="btn btn-md btn-neutral right-button"> Konsultasi Kembali</button>
					</div> -->
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