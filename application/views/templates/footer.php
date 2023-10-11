<!-- Footer -->
            <footer class="sticky-footer"  style="background-color: #EAAFAF !important;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <?php $dashboard = $this->db->get('dashboard')->row_array(); ?>
                        <span>Copyright &copy; Proyek Akhir <?= $dashboard['footer'].' '.date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>


    <!--Chart Js-->
    <script src="<?= base_url('assets/'); ?>js/Chart.js"></script>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/datatables2-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('.custom-file-input').on('change', function(){
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        });

        $(function() {
            $('.newMenuModalButton').on('click', function(){
                $('#newMenuModalLabel').html('Add New Menu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/menu');
            });

            $('.updateMenuModalButton').on('click', function() {
                $('#newMenuModalLabel').html('Edit Menu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/menu/updateMenu');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/menu/getUpdateMenu',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#menu').val(data.menu);
                        $('#active').attr("checked", true);
                        if(data.active == 1){
                            $('#active').attr("checked", true);
                        } else{
                            $('#active').attr("checked", false);
                        }
                    }
                });
            });
        });

        // $(function() {
        //     $('.bookGroomingModalButton').on('click', function() {
        //         const id = $(this).data('jadwal');
        //         jQuery.ajax({
        //             url: 'http://localhost/petshop_ciganitri/',
        //             data: {id : id},
        //             method: 'post',
        //             dataType: 'json',
        //             success: function(data) {
        //                 console.log(data);
        //                 $('#jadwal').val(data.id);
        //             }
        //         });
        //     });
        // });

        $(function() {
            $('.newRoleModalButton').on('click', function(){
                $('#newRoleModalLabel').html('Add New Role');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Admin/role/');
            });

            $('.updateRoleModalButton').on('click', function() {
                $('#newRoleModalLabel').html('Edit Role');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Admin/updateRole');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/admin/getUpdateRole',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#role').val(data.role);
                    }
                });
            });
        });

        $(function() {
            $('.setRoleButton').on('click', function() {
                $('#setRoleLabel').html('Set User Role');
                $('.modal-footer button[type=submit]').html('Save');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/admin/getUserData',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#role_id').val(data.role_id);
                    }
                });
            });
        });

        $(function() {
            $('.newSubMenuModalButton').on('click', function(){
                $('#newSubMenuModalLabel').html('Add New SubMenu');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/menu/subMenu');
            });

            $('.updateSubMenuModalButton').on('click', function() {
                $('#newSubMenuModalLabel').html('Edit SubMenu');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/menu/updateSubMenu');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/menu/getUpdateSubMenu',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#title').val(data.title);
                        $('#menu_id').val(data.menu_id);
                        $('#url').val(data.url);
                        $('#icon').val(data.icon);
                        $('#is_active').attr("checked", true);
                        if(data.is_active == 1){
                            $('#is_active').attr("checked", true);
                        } else if(data.is_active == 0){
                            $('#is_active').attr("checked", false);
                        }
                    }
                });
            });
        });

        $(function() {
            $('.newAgamaModalButton').on('click', function(){
                $('#newAgamaModalLabel').html('Add New Religion');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/agama');
            });

            $('.updateAgamaModalButton').on('click', function() {
                $('#newAgamaModalLabel').html('Edit Religion');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updateAgama');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdateAgama',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#agama').val(data.agama);
                    }
                });
            });
        });

        $(function() {
            $('.newSlotModalButton').on('click', function(){
                $('#newSlotModalLabel').html('Add New Slot');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Grooming/slot');
            });

            $('.updateSlotModalButton').on('click', function() {
                $('#newSlotModalLabel').html('Edit Slot');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Grooming/updateSlot');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/Grooming/getUpdateSlot',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#slot').val(data.slot);
                    }
                });
            });
        });

        $(function() {
            $('.newJadwalModalButton').on('click', function(){
                $('#newJadwalModalLabel').html('Add New Schedule');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Grooming/jadwal');
            });

            $('.updateJadwalModalButton').on('click', function() {
                $('#newJadwalModalLabel').html('Edit Schedule');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Grooming/updateJadwal');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/Grooming/getUpdateJadwal',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#jadwal').val(data.jadwal);
                    }
                });
            });
        });

        $(function() {
            $('.newKurirModalButton').on('click', function(){
                $('#newKurirModalLabel').html('Add New Shipper');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/kurir');
            });

            $('.updateKurirModalButton').on('click', function() {
                $('#newKurirModalLabel').html('Edit Shipper');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updateKurir');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdateKurir',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kurir').val(data.kurir);
                    }
                });
            });
        });

        $(function() {
            $('.newRekeningModalButton').on('click', function(){
                $('#newRekeningModalLabel').html('Add New Bank Account');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/rekening');
            });

            $('.updateRekeningModalButton').on('click', function() {
                $('#newRekeningModalLabel').html('Edit Bank Account');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updateRekening');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdateRekening',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#no_rekening').val(data.no_rekening);
                        $('#bank').val(data.bank);
                        $('#atas_nama').val(data.atas_nama);
                        $('#email').val(data.email);
                    }
                });
            });
        });

        $(function() {
            $('.newKategoriModalButton').on('click', function(){
                $('#newKategoriModalLabel').html('Add New Category');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/kategori');
            });

            $('.updateKategoriModalButton').on('click', function() {
                $('#newKategoriModalLabel').html('Edit Category');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updateKategori');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdateKategori',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kategori').val(data.kategori);
                    }
                });
            });
        });

        $(function() {
            $('.newMetodeBayarModalButton').on('click', function(){
                $('#newMetodeBayarModalLabel').html('Add New Payment');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/metodeBayar');
            });

            $('.updateMetodeBayarModalButton').on('click', function() {
                $('#newMetodeBayarModalLabel').html('Edit Payment');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updateMetodeBayar');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdateMetodeBayar',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#metode_bayar').val(data.metode_bayar);
                    }
                });
            });
        });

        $(function() {
            $('.newKontenModalButton').on('click', function(){
                $('#newKontenModalLabel').html('Add New Content');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/konten');
            });

            $('.updateKontenModalButton').on('click', function() {
                $('#newKontenModalLabel').html('Edit Content');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updateKonten');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdateKonten',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#header').val(data.header);
                        $('#konten').val(data.content);
                        $('#footer').val(data.footer);
                    }
                });
            });
        });

        $(function() {
            $('.newProdukModalButton').on('click', function(){
                $('#newProdukModalLabel').html('Add New Product');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Produk/produk');
            });

            $('.updateProdukModalButton').on('click', function() {
                $('#newProdukModalLabel').html('Edit Product');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/Produk/updateProduk');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/Produk/getUpdateProduk',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#kode_produk').val(data.kode_produk);
                        $('#nama_produk').val(data.nama_produk);
                        $('#merk').val(data.merk);
                        $('#id_kategori').val(data.id_kategori);
                        $('#stok').val(data.stok);
                        $('#harga').val(data.harga);
                        $('#satuan').val(data.satuan);
                        $('#deskripsi').val(data.deskripsi);
                    }
                });
            });
        });
        $(function() {
            $('.newPaketGroomingModalButton').on('click', function(){
                $('#newPaketGroomingModalLabel').html('Add New Grooming');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/paketGrooming');
            });

            $('.updatePaketGroomingModalButton').on('click', function() {
                $('#newPaketGroomingModalLabel').html('Edit Grooming');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updatePaketGrooming');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdatePaketGrooming',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#paket_grooming').val(data.paket_grooming);
                        $('#harga').val(data.harga);
                    }
                });
            });
        });

        $(function() {
            $('.newDetailPaketGroomingModalButton').on('click', function(){
                $('#newDetailPaketGroomingModalLabel').html('Add New Service');
                $('.modal-footer button[type=submit]').html('Add');
                $('.modal-content form')[0].reset();
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/detailPaketGrooming');
            });

            $('.updateDetailPaketGroomingModalButton').on('click', function() {
                $('#newDetailPaketGroomingModalLabel').html('Edit Service');
                $('.modal-footer button[type=submit]').html('Save');
                $('.modal-content form').attr('action', 'http://localhost/petshop_ciganitri/DataMaster/updateDetailPaketGrooming');
                const id = $(this).data('id');
                jQuery.ajax({
                    url: 'http://localhost/petshop_ciganitri/DataMaster/getUpdateDetailPaketGrooming',
                    data: {id : id},
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#id').val(data.id);
                        $('#id_paket_grooming').val(data.id_paket_grooming);
                        $('#jasa').val(data.jasa);
                    }
                });
            });
        });

    </script>
    <script type="text/javascript">
        
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeAccess') ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
                }
            });
        });

        $(document).ready(function() {
            setInterval(function() {
                $('#show').load('<?= base_url('User/notifikasi') ?>')
            }, 10000);
        });

        function notifikasi() {
            $.ajax({
                type: "POST",
                url: '<?= base_url('User/readAllNotification') ?>',
                data:{action:'call_this'},
                success:function(html) {

                }
            });
        }

        function read(id) {
            $.ajax({
                type: "POST",
                url: '<?= base_url('User/readNotification/') ?>' + id,
                data:{action:'call_this'},
                success:function(html) {

                }
            });
        }

            
    </script>

    
</body>

</html>