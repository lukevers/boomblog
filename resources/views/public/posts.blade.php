@extends('template')

@section('content')

@include('sections.public.header')

<div class="container posts">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            @foreach($posts as $post)
                <div class="row">
                    <div class="col-xs-12">
                        <div class="post">
                            <a href="/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
                            <div class="post-date">Published On {{ date('M d, Y \a\t g:i:sA', strtotime($post->published_at)) }}</div>
                            <div class="description">{!! $post->body !!}</div>
                            <div class="tags">
                                tags:
                                @foreach($post->tags as $tag)
                                    <a href="/tag/{{ $tag->get->name }}">{{ $tag->get->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if(isset($single))
                <div class="row">
                    <div class="col-xs-12">
                        @include('sections.public.comments')
                    </div>
                </div>
            @endif
        </div>
        <div class="col-xs-12 col-md-4">
            @include('sections.public.sidebar')
        </div>
    </div>
</div>

@include('sections.public.footer')

@endsection
