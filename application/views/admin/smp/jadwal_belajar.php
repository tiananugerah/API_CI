<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Jadwal Belajar
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                	<?php echo $this->session->flashdata('pesan') ?>
                	<?php echo anchor('admin/jadwal_belajar/input_jadwal', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Jadwal Belajar</button>') ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengajar</th>
                                <th>Mata Pelajaran</th>
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Akhir</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal_belajar as $jb) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $jb->nama_pengajar ?></td>
                                <td><?php echo $jb->mata_pelajaran ?></td>
                                <td><?php echo $jb->ruangan ?></td>
                                <td><?php echo $jb->tanggal ?></td>
                                <td><?php echo $jb->waktu_mulai ?></td>
                                <td><?php echo $jb->waktu_akhir ?></td>
                                <td width="20px"><?php echo anchor('admin/jadwal_belajar/update/'.$jb->id_jadwal, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/jadwal_belajar/delete/'.$jb->id_jadwal, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>