<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Ракета</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mx-auto text-center">
				<li class="nav-item">
					<a class="nav-link {{ Request::is('*reference/one*') ? 'active' : '' }}" href="{{ route('reference.reference_one') }}">Справка 1</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('*/') ? 'active' : '' }}" aria-current="page" href="{{ route('cv.index') }}">Създай CV</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ Request::is('*reference/two*') ? 'active' : '' }}" href="{{ route('reference.reference_two') }}">Справка 2</a>
				</li>
			</ul>
		</div>
	</div>
</nav>