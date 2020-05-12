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
					<input type="text" class="form-control" name="username" id="username" value="<?= $datauser['username']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('username'); ?></small>
				</div>

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" value="<?= $datauser['nama']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('nama'); ?></small>
				</div>
				
                <div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?= $datauser['email']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('email'); ?></small>
				</div>

				<div class="form-group">
					<label for="jenisuser">Jenis User</label>
					<select id="jenisuser" name="jenisuser" class="form-control">
						<?php foreach ($ju as $j) : ?>
						<option value="<?= $j; ?>"><?= $j; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
                <div class="form-group">
					<label for="level">Level User</label>
					<select id="level" name="level" class="form-control">
						<?php foreach ($level as $lv) : ?>
						<option value="<?= $lv; ?>"><?= $lv; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<a href="<?= base_url(); ?>super_admin/user" class="btn btn-outline-secondary float-right  ml-2">Kembali</a>
				<button type="submit" class="btn btn-primary float-right">Simpan</button>				
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
