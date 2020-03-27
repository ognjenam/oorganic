

      <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a  class="nav-link">
                <div class="nav-profile-image">

                  <!-- <img src="{{asset('dashboard_user/assets/images/faces/profile.jpg')}}" alt="profile"> -->
                  <span class="login-status online"></span>

                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">
                    {{session() -> get('user') -> username}}


                  </span>
                  <span class="text-secondary text-small">

                    {{session() -> get('user') -> name}}
                  </span>
                </div>
                <i class="fa fa-check" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/home')}}">
                <span class="menu-title">Home</span>
                <i class="fa fa-home" aria-hidden="true"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/dashboard/products')}}">
                <span class="menu-title">Products</span>
                <i class="fa fa-archive" aria-hidden="true"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/dashboard/categories')}}">
                <span class="menu-title">Categories</span>
                <i class="fa fa-archive" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/dashboard/users')}}">
                <span class="menu-title">Users</span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/dashboard/orders')}}">
                <span class="menu-title">Orders</span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('logs')}}">
                <span class="menu-title">Visits</span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item">

              <a class="nav-link" target='_blank' href="{{url('/documentation.pdf')}}">
                <span class="menu-title">Documentation</span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
            </li>


            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Add</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary add mt-4"><a href="{{url('/dashboard/categories/add')}}">+ Add a category</a></button>
                <button class="btn btn-block btn-lg btn-gradient-primary add mt-4"><a href="{{url('/dashboard/products/add')}}">+ Add a product</a></button>

              </span>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </span> Dashboard </h3>

            </div>
