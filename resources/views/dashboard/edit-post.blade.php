@extends('template')

@section('content')

@include('sections.dashboard.navbar')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Edit Post</h1>
            <br/>
        </div>
    </div>

    <form method="POST" action="{{ url('/dashboard/new') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-xs-12">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div id="summernote">{!! $post->body !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @if (isset($post->published) && $post->published)
                    <input type="submit" id="save-draft" value="Update">
                @else
                    <input type="submit" id="save-draft" value="Save Draft">
                @endif

                @if (!isset($new))
                    <div class="pull-right">
                        <input type="submit" id="publish" value="Publish">
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>

@endsection
