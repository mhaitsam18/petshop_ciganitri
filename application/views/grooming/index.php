	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<?= $this->session->flashdata('message'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<h5 class="card-header"><?= $title ?></h5>
					<div class="card-body">
						<table class="table table-responsive table-hover" id="dataTable">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">ID Grooming</th>
									<th scope="col">Nama Pemilik</th>
									<th scope="col">Nama Pet</th>
									<th scope="col">Jenis Hewan</th>
									<th scope="col">paket Grooming</th>
									<th scope="col">Waktu Booking</th>
									<th scope="col">Tanggal Grooming</th>
									<th scope="col">Tempat</th>
									<th scope="col">Jam</th>
									<th scope="col">Keterangan</th>
									<th scope="col">Status</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; ?>
								<?php foreach ($grooming as $key): ?>
									<tr>
										<th scope="row"><?= $no++ ?></th>
										<td><?= $key['id'] ?></td>
										<td><?= $key['name'] ?></td>
										<td><?= $key['nama_pet'] ?></td>
										<td><?= $key['jenis_hewan'] ?></td>
										<td><?= $key['paket_grooming'] ?></td>
										<td><?= $key['waktu_booking'] ?></td>
										<td><?= date('j F Y', strtotime($key['tanggal_grooming'])); ?></td>
										<td><?= $key['jadwal'] ?></td>
										<td><?= 'Tempat '.$key['slot'] ?></td>
										<td><?= $key['keterangan'] ?></td>
										<td><?= $key['status'] ?></td>
										<td>
											<?php if ($key['status']=='Booking'): ?>
												<a href="<?= base_url("Grooming/updateStatusGrooming/$key[idg]/Proses") ?>" class="badge badge-success">Proses Grooming</a>
												<a href="<?= base_url("Grooming/updateStatusGrooming/$key[idg]/Selesai") ?>" class="badge badge-info">Selesai</a>
												<a href="<?= base_url("Grooming/updateStatusGrooming/$key[idg]/Batal") ?>" class="badge badge-danger">Batal</a>
											<?php elseif ($key['status']=='Proses Grooming'): ?>
												<a href="<?= base_url("Grooming/updateStatusGrooming/$key[idg]/Selesai") ?>" class="badge badge-info">Selesai</a>
											<?php else: ?>
												<span class="badge badge-secondary">Valid</span>
											<?php endif ?>
										</td>
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
<!-- End of Main Content -->