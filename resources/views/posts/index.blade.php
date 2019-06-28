@extends('layouts.frontend')

@section('page-title')
<!--page title start-->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">
                    Blog Listing
                    @if (request()->category)
                        / {{ request()->category->name }}
                    @endif
                </h4>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active"><a href="/posts">Blog</a>
                    </li>
                    <li class="active">Blog Listing</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--page title end-->
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (request()->category)
                <h1>目前尚無文章</h1>
                @endif
                @foreach ($posts as $key => $post)
                    <!--classic image post-->
                    <div class="blog-classic">
                        <div class="date">
                            {{ $post->created_at->day }}
                            <span>{{ strtoupper($post->created_at->shortEnglishMonth) }} {{ $post->created_at->year }}</span>
                        </div>
                        <div class="blog-post">
                            <div class="full-width">
                                <img src="/assets/img/post/p12.jpg" alt="" />
                            </div>
                            <h4 class="text-uppercase"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </h4>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>posted by <a href="#">{{ $post->user->name }}</a>
                                </li>
                                @if ($post->category)
                                    <li>
                                        <i class="fa fa-folder-open"></i>
                                        <a href="/posts/category/{{ $post->category_id }}">{{ $post->category->name }}</a>
                                    </li>
                                @endif

                                <li><i class="fa fa-comments"></i> <a href="#">4 comments</a>
                                </li>
                            </ul>
                            <p>{{ str_limit($post->content, 250) }}</p>
                            <a href="/posts/{{ $post->id }}" class="btn btn-small btn-dark-solid  "> Continue Reading</a>
                        </div>
                    </div>
                    <!--classic image post-->
                @endforeach

                <!--pagination-->
                <div class="text-center">
                    <ul class="pagination custom-pagination">
                        <li><a href="#">Prev</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">Next</a>
                        </li>
                    </ul>
                </div>
                <!--pagination-->

            </div>
            <div class="col-md-4">

                <!--search widget-->
                <div class="widget">
                    <form class="form-inline form" role="form">
                        <div class="search-row">
                            <button class="search-btn" type="submit" title="Search">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                </div>
                <!--search widget-->

                <!--latest post widget-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">latest post</h6>
                    </div>
                    <ul class="widget-latest-post">
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="/assets/img/post/post-thumb.jpg" alt="" />
                                </a>
                            </div>
                            <div class="w-desk">
                                <a href="#">Old Father Getup</a>
                                April 25, 2014
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="/assets/img/post/post-thumb-2.jpg" alt="" />
                                </a>
                            </div>
                            <div class="w-desk">
                                <a href="#">Represent is the best way</a>
                                March 28, 2014
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <a href="#">
                                    <img src="/assets/img/post/post-thumb-3.jpg" alt="" />
                                </a>
                            </div>
                            <div class="w-desk">
                                <a href="#">Alone with the music</a>
                                May 05, 2014
                            </div>
                        </li>
                    </ul>
                </div>
                <!--latest post widget-->

                <!--category widget-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">category</h6>
                    </div>
                    <ul class="widget-category">
                        @foreach ($categories as $key => $category)
                             <li><a href="/posts/category/{{ $category->id }}">{{ $category->name }}</a>
                             </li>
                        @endforeach
                    </ul>
                </div>
                <!--category widget-->

                <!--comments widget-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">Latest comments </h6>
                    </div>
                    <ul class="widget-comments">
                        <li>Jonathan on <a href="javascript:;">Vesti blulum quis dolor </a>
                        </li>
                        <li>Jane Doe on <a href="javascript:;">Nam sed arcu tellus</a>
                        </li>
                        <li>Margarita on <a href="javascript:;">Fringilla ut vel ipsum </a>
                        </li>
                        <li>Smith on <a href="javascript:;">Vesti blulum quis dolor sit</a>
                        </li>
                    </ul>
                </div>
                <!--comments widget-->

                <!--tags widget-->
                <div class="widget">
                    <div class="heading-title-alt text-left heading-border-bottom">
                        <h6 class="text-uppercase">tag cloud</h6>
                    </div>
                    <div class="widget-tags">
                        <a href="">Portfolio</a>
                        <a href="">Design</a>
                        <a href="">Link</a>
                        <a href="">Gallery</a>
                        <a href="">Video</a>
                        <a href="">Clean</a>
                        <a href="">Retina</a>
                    </div>
                </div>
                <!--tags widget-->

            </div>
        </div>
    </div>
</div>
@endsection
