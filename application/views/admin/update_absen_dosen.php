<div class="container-fluid">
	<?php foreach($absensi as $absen) : ?>
		<form method="post" action="<?php echo base_url('admin/data_absensi/update_data') ?>">
		<div class="form-group">
			<input type="hidden" name="id_kehadiran" class="form-control" value="<?php echo $absen->id_kehadiran ?>">
			<?php echo form_error('id_kehadiran', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Bulan</label>
			<input type="text" name="bulan" class="form-control" value="<?php echo $absen->bulan ?>" readonly>
			<?php echo form_error('bulan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>NIP</label>
			<input type="text" name="nip" class="form-control" value="<?php echo $absen->nip ?>" readonly>
			<?php echo form_error('bulan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Nama Dosen</label>
			<input type="text" name="nama_dosen" class="form-control" value="<?php echo $absen->nama_dosen ?>" readonly>
			<?php echo form_error('nama_dosen', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control" value="<?php echo $absen->jenis_kelamin ?>" readonly>
				<option>Laki-Laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Hadir</label>
			<input type="text" name="hadir" class="form-control" value="<?php echo $absen->hadir ?>">
			<?php echo form_error('hadir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Sakit</label>
			<input type="text" name="sakit" class="form-control" value="<?php echo $absen->sakit ?>">
			<?php echo form_error('sakit', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Alpha</label>
			<input type="text" name="alpha" class="form-control" value="<?php echo $absen->alpha ?>">
			<?php echo form_error('alpha', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Update Data</button>
	</form>
	<?php endforeach; ?>
</div>