<div class="container"><br><br><br>

        <!-- Outer Row -->
<div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card o-hidden border-0 shadow-lg my-12">
            <div class="card-body p-2">

<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Form Pembayaran SPP</h1>
            </div>
            <?php foreach($transaksi as $t) : ?>
            <form method="post" action="<?php echo base_url('admin/sekolah_menengah_pertama/pembayaran_aksi') ?>">
                
                <div class="form-group">
					<label>Nomor Induk:</label>
						<input type="hidden" name="id_tunggakan" class="form-control" value="<?php echo $t->id_tunggakan ?>" readonly>
						<input type="text" name="nomer_induk" class="form-control" value="<?php echo $t->nomer_induk ?>" readonly>
						<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<div class="form-group">
					<label>Bulan:</label>
						<input type="text" name="bulan" class="form-control" value="<?php echo $t->bulan ?>" readonly>
						<?php echo form_error('bulan', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<div class="form-group">
					<label>Jumlah Tunggakan:</label>
						<input type="text" name="jumlah_tunggakan" class="form-control" value="Rp. <?php echo number_format($t->jumlah_tunggakan) ?>" readonly>
						<?php echo form_error('jumlah_tunggakan', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<div class="form-group">
					<label>Total Bayar:</label>
						<input type="text" name="total_bayar" class="form-control">
						<?php echo form_error('total_bayar', '<div class="text-danger small ml-3">', '</div>') ?>
				</div>

				<button type="submit" class="btn btn-primary">Bayar</button>

            </form>
        <?php endforeach; ?>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>