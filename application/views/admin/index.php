	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
		<!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pendapatan Hari Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($sum_jual_today['total']+$sum_jual_today_offline['total']-$sum_beli_today['total']-$sum_beban_today['total'],2,',','.') ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pendapatan Bulan Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($sum_jual_month['total']+$sum_jual_month_offline['total']-$sum_beli_month['total']-$sum_beban_month['total'],2,',','.') ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Pendapatan Tahun Ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($sum_jual_year['total']+$sum_jual_year_offline['total']-$sum_beli_year['total']-$sum_beban_year['total'],2,',','.') ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Persentase Laba/Rugi
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($persentase_hasil,2) ?>%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 50%" aria-valuenow="<?= $persentase_hasil ?>" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row mb-3">
			<img src="<?= base_url('assets/img/dashboard/petshop_ciganitri.jpeg') ?>" class="img-fluid" style="width: 35%;" alt="petshop.jpg">
			<img src="<?= base_url('assets/img/dashboard/petshop.jpg') ?>" class="img-fluid" style="width: 65%;" alt="petshop.jpg">
		</div>

        <!-- Content Row -->
		<div class="card text-left">
			<div class="card-header">
				<?= $dashboard['header'] ?>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?= $dashboard['title'] ?></h5>
				<p class="card-text"><?= $dashboard['content'] ?></p>
				<a href="<?= base_url('DataMaster/dashboard'); ?>" class="btn btn-primary">Edit Dashboard</a>
			</div>
			<div class="card-footer text-muted">
				-<?= $dashboard['footer'] ?>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->