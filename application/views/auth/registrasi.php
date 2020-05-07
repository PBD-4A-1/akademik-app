<div class="container">

	<div class="row justify-content-center">
		<div class="col-6">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->

					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
						</div>
						<form class="user" method="POST" action="<?= base_url('auth/registrasi'); ?>">
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= set_value('nama'); ?>"
									placeholder="Nama Lengkap">
								<?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> 
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="username" name="username" value="<?= set_value('username'); ?>"
									placeholder="Username">
								<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?> 
							</div>
							<div class="form-group">
								<input type="email" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>"
									placeholder="Email">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?> 
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user" id="password1" name="password1"
										placeholder="Password">
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?> 
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user" id="password2" name="password2"
										placeholder="Ulangi Password">
								</div>
							</div>
							<button type="submit" class="btn btn-warning btn-user btn-block">
								Registrasi
							</button>
						</form>
						<hr>

            <!-- Lupa Password
						<div class="text-center">
							<a class="small" href="<?php // = base_url();?>auth/lupa">Lupa Password?</a>
						</div>
            -->

						<div class="text-center">
							<a class="small" href="<?= base_url(); ?>">Sudah memiliki akun? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
