@include('layouts.header')
    <section class="site-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h2 class="mb-4">Category: {{$categoryName}}</h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="row mb-5 mt-5">
                    <div class="col-md-12">
                        @foreach($posts as $post)
                            <div class="post-entry-horzontal">
                                <a href="{{$post->detail_page_url}}" target="_blank">
                                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url({{asset($post->preview_picture)}});"></div>
                                    <span class="text">
                                        <div class="post-meta">
                                          <span class="category" onclick="window.open({{$post->section_page_url}}, '_blank')">{{$post->category_name}}</span>
                                          <span class="mr-2">{{$post->date}}</span>
                                        </div>
                                         <h2>{{$post->post_name}}</h2>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
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
