<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Basic Card Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $halaman; ?></h6>
		</div>
		<div class="card-body">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" value="<?= $datauser['username']; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control" name="nama" id="nama" value="<?= $datauser['nama']; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email" value="<?= $datauser['email']; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="jenisuser">Jenis User</label>
				<input type="text" class="form-control" name="jenisuser" id="jenisuser"
					value="<?= $datauser['jenisuser']; ?>" readonly>
			</div>
			
			<div class="form-group">
				<label for="level">Level User</label>
				<input type="text" class="form-control" name="level" id="level"
					value="<?= $datauser['level']; ?>" readonly>
			</div>

			<a href="<?=base_url(); ?>super_admin/user" class="btn btn-secondary float-right ml-1">Kembali</a>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
