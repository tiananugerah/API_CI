<div class="container-fluid">
	<center class="mb-4">
		<h5><strong>DINAS PENDIDIKAN KOTA BANDUNG</strong></h5>
		<h4><strong>SDN 01 BANDUNG</strong></h4>
		<h6><strong>Alamat: Jl. Babakan Sari No.40, Bandung, Telp: 022314098, Fax: 022-345-09</strong></h6>
		<strong><hr></strong>
	</center>
	<center class="mb-4"><h5><strong>NILAI RAPOR SISWA</strong></h5></center>

	<table>
    	<tr>
    		<td><strong>Nomor Induk Siswa</strong></td>
    		<td>&nbsp;: <?php echo $nomer_induk ?></td>
    	</tr>

    	<tr>
    		<td><strong>Nama</strong></td>
    		<td>&nbsp;: <?php echo $nama_lengkap ?></td>
    	</tr>

    	<tr>
    		<td><strong>Kelas</strong></td>
    		<td>&nbsp;: <?php echo $kelas ?></td>
    	</tr>

    </table>

    <table class="table table-bordered table-hover table-striped">

    	<tr>
    		<th>NO</th>
    		<th>Mata Pelajaran</th>
    		<th>KKM</th>
    		<th colspan="2">Nilai</th>
    	</tr>

    	<?php
    		$no = 1;
    		foreach($list_nilai as $n) : ?>
    			<tr>
                    <td width="20px"><?php echo $no++ ?></td>
                    <td><?php echo $n->nama_matkul ?></td>
                    <td><?php echo $n->kkm ?></td>
                    <td><?php echo $n->nilai ?></td>
                </tr>
    	<?php endforeach; ?>
    </table>
</div>