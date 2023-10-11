<?php 
    $this->db->order_by('id', 'DESC');
    $notifikasi = $this->db->get_where('notifikasi', ['id_user' => $user['id']], 5)->result_array();
    $notifikasi_unread = $this->db->get_where('notifikasi', ['id_user' => $user['id'], 'is_read' => 0])->num_rows();
 ?>
<li class="nav-item dropdown no-arrow mx-1" id="show">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">
            <?php if ($notifikasi_unread > 5): ?>
                5+
            <?php else: ?>
                <?= $notifikasi_unread ?>
            <?php endif ?>
        </span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        <a href="" class="float-right mr-3" style="color: #A3D0EF;" onclick="notifikasi()">
            <small class="text-primary">Tandai Semua Sudah dibaca</small>
        </a>
        <?php $icon = ''; ?>
        <?php $bg = ''; ?>
        <?php foreach ($notifikasi as $key): ?>
            <?php 
            switch ($key['id_kategori_notifikasi']) {
                 case 1: $bg = 'bg-warning'; $icon = 'fas fa-exclamation-triangle'; break;
                 case 2: $bg = 'bg-primary'; $icon = 'fas fa-user-plus'; break;
                 case 3: $bg = 'bg-success'; $icon = 'fas fa-donate'; break;
                 case 4: $bg = 'bg-info'; $icon = 'fas fa-users'; break;
                 default: $bg = 'bg-info'; $icon = 'fas fa-file-alt'; break;
             } ?>
            <span class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle <?= $bg ?>">
                        <i class="<?= $icon ?> text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500"><?= date('j F Y, H:i:s', strtotime($key['waktu_notifikasi'])) ?></div>
                    <?php if ($key['is_read'] == 0): ?>
                        <span class="font-weight-bold"><?= $key['pesan'] ?></span>
                    <?php else: ?>
                        <?= $key['pesan'] ?>
                    <?php endif ?>
                    <?php if ($key['id_kategori_notifikasi'] == 2): ?>
                        <br>
                        <a class="font-weight-bold" href="<?= base_url('User/terimaPertemanan/'.$key['sub_id'].'/'.$key['id']) ?>" onclick="read(<?= $key['id'] ?>)">Terima</a>
                        <a class="font-weight-bold" href="<?= base_url('User/tolakPertemanan/'.$key['sub_id'].'/'.$key['id']) ?>" onclick="read(<?= $key['id'] ?>)">Tolak</a>
                    <?php elseif($key['id_kategori_notifikasi'] == 3): ?>
                        <?php $pembayaran = $this->db->get_where('bukti_transfer',['id' => $key['sub_id']])->row(); ?>
                        <br>
                        <a class="font-weight-bold" href="<?= base_url('Member/detailPesanan/'.$pembayaran->id_checkout) ?>" onclick="read(<?= $key['id'] ?>)">Lihat Detail</a>
                    <?php elseif ($key['id_kategori_notifikasi'] == 4): ?>
                        <br>
                        <a class="font-weight-bold" href="<?= base_url('Member/detailPesanan/'.$key['sub_id']) ?>" onclick="read(<?= $key['id'] ?>)">Lihat Detail</a>
                    <?php endif ?>
                </div>
            </span>
        <?php endforeach ?>
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>
</li>