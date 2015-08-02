@extends('template')

@section('content')

@include('sections.dashboard.navbar')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#published" aria-controls="published" role="tab" data-toggle="tab">Published</a></li>
                <li role="presentation"><a href="#drafts" aria-controls="drafts" role="tab" data-toggle="tab">Drafts</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="published">
                    <ul>
                        @foreach(App\Posts\Post::published() as $post)
                            <li class="post">
                                <h2><a href="/dashboard/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                                <p>{{ $post->meta_description }}</p>
                                <div class="meta-data">
                                    Author: {{ $post->author->name }}
                                    <br/>Created On: {{ date('M d, Y g:i:s', strtotime($post->created_at)) }}
                                    <br/>Last Updated On: {{ date('M d, Y g:i:s', strtotime($post->updated_at)) }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane" id="drafts">
                    <ul>
                        @foreach(App\Posts\Post::drafts() as $post)
                            <li class="post">
                                <h2><a href="/dashboard/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                                <p>{{ $post->meta_description }}</p>
                                <div class="meta-data">
                                    Author: {{ $post->author->name }}
                                    <br/>Created On: {{ date('M d, Y g:i:s', strtotime($post->created_at)) }}
                                    <br/>Last Updated On: {{ date('M d, Y g:i:s', strtotime($post->updated_at)) }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
