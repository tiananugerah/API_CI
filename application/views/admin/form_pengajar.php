<div class="container-fluid">

	<form method="post" action="<?php echo base_url('admin/dosen/tambah_dosen_aksi') ?>" enctype="multipart/form-data">

		<div class="form-group">
			<label>NIP</label>
			<input type="text" name="nomer_induk" class="form-control">
			<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>NAMA LENGKAP</label>
			<input type="text" name="nama_dosen" placeholder="Masukan Nama Lengkap" class="form-control">
			<?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>ALAMAT</label>
			<input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control">
			<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>JENIS KELAMIN</label>
			<select name="jenis_kelamin" class="form-control">
				<option value="">-- Pilih Jenis Kelamin --</option>
				<option>Laki-Laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>EMAIL</label>
			<input type="text" name="email" placeholder="Masukan Email" class="form-control">
			<?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>TELEPON</label>
			<input type="text" name="telepon" placeholder="Masukan No. Telepon" class="form-control">
			<?php echo form_error('telepon', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>FOTO</label>
			<input type="file" name="photo">
		</div>

		<button type="submit" class="btn btn-primary">Simpan Data</button>
		</form>
</div>