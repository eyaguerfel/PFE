<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <?php
            $user=App\Http\Controllers\UserController::get_connected_user();
        ?>

        @if($user->role_id==1)
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>       
                <li class="menu-title">UI elements</li>                  
                <li><a href ="{{route('rolelist')}}"><i class="menu-icon fa fa-cogs"></i>Roles</a></li>
                <li><a href ="{{route('userpage')}}"><i class="menu-icon fa fa-users"></i>Users</a></li>                            
                <li><a href ="{{route('listtask')}}"><i class="menu-icon fa fa-tasks"></i>Tasks</a></li>
                <li><a href ="{{route('listproject')}}"><i class="menu-icon fa fa-tasks"></i>Projects</a></li>
                <li><a href ="{{route('listhours')}}"><i class="menu-icon fa fa-tasks"></i>Work hours</a></li>

                <li class="menu-title">Holidays</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="menu-icon fa fa-calendar-o"></i>
                        Holidays
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><a href="{{route('listnatholidays')}}">National Holidays</a></li>
                        <li><a href="{{route('listrelholidays')}}">Religious Holidays</a></li>
                    </ul>
                </li>
            </ul>
        @else
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>       
                <li class="menu-title">UI elements</li>                  
                <li><a href ="{{route('mytask')}}"><i class="menu-icon fa fa-cogs"></i>My tasks</a></li>
                <li><a href ="{{route('myproject')}}"><i class="menu-icon fa fa-cogs"></i>My projects</a></li>

            </ul>
        @endif
    </div><!-- /.navbar-collapse -->
</nav>