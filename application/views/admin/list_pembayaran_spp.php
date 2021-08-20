<div class="container-fluid">
	<div class="alert alert-success" role="alert">
        List Transaksi SPP
    </div>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
        </div>
        	<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomer Induk</th>
                                <th>Kelas</th>
                                <th>Bulan</th>
                                <th>Jumlah Bayar</th>
                                <th>Bayar</th>
                                <th>Kembalian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($spp as $s) : ?>
                            <tr>
                                <td width="20px"><?php echo $no++ ?></td>
                                <td><?php echo $s->nomer_induk ?></td>
                                <td><?php echo $s->kelas ?></td>
                                <td><?php echo $s->bulan ?></td>
                                <td><?php echo $s->jumlah_bayar ?></td>
                                <td><?php echo $s->bayar ?></td>
                                <td><?php echo $s->kembalian ?></td>
                                <td>
                                    <?php
                                        if('status == "Lunas"') {
                                            '<span class="badge rounded-pill bg-success"><?php echo $s->status ?></span>'
                                        }else{
                                            '<span class="badge rounded-pill bg-info"><?php echo $s->status ?></span>'
                                        } 
                                    ?>
                                </td>
                            </tr>    
						<?php endforeach; ?>      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>