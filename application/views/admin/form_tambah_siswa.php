<div class="container-fluid">

	<form method="post" action="<?php echo base_url('admin/siswa/tambah_siswa_aksi') ?>" enctype="multipart/form-data">

		<div class="form-group">
			<label>NOMER INDUK</label>
			<input type="text" name="nomer_induk" class="form-control">
			<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>KELAS</label>
			<select name="kelas" class="form-control">
				<option value="">-- Pilih Kelas --</option>
				<?php foreach($kelas as $k) : ?>
					<option value="<?php echo $k->kelas ?> / <?php echo $k->rombel ?>"><?php echo $k->kelas ?> / <?php echo $k->rombel ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>NAMA LENGKAP</label>
			<input type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap" class="form-control">
			<?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>ALAMAT</label>
			<input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control">
			<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
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
			<label>TEMPAT LAHIR</label>
			<input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control">
			<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>TANGGAL LAHIR</label>
			<input type="date" name="tgl_lahir" class="form-control">
			<?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
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
			<label>FOTO</label>
			<input type="file" name="pas_photo">
		</div>

		<div class="form-group">
			<label>KATEGORI</label>
			<input type="text" name="kategori" placeholder="Masukan Kategori" class="form-control">
			<?php echo form_error('kategori', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan Data</button>
		</form>
</div>