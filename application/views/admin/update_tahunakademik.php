<div class="container-fluid">
	<?php foreach($tahun_akademik as $ak) : ?>
		<form method="post" action="<?php echo base_url('admin/tahun_akademik/update_tahunakademik') ?>">
		<div class="form-group">
			<label>TAHUN AKADEMIK</label>
			<input type="hidden" name="id_tahunakademik" class="form-control" value="<?php echo $ak->id_tahunakademik ?>">
			<input type="text" name="tahun_akademik" class="form-control" value="<?php echo $ak->tahun_akademik ?>">
			<?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>SEMESTER</label>
			<select name="semester" class="form-control" value="<?php echo $ak->semester ?>">
				<option>Ganjil</option>
				<option>Genap</option>
			</select>
			<?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>STATUS</label>
			<select name="status" class="form-control" value="<?php echo $ak->semester ?>">
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
			<?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Update Data</button>
		</form>

	<?php endforeach; ?>
	
</div>