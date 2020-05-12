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
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>">
					<small class="form-text text-danger ml-1"><?= form_error('username'); ?></small>
				</div>

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>">
					<small class="form-text text-danger ml-1"><?= form_error('nama'); ?></small>
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
					<small class="form-text text-danger ml-1"><?= form_error('email'); ?></small>
				</div>

				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
					<label for="email">Password</label>
						<input type="password" class="form-control form-control-user" id="password1" name="password1">
						<?= form_error('password1', '<small class="text-danger ml-1">', '</small>'); ?>
					</div>
					<div class="col-sm-6">
					<label for="email">Ulangi Password</label>
						<input type="password" class="form-control form-control-user" id="password2" name="password2">
					</div>
				</div>

				<div class="form-group">
					<label for="jenisuser">Jenis User</label>
					<select id="jenisuser" name="jenisuser" class="form-control">
						<option value="1">1 - Bisa Edit</option>
						<option value="0" selected>0 - Tidak Bisa Edit</option>
					</select>
				</div>

				<div class="form-group">
					<label for="level">Level</label>
					<select id="level" name="level" class="form-control">
						<option value="11">11 - Super Admin</option>
						<option value="10">10 - Admin</option>
						<option value="00" selected>00 - User</option>
					</select>
				</div>

				<a href="<?= base_url(); ?>super_admin/user"
					class="btn btn-outline-secondary float-right  ml-2">Kembali</a>
				<button type="submit" class="btn btn-primary float-right">Tambah Data</button>

			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
