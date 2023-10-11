        <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_error('kode_produk','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <?= form_error('nama_produk','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <?= form_error('merk','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <?= form_error('id_kategori','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <?= form_error('stok','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <?= form_error('harga','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <?= form_error('deskripsi','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <?= form_error('gambar','<div class="alert alert-danger" role="alert">','</div>'); ?>
                    <div class="row">
                    	<div class="col-lg-12">
                    		<a href="" class="btn btn-primary mb-3 newProdukModalButton" data-toggle="modal" data-target="#newProdukModal">Tambah Produk Baru</a>
                    		<table class="table table-hover" id="dataTable">
                    			<thead>
                    				<tr>
                    					<th scope="col">#</th>
                    					<th scope="col">Kode Produk</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Merk</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Gambar</th>
                    					<th scope="col">Action</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                					<?php $no=1; ?>
                    				<?php foreach ($produk as $key): ?>
	                    				<tr>
	                    					<th scope="row"><?= $no ?></th>
	                    					<td><?= $key['kode_produk'] ?></td>
                                            <td><?= $key['nama_produk'] ?></td>
                                            <td><?= $key['merk'] ?></td>
                                            <td><?= $key['kategori'] ?></td>
                                            <td><?= $key['stok'] ?></td>
                                            <td><?= "Rp. ".number_format($key['harga']).",00" ?></td>
                                            <td><?= $key['satuan'] ?></td>
                                            <td><?= $key['deskripsi'] ?></td>
                                            <td><img src="<?= base_url('assets/img/produk/').$key['gambar'] ?>" class="img-thumbnail" style="width: 300px;"></td>
	                    					<td>
	                    						<a href="<?= base_url("Produk/updateProduk/$key[pid]"); ?>" class="badge badge-success updateProdukModalButton" data-toggle="modal" data-target="#newProdukModal" data-id="<?=$key['pid']?>">Edit</a>
	                    						<a href="<?= base_url("Produk/deleteProduk/$key[pid]"); ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
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
            <div class="modal fade" id="newProdukModal" tabindex="-1" aria-labelledby="newProdukModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newProdukModalLabel">Tambah Produk</h5>
            				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            					<span aria-hidden="true">&times;</span>
            				</button>
            			</div>
            			<form action="<?= base_url('Produk/Produk') ?>" method="post" enctype="multipart/form-data">
            				<input type="hidden" name="id" id="id">
	            			<div class="modal-body">
	            				<div class="form-group">
	            					<input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Kode Produk">
                                    <?= form_error('kode_produk','<small class="text-danger pl-3">','</small>'); ?>
	            				</div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
                                    <?= form_error('nama_produk','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk">
                                    <?= form_error('merk','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="id_kategori" id="id_kategori">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $key): ?>
                                            <option value="<?= $key['id'] ?>"><?= $key['kategori'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                                    <?= form_error('stok','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                                    <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                                    <?= form_error('satuan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Upload Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>
	            			</div>
	            			<div class="modal-footer">
	            				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	            				<button type="submit" class="btn btn-primary">Tambah</button>
	            			</div>
            			</form>
            		</div>
            	</div>
            </div>

            