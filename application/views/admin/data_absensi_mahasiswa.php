<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Data Absensi Mahasiswa</h1>
	</div>

	<div class="card mb-3">
  		<div class="card-header bg-danger text-white">
    		Filter Data Absensi Mahasiswa
  		</div>
  			<div class="card-body">
    			<form class="form-inline">
  					<div class="form-group mb-2">
    					<label for="staticEmail2">Bulan: </label>
    					<select class="form-control" name="bulan">
    						<option value="">--Pilih Bulan--</option>
    						<option value="01">Januari</option>
    						<option value="02">Februari</option>
    						<option value="03">Maret</option>
    						<option value="04">April</option>
    						<option value="05">Mei</option>
    						<option value="06">Juni</option>
    						<option value="07">Juli</option>
    						<option value="08">Agustus</option>
    						<option value="09">September</option>
    						<option value="10">Oktober</option>
    						<option value="11">November</option>
    						<option value="12">Desember</option>
    					</select>
  					</div>
  					
  					<div class="form-group mb-2 ml-5">
    					<label for="staticEmail2 ml-2">Tahun: </label>
    					<select class="form-control" name="bulan">
    						<option value="">--Pilih Tahun--</option>
    						<?php $tahun = date('Y'); 
    						for($i=2020;$i<$tahun+5;$i++) { ?>
    							<option value="<?php echo $i ?>"><?php echo $i ?></option>
    						<?php } ?>
    					</select>
  					</div>
    					<button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
				</form>
  			</div>
		</div>

		<?php
			if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']
			) && $_GET['tahun']!='')) {
				$bulan = $_GET['bulan'];
				$tahun = $_GET['tahun'];
				$bulantahun = $bulan.$tahun;
			}else{
				$bulan = date('m');
				$tahun = date('Y');
				$bulantahun = $bulan.$tahun;
			}  
		?>

		<div class="alert alert-info">
			Menampilkan Data Kehadiran Mahasiswa Bulan: <span class="font-weight-bold"><?php echo $bulan; ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun; ?></span>
		</div>

		<?php echo $this->session->flashdata('pesan') ?>
        <?php echo anchor('admin/data_absensi/input_absen_mahasiswa', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Input Absen</button>') ?>
		<table class="table table-bordered table-striped">
			<tr>
				<td class="text-center">NO</td>
				<td class="text-center">NIM</td>
				<td class="text-center">Nama Mahasiswa</td>
				<td class="text-center">Jenis Kelamin</td>
				<td class="text-center">Hadir</td>
				<td class="text-center">Sakit</td>
				<td class="text-center">Alpha</td>
				<td class="text-center" colspan="2">Aksi</td>
			</tr>
			<?php $no=1; foreach($absen as $a) : ?>
				<tr>
					<td class="text-center"><?php echo $no++ ?></td>
					<td class="text-center"><?php echo $a->nim ?></td>
					<td class="text-center"><?php echo $a->nama_lengkap ?></td>
					<td class="text-center"><?php echo $a->jenis_kelamin ?></td>
					<td class="text-center"><?php echo $a->hadir ?></td>
					<td class="text-center"><?php echo $a->sakit ?></td>
					<td class="text-center"><?php echo $a->alpha ?></td>
					<td width="20px"><?php echo anchor('admin/data_absensi/update_mahasiswa/'.$a->id_kehadiran, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
                    <td width="20px"><?php echo anchor('admin/data_absensi/delete_mahasiswa/'.$a->id_kehadiran, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>