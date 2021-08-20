<div class="container-fluid">
	<form method="post" action="<?php echo base_url('admin/jadwal_belajar/input_jadwal_aksi') ?>">
		<div class="form-group">
			<label>Nama Pengajar</label>
			<select name="nama_pengajar" class="form-control">
				<option value="">-- Nama Pengajar --</option>
				<?php foreach($pengajar as $p) : ?>
					<option value="<?php echo $p->nama_dosen ?>"><?php echo $p->nama_dosen ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('nama_pengajar', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Mata Pelajaran</label>
			<select name="mata_pelajaran" class="form-control">
				<option value="">-- Pilih Mata Pelajaran --</option>
				<?php foreach($mata_pelajaran as $matkul) : ?>
					<option value="<?php echo $matkul->nama_matkul ?>"><?php echo $matkul->nama_matkul ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('mata_pelajaran', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Ruangan</label>
			<input type="text" name="ruangan" class="form-control">
			<?php echo form_error('ruangan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Tanggal</label>
			<input type="date" name="tanggal" class="form-control">
			<?php echo form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Waktu Mulai</label>
			<input type="text" name="waktu_mulai" class="form-control">
			<?php echo form_error('waktu_mulai', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Waktu Akhir</label>
			<input type="text" name="waktu_akhir" class="form-control">
			<?php echo form_error('waktu_akhir', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<div class="form-group">
			<label>Tingkatan</label>
			<input type="text" name="tingkatan" class="form-control">
			<?php echo form_error('tingkatan', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan Data</button>
	</form>
</div>