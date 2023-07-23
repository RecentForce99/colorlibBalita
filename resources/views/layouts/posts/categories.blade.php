<div class="sidebar-box">
    <h3 class="heading">Categories</h3>
    <ul class="categories">
        @foreach($categoriesList as $category)
            <li><a href="{{$category->section_page_url}}">{{$category->category_name}}<span>({{$category->posts_count}})</span></a></li>
        @endforeach
    </ul>
</div>
