@extends('template')

@section('content')

@include('sections.public.header')
@include('sections.public.sidebar')

<div class="container posts">
    @foreach(App\Posts\Post::published() as $post)
        <div class="row">
            <div class="col-xs-12">
                <div class="post">
                    <a href="/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
                    <div class="post-date">{{ date('M d, Y g:i:s', strtotime($post->published_at)) }}</div>
                    <div class="description">{{ $post->meta_description }}</div>
                    <div class="tags">
                        @foreach($post->tags as $tag)
                            <a href="/tagged/{{ $tag->get->name }}">{{ $tag->get->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
