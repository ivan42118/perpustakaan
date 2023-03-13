<section class="content-header">
	<h1 style="text-align:center;">
		Laporan Sirkulasi
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Perpustakaan</b>
			</a>
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
		<a href="?page=MyApp/print_laporan" title="Print" class="btn btn-success" stlye="color : green;">
				<i class="glyphicon glyphicon-print"></i>Print</a>
		</div>
		<!-- /.box-header -->

		
		<div class="box-body">
			<div class="table-responsive">
			
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID SKL</th>
							<th>Buku</th>
							<th>Peminjam</th>
							<th>Tgl Pinjam</th>
							<th>Jatuh Tempo</th>
							<th>Tgl dikembalikan</th>
							<th>Denda</th>
							
						</tr>
					</thead>
				<tbody>

				<?php

                $sql=mysqli_query($koneksi,"SELECT tb_sirkulasi.id_buku, 
				tb_buku.judul_buku, 
				tb_anggota.id_anggota,
				tb_anggota.nama,
				tb_sirkulasi.id_sk,
				tb_sirkulasi.tgl_pinjam,
				tb_sirkulasi.tgl_kembali,
				tb_sirkulasi.tgl_dikembalikan,
                  	if(datediff(now( ) , tb_sirkulasi.tgl_kembali)<=0,0,datediff(now( ) , tb_sirkulasi.tgl_kembali) ) telat_pengembalian FROM tb_sirkulasi 
					JOIN tb_anggota ON tb_anggota.id_anggota=tb_sirkulasi.id_anggota 
					JOIN tb_buku ON tb_buku.id_buku=tb_sirkulasi.id_buku where tb_sirkulasi.status='KEM'
					Order By id_anggota");
				$no =null;
				$total_denda=null;
				$tarif_denda=1000;
                while ($data=mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
					$no++;
					$total_denda=$total_denda+($data['telat_pengembalian']*$tarif_denda);
					echo '<tr>
						<td>'.$no.'</td>
						<td>'.$data['id_sk'].'</td>
						<td>'.$data['judul_buku'].'</td>
				
						<td>'.$data['nama'].'</td>
						<td>'.date_format(new DateTime($data['tgl_pinjam']),'d/M/Y').'</td>
						<td>'.date_format(new DateTime($data['tgl_kembali']),'d/M/Y').'</td>
						<td>'.date_format(new DateTime($data['tgl_dikembalikan']),'d/M/Y').'</td>
						<td>Rp. '.number_format($data['telat_pengembalian']*$tarif_denda,0,',','.').'</td>
						</tr>';
				}
				?>
				<tr>
					<th colspan="8" style="text-align:right; padding-right:0.90cm;">
					Total Denda Rp. <?php echo number_format($total_denda,0,',','.');?>
					</th>
				
				</tr>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>

