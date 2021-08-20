<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Form Masuk Input Nilai
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <form method="post" action="<?php echo base_url('admin/sekolah_menengah_atas/input_nilai_aksi') ?>">
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
			<label>KODE MATA PELAJARAN</label>
			<input type="text" name="kode_matpel" class="form-control">
			<?php echo form_error('kode_matpel', '<div class="text-danger small ml-3">', '</div>') ?>
		</div>
		<button type="submit" class="btn btn-primary">Proses</button>
	</form>
</div>