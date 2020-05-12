<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Basic Card Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $halaman; ?></h6>
		</div>
		<div class="card-body">
			<form action="" method="POST">
				<input type="hidden" name="idmhs" value="<?= $mhs['idmhs']; ?>">

				<div class="form-group">
					<label for="npm">NPM</label>
					<input type="number" class="form-control" name="npm" id="npm" value="<?= $mhs['npm']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('npm'); ?></small>
				</div>

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" value="<?= $mhs['nama']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('nama'); ?></small>
				</div>
				
				<div class="form-group">
					<label for="idprodi">ID Program Studi</label>
					<input type="text" class="form-control" name="idprodi" id="idprodi" value="<?= $mhs['idprodi']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('idprodi'); ?></small>
				</div>

				<a href="<?=base_url(); ?>super_admin/mhs" class="btn btn-secondary float-right ml-1">Batal</a>
				<button type="submit" class="btn btn-primary float-right">Simpan</button>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

