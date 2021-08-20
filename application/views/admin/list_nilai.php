<div class="container-fluid">
    <center class="mb-4">
    	<legend class="mt-3"><strong>HASIL NILAI AKHIR SEMESTER</strong></legend>
    </center>

    <?php echo anchor('admin/cetak_nilai/print_nilai/'.$kode_matpel.'', '<button class="btn btn-sm btn-info mb-3"><i class="fas fa-print fa-sm"></i> Print Nilai</button>') ?>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>NO</th>
            <th>NOMER INDUK</th>
            <th>NAMA</th>
            <th>MATA PELAJARAN</th>
            <th>NILAI</th>
        </tr>

        <?php  
            $no = 1;
            foreach($list_nilai as $n) : ?>
                <tr>
                    <td width="20px"><?php echo $no++ ?></td>
                    <td><?php echo $n->nomer_induk ?></td>
                    <td><?php echo $n->nama_lengkap ?></td>
                    <td><?php echo $n->nama_matkul ?></td>
                    <td><?php echo $n->nilai ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</div>