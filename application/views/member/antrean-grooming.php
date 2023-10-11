	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						Data Antrian
					</div>
					<div class="card-body">
						<table class="table table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama Pemilik</th>
									<th scope="col">Tanggal Grooming</th>
									<th scope="col">Tempat</th>
									<th scope="col">Jam Booking</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								$color = '';
								$saya = '';
								 ?>
								<?php foreach ($grooming as $row): ?>
								<?php 
								if ($row['name'] == $user['name']) {
									$color = 'table-success';
									$saya = '(Saya)';
								} else{
									$color = '';
									$saya = '';
								} 
								if($row['status'] == 'Batal'){
									$color = 'table-danger';
								} elseif ($row['status'] == 'Proses Grooming') {
									$color = 'table-warning';
								} elseif ($row['status'] == 'Selesai') {
									$color = 'table-info';
								} else{
									$color = '';
								}
								 ?>
									<tr class="<?= $color ?>">
										<td><?= $no++; ?></td>
										<td><?= $row['name']." $saya" ?></td>
										<td><?= date('j F Y', strtotime($row['tanggal_grooming'])); ?></td>
										<td><?= $row['slot'] ?></td>
										<td><?= $row['jadwal'] ?></td>
										<td><?= $row['status'] ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /.container-fluid -->
</div>