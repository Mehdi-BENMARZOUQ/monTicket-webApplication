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
                        $isFavorited = Auth::check() && Auth::user()->events->contains($event);
                    @endphp
                    <div class="d-block d-md-flex listing-horizontal event-item" data-title="{{ strtolower($event->title) }}">
                        <a href="{{ route('events.show', $event->id) }}" class="img d-block" style="background-image: url(/storage/{{ $event->image }})">
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
                            <h3><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></h3>
                            <p>{{ $event->venue }}</p>
                            <p><span>{{ date('d-M-Y',strtotime($event->start_datetime)) }} to {{ date('d-M-Y',strtotime($event->end_datetime)) }}</span></p>
                        </div>
                    </div>
                @endforeach


                {{ $events->links() }}


            </div>
            <div class="col-lg-3 ml-auto">

                <div class="mb-5">
                    <h3 class="h5 text-black mb-3">Search by Title</h3>
                    <form id="filterForm">
                        <div class="form-group">
                            <input type="text" id="searchTitle" placeholder="Search by title" class="form-control">
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
                <a href="{{ route('events.byCategory', 'MUSIC') }}" class="popular-category h-100">
                        <span class="icon mb-3">
                            <svg width="50" height="50" fill="none" viewBox="0 0 40 41">
                                <g id="mic_svg__icon_selection">
                                    <path id="mic_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M12.813 5.003a7.812 7.812 0 00-4.705 14.05 2.5 2.5 0 004.24 2.137l.556-.555 12.322 10.47c.247.21.614.195.845-.033l.517-.512c.494.43 1.141.693 1.85.693a2.8 2.8 0 001.497-.431l3.998 3.998a.625.625 0 00.884-.884l-3.998-3.998a2.8 2.8 0 00.43-1.497c0-.698-.254-1.337-.674-1.828l.546-.54a.625.625 0 00.035-.85L20.633 12.905l.554-.554a2.5 2.5 0 00-2.137-4.24 7.801 7.801 0 00-6.237-3.109zm15.624 25c-.36 0-.692-.122-.956-.327l2.201-2.18a1.562 1.562 0 01-1.245 2.507zm-8.691-16.21L18.1 15.439a.625.625 0 11-.884-.884l3.087-3.087A1.25 1.25 0 0018.535 9.7L9.697 18.54a1.25 1.25 0 101.768 1.768l3.072-3.073a.625.625 0 01.884.884l-1.63 1.63L25.599 29.78l4.23-4.188-10.083-11.799zm-1.882-5.166a6.548 6.548 0 00-5.127-2.373l3.7 3.778 1.215-1.216c.068-.068.139-.131.212-.19zm-6.678-2.17a6.543 6.543 0 00-2.551 1.298l4.933 4.962a.626.626 0 01.082.101l1.902-1.902-4.366-4.46zM7.751 8.639a6.543 6.543 0 00-1.297 2.55l4.465 4.36 1.866-1.866a.632.632 0 01-.103-.085l-4.93-4.96zm-1.5 4.099v.078c0 2.03.922 3.847 2.372 5.051.059-.073.122-.144.19-.212l1.222-1.222-3.784-3.695zm14.816 4.948a.625.625 0 00-.884.884l1.25 1.25a.625.625 0 10.884-.884l-1.25-1.25z" fill="#f38181" style="stroke-width: 1px; stroke: #f38181;"></path>
                                </g>
                            </svg>
                        </span>
                    <span class="caption mb-2 d-block">Music</span>
                    <span class="number">4,89</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="{{ route('events.byCategory', 'PERFORMING & VISUAL ARTS') }}" class="popular-category h-100">
                        <span class="icon mb-3">
                        <svg width="50" height="50" fill="none" viewBox="0 0 40 41">
                          <path style="stroke-width: 1px; stroke: #f38181;" fill="#f38181" fill-rule="evenodd" clip-rule="evenodd" d="M5.625 5.002a.625.625 0 00-.623.67l.992 13.75a.632.632 0 00.006.056c.214 4.119 3.598 7.4 7.75 7.4a7.69 7.69 0 004.588-1.512l.16 2.173c.181 4.149 3.578 7.463 7.752 7.463 4.174 0 7.571-3.314 7.754-7.464l.994-13.74a.625.625 0 00-.623-.67h-.206a.62.62 0 00-.12.01c-1.894.374-4.678.614-7.799.614-1.544 0-3.009-.059-4.325-.164l.573-7.916a.625.625 0 00-.623-.67h-.206a.626.626 0 00-.12.012c-1.894.373-4.678.613-7.799.613-3.121 0-5.905-.24-7.798-.613a.625.625 0 00-.121-.012h-.206zm16.21 9.833l-.331 4.578a7.815 7.815 0 01-1.991 4.884l.232 3.16v.02c.15 3.494 3.009 6.275 6.505 6.275s6.355-2.78 6.505-6.277v-.008l.001-.01.94-12.983c-1.953.33-4.576.528-7.446.528-1.571 0-3.065-.06-4.415-.167zM13.75 6.877c-2.87 0-5.493-.199-7.446-.528l.932 12.913c.005.029.009.059.01.09.149 3.494 3.008 6.275 6.504 6.275 3.496 0 6.355-2.78 6.505-6.277l.001-.018.94-12.983c-1.953.33-4.576.528-7.446.528z" />
                          <path style="stroke-width: 1px; stroke: #f38181;" fill="#f38181" d="M15.148 11.062h.003l.014-.004a5.129 5.129 0 01.293-.076c.2-.047.477-.106.787-.152.653-.097 1.32-.115 1.734.04.33.123.624.325.842.51a3.45 3.45 0 01.308.292l.013.014.001.002a.625.625 0 00.953-.809l-.477.404.477-.404-.002-.002-.001-.001-.002-.002-.008-.01a3.204 3.204 0 00-.12-.13 4.746 4.746 0 00-.337-.311 4.195 4.195 0 00-1.21-.725c-.738-.275-1.684-.204-2.355-.104a10.768 10.768 0 00-1.235.26l-.02.006-.007.002h-.002s-.001.001.172.59l-.172-.59a.626.626 0 00.351 1.2zM24.783 19.163a.625.625 0 00.49-1.15l-.245.575.246-.575h-.002l-.002-.002-.008-.002-.022-.01a5.257 5.257 0 00-.343-.121 6.967 6.967 0 00-.93-.223c-.765-.13-1.82-.18-2.918.175a.625.625 0 10.384 1.19c.845-.273 1.684-.241 2.326-.133a5.709 5.709 0 01.966.253l.048.019.01.004zM33.437 19.689c-1.099-.42-2.234-.802-3.308-.764-.337.012-.61.094-.821.234-.206.136-.39.35-.516.695-.263.719-.268 1.992.39 4.07.03.1.07.206.12.337l.076.204c.079.214.166.467.224.727.107.486.159 1.238-.468 1.746-.688.557-1.547.31-2.013.116a4.535 4.535 0 01-.904-.512l-.017-.013-.005-.004-.002-.001-.001-.001.357-.468-.357.468a.625.625 0 01.758-.994s.001.001-.379.497l.38-.496.007.005a2.295 2.295 0 00.175.118c.124.078.29.172.47.248.423.176.648.143.743.066.041-.033.12-.122.035-.505a4.523 4.523 0 00-.176-.566l-.059-.157c-.055-.147-.114-.305-.157-.438-.684-2.161-.778-3.764-.37-4.877.209-.572.55-1.011.999-1.308.443-.293.953-.422 1.467-.44 1.357-.048 2.71.43 3.798.845a.625.625 0 01-.446 1.168zM28.066 30.276a.625.625 0 00-.027-.884c-1.541-1.45-3.365-1.555-4.997-1.16a.625.625 0 00.294 1.215c1.369-.331 2.708-.216 3.847.855a.625.625 0 00.883-.026zM9.871 10.8c-1.082-.038-2.306.277-3.298.712a.625.625 0 11-.502-1.145c1.106-.484 2.52-.863 3.844-.816.514.018 1.024.147 1.467.44.448.297.79.736 1 1.308.407 1.113.313 2.716-.371 4.877-.042.133-.102.29-.157.437l-.059.158a4.523 4.523 0 00-.177.566c-.084.383-.006.471.035.505.096.077.321.11.744-.066a3.285 3.285 0 00.645-.366l.007-.005a.626.626 0 01.76.993l-.38-.497.38.497-.003.002-.006.004-.017.013a3.585 3.585 0 01-.25.17c-.161.1-.39.232-.654.342-.466.195-1.326.44-2.013-.116-.627-.508-.575-1.26-.468-1.746.058-.26.145-.513.224-.727l.076-.204c.049-.13.09-.237.12-.337.658-2.077.653-3.351.39-4.07-.126-.344-.31-.56-.516-.695-.211-.14-.484-.222-.821-.234zM16.62 20.41a.625.625 0 10-.857-.91c-1.138 1.071-2.478 1.187-3.847.855a.625.625 0 10-.294 1.215c1.632.395 3.456.291 4.997-1.16zM23.714 20.628a.977.977 0 011.004.95.977.977 0 01-.935 1.018c-.562.02-.983-.436-1.001-.95-.018-.514.37-.999.932-1.018z" />
                          <path style="stroke-width: 1px; stroke: #f38181;" fill="#f38181" d="M31.214 20.628a.977.977 0 011.004.95.977.977 0 01-.935 1.018c-.562.02-.983-.436-1.001-.95-.018-.514.37-.999.932-1.018zM16.286 12.503a.977.977 0 00-1.004.95.977.977 0 00.935 1.019c.562.02.983-.437 1.001-.951.018-.514-.37-.999-.932-1.018zM8.786 12.503a.977.977 0 00-1.004.95.977.977 0 00.935 1.019c.562.02.983-.437 1.001-.951.018-.514-.37-.999-.932-1.018z" />
                        </svg>

                        </span>
                    <span class="caption mb-2 d-block">Performing & Visual Arts</span>
                    <span class="number">482</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="{{ route('events.byCategory', 'TRIPS') }}" class="popular-category h-100">
                        <span class="icon mb-3">
                            <svg width="50" height="50" fill="#f38181" viewBox="0 0 28 36" xmlns="http://www.w3.org/2000/svg">
                              <path style="stroke-width: 1px; stroke: #f38181;" fill-rule="evenodd" clip-rule="evenodd" d="M7.676 0a.75.75 0 01.75.75v.75h12V.75a.75.75 0 011.5 0v.75h5.25a.75.75 0 01.75.75v33a.75.75 0 01-.75.75h-25.5a.75.75 0 01-.75-.75v-33a.75.75 0 01.75-.75h5.25V.75a.75.75 0 01.75-.75zm-.75 3.75V3h-4.5v6h3.75a.75.75 0 010 1.5h-3.75v24h24v-24h-15.75a.75.75 0 010-1.5h15.75V3h-4.5v.75a.75.75 0 01-1.5 0V3h-12v.75a.75.75 0 01-1.5 0zM5.76 26.17a.75.75 0 11-.67-1.34l1.5-.75a.75.75 0 01.67 1.34l-1.5.75zm3.634-9.14l-1.5-1.5a.75.75 0 111.061-1.06l1.5 1.5a.75.75 0 11-1.06 1.06zm13.695 9.14a.75.75 0 10.671-1.34l-1.5-.75a.75.75 0 10-.67 1.34l1.5.75zm-4.695-9.14a.75.75 0 001.061 0l1.5-1.5a.75.75 0 10-1.06-1.06l-1.5 1.5a.75.75 0 000 1.06zm-4.72 15.22a.75.75 0 001.5 0v-1.5a.75.75 0 00-1.5 0v1.5zm-8.92-13.085a.75.75 0 011.006-.336l1.5.75a.75.75 0 11-.67 1.342l-1.5-.75a.75.75 0 01-.336-1.006zm3.14 10.305l1.5-1.5a.75.75 0 011.061 1.06l-1.5 1.5a.75.75 0 01-1.06-1.06zm16.202-10.305a.75.75 0 00-1.007-.336l-1.5.75a.75.75 0 10.671 1.342l1.5-.75a.75.75 0 00.336-1.006zm-4.64 8.805a.75.75 0 10-1.062 1.06l1.5 1.5a.75.75 0 101.061-1.06l-1.5-1.5zM14.425 12a.75.75 0 00-.75.75v1.5a.75.75 0 001.5 0v-1.5a.75.75 0 00-.75-.75zm-3.75 10.5a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zm3.75-5.25a5.25 5.25 0 100 10.5 5.25 5.25 0 000-10.5z" />
                            </svg>
                        </span>
                    <span class="caption mb-2 d-block">TRIPS</span>
                    <span class="number">194</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="{{ route('events.byCategory', 'HEALTH') }}" class="popular-category h-100">
                        <span class="icon mb-3">
                            <svg width="50" height="50" fill="#f38181" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                              <path style="stroke-width: 1px; stroke: #f38181;" fill-rule="evenodd" clip-rule="evenodd" d="M8.75 5a.75.75 0 00-.75.75v.833a.75.75 0 101.5 0V5.75A.75.75 0 008.75 5zM7 5.75a1.75 1.75 0 113.5 0v.833a1.75 1.75 0 01-3.45.415A.506.506 0 017 7a1 1 0 00-.999.997l.017.088c.016.079.04.184.074.316.067.263.163.613.28 1.023.233.819.544 1.86.856 2.888A473.596 473.596 0 008.368 16h1.36a.5.5 0 01.5.5c0 1.15.837 2 1.772 2s1.773-.85 1.773-2a.5.5 0 01.5-.5h1.36a608.16 608.16 0 001.139-3.688c.312-1.027.623-2.07.857-2.888.116-.41.212-.76.279-1.023a7.927 7.927 0 00.09-.404L18 7.99A1 1 0 0017 7c-.017 0-.033 0-.05-.002a1.75 1.75 0 01-3.45-.415V5.75a1.75 1.75 0 113.5 0V6a2 2 0 012 2c0 .093-.021.205-.038.288-.02.099-.05.22-.085.358-.07.278-.17.639-.287 1.052-.235.827-.549 1.876-.862 2.904A474.015 474.015 0 0116.68 16H17a.5.5 0 01.5.5 5.5 5.5 0 01-4.98 5.476C12.75 24.807 15.02 27 17.75 27c2.88 0 5.25-2.442 5.25-5.5v-1.035a3.501 3.501 0 111 0V21.5c0 3.57-2.778 6.5-6.25 6.5-3.315 0-5.998-2.672-6.233-6.02A5.5 5.5 0 016.5 16.5.5.5 0 017 16h.32a495.395 495.395 0 01-1.048-3.398 183.988 183.988 0 01-.862-2.904 38.924 38.924 0 01-.287-1.052 8.747 8.747 0 01-.085-.358A1.534 1.534 0 015 8a2 2 0 012-2v-.25zM16.473 17a4.5 4.5 0 01-8.946 0h.461a.45.45 0 00.023 0h1.255c.218 1.388 1.325 2.5 2.734 2.5 1.41 0 2.516-1.112 2.734-2.5H16.472zM26 17a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM15.25 5a.75.75 0 00-.75.75v.833a.75.75 0 001.5 0V5.75a.75.75 0 00-.75-.75zm7.998 11.568a.5.5 0 10-.504-.864 1.5 1.5 0 102.049 2.057.5.5 0 10-.862-.508.5.5 0 11-.683-.685z" />
                            </svg>


                        </span>
                    <span class="caption mb-2 d-block">Health</span>
                    <span class="number">1,472</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="{{ route('events.byCategory', 'VIDEO GAMES') }}" class="popular-category h-100">
                        <span class="icon mb-3">
                            <svg width="50" height="50" fill="#f38181" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                              <path style="stroke-width: 1px; stroke: #f38181;" fill-rule="evenodd" clip-rule="evenodd" d="M19.004 4a.5.5 0 110 1h-.5A2.003 2.003 0 0016.5 7.003V9a.508.508 0 01-.004.062A2 2 0 0118 11h2a5.501 5.501 0 015.455 4.792c.009.02.016.04.023.06l2.29 7.39c.06.16.11.324.148.493l.003.014.03.155.002.009v.004a3.5 3.5 0 01-6.384 2.494c-.083-.127-1.03-1.599-2.84-4.411h-5.454c-1.81 2.814-2.76 4.289-2.845 4.418a3.5 3.5 0 01-6.189-3.192l2.283-7.374a.512.512 0 01.023-.06A5.501 5.501 0 0112 11h2a2 2 0 011.504-1.938A.508.508 0 0115.5 9V7.003A3.003 3.003 0 0118.503 4h.5zM16 10a1 1 0 011 1h-2a1 1 0 011-1zm-8.5 6.5A4.5 4.5 0 0112 12h8a4.5 4.5 0 013.887 6.77.5.5 0 10.863.505c.177-.303.326-.624.444-.96l1.623 5.24a2.465 2.465 0 01.122.392l.027.142a2.5 2.5 0 01-4.562 1.776L19.917 22H20c.797 0 1.556-.17 2.241-.476a.5.5 0 10-.408-.913c-.559.25-1.18.389-1.833.389h-8a4.5 4.5 0 01-4.5-4.5zm4.584 5.5H12a5.502 5.502 0 01-5.193-3.685L5.189 23.54a2.492 2.492 0 00-.19.96 2.5 2.5 0 004.593 1.37c.076-.116.906-1.404 2.492-3.869zm7.416-8.5a1 1 0 100 2 1 1 0 000-2zm-1 5a1 1 0 112 0 1 1 0 01-2 0zm3-3a1 1 0 100 2 1 1 0 000-2zm-5 1a1 1 0 112 0 1 1 0 01-2 0zm-5-2.5a.5.5 0 01.5.5V16h1.5a.5.5 0 010 1H12v1.5a.5.5 0 01-1 0V17H9.5a.5.5 0 110-1H11v-1.5a.5.5 0 01.5-.5z" />
                            </svg>
                        </span>
                    <span class="caption mb-2 d-block">VIDEO GAMES</span>
                    <span class="number">439</span>
                </a>
            </div>
            <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                <a href="{{ route('events.byCategory', 'SEMINAR') }}" class="popular-category h-100">
                        <span class="icon mb-3">
                            <svg width="50" height="50" fill="none" viewBox="0 0 32 33">
                              <g id="buisness-profession_svg__icon_selection">
                                <path style="stroke-width: 1px; stroke: #f38181;" id="buisness-profession_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M15.002 5.936L15 6.01v.493h2V6.01l-.002-.073a1 1 0 00-1.996 0zM18 6.502h9.5a.5.5 0 010 1H27v16h.5a.5.5 0 110 1h-3.172l.046.046.006.005.006.007.067.072.011.012a2 2 0 01-2.833 2.813l-.01-.01-.065-.06-.006-.007-.004-.003-2.875-2.875H13.41l-2.873 2.874-.01.01-.065.061-.01.01a2 2 0 01-2.834-2.813l.011-.012.068-.072.011-.012.046-.046H4.5a.5.5 0 010-1H5v-16h-.5a.5.5 0 010-1H14v-.514l.003-.089v-.014a2 2 0 013.994 0v.014l.003.089v.514zm-12 1v16h20v-16H6zm16.914 17h-2.828l2.162 2.162.053.05a1 1 0 001.416-1.405l-.055-.06-.748-.747zm-10.919 0H9.167l-.747.747-.056.06a1 1 0 001.416 1.405l.054-.05 2.161-2.162zM8.145 9.65a.5.5 0 01.355-.147h6a.5.5 0 01.5.496l.04 5.5a.5.5 0 11-1 .008l-.036-5.004H9.002l.036 10h5.002v-2a.5.5 0 111 0v2.5a.5.5 0 01-.5.5h-6a.5.5 0 01-.5-.498l-.04-11a.5.5 0 01.146-.355zM17 18.002a.5.5 0 100 1h6.5a.5.5 0 000-1H17zm-.5-2.5a.5.5 0 01.5-.5h5.5a.5.5 0 110 1H17a.5.5 0 01-.5-.5zm.5-3.5a.5.5 0 100 1h6.5a.5.5 0 000-1H17z" fill="#3A3247"></path>
                              </g>
                            </svg>
                        </span>
                    <span class="caption mb-2 d-block">SEMINAR</span>
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

<script>
    document.getElementById("searchInput").addEventListener("input", function() {
        var input, filter, eventItems, i, title;
        input = this;
        filter = input.value.toUpperCase();
        eventItems = document.getElementsByClassName("event-item");

        for (i = 0; i < eventItems.length; i++) {
            title = eventItems[i].getAttribute("data-title");
            if (title.toUpperCase().indexOf(filter) > -1) {
                eventItems[i].style.display = "";
            } else {
                eventItems[i].style.display = "none";
            }
        }
    });


</script>
