<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>yemek tarifi</title>

	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/app.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<!-- Bootstrap JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<style>
		.sidebar-nav .sidebar-item {
			margin-bottom: 15px;
			/* Öğeler arasına 10px boşluk ekler */
		}
	</style>
</head>


<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">Yemek Tarifleri</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">

					</li>

					<li class="sidebar-item {{ Request::routeIs('profil') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('profil')}}">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profil</span>
						</a>
					</li>

					@if(! Auth::check())
					<li class="sidebar-item {{ Request::routeIs('giris') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('giris')}}">
							<i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Giriş</span>
						</a>
					</li>
					@endif


					@if(! Auth::check())
					</li>
					<li class="sidebar-item ">
						<a class="sidebar-link" href="{{route('uyeform')}}">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Üyel Ol</span>
						</a>
					</li>
					@endif

					<li class="sidebar-item {{ Request::routeIs('kullanicilar') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('kullanicilar')}}">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Kullanıcılar</span>
						</a>
					</li>

					<li class="sidebar-item {{ Request::routeIs('recipes.food') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('recipes.food')}}">
							<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Yemek Tarifleri</span>
						</a>
					</li>


					<li class="sidebar-item {{ Request::routeIs('recipes.sweet') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('recipes.sweet')}}">
							<i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Tatlı Tarifleri</span>
						</a>
					</li>



					<li class="sidebar-item {{ Request::routeIs('tarifEkle') ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('tarifEkle')}}">
							<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Tarifi Ekle</span>
						</a>
					</li>


					</li>


		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="img/avatars/resim1.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
								<span class="text-dark">{{ Auth::user()->adsoyad }}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{route('profil')}}"><i class="align-middle me-1" data-feather="user"></i> Profil</a>

								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>

								<div class="dropdown-divider"></div>

								<a class="dropdown-item" href="{{route('logout')}}"><i class="align-middle me-1" data-feather="log-out"></i> Log out</a>



							</div>
						</li>
					</ul>

				</div>
			</nav>


			@yield('govde')

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>


		</div>
	</div>



	<!-- Feather Icons JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
	<script>
		// Feather ikonları başlatma
		feather.replace();
	</script>

	<!-- Feather Icons JavaScript -->
	<script src="https://unpkg.com/feather-icons"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			feather.replace();
		});
	</script>
</body>

</html>