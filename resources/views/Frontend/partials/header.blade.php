@php
    $website = App\Models\Website::first();
@endphp
<header class="header" style="margin-bottom: 80px">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
                <div class="close-btn"><i class="icon-close"></i></div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="#">
                            <div class="form-group">
                                <input type="search" name="search" id="search" placeholder="What are you looking for?">
                                <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
                @if ($website->logo)
                <img width="200px" src="{{ asset($website->logo) }}" alt="">
                @else
                <!-- Navbar Brand --><a href="{{ route('home-page') }}" class="navbar-brand">{{ $website->title }}</a>
                @endif
                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('home-page') }}" class="nav-link active ">Home</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('all-post') }}" class="nav-link ">Post</a>
                    </li>
                    {{-- <li class="nav-item"><a href="{{ route('single-post') }}" class="nav-link ">Post</a> --}}
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link ">Contact</a>
                    </li>
                </ul>
                <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>

                @if (auth()->user())
                <ul class="langs navbar-text">
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0 10px">
                        @csrf
                        <button class="btn btn-primary btn-sm" type="submit">Logout</button>
                    </form>
                </ul>
                @else
                    <ul class="langs navbar-text"><a href="{{ route('login') }}" class="active">Login</a><span>           </span><a href="{{ route('register') }}">Register</a></ul>
                @endif
            </div>
        </div>
    </nav>
</header>
