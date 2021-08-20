<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Form Masuk Cetak Rapot
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <form method="post" action="<?php echo base_url('admin/cetak_rapot/cetak_aksi') ?>">
		
		<div class="form-group">
			<label>NOMER INDUK</label>
			<input type="text" name="nomer_induk" class="form-control">
			<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>
		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>