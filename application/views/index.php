<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-danger text-light border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jenis Barang</div>
                        <div class="h5 mb-0 font-weight-bold"><?= $jumlah_jenis; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cookie-bite fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-warning text-light border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Barang</div>
                        <div class="h5 mb-0 font-weight-bold"><?= $jumlah_barang; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-light border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Jumah Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold"><?= $jumlah_transaksi; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cookie fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-info text-light border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Hari Ini</div>
                        <div class="h5 mb-0 font-weight-bold"><?= $jumlah_today; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>