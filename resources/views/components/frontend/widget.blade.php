<aside class="col-lg-4">
    <!-- Widget [Search Bar Widget]-->
    <div class="widget search">
        <header>
        <h3 class="h6">Search the blog</h3>
        </header>
        <form action="#" class="search-form">
        <div class="form-group">
            <input type="search" id="postSearch" placeholder="What are you looking for?">
            <button type="submit" class="submit"><i class="icon-search"></i></button>
            <span id="searchError"></span>
            <ul id="searchList">

            </ul>
        </div>
        </form>
    </div>
    <!-- Widget [Latest Posts Widget]-->
    <div class="widget latest-posts">
        <header>
            <h3 class="h6">Latest Posts</h3>
        </header>
        <div class="blog-posts">
            @foreach ($latestPosts as $post)
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></div>
                    <div class="title"><strong>{{ $post->name }}</strong>
                        <div class="d-flex align-items-center">
                            <div class="views"><i class="icon-eye"></i>{{ $post->view }}</div>
                            <div class="comments"><i class="icon-comment"></i>12</div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <!-- Widget [Categories Widget]-->
    <div class="widget categories">
        <header>
        <h3 class="h6">Categories</h3>
        </header>
        @foreach ($categories as $category)
        <div class="item d-flex justify-content-between"><a href="#">{{ $category->name }}</a><span>{{ count($category->posts) }}</span></div>
        @endforeach
    </div>
    <!-- Widget [Tags Cloud Widget]-->
    <div class="widget tags">
        <header>
        <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            @foreach ($tags as $tag)
            <li class="list-inline-item"><a href="#" class="tag">#{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
    </aside>

    @push('script')
        <script>
            const base_path = window.location.origin;

            let postSearch = document.querySelector('#postSearch');
            let searchError = document.querySelector('#searchError');
            let searchList = document.querySelector('#searchList');
            postSearch.addEventListener('keyup', function(e){

                let url = base_path + "/post/search";
                let name = e.target.value;

                axios.post(url, {
                    name: name
                })
                .then((res)=> {
                    // let li = null;
                    // console.log(res)
                    res.data.Aray.forEach(element => {
                        console.log(element)
                        searchList.innerHTML = `<li style="list-style: none"><a href="">${element.name}</a></li>`
                    });
                    // console.log(res)
                })
                .catch((err)=>{
                    // if(err.response.data.errors.email){
                    //     notification.innerHTML = err.response.data.errors.email[0]
                    //     notification.classList = 'text-danger'
                    // }
                    console.log(err)
                })
            })
        </script>
    @endpush
