<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Form Edit Mata Pelajaran
    </div>

    <?php foreach ($mata_pelajaran as $mk) : ?>

    	<form method="post" action="<?php echo base_url('admin/mata_pelajaran/do_update') ?>">
    		
    		<div class="form-group">
    			<label>NAMA MATA PELAJARAN</label>
    			<input type="hidden" name="kode_matkul" class="form-control" value="<?php echo $mk->kode_matkul ?>">
				<input type="text" name="nama_matkul" class="form-control" value="<?php echo $mk->nama_matkul ?>">
    		</div>
    		<div class="form-group">
    			<label>TINGKATAN</label>
				<input type="text" name="tingkatan" class="form-control" value="<?php echo $mk->tingkatan ?>">
    		</div>
    		<div class="form-group">
    			<label>SEMESTER</label>
				<input type="text" name="semester" class="form-control" value="<?php echo $mk->semester ?>">
    		</div>

    		<button type="submit" class="btn btn-primary">Update Data</button>

    	</form>

    <?php endforeach; ?>



</div>