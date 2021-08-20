<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        Data Kelas
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- <?php //echo anchor('admin/kelas/tambah_kelas', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Kelas</button>') ?> -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm"></i> Tambah Kelas</button>
                    <hr>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Rombel</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($kelas as $k) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $k->kelas ?></td>
                                <td><?php echo $k->rombel ?></td>
                                <td width="20px"><?php echo anchor('admin/kelas/update/'.$k->id_kategori_kelas, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                                <td width="20px"><?php echo anchor('admin/kelas/delete/'.$k->id_kategori_kelas, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Data Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('admin/kelas/tambah_kelas') ?>">
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control">
                <?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Rombel</label>
                <input type="text" name="rombel" class="form-control">
                <?php echo form_error('rombel', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control">
                <?php echo form_error('kategori', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>