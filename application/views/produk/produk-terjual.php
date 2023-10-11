<!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
        <?= $this->session->flashdata('message'); ?>
        <h3 class="h3 mt-5">Laporan Penjualan</h3>
        <div class="col-lg-12">
        	<div class="card mb-5">
        		<h5 class="card-header">Penjualan Online</h5>
        		<div class="card-body">
        			<!-- <a href="<?= base_url('Produk/printLaporan') ?>" class="btn btn-success" target="_blank"><i class="fas fa-print"></i> Print</a> -->
        			<?php if (!$print_by_bulan): ?>
        				<?php $print_by_bulan = ''; ?>
        			<?php endif ?>
        			<a href="<?= base_url('Produk/printLaporan/'.$print_by_bulan) ?>" class="btn btn-success" target="_blank"><i class="fas fa-print"></i> Print</a>
        			<!-- Split dropright button -->
        			<div class="btn-group dropright">
        				<button type="button" class="btn btn-secondary">
        					Bulan
        				</button>
        				<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        					<span class="sr-only">Toggle Dropright</span>
        				</button>
        				<div class="dropdown-menu">
        					<a class="dropdown-item" href="<?= base_url('Produk/terjual/') ?>">All Data</a>
        					<?php foreach ($bulan as $item): ?>
        						<?php
        						$x = '01-'.$item['bulan'];
        						$dis_bulan = date('F Y', strtotime($x));
        						 ?>
        						<a class="dropdown-item" href="<?= base_url('Produk/terjual/'.$item['bulan']) ?>"><?= $dis_bulan; ?></a>
        					<?php endforeach ?>
        				</div>
        			</div>
        			<table class="table table-bordered" style="background-color: white;" id="dataTable">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Pelanggan</th>
								<th scope="col">Nama Produk</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Harga</th>
								<th scope="col">Sub Total</th>
								<th scope="col">Waktu Pemesanan</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0; $total = 0; ?>
							<?php foreach ($pesanan as $row): ?>
								<tr>
									<th scope="row"><?= ++$no ?></th>
									<td><?= $row['name'] ?></td>
									<td><?= $row['nama_produk'] ?></td>
									<td><?= $row['jumlah'] ?></td>
									<td align="left"><?= 'Rp.'.number_format($row['harga'],2,',','.') ?></td>
									<td align="left"><?= 'Rp.'.number_format($row['sub_total_harga'],2,',','.') ?></td>
									<td><?= $row['waktu_pemesanan'] ?></td>
								</tr>
								<?php $total += $row['sub_total_harga']; ?>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6" align="right"><b>Total : </b></td>
								<td align="left"><b><?= 'Rp.'.number_format($total,2,',','.') ?></b></td>
							</tr>
						</tfoot>
					</table>
        		</div>
        	</div>
        	<div class="card mb-5">
        		<h5 class="card-header">Penjualan Offline</h5>
        		<div class="card-body">
        			<table class="table table-bordered" style="background-color: white;" id="dataTable2">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Kasir</th>
						<th scope="col">Nama Produk</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Harga</th>
						<th scope="col">Sub Total</th>
						<th scope="col">Waktu Transaksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; $total = 0; ?>
					<?php foreach ($transaksi as $row): ?>
						<tr>
							<th scope="row"><?= ++$no ?></th>
							<td><?= $row['name'] ?></td>
							<td><?= $row['nama_produk'] ?></td>
							<td><?= $row['jumlah'] ?></td>
							<td><?= 'Rp.'.number_format($row['harga'],2,',','.') ?></td>
							<td><?= 'Rp.'.number_format($row['sub_total_harga'],2,',','.') ?></td>
							<td><?= $row['waktu_transaksi'] ?></td>
						</tr>
						<?php $total += $row['sub_total_harga']; ?>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right"><b>Total : </b></td>
						<td colspan="2" align="left"><b><?= 'Rp.'.number_format($total,2,',','.') ?></b></td>
					</tr>
				</tfoot>
			</table>
        		</div>
        	</div>
		</div>
    </div>
</div>