@php
    $config = [
    'course-mgt' => [
        'lesson',
        'modules',
        'course',
    ],
    'program-mgt' =>  [
        'create',
        'programs',
    ],
    'resources' => [
        'asset',
        'quiz',
    ],
    'courses' =>  [
        'my-courses',
        'courses',
    ],
    'programs' =>  [
        'programs',
    ],
    'settings' =>  [
        'settings',
    ],
    'grades-mgt' => [
        'all-grades',
    ],
    'grades' => [
        'grades',
    ],
    'notes' => [
        'notes',
    ],
];

    $nav = config('navigation-menu');
    switch ($type) {
        case 'learner':
            $nav['settings']['visibility'] = true;
            $nav['courses']['visibility'] = true;
            $nav['programs']['visibility'] = true;
            $nav['grades-mgt']['visibility'] = false;
            $nav['grades']['visibility'] = true;
            $nav['notes']['visibility'] = true;
            break;
        case 'tenant':
            $nav['resources']['visibility'] = true;
            $nav['course-mgt']['visibility'] = true;
            $nav['program-mgt']['visibility'] = true;
            $nav['grades-mgt']['visibility'] = true;
            break;
    }
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
        @foreach($config as $key => $menu)
{{--            {{ json_encode($nav[$key]['visibility']) }}--}}
            @if($nav[$key]['visibility'])
            <li class="nav-item {{ count($nav[$key]['sub-menu']) > 0 ? 'dropdown': '' }} ">
                <a class="nav-link {{ count($nav[$key]['sub-menu']) > 0 ? 'dropdown-toggle': '' }}" href="/{{ $nav[$key]['route'] }}" data-toggle="dropdown">
                    {{--                    {{ json_encode($nav) }}--}}
                    <i class="{{ $nav[$key]['icon'] }} mr-2"> </i>
                    {{ $nav[$key]['title'] }}
                </a>
                @if(count($nav[$key]['sub-menu']) > 0)

                    <div class="dropdown-menu">
                        @foreach($menu as $sub)
                            @if(isset( $nav[$key]['sub-menu'][$sub]))
                            <a class="dropdown-item" href="/{{ $nav[$key]['sub-menu'][$sub]['route'] }}">{{ $nav[$key]['sub-menu'][$sub]['title'] }}</a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </li>
            @endif
        @endforeach
    </ul>
</nav>
