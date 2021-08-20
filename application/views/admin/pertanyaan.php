<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Tabel Pertanyaan Tes Minat dan Bakat
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                	<?php echo $this->session->flashdata('pesan') ?>
                	<?php echo anchor('admin/minat_bakat/input_pertanyaan', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Pertanyaan</button>') ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Pilihan 1</th>
                                <th>Pilihan 2</th>
                                <th>Pilihan 3</th>
                                <th>Pilihan 4</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($pertanyaan as $p) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $p->pertanyaan ?></td>
                                <td>A. <?php echo $p->pilihan_a ?></td>
                                <td>B. <?php echo $p->pilihan_b ?></td>
                                <td>C. <?php echo $p->pilihan_c ?></td>
                                <td>D. <?php echo $p->pilihan_d ?></td>
                                <td width="20px"><?php echo anchor('admin/minat_bakat/edit_data/'.$p->no_pertanyaan, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/minat_bakat/delete/'.$p->no_pertanyaan, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>