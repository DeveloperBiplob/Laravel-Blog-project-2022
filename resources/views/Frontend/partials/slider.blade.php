<div class="owl-carousel hero_slider">
    @foreach ($sliders as $slider)
    <section style="background: url({{ asset($slider->image) }}); background-size: cover; background-position: center center" class="hero wow animate__animated animate__fadeInTopLeft">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="bg-dark p-3">{{ $slider->title }}</h1><a href="#" class="hero-link">Discover More</a>
                </div>
            </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
        </div>
    </section>
    @endforeach
</div>
