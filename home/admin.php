<?php
	$sql = $koneksi->query("SELECT count(id_buku) as buku from tb_buku");
	while ($data= $sql->fetch_assoc()) {
	
		$buku=$data['buku'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_anggota) as agt from tb_anggota");
	while ($data= $sql->fetch_assoc()) {
	
		$agt=$data['agt'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_sk) as pin from tb_sirkulasi where status='PIN'");
	while ($data= $sql->fetch_assoc()) {
	
		$pin=$data['pin'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_sk) as kem from tb_sirkulasi where status='KEM'");
	while ($data= $sql->fetch_assoc()) {
	
		$kem=$data['kem'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_sk) as kem from tb_sirkulasi where status='KEM'");
	while ($data= $sql->fetch_assoc()) {
	
		$kem=$data['kem'];
	}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard  Administrator
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-blue">
				<div class="inner">
					<h4>
						<?= $buku; ?>
					</h4>

					<p>Buku</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="?page=MyApp/data_buku" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h4>
						<?= $buku; ?>
					</h4>

					<p>Anggota</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="?page=MyApp/data_agt" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h4>
						<?= $pin; ?>
					</h4>

					<p>Sirkulasi yang sedang berjalan</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="?page=data_sirkul" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h4>
						<?= $kem; ?>
					</h4>

					<p>Laporan Sirkulasi</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="?page=log_kembali" class="small-box-footer">More info
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>