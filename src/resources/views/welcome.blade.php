@extends('layouts.themes.tabler.tabler')

@section('head_js')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/babel-polyfill/dist/polyfill.min.js"></script>
    <script src="https://unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-ellipse-progress/dist/vue-ellipse-progress.umd.min.js"></script>
    <script src="https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue-icons.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

@endsection
@section('head_css')
    <link type="text/css" rel="stylesheet" href="https://unpkg.com/bootstrap-vue@2.21.2/dist/bootstrap-vue.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('Themes/tabler/css/dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/learning/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/assets/owl.theme.green.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />  --}}
{{--
    <style>
        .carpousel_section , .search_bar{
            display: flex;
            justify-content: center;
        }
        .slider {
            width: 100%;
            max-width: 1200px;
            height: 350px;
            position: relative;
            overflow: hidden;
        }
        .slide {
            width: 100%;
            max-width: 1200px;
            height: 350px;
            position: absolute;
            transition: all 0.5s;
        }
        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .carpousel_section .btn {
            position: absolute;
            width: 40px;
            height: 40px;
            padding: 10px;
            border: none;
            border-radius: 50%;
            z-index: 10px;
            cursor: pointer;
            background-color: #fff;
            font-size: 18px;
        }
        .carpousel_section .btn:active {
            transform: scale(1.1);
        }
        .carpousel_section .btn-prev {
            top: 45%;
            left: 2%;
        }
        .carpousel_section .btn-next {
            top: 45%;
            right: 2%;
        }
        .search_bar{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .search_box{
            width:50em;
        }
        .search_input{
            width:100%;
            padding:10px;
            border-radius:30em;
            border: 1px solid #eee;
        }
        input:focus{
            outline: none !important;
            border: 1px solid black;
        }
        .course_section{
            margin-top: 3em;
        }
        .course_categories{
            text-decoration: none !important;
            margin:0px 8px 0px 0px;
            color:#000 !important;
            font-weight: bolder;
        }
        .course_categories:hover{
            color: #eee !important;
        }
        .courses_section{
            width: 100%;
            border:1px solid #eee;
            box-shadow: 2px 3px #eee;
            padding:20px;
            background: white;
            border-radius: 10px;
        }
        .course_container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        &::-webkit-scrollbar {
             display: none !important;
         }
        }
        .course_container::-webkit-scrollbar {
            display: none;
        }
        .course_container {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .course{
            background: white;
            /*padding:0 0 20px 0;*/
            box-shadow: 2px 3px #eee;
            border-radius: 5px;
            margin:2em;
            width: 20em;
        }
        .courses_section{
            margin-bottom: 5em;
        }
        .grow {
            transition: all .5s ease-in-out;
        }
        .grow:hover {
            transform: scale(1.3);
            box-shadow: 2px 3px #eee;
        }
        .course_details{
            padding:20px;
        }
        a{
            text-decoration: none;
            color:#000;
        }
        a:hover{
            text-decoration: none;
            color:#000;
        }
        .container-search{
            padding: 10%;
            text-align: center;
        }
    </style>
--}}
@endsection

@section('body_content_main')

    @include('modules-lms-base::home-navigation',['type' => 'learner'])

    <div  class="container py-4">
        <section class="search_bar d-none" id="course">
            <div class="search_box container-search">
                <form>
                    @csrf
                    <input
                            v-model="search"
                            type="text"
                            v-on:input="searchCourses"
                            placeholder="search..."
                            class="search_input" />
                </form>
            </div>
        </section>
        <section class="hero">
            <div class="jumbotron jumbotron-fluid" style="padding: 10em 0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="display-4">Learn from the best</h1>
                            <p class="lead">Choose from 50 online video courses and programs with new additions published every month</p>
                            <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured_programs">
            <div class="container-fluid">
                <div>
                    <h2>Featured Programs</h2>
                </div>
                <div class="row">
                    @foreach($data['programs'] as $program)
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{$program['image']}}" alt="program_img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$program['title']}}</h5>
                                            <p class="card-text">{{$program['description']}}</p>
                                            <p class="card-text"><small class="text-muted">13 hours . 15 lectures</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="popular_courses mt-8">
            <div class="container-fluid">
                <div>
                    <h2>Popular Courses</h2>
                </div>
                <div class="course_slider">
                    @foreach($data['courses'] as $course)
                        <div class="mx-2">
                            <div class="card">
                                <img src="{{$course['course_image']}}" alt="program_img">
                                <div class="card-body">
                                    <h5 class="card-title m-0">{{ $course['title'] }}</h5>
                                    <p class="card-text">{{$course['duration']}} . 5 lectures</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="featured_programs d-none">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/320x500.jpg?text=Partners" alt="program_img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/320x500.jpg?text=Partners" alt="program_img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </section>
        <section class="carpousel_section d-none">
            <!-- slider container -->
            <div class="slider">
                <div class="slide">
                    <img
                            src="https://source.unsplash.com/random?landscape,mountain"
                            alt=""
                    />
                </div>
                <div class="slide">
                    <img src="https://source.unsplash.com/random?landscape,cars" alt="" />
                </div>

                <div class="slide">
                    <img src="https://source.unsplash.com/random?landscape,night" alt="" />
                </div>
                <div class="slide">
                    <img src="https://source.unsplash.com/random?landscape,city" alt="" />
                </div>

                <button class="btn btn-next">></button>
                <button class="btn btn-prev"></button>
            </div>
        </section>
{{--
        <section class="course_section">
            <div>
                <h2> A broad Selection of Courses</h2>
                    <span>Choose from 185,000 online video courses with new additions published every month</span>

            </div>
            @foreach($data as $index => $courses)
                <div class="courses_section">
                    <h2>{{ $courses[0]['program']['title'] }}</h2>

                    <div class="course_container">
                        @foreach($courses as $course)
                            <div class="course_card">
                                <div class="course grow" >
                                    <a href="{{ $course['course_image'] }}">
                                        <img
                                                class="card-img-top"
                                                style="height: 180px; width:340px; object-fit: cover"
                                                src="{{ $course['course_image'] }}" alt="" />
                                        <div class="course_details">
                                            <h6> {{ $course['title'] }}</h6>
                                            <h6>{!! $course['description'] !!}</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </section>
--}}
    </div>

@endsection

@section('body_js')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('vendor/breadcrumbs/BreadCrumbs.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.course_slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: "unslick"
                    }
                ]
        });
        });
    </script>
    <script>
        "use strict";
        new Vue({
            el: "#course",
            data: {
                search: {!! json_encode($data) !!},
            },
            methods: {
            },
            computed:{
                searchCourses(){
                    axios.get('search-courses')
                        .then(response => (this.search = response))
                    axios
                        .get('search-courses')
                        .then(response => (this.info = response))
                }
            }
        });
        // Select all slides
        const slides = document.querySelectorAll(".slide");
        // loop through slides and set each slides translateX property to index * 100%
        slides.forEach((slide, indx) => {
            slide.style.transform = `translateX(${indx * 100}%)`;
        });
        // current slide counter
        let curSlide = 0;
        // select next slide button
        const nextSlide = document.querySelector(".btn-next");
        // add event listener and next slide functionality
        {{--  nextSlide.addEventListener("click", function () {
             curSlide++;
          slides.forEach((slide, indx) => {
            slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
          });
        });  --}}
        // maximum number of slides
        let maxSlide = slides.length - 1;
        // add event listener and navigation functionality
        nextSlide.addEventListener("click", function () {
            // check if current slide is the last and reset current slide
            if (curSlide === maxSlide) {
                curSlide = 0;
            } else {
                curSlide++;
            }
//   move slide by -100%
            slides.forEach((slide, indx) => {
                slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
            });
        });
        {{--  var route = "{{ url('search-courses') }}";
        $('#search').typeahead({
            source:  function (term, process) {
            return $.get(route, { term: term }, function (data) {
                    return process(data);
                });
            }
        });  --}}
    </script>
@endsection