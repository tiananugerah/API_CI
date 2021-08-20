<center>
	<legend><strong>MASUKAN NILAI AKHIR</strong></legend>
		<table>
			<tr>
				<td>Kode Mata Pelajaran</td>
				<td>: <?php echo $kode_matpel; ?></td>
			</tr>

			<tr>
				<td>Tingkat Pendidikan</td>
				<td>: <?php echo $kategori; ?></td>
			</tr>
		</table>
</center>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  + Input Nilai
</button>
<table class="table table-striped table-hover table-bordered mt-4">
	<tr>
		<td width="25px">NO</td>
		<td>NOMER INDUK</td>
		<td>NAMA</td>
		<td>NILAI</td>
	</tr>

	<?php 
		$no = 1;
		foreach ($list_nilai as $row) : ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->nomer_induk; ?></td>
				<td><?php echo $row->nama_lengkap; ?></td>
				<td width="25px"><input type="text" name="nilai[]" class="form-control" value="<?php echo $row->nilai; ?>" readonly></td>
			</tr>
		<?php endforeach; ?>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Nilai Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('admin/sekolah_menengah_pertama/simpan_nilai') ?>">
        	<div class="form-group">
				<label>Tahun Akademik / Semester</label>
				<?php
				$query = $this->db->query('SELECT id_tahunakademik, semester, CONCAT(tahun_akademik) AS thn_semester FROM tahun_akademik');

				$dropdowns = $query->result();

				foreach($dropdowns as $dropdown) {

					if($dropdown->semester == 1) {
						$tampilSemester = "Ganjil";
					}else{
						$tampilSemester = "Genap";
					}

					$dropdownList = [$dropdown->id_tahunakademik] = $dropdown->thn_semester . " " .$tampilSemester;
				}

				echo form_dropdown('id_tahunakademik',$dropdownList,'', 'class="form-control" id="id_tahunakademik"');  
				?>
			</div>

        	<div class="form-group">
        		<label>Nomer Induk</label>
        		<input type="text" name="nomer_induk" class="form-control">
        		<?php echo form_error('nomer_induk', '<div class="text-danger small ml-3">', '</div>') ?>
        	</div>

        	<div class="form-group">
        		<label>Kode Mata Pelajaran</label>
        		<input type="text" name="kode_matpel" class="form-control" value="<?php echo $kode_matpel; ?>" readonly>
        		<?php echo form_error('kode_matpel', '<div class="text-danger small ml-3">', '</div>') ?>
        	</div>

        	<div class="form-group">
        		<label>Nilai</label>
        		<input type="text" name="nilai" class="form-control">
        		<input type="hidden" name="kategori" class="form-control" value="<?php echo $kategori ?>">
        		<?php echo form_error('nilai', '<div class="text-danger small ml-3">', '</div>') ?>
        	</div>

        	<button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>