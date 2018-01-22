<!-- Navigation -->
<style>
    .navbar > .navbar-nav > li > a {
        padding: 15px 10px;
    }
</style>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}" style="padding-left: 25px">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <ul class="nav navbar-nav navbar-collapse collapse">
        <li class="active"><a href="/home">Home</a></li>
        <li><a href="/dashboard">Dashboard</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right top-nav  navbar-collapse collapse">
        @if(Auth::check())
            @include('includes.logged-in-user-dropdown-menu')
        @else
            <li><a href="/register"><i class="fa fa-user"></i> Sign Up</a></li>
            <li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
        @endif
    </ul>
</nav>
