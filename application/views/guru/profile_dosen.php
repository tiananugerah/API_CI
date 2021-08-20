<div class="container-fluid">
	<?php foreach($dosen as $ds) : ?>
		<center class="mb-4">
			<legend class="mt-3"><strong>PROFIL SAYA</strong></legend>
			<table>
				<img class="mb-4" src="<?php echo base_url('assets/uploads/').$ds->photo ?>" style="width: 20%">
				<tr>
					<td><strong>NIP</strong></td>
					<td>&nbsp;: <?php echo $ds->nip ?></td>
				</tr>

				<tr>
					<td><strong>NAMA</strong></td>
					<td>&nbsp;: <?php echo $ds->nama_dosen ?></td>
				</tr>

				<tr>
					<td><strong>ALAMAT</strong></td>
					<td>&nbsp;: <?php echo $ds->alamat ?></td>
				</tr>

				<tr>
					<td><strong>JENIS KELAMIN</strong></td>
					<td>&nbsp;: <?php echo $ds->jenis_kelamin ?></td>
				</tr>

				<tr>
					<td><strong>EMAIL</strong></td>
					<td>&nbsp;: <?php echo $ds->nip ?></td>
				</tr>

				<tr>
					<td><strong>TELEPON</strong></td>
					<td>&nbsp;: <?php echo $ds->telepon ?></td>
				</tr>
			</table>
		</center>
	<?php endforeach; ?>
</div>