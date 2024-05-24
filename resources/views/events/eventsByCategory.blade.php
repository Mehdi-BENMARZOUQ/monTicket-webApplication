@include('events.navbarbyCategory')
<style>
    .favorite-btn {
        border: none;
        background: none;
        cursor: pointer;
    }

    .favorite-btn.not-favorited {
        /*background: rgba(0, 0, 0, 0.1);*/
        color: #f38181;
        padding: 5px;
        border-radius: 5px;
        /*transition: background 0.3s, color 0.3s;*/
    }

    .favorite-btn.not-favorited .icon-heart {
        /*color: #f38181;*/
        color: #fff;
    }

    .favorite-btn.favorited {
        /*background: rgba(0, 0, 0, 0.1);*/
        color: #f38181;
        padding: 5px;
        border-radius: 5px;
        /*transition: background 0.3s, color 0.3s;*/
    }

    .favorite-btn.favorited .icon-heart {
        color: #f38181;
    }
</style>


<div class="site-blocks-cover inner-page-cover overlay for-image-background" style="background-image: url(/images/{{ str_replace(' ', '', ($category->name)) }}_cover.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1>{{ $category->name }}</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Discover Exciting New Experiences at <a href="#" target="_blank">www.monTicket.com</a></p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">


                @foreach($events as $event)
                    @php
                        $isFavorited = Auth::check() && Auth::user()->favorites->contains($event->id);
                    @endphp
                    <div class="d-block d-md-flex listing-horizontal">

                        <a href="#" class="img d-block" style="background-image: url(/storage/{{ $event->image }})">
                            <span class="category">{{ ($event->creator->organization_name) != "" ? $event->creator->organization_name : "Unknown" }}</span>
                        </a>




                        <div class="lh-content">
                            <a href="#" class="bookmark">
                                @if($isFavorited)
                                    <form action="{{ route('favorites.destroy', $event->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="favorite-btn favorited"><span class="icon-heart"></span></button>
                                    </form>
                                @else
                                    <form action="{{ route('favorites.store', $event->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="favorite-btn not-favorited"><span class="icon-heart"></span></button>
                                    </form>
                                @endif
                            </a>
                            <h3><a href="#">{{ $event->title }}</a></h3>
                            <p>{{ $event->venue }}</p>
                            <p>
                                <span>{{ $event->start_datetime }} to {{ $event->end_datetime }}</span>
                            </p>
                        </div>

                    </div>
                @endforeach

                    {{ $events->links() }}


            </div>
            <div class="col-lg-3 ml-auto">

                <div class="mb-5">
                    <h3 class="h5 text-black mb-3">Filters</h3>
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="What are you looking for?" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="select-wrap">
                                <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                <select class="form-control" name="" id="">
                                    <option value="">All Categories</option>
                                    <option value="">Appartment</option>
                                    <option value="">Restaurant</option>
                                    <option value="">Eat &amp; Drink</option>
                                    <option value="">Events</option>
                                    <option value="">Fitness</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- select-wrap, .wrap-icon -->
                            <div class="wrap-icon">
                                <span class="icon icon-room"></span>
                                <input type="text" placeholder="Location" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mb-5">
                    <form action="#" method="post">
                        <div class="form-group">
                            <p>Radius around selected destination</p>
                        </div>
                        <div class="form-group">
                            <input type="range" min="0" max="100" value="20" data-rangeslider>
                        </div>
                    </form>
                </div>

                <div class="mb-5">
                    <form action="#" method="post">
                        <div class="form-group">
                            <p>Category 'Restaurant' is selected</p>
                            <p>More filters</p>
                        </div>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                <li>
                                    <label for="option1">
                                        <input type="checkbox" id="option1">
                                        Coffee
                                    </label>
                                </li>
                                <li>
                                    <label for="option2">
                                        <input type="checkbox" id="option2">
                                        Vegetarian
                                    </label>
                                </li>
                                <li>
                                    <label for="option3">
                                        <input type="checkbox" id="option3">
                                        Vegan Foods
                                    </label>
                                </li>
                                <li>
                                    <label for="option4">
                                        <input type="checkbox" id="option4">
                                        Sea Foods
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Popular Categories</h2>
                <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>

        <div class="row align-items-stretch">
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="#" class="popular-category h-100">
                    <span class="icon mb-3"><span class="flaticon-hotel"></span></span>
                    <span class="caption mb-2 d-block">Hotels</span>
                    <span class="number">4,89</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="#" class="popular-category h-100">
                    <span class="icon mb-3"><span class="flaticon-microphone"></span></span>
                    <span class="caption mb-2 d-block">Events</span>
                    <span class="number">482</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="#" class="popular-category h-100">
                    <span class="icon mb-3"><span class="flaticon-flower"></span></span>
                    <span class="caption mb-2 d-block">Spa</span>
                    <span class="number">194</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="#" class="popular-category h-100">
                    <span class="icon mb-3"><span class="flaticon-restaurant"></span></span>
                    <span class="caption mb-2 d-block">Stores</span>
                    <span class="number">1,472</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="#" class="popular-category h-100">
                    <span class="icon mb-3"><span class="flaticon-cutlery"></span></span>
                    <span class="caption mb-2 d-block">Restaurants</span>
                    <span class="number">439</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="#" class="popular-category h-100">
                    <span class="icon mb-3"><span class="flaticon-bike"></span></span>
                    <span class="caption mb-2 d-block">Other</span>
                    <span class="number">692</span>
                </a>
            </div>
        </div>


    </div>
</div>

@guest
<div class="py-5 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mr-auto mb-4 mb-lg-0">
                <h2 class="mb-3 mt-0 text-white">Let's get started. Create your account</h2>
                <p class="mb-0 text-white">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            <div class="col-lg-4">
                <p class="mb-0"><a href="signup.html" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>
@endguest

@include('events.footerbyCategory')
