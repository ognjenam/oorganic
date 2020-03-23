
<body class="animsition">

	<!-- Header -->
	<header class="header-v1">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop">
					<div class="left-header">
						<!-- Menu desktop -->
						<div class="menu-desktop">
							<ul class="main-menu">
								<li class="active-menu">
									<a href="{{url('home')}}">Home</a>

								</li>
								<li class="active-menu">

									<a href="{{url('products')}}">Products</a>

								</li>
								<li class="active-menu">
									<a href="{{url('contact')}}">Contact</a>

								</li>








							</ul>
						</div>
					</div>

					<div class="center-header">
						<!-- Logo desktop -->
						<div class="logo">
						<a href="{{url('/home')}}"><img src="{{asset('main/images/oorganic_logo.png')}}" alt="Logo"></a>
						</div>
					</div>

					<div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
						<div class="h-full flex-m">
							@if(url() -> current() == 'http://127.0.0.1:8000/products')
							<div class="icon-header-item flex-c-m trans-04 js-show-modal-search">
								<i class="fa fa-search" aria-hidden="true"></i>

							</div>
							@endif
							@if(!session() -> get('user'))
							<div class="icon-header-item flex-c-m trans-04">
								<a href="{{url('/enter')}}">
									<i class="fa fa-user" aria-hidden="true"></i>
								</a>


							</div>

							@else
							<div id='username-header' class="icon-header-item flex-c-m trans-04">
								<a id='user-account' href="{{url('/account')}}">
									{{session() -> get('user') -> username}}
								</a>


							</div>
							@if(session() -> get('user') -> name == 'admin')
							<div class="icon-header-item flex-c-m trans-04">
								<a href="{{url('/dashboard')}}">
									<i class="fa fa-folder-open" aria-hidden="true"></i>
								</a>

							</div>

							@endif
							<div class="icon-header-item flex-c-m trans-04">
								<a href="{{url('/logout')}}">
									<i class="fa fa-sign-out" aria-hidden="true"></i>
								</a>

							</div>

							@endif
						</div>




					</div>


				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="{{url('home')}}"><img src="{{asset('main/images/oorganic_logo.png')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m h-full wrap-menu-click m-r-15">
				<div class="h-full flex-m">
					@if(url() -> current() == 'http://127.0.0.1:8000/products')
					<div class="icon-header-item flex-c-m trans-04 js-show-modal-search">
						<i class="fa fa-search" aria-hidden="true"></i>

					</div>
					@endif
					@if(!session() -> get('user'))
					<div class="icon-header-item flex-c-m trans-04">
						<a href="{{url('/enter')}}">
							<i class="fa fa-user" aria-hidden="true"></i>
						</a>


					</div>

					@else
					<div id='username-header' class="icon-header-item flex-c-m trans-04">
						<a id='user-account' href="{{url('/account')}}">
							{{session() -> get('user') -> username}}
						</a>


					</div>
					@if(session() -> get('user') -> name == 'admin')
					<div class="icon-header-item flex-c-m trans-04">
						<a href="{{url('/dashboard')}}">
							<i class="fa fa-folder-open" aria-hidden="true"></i>
						</a>

					</div>

					@endif
					<div class="icon-header-item flex-c-m trans-04">
						<a href="{{url('/logout')}}">
							<i class="fa fa-sign-out" aria-hidden="true"></i>
						</a>

					</div>

					@endif
				</div>


			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="{{url('home')}}">Home</a>



				</li>
				<li>
					<a href="{{url('products')}}">Products</a>



				</li>
				<li>
					<a href="{{url('contact')}}">Contact</a>



				</li>









			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
				<span class="lnr lnr-cross"></span>
			</button>

			<div class="container-search-header">
				<form id='form-search' class="wrap-search-header flex-w">
					@csrf

					<button type="button" id='search-products-btn' class="flex-c-m trans-04">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>

					<input id='search-product' class="plh1" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
