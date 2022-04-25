@php
    $website = App\Models\Website::first();
@endphp
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <h6 class="text-white">Bootstrap Blog</h6>
                </div>
                <div class="contact-details">
                    <p>{{ $website->address }}</p>
                    <p>{{ $website->phone }}</p>
                    <p>Email: <a href="mailto:info@company.com">{{ $website->email }}</a></p>
                    <ul class="social-menu">
                        <li class="list-inline-item"><a href="{{ $website->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $website->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $website->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="{{ $website->behance }}"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menus d-flex">
                    <ul class="list-unstyled">
                        <li> <a href="#">My Account</a></li>
                        <li> <a href="#">Add Listing</a></li>
                        <li> <a href="#">Pricing</a></li>
                        <li> <a href="#">Privacy &amp; Policy</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li> <a href="#">Our Partners</a></li>
                        <li> <a href="#">FAQ</a></li>
                        <li> <a href="#">How It Works</a></li>
                        <li> <a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="latest-posts">
                    @php
                        $latestPosts = App\Models\Post::latest()->take(3)->get();
                    @endphp
                    @foreach ($latestPosts as $latestPost)
                    <a href="{{ route('single-post', $latestPost->slug) }}">
                        <div class="post d-flex align-items-center">
                            <div class="image"><img src="{{ asset($latestPost->image) }}" alt="..." class="img-fluid"></div>
                            <div class="title"><strong>{{ $latestPost->name }}</strong><span class="date last-meta">{{ $latestPost->created_at->format("M d, Y") }}</span></div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; {{ $website->footer }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
