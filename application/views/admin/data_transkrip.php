<div class="container-fluid">
	<center>
		<legend><strong>TRANSKRIP NILAI</strong></legend>
		<table>
			<tr>
				<td>NIM</td>
				<td>: <?php echo $nim; ?></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td>: <?php echo $nama; ?></td>
			</tr>
		</table>
	</center>

	<?php echo anchor('admin/transkrip_nilai/print_transkrip/'.$nim.'', '<button class="btn btn-sm btn-info mb-3"><i class="fas fa-print fa-sm"></i> Cetak Transkrip Nilai</button>') ?>
	<table class="table table-striped table-hover table-bordered mt-3">
		<tr>
			<th>NO</th>
			<th>KODE MATA KULIAH</th>
			<th>NAMA MATA KULIAH</th>
			<th align="center">SKS</th>
			<th align="center">NILAI</th>
		</tr>

		<?php
		$no = 1;
		$JSks=0;
		$JSkor=0;

		foreach($transkrip as $tr) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $tr->kode_matkul ?></td>
				<td><?php echo $tr->nama_matkul ?></td>
				<td><?php echo $tr->sks ?></td>
				<td><?php echo skorNilai($tr->nilai,$tr->sks); ?></td>
				<?php
				$JSks+=$tr->sks;
				$JSkor+=skorNilai($tr->nilai,$tr->sks);  
				?>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td colspan="3">Jumlah</td>
			<td><?php echo $JSks ?></td>
			<td><?php echo $JSkor ?></td>
		</tr>
	</table>

<p>Indeks Prestasi Kumulatif : <?php echo number_format($JSks/$JSkor, 2) ?></p>
</div>