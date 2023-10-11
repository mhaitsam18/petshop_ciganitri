
<div class="row">
	<?php foreach ($jadwal as $j): ?>
		<?php foreach ($slot as $s): ?>
			<div class="card text-center mr-4 mb-2" style="width: 15rem;">
				<div class="card-body">
					<h5 class="card-title">Tempat <?= $s['slot'] ?></h5>
					<p class="card-text"><?= $j['jadwal'] ?></p>
					<?php 
					$query = $this->db->get_where('grooming', ['tanggal_grooming' => $tanggal, 'id_slot' => $s['id'], 'id_jadwal' => $j['id']])->num_rows();
					 ?>
					<?php if ($query > 0): ?>
						<span class="btn btn-secondary">Booked</span>
					<?php else: ?>
						<a href="#" class="btn btn-outline-primary bookGroomingModalButton" data-toggle="modal" data-target="#bookGroomingModal_<?= $j['id'] ?>_<?= $s['id'] ?>" data-jadwal="1">Booking</a>
					<?php endif ?>
				</div>
			</div>
		<?php endforeach ?>
	<?php endforeach ?>
</div>

<!-- Modal -->
<?php foreach ($jadwal as $j): ?>
	<?php foreach ($slot as $s): ?>
		<div class="modal fade" id="bookGroomingModal_<?= $j['id'] ?>_<?= $s['id'] ?>" tabindex="-1" aria-labelledby="bookGroomingModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="bookGroomingModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?= base_url('Member/insertGrooming') ?>" method="post">
						<div class="modal-body">
							<!-- <div class="form-group">
								<label for="id_slot">Slot</label>
								<select class="form-control" name="id_slot" id="id_slot" readonly>
									<?php foreach ($slot as $item): ?>
										<?php if ($item['id']==$s['id']): ?>
											<option value="<?= $item['id'] ?>" selected>Tempat <?= $item['slot'] ?></option>
										<?php else: ?>
											<option value="<?= $item['id'] ?>">Tempat <?= $item['slot'] ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
								<?= form_error('id_slot','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_jadwal">Jadwal</label>
								<select class="form-control" name="id_jadwal" id="id_jadwal" readonly>
									<?php foreach ($jadwal as $item): ?>
										<?php if ($item['id']==$j['id']): ?>
											<option value="<?= $item['id'] ?>" selected><?= $item['jadwal'] ?></option>
										<?php else: ?>
											<option value="<?= $item['id'] ?>"><?= $item['jadwal'] ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
								<?= form_error('id_jadwal','<small class="text-danger pl-3">','</small>') ?>
							</div> -->
							<div class="form-group">
								<label for="tanggal_grooming">Tanggal Grooming</label>
								<input type="date" class="form-control" name="tanggal_grooming" id="tanggal_grooming" value="<?= $tanggal ?>" readonly>
								<?= form_error('tanggal_grooming','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="slot">Slot</label>
								<input type="text" class="form-control" name="slot" id="slot" value="Tempat <?= $s['slot'] ?>" readonly>
								<input type="hidden" class="form-control" name="id_slot" id="id_slot" value="<?= $s['id'] ?>">
								<?= form_error('slot','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="jadwal">Jadwal</label>
								<input type="text" class="form-control" name="jadwal" id="jadwal" value="<?= $j['jadwal'] ?>" readonly>
								<input type="hidden" class="form-control" name="id_jadwal" id="id_jadwal" value="<?= $j['id'] ?>">
								<?= form_error('jadwal','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="nama_pet">Nama Pet</label>
								<input type="text" class="form-control" name="nama_pet" id="nama_pet">
								<?= form_error('nama_pet','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="jenis_hewan">Jenis Hewan</label>
								<input type="text" class="form-control" name="jenis_hewan" id="jenis_hewan">
								<?= form_error('jenis_hewan','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_paket_grooming">Paket Grooming</label>
								<select class="form-control" name="id_paket_grooming" id="id_paket_grooming">
										<option selected disabled>Pilih Paket</option>
									<?php foreach ($paket_grooming as $item): ?>
										<option value="<?= $item['id'] ?>"><?= $item['paket_grooming'] ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_paket_grooming','<small class="text-danger pl-3">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea class="form-control" name="keterangan" id="keterangan"></textarea>
								<?= form_error('keterangan','<small class="text-danger pl-3">','</small>') ?>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Booking</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach ?>
<?php endforeach ?>