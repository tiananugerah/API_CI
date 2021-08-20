<div class="container-fluid">
	<?php foreach($pelajar as $mhs) : ?>
		<form method="post" action="<?php echo base_url('admin/siswa/do_update_siswa') ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label>NOMER INDUK</label>
			<input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id ?>">
			<input type="text" name="nomer_induk" class="form-control" value="<?php echo $mhs->nomer_induk ?>">
			<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>KELAS</label>
			<select name="kelas" class="form-control">
				<option value=""><?php echo $mhs->kelas ?></option>
				<?php foreach($kelas as $k) : ?>
					<option value="<?php echo $k->kelas ?> / <?php echo $k->rombel ?>"><?php echo $k->kelas ?> / <?php echo $k->rombel ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>NAMA LENGKAP</label>
			<input type="text" name="nama_lengkap" placeholder="Masukan Nama Lengkap" class="form-control" value="<?php echo $mhs->nama_lengkap ?>">
			<?php echo form_error('nama_dosen', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>ALAMAT</label>
			<input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control" value="<?php echo $mhs->alamat ?>">
			<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>EMAIL</label>
			<input type="text" name="email" placeholder="Masukan Email" class="form-control" value="<?php echo $mhs->email ?>">
			<?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>TELEPON</label>
			<input type="text" name="telepon" placeholder="Masukan No. Telepon" class="form-control" value="<?php echo $mhs->telepon ?>">
			<?php echo form_error('telepon', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>TEMPAT LAHIR</label>
			<input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control" value="<?php echo $mhs->tempat_lahir ?>">
			<?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>TANGGAL LAHIR</label>
			<input type="date" name="tgl_lahir" class="form-control" value="<?php echo $mhs->tgl_lahir ?>">
			<?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>JENIS KELAMIN</label>
			<select name="jenis_kelamin" class="form-control" value="<?php echo $mhs->jenis_kelamin ?>">
				<option>Laki-Laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>KATEGORI</label>
			<input type="text" name="kategori" class="form-control" value="<?php echo $mhs->kategori ?>">
			<?php echo form_error('kategori', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<?php foreach($detail as $dt) ?>
			<img src="<?php echo base_url(). 'assets/uploads/'.$mhs->pas_photo ?>" style="width: 20%">
			<?php endforeach; ?><br>
			<label>FOTO</label>
			<input type="file" name="userfile">
		</div>

		<button type="submit" class="btn btn-primary">Edit Data</button>
		</form>	
</div>