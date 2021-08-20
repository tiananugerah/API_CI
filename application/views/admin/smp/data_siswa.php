<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Data Siswa
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <?php echo anchor('admin/sekolah_menengah_pertama/tambah_siswa', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Siswa</button>') ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($pelajar as $mhs) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $mhs->nama_lengkap ?></td>
                                <td><?php echo $mhs->alamat ?></td>
                                <td><?php echo $mhs->email ?></td>
                                <td width="20px"><?php echo anchor('admin/siswa/detail/'.$mhs->id, '<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/siswa/update/'.$mhs->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/siswa/delete/'.$mhs->id, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>