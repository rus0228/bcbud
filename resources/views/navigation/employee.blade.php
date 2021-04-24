<!-- Authentication Links -->
    @guest('employee')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('employee.login') }}">{{ __('Event User Login') }}</a>
        </li>
    @else
        <li class="nav-item" style="margin-right: 50px">
            <a class="nav-link" href="{{ route('employee.home') }}">{{ __('Back') }}</a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::guard('employee')->user()->name }}
                <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('employee.logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('employee.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest