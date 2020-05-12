<div class="container-fluid">

	<!-- Page Heading -->
	<div class="card mx-2 mt-2">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-grey-900"><?= $halaman; ?></h4>
		</div>
		<div class="card-body">
			<form method="POST" action="">
				<div class="row">
					<div class="col-md-4 justify-content-center">
						<div class="card-body text-center">
							<img src="<?= base_url('assets/') ?>img/user.png" class="img-profile" width="150px">
							<br><br>
							<button type="submit" class="btn input btn-primary mt-2" id="edit" name="edit" value="edit">
								Edit Profil
							</button>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label class="bmd-label-floating">Email</label>
                            <input type="text" class="form-control" value="<?= $user['email']; ?>" disabled>
                        </div>
                        
						<div class="form-group">
							<label class="bmd-label-floating">Username</label>
                            <input type="text" class="form-control" value="<?= $user['username']; ?>" 
                            <?php
                            $act = $this->input->post('edit');
                            if ($act == 'edit') {
                                echo $update;
                            } else {
                                echo $edit;
                            }
                            ?>>
                        </div>
                        
						<div class="form-group">
							<label class="bmd-label-floating">Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?= $user['nama']; ?>"
                            <?php
                            $act = $this->input->post('edit');
                            if ($act == 'edit') {
                                echo $update;
                            } elseif ($act == '') {
                                echo $edit;
                            }
                            ?>>
                        </div>
                        
					</div>
				</div>
                <button type="submit" class="btn input btn-primary pull-right float-md-right mt-2" id="edit" name="edit" value="cancel">Simpan Profil</button>
                <button href="<?= base_url(); ?>user" class="btn btn-outline-secondary pull-right float-md-right mt-2 mr-2">Batal</button>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
