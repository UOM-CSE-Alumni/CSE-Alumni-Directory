<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li>
            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off"></i>
                Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</li>