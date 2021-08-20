<div class="container-fluid">
	<form method="post" action="<?php echo base_url('admin/tahun_akademik/input_data') ?>">
		<div class="form-group">
			<label>TAHUN AKADEMIK</label>
			<input type="text" name="tahun_akademik" placeholder="Masukan Tahun Akademik" class="form-control">
			<?php echo form_error('tahun_akademik', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>SEMESTER</label>
			<select name="semester" class="form-control">
				<option value="">-- Pilih Semester --</option>
				<option>Ganjil</option>
				<option>Genap</option>
			</select>
			<?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>STATUS</label>
			<select name="status" class="form-control">
				<option value="">-- Pilih Status --</option>
				<option>Aktif</option>
				<option>Tidak Aktif</option>
			</select>
			<?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan Data</button>
	</form>
</div>