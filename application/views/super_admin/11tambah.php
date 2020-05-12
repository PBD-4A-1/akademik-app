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
					<label for="id_petugas">Kode Program Studi</label>
					<input type="number" class="form-control" name="kdprodi" id="kd_prodi">
					<small class="form-text text-danger ml-1"><?= form_error('kdprodi'); ?></small>
				</div>

				<div class="form-group">
					<label for="nmprodi">Nama Program Studi</label>
					<input type="text" class="form-control" name="nmprodi" id="nmprodi">
					<small class="form-text text-danger ml-1"><?= form_error('nmprodi'); ?></small>
				</div>
				
				<div class="form-group">
					<label for="akreditasi">Akreditasi Program Studi</label>
					<select id="akreditasi" name="akreditasi" class="form-control">
						<option selected>-</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					</select>
				</div>

			
				<a href="<?= base_url(); ?>super_admin/prodi" class="btn btn-outline-secondary float-right  ml-2">Kembali</a>
				<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
