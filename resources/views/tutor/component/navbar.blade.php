  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ asset('scholar') }}/index.html" class="logo">
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
                        <li><a href="{{ route('dashboard.tutor') }}">Dashboard</a></li>
                        <li><a href="{{ route('tutor.courses') }}">Course</a></li>
                        <li><a href="{{ route('tutor.quizzes.index') }}">Quiz</a></li>
                        <li><a href="{{ route('tutor.students') }}">Student</a></li>
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