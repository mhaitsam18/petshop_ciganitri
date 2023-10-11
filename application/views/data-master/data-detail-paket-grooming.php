	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('jasa','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<div class="row">
			<div class="col-lg-6">
				<a href="" class="btn btn-primary mb-3 newDetailPaketGroomingModalButton" data-toggle="modal" data-target="#newDetailPaketGroomingModal">Add New Service</a>
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Jasa</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($detail_paket_grooming as $key): ?>
							<tr>
								<th scope="row"><?= $no ?></th>
								<td><?= $key['jasa'] ?></td>
								<td>
									<a href="<?= base_url("DataMaster/updateDetailPaketGrooming/$key[idpg]"); ?>" class="badge badge-success updateDetailPaketGroomingModalButton" data-toggle="modal" data-target="#newDetailPaketGroomingModal" data-id="<?=$key['id']?>">Edit</a>
									<a href="<?= base_url("DataMaster/deleteDetailPaketGrooming/$key[idpg]"); ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
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
<div class="modal fade" id="newDetailPaketGroomingModal" tabindex="-1" aria-labelledby="newDetailPaketGroomingModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newDetailPaketGroomingModalLabel">Add New Service</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/detailpaketGrooming/'.$id_paket_grooming) ?>" method="post">
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="id_paket_grooming" id="id_paket_grooming" value="<?= $id_paket_grooming ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="jasa" name="jasa" placeholder="Jasa">
						<?= form_error('jasa','<small class="text-danger pl-3">','</small>'); ?>
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