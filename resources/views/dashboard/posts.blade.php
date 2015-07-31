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
                    @foreach(App\Posts\Post::published() as $post)
                        y
                    @endforeach
                </div>
                <div role="tabpanel" class="tab-pane" id="drafts">
                    @foreach(App\Posts\Post::drafts() as $post)
                        x
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
