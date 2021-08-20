<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Tahun Akademik
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                	<?php echo $this->session->flashdata('pesan') ?>
                	<?php echo anchor('admin/tahun_akademik/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Tahun Akademik</button>') ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($tahun_akademik as $ak) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $ak->tahun_akademik ?></td>
                                <td><?php echo $ak->semester ?></td>
                                <td><?php echo $ak->status ?></td>
                                <td width="20px"><?php echo anchor('admin/tahun_akademik/update/'.$ak->id_tahunakademik, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/tahun_akademik/delete/'.$ak->id_tahunakademik, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>