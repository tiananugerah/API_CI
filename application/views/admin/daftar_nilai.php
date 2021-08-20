<?php
	$nilai = get_instance();
	$nilai->load->model('model_krs');
	$nilai->load->model('model_mahasiswa');
	$nilai->load->model('model_matkul');
	// $nilai->load->model('model_tahunakademik');

	$krs = $nilai->model_krs->get_by_id($id_krs[0]);
	$kode_matkul = $krs->kode_matkul;
	$id_tahunakademik = $krs->id_tahunakademik;  
?>

<div class="container-fluid">
	<div class="alert alert-success">
		<i class="fas fa-university"></i> DAFTAR NILAI MAHASISWA
	</div>

	<center>
		<legend><strong>DAFTAR NILAI MAHASISWA</strong></legend>
		<table>
			<tr>
				<td>Kode Mata Kuliah</td>
				<td>: <?php echo $kode_matkul; ?></td>
			</tr>

			<tr>
				<td>Nama Mata Kuliah</td>
				<td>: <?php echo $nilai->model_matkul->get_by_id($kode_matkul)->nama_matkul; ?></td>
			</tr>

			<tr>
				<td>SKS</td>
				<td>: <?php echo $nilai->model_matkul->get_by_id($kode_matkul)->sks; ?></td>
			</tr>
		</table>
	</center>

	<table class="table table-hover table-bordered table-striped mt-4">
		<tr>
			<td>NO</td>
			<td>NIM</td>
			<td>NAMA LENGKAP</td>
			<td>NILAI</td>
		</tr>

		<?php
		$no = 1;
		for($i=0; $i<sizeof($id_krs); $i++)
		{  
		?>

			<tr>
				<td><?php echo $no++ ?></td>
				<?php $nim = $nilai->model_krs->get_by_id($id_krs[$i])->nim; ?>
				<td><?php echo $nim; ?></td>
				<td><?php echo $nilai->model_mahasiswa->get_by_id($nim)->nama_lengkap ?></td>
				<td><?php echo $nilai->model_krs->get_by_id($id_krs[$i])->nilai ?></td>
			</tr>

		<?php } ?>
	</table>
</div>