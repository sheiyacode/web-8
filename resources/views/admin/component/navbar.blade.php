  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a class="logo">
                        <h1>WORDELLA-Admin</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.admin') }}">Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Manajemen User</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.tutors.index') }}">Manajemen Tutor</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.courses.index') }}">Manajemen Kursus</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('admin.quizzes.index') }}">Manajemen Quiz</a></li>
                      {{-- <li class="nav-item"><a class="nav-link" href="{{ route('admin.reports.index') }}">Laporan</a></li> --}}
                      <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                          @csrf
                          <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                      </li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>