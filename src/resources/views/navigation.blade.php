@php
$original_nav = config('modullo-navigation-menu');
$viewMode = $type;
//dd([$original_nav, $viewMode]);

$final_nav = [];

// GET ACTIVE AND SORT BY ORDERING (LATER)
foreach($original_nav as $key => $menu) {
    if (count($menu) > 0) {
        $nav[$key] = $original_nav[$key];
    }
}
//$user_role = Auth::user()->email;
//dd([$viewMode, $original_nav, $nav]);
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <a class="navbar-brand" href="#">{{ config('app.name') }} </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{\Illuminate\Support\Facades\Auth::user()->first_name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a href="{{route('logout')}}" class="dropdown-item">
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 border-top border-bottom">
    <ul class="navbar-nav">
        @foreach($nav as $NavKey => $NavMenu)
            @foreach($NavMenu as $key => $menu)
                @if( $menu['visibility'] && $menu['audience'] == $viewMode)
                <li class="nav-item {{ count($menu['sub-menu']) > 0 ? 'dropdown': '' }} ">
                    <a class="nav-link {{ count($menu['sub-menu']) > 0 ? 'dropdown-toggle': '' }}" href="{{ $menu['clickable'] && safe_href_route($menu['route']) ? route($menu['route']) : 'javascript:void(0)' }}" data-toggle="dropdown">
                        <!--&& (isset($selectedMenu) && $key !== $selectedMenu)-->
                        <i class="{{ $menu['icon'] }} mr-2"> </i>
                        {{ $menu['title'] }}
                    </a>
                    @if(count($menu['sub-menu']) > 0)
                        <div class="dropdown-menu">
                            @foreach($menu['sub-menu'] as $subMenuKey => $subMenuValue)
                                @if (!empty($subMenuValue['route']) && safe_href_route($subMenuValue['route']) && empty($subMenuValue['link']))
                                    <a class="dropdown-item" href="{{ safe_href_route($subMenuValue['route']) ? route($subMenuValue['route']) : 'javascript:void(0)' }}"><i class="{{ isset($subMenuValue['icon']) ? $subMenuValue['icon'] : 'fe fe-settings' }}"></i> {!! $subMenuValue['title'] !!}</a>
                                @elseif (!empty($subMenuValue['link']))
                                    <a class="dropdown-item" href="{{ $subMenuValue['link'] }}"> {!! $subMenuValue['title'] !!}</a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </li>
                @endif
            @endforeach
        @endforeach
    </ul>
</nav>