<div class="container-fluid">
	<?php foreach($jadwal_kuliah as $jk) : ?>
		<form method="post" action="<?php echo base_url('admin/jadwal_kuliah/update_data') ?>">
		<div class="form-group">
			<input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $jk->id_jadwal ?>">
			<?php echo form_error('id_jadwal', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
    		<label>Nama Dosen</label>
				<select name="nama_dosen" class="form-control">
					<option><?php echo $jk->nama_dosen ?></option>
					<?php foreach ($dosen as $ds) : ?>
						<option value="<?php echo $ds->nama_dosen; ?>"><?php echo $ds->nama_dosen; ?></option>
					<?php endforeach; ?>
				</select>
    	</div>

    	<div class="form-group">
    		<label>Nama Prodi</label>
				<select name="nama_prodi" class="form-control">
					<option><?php echo $jk->nama_prodi ?></option>
					<?php foreach ($prodi as $prd) : ?>
						<option value="<?php echo $prd->nama_prodi; ?>"><?php echo $prd->nama_prodi; ?></option>
					<?php endforeach; ?>
				</select>
    	</div>

    	<div class="form-group">
    		<label>Nama Mata Kuliah</label>
				<select name="nama_matkul" class="form-control">
					<option><?php echo $jk->nama_matkul ?></option>
					<?php foreach ($mata_kuliah as $matkul) : ?>
						<option value="<?php echo $matkul->nama_matkul; ?>"><?php echo $matkul->nama_matkul; ?></option>
					<?php endforeach; ?>
				</select>
    	</div>

		<div class="form-group">
			<label>Ruangan</label>
			<input type="text" name="ruangan" class="form-control" value="<?php echo $jk->ruangan ?>">
			<?php echo form_error('ruangan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal</label>
			<input type="date" name="tanggal" class="form-control" value="<?php echo $jk->tanggal ?>">
			<?php echo form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Waktu Mulai</label>
			<input type="text" name="waktu_mulai" class="form-control" value="<?php echo $jk->waktu_mulai ?>">
			<?php echo form_error('waktu_mulai', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Waktu Akhir</label>
			<input type="text" name="waktu_akhir" class="form-control" value="<?php echo $jk->waktu_akhir ?>">
			<?php echo form_error('waktu_akhir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Update Data</button>
	</form>
	<?php endforeach; ?>
</div>