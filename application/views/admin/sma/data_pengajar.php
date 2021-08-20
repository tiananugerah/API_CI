<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Data Pengajar
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <?php echo anchor('admin/pengajar/tambah_pengajar', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Pengajar</button>') ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($dosen as $ds) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $ds->nomer_induk ?></td>
                                <td><?php echo $ds->nama_dosen ?></td>
                                <td><?php echo $ds->alamat ?></td>
                                <td width="20px"><?php echo anchor('admin/pengajar/detail/'.$ds->id_pengajar, '<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/pengajar/update/'.$ds->id_pengajar, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/pengajar/delete/'.$ds->id_pengajar, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>