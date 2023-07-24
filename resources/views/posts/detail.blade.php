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

            @include('layouts.aside')
            <!-- END sidebar -->

        </div>
    </div>
    </section>
    @empty($relatedPosts)
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
    @endempty
@include('layouts.footer')
