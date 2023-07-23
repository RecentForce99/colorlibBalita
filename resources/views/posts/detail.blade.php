@include('layouts.header')
    <section class="site-section py-lg" >
        <div class="container">

        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <h1 class="mb-4">{{$post->name}}</h1>
                <div class="post-meta">
                    <span class="category">{{$categoryInfo->name}}</span>
                    <span class="mr-2">{{$post->date}}</span>
                </div>
                <div class="post-content-body">
                    {!! $post->description !!}
                </div>

                <div class="pt-5">
                    <p>Category:  <a href="{{$categoryInfo->section_page_url}}">{{$categoryInfo->name}}</a></p>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="{{asset('images/person_1.jpg')}}" alt="Image Placeholder" class="img-fluid">
                        <div class="bio-body">
                            <h2>Meagan Smith</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                            <p><a href="#" class="btn btn-primary btn-sm">Read my bio</a></p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <li>
                                <a href="">
                                    <img src="{{asset('images/img_1.jpg')}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="{{asset('images/img_1.jpg')}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="{{asset('images/img_1.jpg')}}" alt="Image placeholder" class="mr-4">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

            @include('layouts.posts.categories')
                <!-- END sidebar-box -->

            </div>
            <!-- END sidebar -->

        </div>
    </div>
    </section>
    <section class="py-5">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3 ">Related Post</h2>
            </div>
        </div>
        <div class="row">
            @foreach($relatedPosts as $post)
                <div class="col-md-6 col-lg-4">
                    <a href="{{$post->detail_page_url}}" class="a-block d-flex align-items-center height-md" style="background-image: url({{asset($post->preview_picture)}}); ">
                        <div class="text">
                            <div class="post-meta">
                                <span class="category" onclick="window.open({{$post->section_page_url}}, '_blank')">{{$post->category_name}}</span>
                                <span class="mr-2">{{$post->date}}</span>
                            </div>
                            <h3>{{$post->post_name}}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </section>
@include('layouts.footer')
