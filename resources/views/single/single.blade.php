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
                    <p style="border: 1px solid #f38181;border-radius: 10px"><img src="/storage/{{$event->image}}" alt="Image" class="img-fluid mb-4"></p>

                    <p>{{ $event->description }}</p>

                    <p>{{ $event->venue }}</p>

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
                                <span>{{ $myevent->start_datetime }} to {{ $myevent->end_datetime }}</span>
                            </p>
                        </div>

                    </div>
                @endforeach






            </div>
            <div class="col-lg-3 ml-auto">

                <div class="card">
                    <div class="card-header">
                        <div style="display: flex;align-items: center;justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z" />
                                <path d="M13 5v2" />
                                <path d="M13 17v2" />
                                <path d="M13 11v2" />
                            </svg>
                            <h2 style="font-size: 25px;margin: 0;">Get Your Ticket</h2>
                        </div>
                        <div>
                            <h3>{{ $event->title }}</h3>
                            <p>{{ $myevent->start_datetime }}</p>
                        </div>
                    </div>
                    <div class="card-content">
                        <div>
                            <label class="ticket-type-label" for="general">Ticket Type</label>
                            @foreach($tickets as $ticket)
                                <div>
                                    <label for="ticket-{{ $ticket->id }}">
                                        <input type="radio" id="ticket-{{ $ticket->id }}" name="selectedTicket" value="{{ $ticket->id }}">
                                        {{ $ticket->type }} - ${{ $ticket->price }} ({{ $ticket->quantity_available }} available)
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button class="button">Get Ticket</button>
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
