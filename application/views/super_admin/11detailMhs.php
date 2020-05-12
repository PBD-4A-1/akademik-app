<!-- Begin Page Content -->
<div class="container-fluid">
	
	<!-- Basic Card Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $halaman; ?></h6>
		</div>
		<div class="card-body">
			<form action="" method="POST">

				<div class="form-group">
					<label for="npm">NPM</label>
					<input type="number" class="form-control" name="npm" id="npm" value="<?= $mhs['npm'] ?>" readonly>
				</div>

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" value="<?= $mhs['nama'] ?>" readonly>
				</div>
				
				<div class="form-group">
					<label for="idprodi">ID Program Studi</label>
					<input type="text" class="form-control" name="idprodi" id="idprodi" value="<?= $mhs['idprodi'] ?>" readonly>
				</div>

				<a href="<?= base_url(); ?>super_admin/mhs" class="btn btn-outline-secondary float-right  ml-2">Kembali</a>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
