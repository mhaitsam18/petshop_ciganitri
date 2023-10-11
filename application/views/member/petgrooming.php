	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<?= $this->session->flashdata('message'); ?>
		<?= form_error('id_slot','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('id_jadwal','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('tanggal_grooming','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('slot','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('jadwal','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('nama_pet','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('jenis_hewan','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('id_paket_grooming','<small class="text-danger pl-3">','</small>') ?>
		<?= form_error('keterangan','<small class="text-danger pl-3">','</small>') ?>
		<div class="row mb-4">
			<?php foreach ($paket_grooming as $item): ?>
				<div class="card border-primary mr-3" style="width: 16rem;">
					<div class="card-header"><?= $item['paket_grooming'] ?></div>
					<div class="card-body text-primary">
						<?php $detail = $this->db->get_where('detail_paket_grooming', ['id_paket_grooming' => $item['id']])->result_array(); ?>
						<h5 class="card-title">Detail Paket:</h5>
						<?php foreach ($detail as $row): ?>
							<p class="card-text">-> <?= $row['jasa'] ?></p>
						<?php endforeach ?>
					</div>
					<div class="card-footer">
						Rp. <?= number_format($item['harga'],2,',','.') ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<h1 class="h3 mb-4 text-gray-800">Booking Grooming</h1>
		<div class="col-lg-5">
			<form>
				<h5>Pilih Tanggal</h5>
				<div class="input-group mb-3">
					<input type="date" class="form-control" placeholder="Pilih Tanggal" aria-label="Pilih Tanggal" aria-describedby="button-addon2" id="tanggal">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" id="button-addon2">Book</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-7"></div>
		<div id="ctn">	
		</div>
		<h1 class="h3 mb-4 text-gray-800">Antrean Hari ini</h1>
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
<!-- End of Main Content -->
<!-- Button trigger modal -->

<script type="text/javascript">
	// ambil elements yg di buutuhkan
	var keyword = document.getElementById('tanggal');

	var container = document.getElementById('ctn');
	// var btn = document.getElementById('button-addon2');

	// tambahkan event ketika keyword ditulis

	keyword.addEventListener('change', function () {


	    //buat objek ajax
	    var xhr = new XMLHttpRequest();

	    // cek kesiapan ajax
	    xhr.onreadystatechange = function () {
	        if (xhr.readyState == 4 && xhr.status == 200) {
	            container.innerHTML = xhr.responseText;
	        }
	    }

	    xhr.open('GET', '<?= base_url('Member/bookingGrooming/') ?>' + keyword.value, true);
	    xhr.send();


	})
</script>