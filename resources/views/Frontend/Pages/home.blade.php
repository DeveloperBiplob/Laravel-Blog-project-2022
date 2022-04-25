@extends('Frontend.Layouts.app')
@section('title', 'Blog Project 2022')
@section('app-content')
        <!-- Hero Section-->
        @includeIf('Frontend.partials.slider')
        <!-- Intro Section-->
        <section class="intro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="h3">About Us</h2>
                        <p class="text-big">{!! $about->description !!}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured-posts no-padding-top">
            <div class="container">
                <!-- Post-->
                @foreach ($randomPosts as $randomPost)
                <div class="row d-flex align-items-stretch">
                    @if ($randomPost->id % 2 === 0)
                    <div class="image col-lg-5"><img src="{{ asset($randomPost->image) }}" alt="..."></div>
                    @endif
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <div class="category"><a href="{{ route('category-wise-post', $randomPost->category->slug) }}">{{ $randomPost->category->name }}</a><a href="{{ route('subCategory-wise-post', $randomPost->subCategory->slug) }}">{{ $randomPost->subCategory->name }}</a></div><a href="{{ route('single-post', $randomPost->slug) }}">
                                    <h2 class="h4">{{ $randomPost->name }}</h2></a>
                                </header>
                                <p>{!! $randomPost->description !!}</p>
                                <footer class="post-footer d-flex align-items-center"><a href="{{ route('admin-wise-post', $randomPost->authorData->id) }}" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ asset('Frontend') }}/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>{{ $randomPost->authorData->name }}</span></div></a>
                                    <div class="date"><i class="icon-clock"></i> {{ $randomPost->created_at->diffForHumans() }}</div>
                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                </footer>
                            </div>
                        </div>
                    </div>
                    @if ($randomPost->id % 2 === 1)
                    <div class="image col-lg-5"><img src="{{ asset($randomPost->image) }}" alt="..."></div>
                    @endif
                </div>
                @endforeach
            </div>
        </section>
        <!-- Divider Section-->
        <section style="background: url({{ asset('Frontend') }}/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Posts -->
        <section class="latest-posts">
            <div class="container">
                <header>
                    <h2>Latest from the blog</h2>
                    <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </header>
                <div class="row">
                    @foreach ($latestPosts as $latestPost)
                    <div class="post col-md-4">
                        <div class="post-thumbnail"><a href="post.html"><img src="{{ asset($latestPost->image) }}" alt="..." class="img-fluid"></a></div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">{{ $latestPost->created_at->format("d M | Y") }}</div>
                                <div class="category"><a href="#">{{ $latestPost->category->name }}</a></div>
                            </div><a href="post.html">
                            <h3 class="h4">{{ $latestPost->name }}</h3></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Newsletter Section-->
        <section class="newsletter no-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Subscribe to Newsletter</h2>
                        <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-md-8">
                        <div class="form-holder">
                            <form action="#" id="subscriberForm">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Type your email address">
                                    <button type="submit" class="submit">Subscribe</button>
                                    <span id="notification"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery Section-->
        <section class="gallery no-padding">
            <div class="row">
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="{{ asset('Frontend') }}/img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-1.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="{{ asset('Frontend') }}/img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-2.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="{{ asset('Frontend') }}/img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-3.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
                <div class="mix col-lg-3 col-md-3 col-sm-6">
                    <div class="item"><a href="{{ asset('Frontend') }}/img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('Frontend') }}/img/gallery-4.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                </div>
            </div>
        </section>

@endsection

@push('script')
    <script>
        const base_url = window.location.origin;

        let subscriberForm = document.querySelector('#subscriberForm');
        let email = document.querySelector('#email');
        let notification = document.querySelector('#notification');
        subscriberForm.addEventListener('submit', function(e){
            e.preventDefault();

            if(email.value === ''){
                notification.innerHTML = 'Plese Enter a Valid Email Address.'
                notification.classList = 'text-danger'
            }else{
                notification.innerHTML = ''
                let url = base_url + "/subscribe";
                axios.post(url, {
                    email: email.value
                })
                .then((res)=> {
                    notification.innerHTML = 'Thanks For Subscribe.'
                    notification.classList = 'text-success'
                    email.value = '';
                })
                .catch((err)=>{
                    if(err.response.data.errors.email){
                        notification.innerHTML = err.response.data.errors.email[0]
                        notification.classList = 'text-danger'
                    }
                })
            }
        })
    </script>
@endpush
