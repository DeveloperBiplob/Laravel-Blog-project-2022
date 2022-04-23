@extends('Frontend.Layouts.app')
@section('title', 'Blog Project | All Post')
@section('app-content')
<div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="posts-listing col-lg-8">
        <div class="container">
          <div class="row">
            <!-- post -->
            @foreach ($randomPosts as $post)
            <div class="post col-xl-6">
              <div class="post-thumbnail"><a href="post.html"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></a></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  <div class="date meta-last">{{ $post->created_at->format("d M | Y") }}</div>
                  <div class="category"><a href="#">{{ $post->category->name }}</a></div>
                </div><a href="post.html">
                  <h3 class="h4">{{ $post->name }}</h3></a>
                <p class="text-muted">{{ Str::limit($post->description, 120, $end='.......') }}</p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"><img src="{{ asset('Frontend') }}/img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><span>{{ $post->authorData->name }}</span></div></a>
                  <div class="date"><i class="icon-clock"></i>{{ $post->created_at->diffForHumans() }}</div>
                  <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                </footer>
              </div>
            </div>
            @endforeach
            <!-- post-->
          </div>
          <!-- Pagination -->
          <nav aria-label="Page navigation example">
            <ul class="pagination pagination-template d-flex justify-content-center">
              <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
              <li class="page-item"><a href="#" class="page-link active">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
            </ul>
          </nav>
        </div>
      </main>
      <x-frontend.widget :tags="$tags" :categories="$categories" :latestPosts="$latestPosts" ></x-frontend.widget>
    </div>
  </div>
@endsection
