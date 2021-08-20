<div class="container-fluid">
	<div class="card text-white mb-3" style="max-width: 18rem;">
  		<div class="card-header bg-danger"></div>
  			<div class="card-body">
    			<h6 class="card-title text-dark">Total Tunggakan:</h6>
    				<h5 class="card-text text-dark">Rp. <?php echo number_format($s_tunggakan) ?></h5>
  			</div>
		</div>
	</div>
	<hr>

	<h5 class="ml-4"><i class="fas fa-money-check-alt"></i> List Pembayaran</h5>
<div class="row">
  <div class="col-sm-6 ml-4" style="max-width: 18rem;">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Nomer Induk: <?php echo $s_nomer_induk ?></h6>
        <h6 class="card-title">Nama: <?php echo $s_nama ?></h6>
        <h6 class="card-title">Kelas: <?php echo $s_kelas ?></h6>
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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                		$no = 1;
                		foreach($s_data as $t) : ?>
                		<tr>
                			<td width="20px"><?php echo $no++ ?></td>
                			<td><?php echo $t->jenis_pembayaran ?></td>
                			<td><?php echo $t->bulan ?></td>
                			<td>Rp. <?php echo number_format($t->jumlah_tunggakan) ?></td>
                      <td>
                        <?php if($t->status == "Belum Lunas" ) : ?>
                          <span class="badge rounded-pill bg-warning text-white"><?php echo $t->status ?></span>
                        <?php elseif($t->status == "Sudah Lunas") : ?>
                          <span class="badge rounded-pill bg-success text-white"><?php echo $t->status ?></span>
                        <?php endif; ?>
                      </td>
                      </td>
                			<td width="20px">
                				<?php echo anchor('admin/sekolah_menengah_pertama/pembayaran/'.$t->id_tunggakan, '<div class="btn btn-sm btn-info">Bayar</div>') ?>
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