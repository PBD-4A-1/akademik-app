 <!-- Begin Page Content -->
 <div class="container-fluid">

 	<?php if ($this->session->flashdata('flash_data')) : ?>
 	<div class="row mt-3">
 		<div class="col">
 			<div class="alert alert-success alert-dismissible fade show" role="alert">
 				Data prodi <strong> berhasil </strong> <?= $this->session->flashdata('flash_data'); ?>.
 				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					<span aria-hidden="true">&times;</span>
 				</button>
 			</div>
 		</div>
 	</div>
 	<?php endif; ?>

 	<!-- DataTales Example -->
 	<div class="card shadow mb-4">
 		<form action="" method="POST">
 			<div class="card-header py-3">
 				<h5 class="m-0 font-weight-bold">Data Program Studi
 					<a href="<?= base_url(); ?>super_admin/tambah" class="btn btn-primary btn-sm mr-4 float-right">
 						<i class="fa fa-plus"></i>
 						Tambah Data
 					</a>
 					<button class="btn btn-sm" name="keyword"><i class="fa fa-redo"></i></button>

 					<div
 						class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
 						<div class="input-group input-group-sm">
 							<input type="text" class="form-control bg-gray-200 border-0 small"
 								placeholder="Cari data ..." name="keyword" aria-describedby="basic-addon2">
 							<div class="input-group-append">
 								<button class="btn btn-success btn-sm mr-2" type="submit">
 									<i class="fa fa-search"></i>
 								</button>
 							</div>
 						</div>
 					</div>
 				</h5>
 			</div>
 		</form>

 		<div class="card-body">
 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th width="50px" class="text-center">Kode</th>
 							<th width="500px" class="text-center">Program Studi</th>
 							<th width="200px" class="text-center">Aksi</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php foreach ($akademik as $a) : ?>
 						<tr>
 							<td class="text-center">
 								<?= $a['kdprodi']; ?>
 							</td>
 							<td>
 								<?= $a['nmprodi']; ?>
 							</td>
 							<td class="text-center">
 								<a href="<?= base_url(); ?>super_admin/detailHapus/<?= $a['idprodi']; ?>"
 									class="text btn btn-danger btn-sm mr-2" onclick="return"><i
 										class="fas fa-trash"></i> </a>
 								<a href="<?= base_url(); ?>super_admin/ubah/<?= $a['idprodi']; ?>"
 									class="text btn btn-success btn-sm mr-2" onclick="return"><i class="fas fa-edit">
 									</i></a>
 								<a href="<?= base_url(); ?>super_admin/detail/<?= $a['idprodi']; ?>"
 									class="text btn btn-primary btn-sm" onclick="return"><i class="fas fa-expand">
 									</i></a>
 							</td>
 						</tr>
 						<?php endforeach; ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
