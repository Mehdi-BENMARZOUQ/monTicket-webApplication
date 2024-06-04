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

    .card {
        width: 100%;
        max-width: 24rem;
        background-color: #f38181;
        color: white;
    }
    .card-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
    }
    .card-content {
        padding: 1.5rem;
        gap: 1rem;
    }
    .ticket-type-label {
        font-size: 1rem;
    }
    .radio-label {
        border: 1px solid #ccc;
        background-color: white;
        color: #333;
        border-radius: 0.25rem;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .radio-label:hover {
        background-color: #ccc;
    }
    .radio-label.active {
        background-color: #f38181;
        color: white;
    }
    .button {
        width: 100%;
        background-color: white;
        color: #f38181;
        border: none;
        cursor: pointer;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        transition: background-color 0.3s ease;
    }
    .button:hover {
        background-color: #ccc;
    }
</style>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(/images/single_ticket.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1>{{ $event->title }}</h1>
                        <p class="mb-0">Don St, Brooklyn, New York</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="mb-5 border-bottom pb-5">
                    <p style="border: 3px solid #f38181;border-radius: 8px;width: 750px;height: 500px"><img style="border-radius: 5px;width: 100%;height: 100%" src="/storage/{{$event->image}}" alt="Image" class="img-fluid mb-4"></p>

                    <p>{{ $event->description }}</p>

                    <p style="font-weight: 600">Venue : {{ $event->venue }}</p>

                </div>

                <h2 class="mb-5 text-primary">More Listings</h2>


                @foreach($moreEvents as $myevent)
                    @php
                        $isFavorited = Auth::check() && Auth::user()->favorites->contains($myevent ->id);
                    @endphp
                    <div class="d-block d-md-flex listing-horizontal">

                        <a href="#" class="img d-block" style="background-image: url(/storage/{{$myevent->image}})">
                            <span class="category">{{$myevent->category->name}}</span>
                        </a>

                        <div class="lh-content">
                            <a href="#" class="bookmark">
                                @if($isFavorited)
                                    <form action="{{ route('favorites.destroy', $myevent->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="favorite-btn favorited"><span class="icon-heart"></span></button>
                                    </form>
                                @else
                                    <form action="{{ route('favorites.store', $myevent->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="favorite-btn not-favorited"><span class="icon-heart"></span></button>
                                    </form>
                                @endif
                            </a>
                            <h3><a href="{{ route('events.show', $myevent->id) }}">{{ $myevent->title }}</a></h3>
                            <p>{{ $myevent->venue }}</p>
                            <p>
                                <span>{{ date('d-M-Y',strtotime($myevent->start_datetime)) }} to {{ date('d-M-Y',strtotime($myevent->end_datetime)) }}</span>
                            </p>
                        </div>

                    </div>
                @endforeach






            </div>
            <div class="col-lg-3 ml-auto">

                <div class="card">
                    <div class="card-header">
                        <div style="height: 160px;width: 130px">

                            <img style="height: 100%;width: 100%" src="/storage/{{ Auth::user()->organization_logo }}" alt="">
                        </div>

                        <div>
                            <h3>{{ $event->title }}</h3>
                            <p>{{ date('d-M-Y',strtotime($event->start_datetime)) }}</p>
                            <p>{{ date('d-M-Y',strtotime($event->end_datetime)) }}</p>
                        </div>
                    </div>
                    <!-- Replace the existing form in the sidebar with this one -->
                    <div class="card-content">
                        <form action="{{ route('checkout.create') }}" method="GET">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <button type="submit" class="button">Get Ticket</button>
                        </form>
                    </div>
                </div>

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
                <p class="mb-0"><a href="{{ route('login') }}" class="btn btn-outline-white text-white btn-md px-5 font-weight-bold btn-md-block">Sign Up</a></p>
            </div>
        </div>
    </div>
</div>

@endguest

@include('events.footerbyCategory')
