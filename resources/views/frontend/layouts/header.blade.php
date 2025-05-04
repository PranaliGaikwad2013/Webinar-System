  <!-- Header Section Begin -->
  <header class="header-section">
    <div class="container">
        <div class="logo">
            <a href="{{route('index')}}">
                <img src="{{ asset('index/img/logo.png') }}" alt="">
            </a>
        </div>
        <div class="nav-menu">
            <nav class="mainmenu mobile-menu">
                <ul>
                    <li class="active"><a href="{{route('index')}}">Home</a></li>
                    <li><a href="./about-us.html">About</a></li>
                    <li><a href="./speaker.html">Speakers</a>
                        <ul class="dropdown">
                            <li><a href="#">Jayden</a></li>
                            <li><a href="#">Sara</a></li>
                            <li><a href="#">Emma</a></li>
                            <li><a href="#">Harriet</a></li>
                        </ul>
                    </li>
                    <li><a href="./schedule.html">Schedule</a></li>
                    <li><a href="./blog.html">Blog</a></li>
                    <li><a href="./contact.html">Contacts</a></li>
                </ul>
            </nav>
            <a href="{{ route('login')}}" class="primary-btn top-btn"><i class="fa fa-ticket"></i>Login</a>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->