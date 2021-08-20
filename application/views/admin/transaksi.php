<div class="container-fluid">
	<div class="card text-white mb-3" style="max-width: 18rem;">
  		<div class="card-header bg-danger"></div>
  			<div class="card-body">
    			<h6 class="card-title text-dark">Total Tunggakan:</h6>
    				<h5 class="card-text text-dark">Rp. <?php echo $mhs_tunggakan ?></h5>
  			</div>
		</div>
	</div>
	<hr>

	<h5 class="ml-4"><i class="fas fa-money-check-alt"></i> List Pembayaran</h5>
<div class="row">
  <div class="col-sm-6 ml-4" style="max-width: 18rem;">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">NIM: <?php echo $mhs_nim ?></h6>
        <h6 class="card-title">Nama: <?php echo $mhs_nama ?></h6>
      </div>
    </div>
  </div>
  <div class="col-sm-6" style="max-width: 50rem;">
    <div class="card">
      <div class="card-body">
        
      	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Pembayaran</th>
                        <th>Bulan</th>
                        <th>Jumlah Tunggakan</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                		$no = 1;
                		foreach($mhs_data as $t) : ?>
                		<tr>
                			<td width="20px"><?php echo $no++ ?></td>
                			<td><?php echo $t->jenis_pembayaran ?></td>
                			<td><?php echo $t->bulan ?></td>
                			<td><?php echo $t->jumlah_tunggakan ?></td>
                			<td></td>
                			<td>
                        <span class="badge rounded-pill bg-warning text-white"><?php echo $t->status ?></span>
                      </td>
                			<td width="20px">
                				<?php echo anchor('mahasiswa/transaksi/pembayaran/'.$t->id_tunggakan, '<div class="btn btn-sm btn-success">Bayar</div>') ?>
                			</td>
                		</tr> 
                	<?php endforeach; ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>