@include('layouts.header')
    <section class="site-section pt-5">
        <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="owl-carousel owl-theme home-slider">
                    <div>
                        <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url({{asset('images/img_1.jpg')}}); ">
                            <div class="text half-to-full">
                                <div class="post-meta">
                                    <span class="category">Lifestyle</span>
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                </div>
                                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url({{asset('images/img_2.jpg')}}); ">
                            <div class="text half-to-full">
                                <div class="post-meta">
                                    <span class="category">Lifestyle</span>
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                </div>
                                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="blog-single.html" class="a-block d-flex align-items-center height-lg" style="background-image: url({{asset('images/img_3.jpg')}}); ">
                            <div class="text half-to-full">
                                <div class="post-meta">
                                    <span class="category">Lifestyle</span>
                                    <span class="mr-2">March 15, 2018 </span> &bullet;
                                    <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                </div>
                                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </section>

    <section class="site-section py-sm" id="posts">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4">Lifestyle Category</h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="row">
                    @foreach($posts as $post)
                        <diva class="col-md-6">
                            <a href="{{$post->detail_page_url}}" target="_blank" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                <img src="{{asset($post->preview_picture)}}" alt="Image placeholder">
                                <div class="blog-content-body">
                                    <div class="post-meta">
                                        <span class="category" onclick="window.open({{$post->section_page_url}}, '_blank')">{{$post->category_name}}</span>
                                        <span class="mr-2">{{$post->date}}</span>
                                    </div>
                                    <h2>{{$post->post_name}}</h2>
                                </div>
                            </a>
                        </diva>
                    @endforeach
                </div>
                {{$posts->links('layouts.posts.pagination', ['pageRadius' => 2])}}
            </div>

            <!-- END main-content -->

            @include('layouts.aside')
            <!-- END sidebar -->

        </div>
    </div>
    </section>
@include('layouts.footer')
