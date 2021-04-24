@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<section class="ct-u-paddingBoth80 ct-blog">
    <div class="container">
        <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom40">
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">My Blogs</h4>
            <p>{{ $profile->self_description? $profile->self_description : 'Please add your self desription from your profile page' }}
            </p>
        </div>
        <div class="row">
            @forelse ($blogs as $blog)
            <div class="col-sm-6 col-md-3 ct-u-marginBottom20">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <a href="blog-single.html">
                        <img src="{{ asset($blog->featured_image) }}" alt="Blog Post" itemprop="image">
                    </a>
                    <div class="ct-article-body">
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li class="ct-article-category">
                                <a href="{{ route('guide.blog.edit',$blog->id) }}" class="btn" itemprop="url">
                                    <i class="fa fa-edit"></i>Edit
                                </a>
                            </li>
                            <li class="ct-article-category">
                                <form action="{{ route('guide.blog.destroy', $blog->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn">
                                        <i class="fa fa-trash"></i>Remove
                                    </button>
                                </form>
                            </li>
                        </ul>
                        <div class="ct-article-title">
                            <a href="blog-single.html">
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">{{ $blog->title }}</h5>
                            </a>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li itemprop="dateCreated" class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                {{ date('d F,Y', strtotime($blog->created_at)) }}
                            </li>
                            <li class="ct-article-category">
                                <a href="#" itemprop="url">
                                    <i class="fa fa-folder"></i>{{ $blog->category->category }}
                                </a>
                            </li>
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    @foreach ($blog->tags as $tag)
                                    <li><a href="#" itemprop="url">{{ $tag->tag_title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <div itemprop="text" class="ct-article-description">
                            <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                {{ $blog->body }}
                            </p>
                            <a href="{{ Route('guide.blog.show', $blog->id) }}" itemprop="url"
                                class="btn-primary btn-xs btn text-uppercase">read
                                article</a>
                        </div>

                    </div>
                </article>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</section>
@endsection
