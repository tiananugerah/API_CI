<div class="container-fluid">

	<form method="post" action="<?php echo base_url('admin/mata_pelajaran/tambah_matpel') ?>">

		<div class="form-group">
			<label>KODE MATA PELAJARAN</label>
			<input type="text" name="kode_matkul" class="form-control">
			<?php echo form_error('kode_matkul', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>MATA PELAJARAN</label>
			<input type="text" name="nama_matkul" placeholder="Masukan Mata Kuliah" class="form-control">
			<?php echo form_error('nama_matkul', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>SEMESTER</label>
			<input type="text" name="semester" placeholder="Masukan Semester" class="form-control">
			<?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>TINGKATAN</label>
			<input type="text" name="tingkatan" placeholder="Masukan Tingkatan" class="form-control">
			<?php echo form_error('tingkatan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan Data</button>
		</form>
</div>