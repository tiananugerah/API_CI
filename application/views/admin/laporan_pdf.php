<!DOCTYPE html>
<html><head>
    <title></title>
</head><body>
    <table>
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>NAMA MATA KULIAH</th>
            <th>SKS</th>
            <th>NILAI</th>
        </tr>

        <?php  
            $no = 1;
            $jumlahSks = 0;
            foreach($listnilai as $ln) : ?>
                <tr>
                    <td width="20px"><?php echo $no++ ?></td>
                    <td><?php echo $ln->kode_matkul ?></td>
                    <td><?php echo $ln->nama_matkul ?></td>
                    <td>
                        <?php echo $ln->sks;
                                        $jumlahSks+=$ln->sks; ?>
                    </td>
                    <td><?php echo $ln->nilai ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body></html>