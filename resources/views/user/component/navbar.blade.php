  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a class="logo">
                        <h1>WORDELLA</h1>
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
                    <ul class="nav">
                      <li><a href="{{ route('dashboard.user') }}" class="{{ request()->routeIs('dashboard.user') ? 'active' : '' }}">Dashboard</a></li>
                      <li><a href="{{ route('user.courses') }}" class="{{ request()->routeIs('user.courses') ? 'active' : '' }}">Courses</a></li>
                      <li><a href="{{ route('user.quiz') }}" class="{{ request()->routeIs('user.quiz') ? 'active' : '' }}">Quiz</a></li>
                      <li><a href="{{ route('user.certificate') }}" class="{{ request()->routeIs('user.certificate') ? 'active' : '' }}">Certificate</a></li>
                      <li><a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">Profile</a></li>
                      <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                          @csrf
                          <button type="submit" class="logout-button">Logout</button>
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