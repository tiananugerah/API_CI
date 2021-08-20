<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Data Mata Pelajaran
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                	<?php echo $this->session->flashdata('pesan') ?>
                	<?php echo anchor('admin/mata_pelajaran/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Pelajaran</button>') ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Semester</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($mata_pelajaran as $matpel) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $matpel->nama_matkul ?></td>
                                <td><?php echo $matpel->semester ?></td>
                                <td width="20px"><?php echo anchor('admin/mata_pelajaran/update/'.$matpel->kode_matkul, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/mata_pelajaran/delete/'.$matpel->kode_matkul, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>