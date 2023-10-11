	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('paket_grooming','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<div class="row">
			<div class="col-lg-6">
				<a href="" class="btn btn-primary mb-3 newPaketGroomingModalButton" data-toggle="modal" data-target="#newPaketGroomingModal">Add New Grooming</a>
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Paket Grooming</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($paket_grooming as $key): ?>
							<tr>
								<th scope="row"><?= $no ?></th>
								<td><?= $key['paket_grooming'] ?></td>
								<td>Rp. <?= number_format($key['harga'],2,',','.') ?></td>
								<td>
									<a href="<?= base_url("DataMaster/updatePaketGrooming/$key[id]"); ?>" class="badge badge-success updatePaketGroomingModalButton" data-toggle="modal" data-target="#newPaketGroomingModal" data-id="<?=$key['id']?>">Edit</a>
									<a href="<?= base_url("DataMaster/deletePaketGrooming/$key[id]"); ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
									<a href="<?= base_url("DataMaster/detailPaketGrooming/$key[id]"); ?>" class="badge badge-primary">Detail</a>
								</td>
							</tr>
							<?php $no++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="newPaketGroomingModal" tabindex="-1" aria-labelledby="newPaketGroomingModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newPaketGroomingModalLabel">Add New Grooming</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/paketGrooming') ?>" method="post">
				<input type="hidden" name="id" id="id">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="paket_grooming" name="paket_grooming" placeholder="Paket Grooming">
						<?= form_error('paket_grooming','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
						<?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>