<div class="container-fluid">

	<form method="post" action="<?php echo base_url('admin/data_absensi/absen_mahasiswa_aksi') ?>">

		<div class="form-group">
			<label>Bulan</label>
			<input type="text" name="bulan" class="form-control">
			<?php echo form_error('bulan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>NIM</label>
			<select name="nim" class="form-control">
				<option value="">-- Pilih NIM --</option>
				<?php foreach($mahasiswa as $mhs) : ?>
					<option value="<?php echo $mhs->nim ?>"><?php echo $mhs->nim ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Nama Mahasiswa</label>
			<select name="nama_lengkap" class="form-control">
				<option value="">-- Nama Mahasiswa --</option>
				<?php foreach($mahasiswa as $mhs) : ?>
					<option value="<?php echo $mhs->nama_lengkap ?>"><?php echo $mhs->nama_lengkap ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option>Laki-Laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Hadir</label>
			<input type="text" name="hadir" class="form-control">
			<?php echo form_error('hadir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Sakit</label>
			<input type="text" name="sakit" class="form-control">
			<?php echo form_error('sakit', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Alpha</label>
			<input type="text" name="alpha" class="form-control">
			<?php echo form_error('alpha', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan Data</button>
		</form>
</div>