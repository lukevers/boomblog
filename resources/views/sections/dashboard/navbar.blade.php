<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <i class="fa fa-anchor"></i>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a @if(Request::path() == "dashboard")class="active"@endif href="/dashboard" title="Home">
                    <div><span class="hidden-xs"><i class="fa fa-home"></i></span> HOME</div>
                </a></li>
                <li><a @if(Request::path() == "dashboard/posts")class="active"@endif href="/dashboard/posts" title="Posts">
                    <div><span class="hidden-xs"><i class="fa fa-inbox"></i></span> POSTS</div>
                </a></li>
                <li><a @if(Request::path() == "dashboard/posts/new")class="active"@endif href="/dashboard/new" title="New Post">
                    <div><span class="hidden-xs"><i class="fa fa-plus"></i></span> NEW POST</div>
                </a></li>
            </ul>
        </div>
    </div>
</nav>
