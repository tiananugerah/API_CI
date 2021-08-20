<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Form Masuk Transaksi
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <form method="post" action="<?php echo base_url('admin/sekolah_menengah_pertama/transaksi') ?>">
		
		<div class="form-group">
			<label>Nomer Induk</label>
			<input type="text" name="nomer_induk" placeholder="Masukan Nomer Induk" class="form-control">
			<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>
		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>