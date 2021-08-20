<div class="container-fluid">
	<form method="post" action="<?php echo base_url('admin/minat_bakat/input_aksi') ?>">
		<div class="form-group">
			<label>Pertanyaan</label>
			<textarea class="form-control" name="pertanyaan"></textarea>
			<?php echo form_error('pertanyaan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Pilihan 1</label>
			<textarea class="form-control" name="pilihan_a"></textarea>
			<?php echo form_error('pilihan_a', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Pilihan 2</label>
			<textarea class="form-control" name="pilihan_b"></textarea>
			<?php echo form_error('pilihan_b', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Pilihan 3</label>
			<textarea class="form-control" name="pilihan_c"></textarea>
			<?php echo form_error('pilihan_c', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Pilihan 4</label>
			<textarea class="form-control" name="pilihan_d"></textarea>
			<?php echo form_error('pilihan_d', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan Data</button>
	</form>
</div>