@extends('template')

@section('content')

@include('sections.dashboard.navbar')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>Edit Post</h1>
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
                <label for="meta_description">Short Description</label>
                <input type="text" id="meta_description" name="meta_description" placeholder="Short Description" value="{{ $post->meta_description }}">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div id="summernote">{!! $post->body !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="submit" id="save-draft" value="Save Draft">
                <input type="submit" id="preview" value="Preview">

                <div class="pull-right">
                    <input type="submit" id="publish" value="Publish">
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
