
@include('navBar')

@php

@endphp
    <div class="site-blocks-cover overlay" style="background-image: url(/images/ticket_cover.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10">


                    <div class="row justify-content-center mb-4">
                        <div class="col-md-10 text-center">
                            <h1 data-aos="fade-up"><span class="typed-words"></span></h1>
                            <p data-aos="fade-up" data-aos-delay="100">Discover Exciting New Experiences at <a href="#" target="_blank">www.monTicket.com</a></p>
                        </div>
                    </div>

                    <div class="form-search-wrap p-2" data-aos="fade-up" data-aos-delay="200">
                        <form method="GET" action="{{ route('events.search') }}">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-4 no-sm-border border-right">
                                    Where are you searching?
                                </div>
                                <div class="col-lg-12 col-xl-3 no-sm-border border-right">
                                    <div class="wrap-icon">
                                        <span class="icon icon-room"></span>
                                        <select class="form-control" name="location" required>
                                            <option value="" disabled selected>Select Location</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Fes">Fes</option>
                                            <option value="Tangier">Tangier</option>
                                            <option value="Agadir">Agadir</option>
                                            <option value="Oujda">Oujda</option>
                                            <option value="Kenitra">Kenitra</option>
                                            <option value="Tetouan">Tetouan</option>
                                            <option value="Safi">Safi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-3">
                                    <div class="select-wrap">
                                        <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                        <select class="form-control" name="category" required>
                                            <option value="" disabled selected>Select Category</option>
                                            <option value="MUSIC">MUSIC</option>
                                            <option value="PERFORMING & VISUAL ARTS">PERFORMING & VISUAL ARTS</option>
                                            <option value="TRIPS">TRIPS</option>
                                            <option value="HEALTH">HEALTH</option>
                                            <option value="VIDEO GAMES">VIDEO GAMES</option>
                                            <option value="SEMINAR">SEMINAR</option>
                                            <option value="FOOD & DRINK">FOOD & DRINK</option>
                                            <option value="FESTIVALS">FESTIVALS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                    <input type="submit" class="btn text-white btn-primary" value="Search">
                                </div>
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

            <div class="row align-items-stretch" id="first-row">
                @foreach ($categoryCountsMap as $categoryName => $count)
                <div class="col-6 col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2 mt-3">
                    <a href="{{ route('events.byCategory', $categoryName) }}" class="popular-category h-100">
                        <span class="icon mb-3">
                            @if($categoryName == 'MUSIC')
                                <svg width="50" height="50" fill="none" viewBox="0 0 40 41">
                                    <g id="mic_svg__icon_selection">
                                        <path id="mic_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M12.813 5.003a7.812 7.812 0 00-4.705 14.05 2.5 2.5 0 004.24 2.137l.556-.555 12.322 10.47c.247.21.614.195.845-.033l.517-.512c.494.43 1.141.693 1.85.693a2.8 2.8 0 001.497-.431l3.998 3.998a.625.625 0 00.884-.884l-3.998-3.998a2.8 2.8 0 00.43-1.497c0-.698-.254-1.337-.674-1.828l.546-.54a.625.625 0 00.035-.85L20.633 12.905l.554-.554a2.5 2.5 0 00-2.137-4.24 7.801 7.801 0 00-6.237-3.109zm15.624 25c-.36 0-.692-.122-.956-.327l2.201-2.18a1.562 1.562 0 01-1.245 2.507zm-8.691-16.21L18.1 15.439a.625.625 0 11-.884-.884l3.087-3.087A1.25 1.25 0 0018.535 9.7L9.697 18.54a1.25 1.25 0 101.768 1.768l3.072-3.073a.625.625 0 01.884.884l-1.63 1.63L25.599 29.78l4.23-4.188-10.083-11.799zm-1.882-5.166a6.548 6.548 0 00-5.127-2.373l3.7 3.778 1.215-1.216c.068-.068.139-.131.212-.19zm-6.678-2.17a6.543 6.543 0 00-2.551 1.298l4.933 4.962a.626.626 0 01.082.101l1.902-1.902-4.366-4.46zM7.751 8.639a6.543 6.543 0 00-1.297 2.55l4.465 4.36 1.866-1.866a.632.632 0 01-.103-.085l-4.93-4.96zm-1.5 4.099v.078c0 2.03.922 3.847 2.372 5.051.059-.073.122-.144.19-.212l1.222-1.222-3.784-3.695zm14.816 4.948a.625.625 0 00-.884.884l1.25 1.25a.625.625 0 10.884-.884l-1.25-1.25z" fill="#f38181" style="stroke-width: 1px; stroke: #f38181;"></path>
                                    </g>
                                </svg>
                            @elseif($categoryName == 'PERFORMING & VISUAL ARTS')
                                <svg width="50" height="50" fill="none" viewBox="0 0 40 41">
                                  <path style="stroke-width: 1px; stroke: #f38181;" fill="#f38181" fill-rule="evenodd" clip-rule="evenodd" d="M5.625 5.002a.625.625 0 00-.623.67l.992 13.75a.632.632 0 00.006.056c.214 4.119 3.598 7.4 7.75 7.4a7.69 7.69 0 004.588-1.512l.16 2.173c.181 4.149 3.578 7.463 7.752 7.463 4.174 0 7.571-3.314 7.754-7.464l.994-13.74a.625.625 0 00-.623-.67h-.206a.62.62 0 00-.12.01c-1.894.374-4.678.614-7.799.614-1.544 0-3.009-.059-4.325-.164l.573-7.916a.625.625 0 00-.623-.67h-.206a.626.626 0 00-.12.012c-1.894.373-4.678.613-7.799.613-3.121 0-5.905-.24-7.798-.613a.625.625 0 00-.121-.012h-.206zm16.21 9.833l-.331 4.578a7.815 7.815 0 01-1.991 4.884l.232 3.16v.02c.15 3.494 3.009 6.275 6.505 6.275s6.355-2.78 6.505-6.277v-.008l.001-.01.94-12.983c-1.953.33-4.576.528-7.446.528-1.571 0-3.065-.06-4.415-.167zM13.75 6.877c-2.87 0-5.493-.199-7.446-.528l.932 12.913c.005.029.009.059.01.09.149 3.494 3.008 6.275 6.504 6.275 3.496 0 6.355-2.78 6.505-6.277l.001-.018.94-12.983c-1.953.33-4.576.528-7.446.528z" />
                                  <path style="stroke-width: 1px; stroke: #f38181;" fill="#f38181" d="M15.148 11.062h.003l.014-.004a5.129 5.129 0 01.293-.076c.2-.047.477-.106.787-.152.653-.097 1.32-.115 1.734.04.33.123.624.325.842.51a3.45 3.45 0 01.308.292l.013.014.001.002a.625.625 0 00.953-.809l-.477.404.477-.404-.002-.002-.001-.001-.002-.002-.008-.01a3.204 3.204 0 00-.12-.13 4.746 4.746 0 00-.337-.311 4.195 4.195 0 00-1.21-.725c-.738-.275-1.684-.204-2.355-.104a10.768 10.768 0 00-1.235.26l-.02.006-.007.002h-.002s-.001.001.172.59l-.172-.59a.626.626 0 00.351 1.2zM24.783 19.163a.625.625 0 00.49-1.15l-.245.575.246-.575h-.002l-.002-.002-.008-.002-.022-.01a5.257 5.257 0 00-.343-.121 6.967 6.967 0 00-.93-.223c-.765-.13-1.82-.18-2.918.175a.625.625 0 10.384 1.19c.845-.273 1.684-.241 2.326-.133a5.709 5.709 0 01.966.253l.048.019.01.004zM33.437 19.689c-1.099-.42-2.234-.802-3.308-.764-.337.012-.61.094-.821.234-.206.136-.39.35-.516.695-.263.719-.268 1.992.39 4.07.03.1.07.206.12.337l.076.204c.079.214.166.467.224.727.107.486.159 1.238-.468 1.746-.688.557-1.547.31-2.013.116a4.535 4.535 0 01-.904-.512l-.017-.013-.005-.004-.002-.001-.001-.001.357-.468-.357.468a.625.625 0 01.758-.994s.001.001-.379.497l.38-.496.007.005a2.295 2.295 0 00.175.118c.124.078.29.172.47.248.423.176.648.143.743.066.041-.033.12-.122.035-.505a4.523 4.523 0 00-.176-.566l-.059-.157c-.055-.147-.114-.305-.157-.438-.684-2.161-.778-3.764-.37-4.877.209-.572.55-1.011.999-1.308.443-.293.953-.422 1.467-.44 1.357-.048 2.71.43 3.798.845a.625.625 0 01-.446 1.168zM28.066 30.276a.625.625 0 00-.027-.884c-1.541-1.45-3.365-1.555-4.997-1.16a.625.625 0 00.294 1.215c1.369-.331 2.708-.216 3.847.855a.625.625 0 00.883-.026zM9.871 10.8c-1.082-.038-2.306.277-3.298.712a.625.625 0 11-.502-1.145c1.106-.484 2.52-.863 3.844-.816.514.018 1.024.147 1.467.44.448.297.79.736 1 1.308.407 1.113.313 2.716-.371 4.877-.042.133-.102.29-.157.437l-.059.158a4.523 4.523 0 00-.177.566c-.084.383-.006.471.035.505.096.077.321.11.744-.066a3.285 3.285 0 00.645-.366l.007-.005a.626.626 0 01.76.993l-.38-.497.38.497-.003.002-.006.004-.017.013a3.585 3.585 0 01-.25.17c-.161.1-.39.232-.654.342-.466.195-1.326.44-2.013-.116-.627-.508-.575-1.26-.468-1.746.058-.26.145-.513.224-.727l.076-.204c.049-.13.09-.237.12-.337.658-2.077.653-3.351.39-4.07-.126-.344-.31-.56-.516-.695-.211-.14-.484-.222-.821-.234zM16.62 20.41a.625.625 0 10-.857-.91c-1.138 1.071-2.478 1.187-3.847.855a.625.625 0 10-.294 1.215c1.632.395 3.456.291 4.997-1.16zM23.714 20.628a.977.977 0 011.004.95.977.977 0 01-.935 1.018c-.562.02-.983-.436-1.001-.95-.018-.514.37-.999.932-1.018z" />
                                  <path style="stroke-width: 1px; stroke: #f38181;" fill="#f38181" d="M31.214 20.628a.977.977 0 011.004.95.977.977 0 01-.935 1.018c-.562.02-.983-.436-1.001-.95-.018-.514.37-.999.932-1.018zM16.286 12.503a.977.977 0 00-1.004.95.977.977 0 00.935 1.019c.562.02.983-.437 1.001-.951.018-.514-.37-.999-.932-1.018zM8.786 12.503a.977.977 0 00-1.004.95.977.977 0 00.935 1.019c.562.02.983-.437 1.001-.951.018-.514-.37-.999-.932-1.018z" />
                                </svg>
                            @elseif($categoryName == 'TRIPS')
                                <svg width="50" height="50" fill="#f38181" viewBox="0 0 28 36" xmlns="http://www.w3.org/2000/svg">
                                  <path style="stroke-width: 1px; stroke: #f38181;" fill-rule="evenodd" clip-rule="evenodd" d="M7.676 0a.75.75 0 01.75.75v.75h12V.75a.75.75 0 011.5 0v.75h5.25a.75.75 0 01.75.75v33a.75.75 0 01-.75.75h-25.5a.75.75 0 01-.75-.75v-33a.75.75 0 01.75-.75h5.25V.75a.75.75 0 01.75-.75zm-.75 3.75V3h-4.5v6h3.75a.75.75 0 010 1.5h-3.75v24h24v-24h-15.75a.75.75 0 010-1.5h15.75V3h-4.5v.75a.75.75 0 01-1.5 0V3h-12v.75a.75.75 0 01-1.5 0zM5.76 26.17a.75.75 0 11-.67-1.34l1.5-.75a.75.75 0 01.67 1.34l-1.5.75zm3.634-9.14l-1.5-1.5a.75.75 0 111.061-1.06l1.5 1.5a.75.75 0 11-1.06 1.06zm13.695 9.14a.75.75 0 10.671-1.34l-1.5-.75a.75.75 0 10-.67 1.34l1.5.75zm-4.695-9.14a.75.75 0 001.061 0l1.5-1.5a.75.75 0 10-1.06-1.06l-1.5 1.5a.75.75 0 000 1.06zm-4.72 15.22a.75.75 0 001.5 0v-1.5a.75.75 0 00-1.5 0v1.5zm-8.92-13.085a.75.75 0 011.006-.336l1.5.75a.75.75 0 11-.67 1.342l-1.5-.75a.75.75 0 01-.336-1.006zm3.14 10.305l1.5-1.5a.75.75 0 011.061 1.06l-1.5 1.5a.75.75 0 01-1.06-1.06zm16.202-10.305a.75.75 0 00-1.007-.336l-1.5.75a.75.75 0 10.671 1.342l1.5-.75a.75.75 0 00.336-1.006zm-4.64 8.805a.75.75 0 10-1.062 1.06l1.5 1.5a.75.75 0 101.061-1.06l-1.5-1.5zM14.425 12a.75.75 0 00-.75.75v1.5a.75.75 0 001.5 0v-1.5a.75.75 0 00-.75-.75zm-3.75 10.5a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zm3.75-5.25a5.25 5.25 0 100 10.5 5.25 5.25 0 000-10.5z" />
                                </svg>
                            @elseif($categoryName == 'HEALTH')
                                <svg width="50" height="50" fill="#f38181" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                  <path style="stroke-width: 1px; stroke: #f38181;" fill-rule="evenodd" clip-rule="evenodd" d="M8.75 5a.75.75 0 00-.75.75v.833a.75.75 0 101.5 0V5.75A.75.75 0 008.75 5zM7 5.75a1.75 1.75 0 113.5 0v.833a1.75 1.75 0 01-3.45.415A.506.506 0 017 7a1 1 0 00-.999.997l.017.088c.016.079.04.184.074.316.067.263.163.613.28 1.023.233.819.544 1.86.856 2.888A473.596 473.596 0 008.368 16h1.36a.5.5 0 01.5.5c0 1.15.837 2 1.772 2s1.773-.85 1.773-2a.5.5 0 01.5-.5h1.36a608.16 608.16 0 001.139-3.688c.312-1.027.623-2.07.857-2.888.116-.41.212-.76.279-1.023a7.927 7.927 0 00.09-.404L18 7.99A1 1 0 0017 7c-.017 0-.033 0-.05-.002a1.75 1.75 0 01-3.45-.415V5.75a1.75 1.75 0 113.5 0V6a2 2 0 012 2c0 .093-.021.205-.038.288-.02.099-.05.22-.085.358-.07.278-.17.639-.287 1.052-.235.827-.549 1.876-.862 2.904A474.015 474.015 0 0116.68 16H17a.5.5 0 01.5.5 5.5 5.5 0 01-4.98 5.476C12.75 24.807 15.02 27 17.75 27c2.88 0 5.25-2.442 5.25-5.5v-1.035a3.501 3.501 0 111 0V21.5c0 3.57-2.778 6.5-6.25 6.5-3.315 0-5.998-2.672-6.233-6.02A5.5 5.5 0 016.5 16.5.5.5 0 017 16h.32a495.395 495.395 0 01-1.048-3.398 183.988 183.988 0 01-.862-2.904 38.924 38.924 0 01-.287-1.052 8.747 8.747 0 01-.085-.358A1.534 1.534 0 015 8a2 2 0 012-2v-.25zM16.473 17a4.5 4.5 0 01-8.946 0h.461a.45.45 0 00.023 0h1.255c.218 1.388 1.325 2.5 2.734 2.5 1.41 0 2.516-1.112 2.734-2.5H16.472zM26 17a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM15.25 5a.75.75 0 00-.75.75v.833a.75.75 0 001.5 0V5.75a.75.75 0 00-.75-.75zm7.998 11.568a.5.5 0 10-.504-.864 1.5 1.5 0 102.049 2.057.5.5 0 10-.862-.508.5.5 0 11-.683-.685z" />
                                </svg>
                            @elseif($categoryName == 'VIDEO GAMES')
                                <svg width="50" height="50" fill="#f38181" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                  <path style="stroke-width: 1px; stroke: #f38181;" fill-rule="evenodd" clip-rule="evenodd" d="M19.004 4a.5.5 0 110 1h-.5A2.003 2.003 0 0016.5 7.003V9a.508.508 0 01-.004.062A2 2 0 0118 11h2a5.501 5.501 0 015.455 4.792c.009.02.016.04.023.06l2.29 7.39c.06.16.11.324.148.493l.003.014.03.155.002.009v.004a3.5 3.5 0 01-6.384 2.494c-.083-.127-1.03-1.599-2.84-4.411h-5.454c-1.81 2.814-2.76 4.289-2.845 4.418a3.5 3.5 0 01-6.189-3.192l2.283-7.374a.512.512 0 01.023-.06A5.501 5.501 0 0112 11h2a2 2 0 011.504-1.938A.508.508 0 0115.5 9V7.003A3.003 3.003 0 0118.503 4h.5zM16 10a1 1 0 011 1h-2a1 1 0 011-1zm-8.5 6.5A4.5 4.5 0 0112 12h8a4.5 4.5 0 013.887 6.77.5.5 0 10.863.505c.177-.303.326-.624.444-.96l1.623 5.24a2.465 2.465 0 01.122.392l.027.142a2.5 2.5 0 01-4.562 1.776L19.917 22H20c.797 0 1.556-.17 2.241-.476a.5.5 0 10-.408-.913c-.559.25-1.18.389-1.833.389h-8a4.5 4.5 0 01-4.5-4.5zm4.584 5.5H12a5.502 5.502 0 01-5.193-3.685L5.189 23.54a2.492 2.492 0 00-.19.96 2.5 2.5 0 004.593 1.37c.076-.116.906-1.404 2.492-3.869zm7.416-8.5a1 1 0 100 2 1 1 0 000-2zm-1 5a1 1 0 112 0 1 1 0 01-2 0zm3-3a1 1 0 100 2 1 1 0 000-2zm-5 1a1 1 0 112 0 1 1 0 01-2 0zm-5-2.5a.5.5 0 01.5.5V16h1.5a.5.5 0 010 1H12v1.5a.5.5 0 01-1 0V17H9.5a.5.5 0 110-1H11v-1.5a.5.5 0 01.5-.5z" />
                                </svg>
                            @elseif($categoryName == 'SEMINAR')
                                <svg width="50" height="50" fill="none" viewBox="0 0 32 33">
                                  <g id="buisness-profession_svg__icon_selection">
                                    <path style="stroke-width: 1px; stroke: #f38181;" id="buisness-profession_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M15.002 5.936L15 6.01v.493h2V6.01l-.002-.073a1 1 0 00-1.996 0zM18 6.502h9.5a.5.5 0 010 1H27v16h.5a.5.5 0 110 1h-3.172l.046.046.006.005.006.007.067.072.011.012a2 2 0 01-2.833 2.813l-.01-.01-.065-.06-.006-.007-.004-.003-2.875-2.875H13.41l-2.873 2.874-.01.01-.065.061-.01.01a2 2 0 01-2.834-2.813l.011-.012.068-.072.011-.012.046-.046H4.5a.5.5 0 010-1H5v-16h-.5a.5.5 0 010-1H14v-.514l.003-.089v-.014a2 2 0 013.994 0v.014l.003.089v.514zm-12 1v16h20v-16H6zm16.914 17h-2.828l2.162 2.162.053.05a1 1 0 001.416-1.405l-.055-.06-.748-.747zm-10.919 0H9.167l-.747.747-.056.06a1 1 0 001.416 1.405l.054-.05 2.161-2.162zM8.145 9.65a.5.5 0 01.355-.147h6a.5.5 0 01.5.496l.04 5.5a.5.5 0 11-1 .008l-.036-5.004H9.002l.036 10h5.002v-2a.5.5 0 111 0v2.5a.5.5 0 01-.5.5h-6a.5.5 0 01-.5-.498l-.04-11a.5.5 0 01.146-.355zM17 18.002a.5.5 0 100 1h6.5a.5.5 0 000-1H17zm-.5-2.5a.5.5 0 01.5-.5h5.5a.5.5 0 110 1H17a.5.5 0 01-.5-.5zm.5-3.5a.5.5 0 100 1h6.5a.5.5 0 000-1H17z" fill="#3A3247"></path>
                                  </g>
                                </svg>
                            @elseif($categoryName == 'FOOD & DRINK')
                                <svg width="50" height="50" fill="#f38181" viewBox="0 0 40 41" xmlns="http://www.w3.org/2000/svg">
                                  <g id="food-drink_svg__icon_selection">
                                    <path style="stroke-width: 1px; stroke: #f38181;" id="food-drink_svg__primary_fill" fill-rule="evenodd" clip-rule="evenodd" d="M26.76 5.014a.625.625 0 01.721.462l1.444 5.777h5.45a.625.625 0 01.623.67l-1.659 22.5a.625.625 0 01-.623.58H21.66a.625.625 0 01-.624-.58l-.033-.457-.23.085c-1.667.595-3.928.951-6.397.951-2.468 0-4.73-.356-6.397-.951-.831-.297-1.548-.665-2.068-1.105C5.392 32.51 5 31.94 5 31.252c0-.528.234-.99.575-1.37l8.234-17.644a.625.625 0 011.132 0l5.295 11.345-.86-11.66a.625.625 0 01.624-.67h7.637L26.41 6.35l-9.42 1.766a.625.625 0 11-.231-1.228l10-1.875zm1.19 7.489h-7.277l.23 3.125H22.5a.625.625 0 110 1.25h-1.505l.72 9.768a.629.629 0 010 .104l1.461 3.133c.341.38.574.842.574 1.37 0 .686-.392 1.256-.91 1.693a4.752 4.752 0 01-.628.443l.027.363h9.896l1.245-16.874h-7.13a.625.625 0 110-1.25h2.48l-.78-3.125zm5.752 0l-.23 3.125H30c0-.05-.006-.101-.019-.152l-.743-2.973h4.464zM7.275 29.195L6.666 30.5a.626.626 0 01-.116.17c-.234.241-.3.437-.3.583 0 .177.098.429.466.74.365.307.93.613 1.682.881 1.5.536 3.613.88 5.977.88 2.364 0 4.477-.344 5.977-.88.753-.268 1.317-.574 1.682-.882.368-.31.466-.562.466-.739 0-.146-.066-.341-.299-.583a.625.625 0 01-.116-.17l-1.24-2.656a3.765 3.765 0 01-2.55.13 3.765 3.765 0 01-.631-6.946l-3.289-7.046-.626 1.341a3.763 3.763 0 01-3.046 6.526l-.932 1.999a3.77 3.77 0 012.778.418 3.763 3.763 0 11-5.274 4.93zm.857-1.838a2.514 2.514 0 002.508 2.664 2.512 2.512 0 10-1.727-4.336l-.78 1.672zm10.062-5.195l2.121 4.546a2.503 2.503 0 01-1.656.068 2.513 2.513 0 01-.465-4.614zm-6.924-1.527a2.512 2.512 0 001.913-4.1l-1.913 4.1z" />
                                  </g>
                                </svg>
                            @elseif($categoryName == 'FESTIVALS')
                                <svg width="50" height="50" fill="#f38181" viewBox="0 0 47 48" xmlns="http://www.w3.org/2000/svg">
                                  <path style="stroke-width: 1px; stroke: #f38181;" d="M24.53 13.221V.528A.527.527 0 0023.998 0a.532.532 0 00-.53.528v12.693a17.562 17.562 0 00-12.036 5.294 17.41 17.41 0 00-4.945 12.141v.423a.461.461 0 000 .105.636.636 0 00.016.124 17.401 17.401 0 005.38 11.846A17.55 17.55 0 0023.999 48a17.55 17.55 0 0012.115-4.846 17.401 17.401 0 005.38-11.846.635.635 0 00.015-.137.456.456 0 000-.105v-.423A17.41 17.41 0 0036.56 18.51a17.562 17.562 0 00-12.03-5.289zM37.895 39.39c-.906.477-1.812.909-2.72 1.295a31.011 31.011 0 001.104-3.699 61.644 61.644 0 003.16-.7 16.199 16.199 0 01-1.544 3.104zm-8.968 6.868c.22-.907.421-1.813.605-2.72a30.576 30.576 0 003.752-1.007 45.569 45.569 0 01-1.144 2.33 16.34 16.34 0 01-3.213 1.408v-.01zm-4.399.764v-2.938c1.3-.022 2.598-.135 3.882-.338a66.483 66.483 0 01-.655 2.84 16.406 16.406 0 01-3.227.436zm-4.563-.486a71.455 71.455 0 01-.655-2.837c1.374.231 2.764.36 4.157.385v2.938a16.597 16.597 0 01-3.502-.5v.014zM15.74 44.81a36.2 36.2 0 01-1.123-2.314c1.17.398 2.361.727 3.569.985.177.904.377 1.805.6 2.705a16.397 16.397 0 01-3.046-1.39v.014zm-7.182-8.525a68.47 68.47 0 003.112.684 31.113 31.113 0 001.061 3.664 35.369 35.369 0 01-2.634-1.244 16.224 16.224 0 01-1.54-3.104zm.87-13.229a39.748 39.748 0 013.025-1.44 31.091 31.091 0 00-.99 3.884c-1.1.21-2.2.45-3.298.715.31-1.093.733-2.152 1.263-3.159zm6.367-6.604a16.522 16.522 0 013.022-1.355 84.438 84.438 0 00-.796 3.661 31.65 31.65 0 00-3.775 1.054c.44-1.1.95-2.198 1.528-3.291.006-.02.01-.04.014-.061l.008-.008zm7.694-2.182v3.883a29.09 29.09 0 00-4.321.394 68.19 68.19 0 01.84-3.796 16.427 16.427 0 013.46-.473l.021-.008zm4.29.423c.328 1.277.614 2.554.86 3.833a29.332 29.332 0 00-4.11-.365v-3.883a16.46 16.46 0 013.23.423l.02-.008zm4.394 1.725a34.807 34.807 0 011.618 3.407 31.778 31.778 0 00-4.035-1.096 72.59 72.59 0 00-.796-3.72c1.111.36 2.181.834 3.192 1.417l.021-.008zm7.694 9.795a67.61 67.61 0 00-3.276-.708 29.902 29.902 0 00-.99-3.87c1.001.417 2.002.888 3.003 1.413a16.023 16.023 0 011.229 3.173l.034-.008zm-10.092 4.43H24.53v-5.268c1.681.013 3.362.093 5.04.24.138 1.674.206 3.35.205 5.028zm-5.245-6.324v-5.093a28.48 28.48 0 014.292.422 62.16 62.16 0 01.663 4.898 66.634 66.634 0 00-4.956-.227zm-1.062 0a68.03 68.03 0 00-5.19.24c.16-1.627.381-3.255.664-4.884a28.19 28.19 0 014.526-.452v5.096zm0 1.056v5.284H17.98c0-1.67.068-3.343.204-5.02a62.16 62.16 0 015.285-.266v.002zm-6.55 5.268H12.04c.008-1.416.124-2.829.348-4.227 1.57-.28 3.145-.503 4.722-.67a63.74 63.74 0 00-.193 4.897zm0 1.056c.026 1.684.115 3.364.265 5.04a62.391 62.391 0 01-4.63-.678 27.35 27.35 0 01-.493-4.361h4.858zm1.061 0h5.49v5.413a62.638 62.638 0 01-5.196-.264 63.304 63.304 0 01-.289-5.148h-.005zm5.49 6.47v4.85a27.049 27.049 0 01-4.378-.454 64.104 64.104 0 01-.703-4.645 62.99 62.99 0 005.08.249zm1.06 0a65.708 65.708 0 004.819-.22 61.172 61.172 0 01-.717 4.679 27.253 27.253 0 01-4.102.394v-4.853zm0-1.057V31.7h5.238a64.504 64.504 0 01-.305 5.183c-1.642.143-3.286.22-4.933.233v-.003zm6.299-5.413h5.11a27.48 27.48 0 01-.53 4.38 64.14 64.14 0 01-4.85.7c.151-1.696.242-3.389.27-5.08zm0-1.056a65.48 65.48 0 00-.186-4.927c1.661.176 3.32.41 4.977.703.221 1.398.33 2.811.327 4.226l-5.118-.002zm5.906-4.015a71.57 71.57 0 013.38.75 16.36 16.36 0 01.334 3.265h-3.425a27.583 27.583 0 00-.29-4.015zm-1.308-1.321a68.862 68.862 0 00-4.871-.663 63.366 63.366 0 00-.624-4.782 31.5 31.5 0 014.335 1.271 29.074 29.074 0 011.165 4.176l-.005-.002zm-17.598-5.413a68.327 68.327 0 00-.626 4.755c-1.543.159-3.08.37-4.614.634a30.505 30.505 0 011.165-4.192c1.33-.49 2.69-.89 4.075-1.197zm-9.95 7.484c1.13-.285 2.265-.54 3.402-.764-.2 1.334-.301 2.68-.305 4.029H7.55c0-1.097.11-2.19.329-3.265zm3.12 4.322c.05 1.391.203 2.777.457 4.147a66.322 66.322 0 01-3.234-.735h-.035a16.383 16.383 0 01-.6-3.413H11zm1.829 5.48c1.496.265 2.992.476 4.489.635a65.42 65.42 0 00.663 4.52 30.387 30.387 0 01-3.9-1.173 30.247 30.247 0 01-1.263-3.981h.01zm16.934 5.234a68.85 68.85 0 00.677-4.562 64.906 64.906 0 004.704-.65 31.24 31.24 0 01-1.295 4.015 29.614 29.614 0 01-4.096 1.197h.01zm10.082-7.307h-.037a69.373 69.373 0 01-3.269.748c.257-1.372.411-2.761.462-4.155h3.412a16.384 16.384 0 01-.589 3.407h.021zm-2.276-13.736a42.495 42.495 0 00-2.444-1.057 35.49 35.49 0 00-1.156-2.705 16.606 16.606 0 013.579 3.756l.02.006zm-23.53-3.749c-.414.88-.787 1.77-1.118 2.666-.82.317-1.636.673-2.454 1.056a16.513 16.513 0 013.572-3.722zm-2.574 23.606c.598.273 1.195.526 1.79.758.221.528.454 1.078.707 1.617a16.42 16.42 0 01-2.497-2.375zm22.445 2.478c.265-.555.507-1.11.738-1.665.626-.243 1.25-.507 1.873-.792a16.635 16.635 0 01-2.61 2.457zM5.614 14.308H4.537v-.923a.431.431 0 00-.158-.326.587.587 0 00-.38-.136.587.587 0 00-.381.136.431.431 0 00-.158.326v.923H2.383a.587.587 0 00-.38.135.431.431 0 00-.158.327c0 .122.056.24.157.326a.587.587 0 00.381.135H3.46v.923c0 .122.057.24.158.326a.587.587 0 00.38.136c.143 0 .28-.049.381-.136a.431.431 0 00.158-.326v-.923h1.077c.143 0 .28-.049.38-.135a.431.431 0 00.158-.326.431.431 0 00-.157-.327.587.587 0 00-.381-.135zM9.769 11.924h1.077V13a.538.538 0 101.077 0v-1.077H13a.538.538 0 000-1.077h-1.077V9.77a.539.539 0 00-1.077 0v1.077H9.769a.539.539 0 000 1.077zM43 16.23h1.077v1.078a.539.539 0 101.077 0V16.23h1.077a.538.538 0 100-1.077h-1.077v-1.077a.538.538 0 10-1.077 0v1.077H43a.539.539 0 100 1.077zM34.384 11.308h1.077v1.077a.538.538 0 101.077 0v-1.077h1.077a.539.539 0 100-1.077h-1.077V9.154a.538.538 0 10-1.077 0v1.077h-1.077a.539.539 0 100 1.077zM46.231 37.923h-1.077v-1.076a.539.539 0 10-1.077 0v1.076H43A.539.539 0 1043 39h1.077v1.077a.539.539 0 101.077 0V39h1.077a.538.538 0 100-1.077zM3.77 32.385H2.691v-1.077a.539.539 0 00-1.077 0v1.077H.538a.538.538 0 100 1.077h1.077v1.077a.538.538 0 001.077 0v-1.077H3.77a.538.538 0 100-1.077z"/>
                                </svg>
                            @endif

                        </span>
                        <span class="caption mb-2 d-block">{{ strtoupper($categoryName) }}</span>
                        <span class="number">{{ $count }}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="site-section" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Last Added Events</h2>
                    <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                </div>
            </div>

            <div class="row">
               @foreach($events as $event)
                    @php
                        $isFavorited = Auth::check() && Auth::user()->events->contains($event);
                    @endphp
                <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                    <div class="listing-item">
                        <div class="listing-image" style="width: 100%;height: 230px">
                            <img src="/storage/{{$event->image}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
                        </div>
                        <div class="listing-item-content">
                            <a href="{{ route('events.show', $event->id) }}" class="bookmark">
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
                            <a class="px-3 mb-3 category" href="{{ route('events.show', $event->id) }}">{{$event->category->name}}</a>
                            <h2 class="mb-1"><a href="{{ route('events.show', $event->id) }}">{{$event->title}}</a></h2>
                            <span class="address">{{$event->venue}}, {{$event->location}}</span>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>





    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5" style="width: 540px;height: 450px">
                    <img src="images/ticket_pic1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid rounded" style="width: 100%;height: 100%">
                </div>
                <div class="col-md-5 ml-auto">
                    <h2 class="text-primary mb-3">Why Us</h2>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1" class="accordion-item h5 d-block mb-0">How to list my item?</a>

                                <div class="collapse" id="collapse-1">
                                    <div class="pt-2">
                                        <p class="mb-0">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-4" role="button" aria-expanded="false" aria-controls="collapse-4" class="accordion-item h5 d-block mb-0">Is this available in my country?</a>

                                <div class="collapse" id="collapse-4">
                                    <div class="pt-2">
                                        <p class="mb-0">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2" class="accordion-item h5 d-block mb-0">Is it free?</a>

                                <div class="collapse" id="collapse-2">
                                    <div class="pt-2">
                                        <p class="mb-0">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-3 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3" class="accordion-item h5 d-block mb-0">How the system works?</a>

                                <div class="collapse" id="collapse-3">
                                    <div class="pt-2">
                                        <p class="mb-0">The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">How It Works</h2>
                    <p class="color-black-opacity-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="images/step-1.svg" alt="Free website template by Free-Template.co" class="img-fluid">
                        </div>
                        <span class="number">1</span>
                        <h3>Decide What To Do</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="images/step-2.svg" alt="Free website template by Free-Template.co" class="img-fluid">
                        </div>
                        <span class="number">2</span>
                        <h3>Find What You Want</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 col-lg-4">
                    <div class="how-it-work-step">
                        <div class="img-wrap">
                            <img src="images/step-3.svg" alt="Free website template by Free-Template.co" class="img-fluid">
                        </div>
                        <span class="number">3</span>
                        <h3>Explore Amazing Places</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">

            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Satisfied Customers</h2>
                </div>
            </div>

            <div class="slide-one-item home-slider owl-carousel">
                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="images/person_3_sq.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-3">
                            <p>Willie Smith</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>
                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="images/person_2_sq.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-3">
                            <p>Robert Jones</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>

                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="images/person_4_sq.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-3">
                            <p>Peter Richmond</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>

                <div>
                    <div class="testimonial">
                        <figure class="mb-4">
                            <img src="images/person_5_sq.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-3">
                            <p>Bruce Rogers</p>
                        </figure>
                        <blockquote>
                            <p>&ldquo;The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center border-primary">
                    <h2 class="font-weight-light text-primary">Tips &amp; Articles</h2>
                    <p class="color-black-opacity-5">See Our Daily tips &amp; articles</p>
                </div>
            </div>
            <div class="row mb-3 align-items-stretch">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="images/img_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular"><a href="#">Etiquette tips for travellers</a></h2>
                            <div class="meta mb-4">by <a href="#">Jeff Sheldon</a> <span class="mx-2">&bullet;</span> May 5th, 2019</div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="images/img_2.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular"><a href="#">Etiquette tips for travellers</a></h2>
                            <div class="meta mb-4">by <a href="#">Jeff Sheldon</a> <span class="mx-2">&bullet;</span> May 5th, 2019</div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="h-entry">
                        <img src="images/img_3.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid">
                        <div class="h-entry-inner">
                            <h2 class="font-size-regular"><a href="#">Etiquette tips for travellers</a></h2>
                            <div class="meta mb-4">by <a href="#">Jeff Sheldon</a> <span class="mx-2">&bullet;</span> May 5th, 2019</div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
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
@include('footer')

<script>
    var typed = new Typed('.typed-words', {
        strings: ["Unearth Trending events"," Explore Exciting events"," Discover Hot Tickets"],
        typeSpeed: 80,
        backSpeed: 80,
        backDelay: 4000,
        startDelay: 1000,
        loop: true,
        showCursor: true
    });

</script>
