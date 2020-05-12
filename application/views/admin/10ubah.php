<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Basic Card Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $halaman; ?></h6>
		</div>
		<div class="card-body">
			<form action="" method="POST">
				<input type="hidden" name="idprodi" value="<?= $akademik['idprodi']; ?>">

				<div class="form-group">
					<label for="kdprodi">Kode Program Studi</label>
					<input type="number" class="form-control" name="kdprodi" id="kdprodi"
						value="<?= $akademik['kdprodi']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('kdprodi'); ?></small>
				</div>

				<div class="form-group">
					<label for="nmprodi">Nama Program Studi</label>
					<input type="text" class="form-control" name="nmprodi" id="nmprodi"
						value="<?= $akademik['nmprodi']; ?>">
					<small class="form-text text-danger ml-1"><?= form_error('nmprodi'); ?></small>
				</div>

				<div class="form-group">
					<label for="akreditasi">Akreditasi Program Studi</label>
					<select id="akreditasi" name="akreditasi" class="form-control">
						<?php foreach ($akreditasi as $akred) : ?>
						<option value="<?= $akred; ?>"><?= $akred; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<a href="<?=base_url(); ?>admin/prodi" class="btn btn-secondary float-right ml-1">Batal</a>
				<button type="submit" class="btn btn-primary float-right">Simpan</button>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

