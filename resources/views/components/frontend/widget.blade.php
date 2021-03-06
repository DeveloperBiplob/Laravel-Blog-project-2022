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
            <div id="searchList">
                <ul>

                </ul>
            </div>
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
            <a href="{{ route('single-post', $post->slug) }}">
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
        <div class="item d-flex justify-content-between"><a href="{{ route('category-wise-post', $category->slug) }}">{{ $category->name }}</a><span>{{ count($category->posts) }}</span></div>
        @endforeach
    </div>
    <!-- Widget [Tags Cloud Widget]-->
    <div class="widget tags">
        <header>
        <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            @foreach ($tags as $tag)
            <li class="list-inline-item"><a href="{{ route('tag-wise-post', $tag->slug) }}" class="tag">#{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
    </aside>

    @push('script')
        <script>
            const base_path = window.location.origin;

            let postSearch = document.querySelector('#postSearch');
            let searchError = document.querySelector('#searchError');
            postSearch.addEventListener('keyup', async function(e){
                e.preventDefault();
                let url = base_path + "/post/search";
                let name = e.target.value;

                if(postSearch.value){
                    try{
                    let response = await axios.post(url, {
                        name: name
                    });
                    // console.log(response.data)
                    displayPost(response.data);

                    }catch(err){
                        console.log(err)
                    }finally{

                    };

                }
            })

            const displayPost = (posts)=> {
                        let searchList = document.querySelector('#searchList > ul');
                        let li = null;

                        if(Object.keys(posts).length === 0){
                            li = `<li style="list-style:none;text-align:center;background:#ccc" class="p-2 text-danger">No Post Found!!</li>`;
                        }else{
                            li = posts.map(post => {
                                return `<li><a href="/all-post/post-details/${post.slug}">${post.name} | ${post.author_data.name}</a></li>`;
                            });
                            li = li.join(" ")
                        }

                        searchList.innerHTML = li;
                    }
        </script>
    @endpush
