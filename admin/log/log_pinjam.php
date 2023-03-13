<section class="content-header">
	<h1 style="text-align:center;">
		Riwayat Peminjaman Buku
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
		<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Buku</th>
							<th>Peminjam</th>
							<th>Tgl Peminjaman</th>
						</tr>
					</thead>
					<tbody>

						<?php
                  $no = 1;
                  $sql = $koneksi->query("SELECT b.judul_buku, a.id_anggota, a.nama, l.tgl_pinjam
                  from log_pinjam l inner join tb_buku b on l.id_buku=b.id_buku
				  inner join tb_anggota a on l.id_anggota=a.id_anggota order by tgl_pinjam asc");
                  while ($data= $sql->fetch_assoc()) {
                ?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['judul_buku']; ?>
							</td>
							<td>
								<?php echo $data['id_anggota']; ?>
								-
								<?php echo $data['nama']; ?>
							</td>
							<td>
								<?php  $tgl = $data['tgl_pinjam']; echo date("d/M/Y", strtotime($tgl))?>
							</td>
						</tr>
						<?php
                  }
                ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</section>