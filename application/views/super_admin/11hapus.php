
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Basic Card Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-danger"><?= $halaman; ?></h6>
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

			<a href="<?= base_url(); ?>super_admin/prodi" class="btn btn-primary float-right">Kembali</a>
			<a href="<?= base_url(); ?>super_admin/hapus/<?= $akademik['idprodi']; ?>" onclick="return" class="btn btn-outline-danger mr-2 float-right">Hapus</a>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
