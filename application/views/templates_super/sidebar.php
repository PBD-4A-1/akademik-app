<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center">
		<div class="sidebar-brand-icon">
			<i class="fas fa-layer-group"></i>
		</div>
		<div class="sidebar-brand-text mx-3">
			<i class="text-white">AKADEMIK</i><i class="text-warning">APP</i>
		</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		<?= $jenisuser; ?>
	</div>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url(); ?>super_admin">
			<i class="fas fa-fw fa-wave-square"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu
	</div>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url(); ?>super_admin/profil">
			<i class="fas fa-user"></i>
			<span>Profil</span></a>
	</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
				aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-database"></i>
				<span>Database</span>
			</a>
			<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
				data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header"><i class="fa fa-table"></i> Tabel</h6>
					<a class="collapse-item" href="<?= base_url(); ?>super_admin/prodi">Program Studi</a>
					<a class="collapse-item" href="<?= base_url(); ?>super_admin/mhs">Mahasiswa</a>
					<a class="collapse-item" href="<?= base_url(); ?>super_admin/user">User</a>
				</div>
			</div>
		</li>


	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
