<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
		Pengguna Sistem
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="index.php">
				<i class="fa fa-home"></i>
				<b>Si Tabsis</b>
			</a>
		</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Pengguna</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove">
							<i class="fa fa-remove"></i>
						</button>
					</div>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body">

						<div class="form-group">
							<input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['id_pengguna']; ?>"
							 readonly/>
						</div>

						<div class="form-group">
							<label>Nama Pengguna</label>
							<input class="form-control" name="nama_pengguna" value="<?php echo $data_cek['nama_pengguna']; ?>"
							/>
						</div>

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" name="username" value="<?php echo $data_cek['username']; ?>"
							/>
						</div>

						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="password" id="pass" value="<?php echo $data_cek['password']; ?>"
							/>
							<input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
						</div>

						<div class="form-group">
							<label>Level</label>
							<select name="level" id="level" class="form-control" required>
								<option value="">-- Pilih Level --</option>
								<?php
                            //menhecek data yg dipilih sebelumnya
                           
                            if ($data_cek['level'] == "Administrator") echo "<option value='Administrator' selected>Administrator</option>";
                            else echo "<option value='Administrator'>Administrator</option>";

                            if ($data_cek['level'] == "Petugas") echo "<option value='Petugas' selected>Petugas</option>";
                            else echo "<option value='Petugas'>Petugas</option>";
        
                        ?>
							</select>
						</div>

					</div>
					<!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" name="Ubah" value="Ubah" class="btn btn-success">
						<a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-warning">Batal</a>
					</div>
				</form>
			</div>
			<!-- /.box -->
</section>

<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_pengguna SET
        nama_pengguna='".$_POST['nama_pengguna']."',
        username='".$_POST['username']."',
        password='".md5($_POST['password'])."',
        level='".$_POST['level']."'
        WHERE id_pengguna='".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_pengguna';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = 'index.php?page=MyApp/data_pengguna';
          }
      })</script>";
    }

    //selesai proses ubah
}

?>

<script type="text/javascript">
        function change()
        {
        var x = document.getElementById('pass').type;

        if (x == 'password')
        {
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML;
        }
        else
        {
            document.getElementById('pass').type = 'password';
            document.getElementById('mybutton').innerHTML;
        }
        }
    </script>