<div class="container ">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-6">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Login</h1>
								</div>

								<?= $this->session->flashdata('flash_data'); ?>

								<form class="user" method="POST" action="<?= base_url('auth'); ?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="username" value="<?= set_value('username'); ?>"
											name="username" value="<?= set_value('username'); ?>"
											placeholder="Username">
										<?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" value="<?= set_value('password'); ?>"
											name="password" placeholder="Password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<button type="submit" class="btn btn-warning btn-user btn-block font-weight-bold">
										Login
									</button>
								</form>
								<hr>

								<!-- Lupa Password
								<div class="text-center">
									<a class="small" href="<?php // = base_url();?>auth/lupa">Lupa Password?</a>
								</div>
								-->

								<div class="text-center">
									<a class="small" href="<?= base_url(); ?>auth/registrasi">Belum memiliki akun? Buat
										Akun!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
