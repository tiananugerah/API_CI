<div class="container-fluid">
	<?php foreach($dosen as $ds) : ?>
		<form method="post" action="<?php echo base_url('admin/dosen/do_update_dosen') ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label>NIP</label>
			<input type="hidden" name="id_pengajar" class="form-control" value="<?php echo $ds->id_pengajar ?>">
			<input type="text" name="nomer_induk" class="form-control" value="<?php echo $ds->nomer_induk ?>">
			<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>NAMA LENGKAP</label>
			<input type="text" name="nama_dosen" placeholder="Masukan Nama Lengkap" class="form-control" value="<?php echo $ds->nama_dosen ?>">
			<?php echo form_error('nama_dosen', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>ALAMAT</label>
			<input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control" value="<?php echo $ds->alamat ?>">
			<?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>JENIS KELAMIN</label>
			<select name="jenis_kelamin" class="form-control" value="<?php echo $ds->jenis_kelamin ?>">
				<option>Laki-Laki</option>
				<option>Perempuan</option>
			</select>
			<?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>EMAIL</label>
			<input type="text" name="email" placeholder="Masukan Email" class="form-control" value="<?php echo $ds->email ?>">
			<?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>TELEPON</label>
			<input type="text" name="telepon" placeholder="Masukan No. Telepon" class="form-control" value="<?php echo $ds->telepon ?>">
			<?php echo form_error('telepon', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<?php foreach($detail as $dt) ?>
			<img src="<?php echo base_url(). 'assets/uploads/'.$ds->photo ?>" style="width: 20%">
			<?php endforeach; ?><br>
			<label>FOTO</label>
			<input type="file" name="userfile">
		</div>

		<button type="submit" class="btn btn-primary">Edit Data</button>
		</form>
	
</div>