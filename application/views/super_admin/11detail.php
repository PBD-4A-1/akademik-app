<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Basic Card Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $halaman; ?></h6>
		</div>
		<div class="card-body">
			<div class="form-group">
				<label for="kdprodi">Kode Program Studi</label>
				<input type="number" class="form-control" name="kdprodi" id="kdprodi"
					value="<?= $akademik['kdprodi']; ?>" readonly>
			</div>

			<div class="form-group">
				<label for="nmprodi">Nama Program Studi</label>
				<input type="text" class="form-control" name="nmprodi" id="nmprodi" value="<?= $akademik['nmprodi']; ?>"
					readonly>
			</div>

			<div class="form-group">
				<label for="akreditasi">Akreditasi Program Studi</label>
				<input type="text" class="form-control" name="akreditasi" id="akreditasi"
					value="<?= $akademik['akreditasi']; ?>" readonly> 
			</div>

			<a href="<?=base_url(); ?>super_admin/prodi" class="btn btn-secondary float-right ml-1">Kembali</a>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
