<div class="container-fluid">
	<table class="table table-hover table-bordered table-striped">
		<?php foreach($detail as $dt) : ?>
			<img class="mb-4" src="<?php echo base_url('assets/uploads/').$dt->pas_photo ?>" style="width: 20%">
			<tr>
				<td>NOMER INDUK:</td>
				<td><?php echo $dt->nomer_induk; ?></td>
			</tr>

			<tr>
				<td>KELAS:</td>
				<td><?php echo $dt->kelas; ?></td>
			</tr>

			<tr>
				<td>NAMA LENGKAP:</td>
				<td><?php echo $dt->nama_lengkap; ?></td>
			</tr>

			<tr>
				<td>ALAMAT:</td>
				<td><?php echo $dt->alamat; ?></td>
			</tr>

			<tr>
				<td>EMAIL:</td>
				<td><?php echo $dt->email; ?></td>
			</tr>

			<tr>
				<td>TELEPON:</td>
				<td><?php echo $dt->telepon; ?></td>
			</tr>

			<tr>
				<td>TEMPAT LAHIR:</td>
				<td><?php echo $dt->tempat_lahir; ?></td>
			</tr>

			<tr>
				<td>TANGGAL LAHIR:</td>
				<td><?php echo $dt->tgl_lahir; ?></td>
			</tr>

			<tr>
				<td>JENIS KELAMIN:</td>
				<td><?php echo $dt->jenis_kelamin; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<?php echo anchor('admin/siswa','<div class="btn btn-sm btn-primary">Kembali</div>') ?>
	<br><br><br>
</div>