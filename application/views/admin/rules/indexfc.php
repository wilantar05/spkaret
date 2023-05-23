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

							</div>
						</div>
						<!-- Light table -->

						<table class="table align-items-center table-responsive">
							<thead class="thead-light">
								<tr>
									<th scope="col">No</th>
									<th scope="col">Penyakit</th>
									<th scope="col">Rule Base</th>
								</tr>
							</thead>
							<tbody class="list">
								<?php if ($rules != null) { ?>
									<?php foreach ($penyakit as $key => $value) { 
										$rule_fc = "<strong>JIKA</strong> ";
										$count = 0;
										$ruleCount = count($rules);
										$firstMatch = 0;
										foreach($rules as $rkey => $rvalue){
											if($value['id_penyakit']==$rvalue['idPenyakit']){
												
												if($firstMatch==0){
													$rule_fc .= $rvalue['nama_gejala'] . "<br>";
													$firstMatch++;
												}else if($count<$ruleCount){
													$rule_fc .= "<strong>DAN</strong> " . $rvalue['nama_gejala'] . "<br>";
												}
											}
											$count++;
										
										}
											?>
										<tr>
											<td><?php echo $key + 1 ?></td>
											<td><?php echo $value['nama_penyakit'] ?></td>

											<td><?php echo $rule_fc?></td>
											
											<!-- <td>
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="<?php echo base_url() ?>index.php/admin/rules/edit/<?php echo $value['id'] ?>">Edit</a>
														<a class="dropdown-item" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" href="<?php echo base_url() ?>index.php/admin/rules/delete/<?php echo $value['id'] ?>">Delete</a>
													</div>
												</div>
											</td> -->
										</tr>
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
						<!-- Card footer -->

					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<?php $this->load->view('admin/footer'); ?>