@extends('Frontend.Layouts.app')
@section('title', 'Blog Project 2022 | Post Details')
@section('app-content')
<div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="post blog-post col-lg-8">
        <div class="container">
          <div class="post-single">
            <div class="post-thumbnail"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="category"><a href="{{ route('category-wise-post', $post->category->slug) }}">{{ $post->category->name }}</a><a href="{{ route('subCategory-wise-post', $post->subCategory->slug) }}">{{ $post->subCategory->name  }}</a></div>
              </div>
              <h1>{{ $post->name }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
              <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="{{ route('admin-wise-post', $post->authorData->id) }}" class="author d-flex align-items-center flex-wrap">
                  <div class="avatar"><img src="{{ asset('Frontend') }}/img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                  <div class="title"><span>{{ $post->authorData->name }}</span></div></a>
                <div class="d-flex align-items-center flex-wrap">
                  <div class="date"><i class="icon-clock"></i> {{ $post->created_at->diffForhumans() }}</div>
                  <div class="views"><i class="icon-eye"></i> 500</div>
                  <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                </div>
              </div>
              <div class="post-body">{!! $post->description !!}</div>
                <div class="post-tags">
                  @foreach ($post->tags as $tag)
                  <a href="{{ route('tag-wise-post', $tag->slug) }}" class="tag">#{{ $tag->name }}</a>
                  @endforeach
                </div>
              <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                  <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                  <div class="text"><strong class="text-primary">Previous Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                  <div class="text"><strong class="text-primary">Next Post </strong>
                    <h6>I Bought a Wedding Dress.</h6>
                  </div>
                  <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>
              <div class="post-comments">
                <header>
                  <h3 class="h6">Post Comments<span class="no-of-comments">(3)</span></h3>
                </header>
                <div class="comment">
                  <div class="comment-header d-flex justify-content-between">
                    <div class="user d-flex align-items-center">
                      <div class="image"><img src="{{ asset('Frontend') }}/img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="title"><strong>Jabi Hernandiz</strong><span class="date">May 2016</span></div>
                    </div>
                  </div>
                  <div class="comment-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                  </div>
                </div>
                <div class="comment">
                  <div class="comment-header d-flex justify-content-between">
                    <div class="user d-flex align-items-center">
                      <div class="image"><img src="{{ asset('Frontend') }}/img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="title"><strong>Nikolas</strong><span class="date">May 2016</span></div>
                    </div>
                  </div>
                  <div class="comment-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                  </div>
                </div>
                <div class="comment">
                  <div class="comment-header d-flex justify-content-between">
                    <div class="user d-flex align-items-center">
                      <div class="image"><img src="{{ asset('Frontend') }}/img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="title"><strong>John Doe</strong><span class="date">May 2016</span></div>
                    </div>
                  </div>
                  <div class="comment-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                  </div>
                </div>
              </div>
              <div class="add-comment">
                <header>
                  <h3 class="h6">Leave a reply</h3>
                </header>
                <form action="#" class="commenting-form">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" name="username" id="username" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="email" name="username" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                      <textarea name="usercomment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-secondary">Submit Comment</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
      <x-frontend.widget :tags="$tags" :categories="$categories" :latestPosts="$latestPosts" ></x-frontend.widget>
    </div>
  </div>
@endsection
