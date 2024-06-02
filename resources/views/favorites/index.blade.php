@include('events.navbarbyCategory')
<style>


    .caudex {
        font-family: var(--font-caudex);
    }

    .taviraj {
        font-family: var(--font-taviraj);
    }

    .w-full {
        width: 100%;
    }

    .relative {
        position: relative;
    }

    .h-500 {
        height: 500px;
    }

    .overflow-hidden {
        overflow: hidden;
    }

    .object-cover {
        object-fit: cover;
    }

    .object-center {
        object-position: center;
    }

    .absolute {
        position: absolute;
    }

    .inset-0 {
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .bg-gradient-to-b {
        background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.5));
    }

    .flex {
        display: flex;
    }

    .items-center {
        align-items: center;
    }

    .justify-center {
        justify-content: center;
    }

    .text-4xl {
        font-size: 2.25rem;
    }

    .font-bold {
        font-weight: 700;
    }

    .text-white {
        color: white;
    }

    .sm\\:text-6xl {
        font-size: 4rem;
    }

    .container {
        max-width: 1280px;
        margin-left: auto;
        margin-right: auto;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .py-12 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .md-py-16 {
        padding-top: 4rem;
        padding-bottom: 4rem;
    }

    .lg-py-24 {
        padding-top: 6rem;
        padding-bottom: 6rem;
    }

    .grid {
        display: grid;
    }

    .grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }

    .gap-6 {
        gap: 1.5rem;
    }

    .sm-grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .md-grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .lg-grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .bg-white {
        background-color: white;
    }

    .shadow-lg {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .h-250 {
        height: 250px;
    }

    .rounded-t-lg {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .p-4 {
        padding: 1rem;
    }

    .text-xl {
        font-size: 1.25rem;
    }

    .text-f38181 {
        color: #f38181;
    }

    .text-gray-500 {
        color: #6b7280;
    }

    .mt-2 {
        margin-top: 0.5rem;
    }

    .text-gray-700 {
        color: #374151;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .flex {
        display: flex;
    }

    .items-center {
        align-items: center;
    }

    .justify-between {
        justify-content: space-between;
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .bg-f38181 {
        background-color: #f38181;
    }

    .px-3 {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }

    .py-1 {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
    }

    .text-sm {
        font-size: 0.875rem;
    }

    .text-white {
        color: white;
    }

    .space-x-2 > * + * {
        margin-left: 0.5rem;
    }

</style>
<body class="caudex taviraj">
<section class="w-full">
    <div class="relative h-500 overflow-hidden">
        <img alt="Hero Image" class="h-full w-full object-cover object-center" src="images/like_cover.jpg" width="1920" height="1080">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900/50"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl font-bold text-white sm-text-6xl">Discover Your Favorite Events</h1>
        </div>
    </div>
</section>
<section class="container mx-auto py-12 md-py-16 lg-py-24">
    <div class="grid grid-cols-1 gap-6 sm-grid-cols-2 md-grid-cols-3 lg-grid-cols-4">
        @if($favoriteEvents->isEmpty())
            <p>You have no favorite events.</p>
        @else
            @foreach($favoriteEvents as $favorite)
                <div class="rounded-lg bg-white shadow-lg">
                    <img alt="Event Image" class="h-250 w-full rounded-t-lg object-cover object-center" src="/storage/{{ $favorite->image }}" width="400" height="250">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-f38181"><a href="{{ route('events.show', $favorite->id) }}">{{ $favorite->title }}</a></h3>
                        <p class="text-gray-500">Organized by {{ $favorite->organization_name }}</p>
                        <p class="mt-2 text-gray-700">{{ $favorite->description }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="rounded-full bg-f38181 px-3 py-1 text-sm text-white">{{$favorite->category->name}}</span>
                            <div class="">
                                <span class="text-gray-500">{{ date('d-M-Y',strtotime($favorite->start_datetime)) }}</span>
                                <br>
                                <span class="text-gray-500">{{ date('d-M-Y',strtotime($favorite->end_datetime)) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
<script src="script.js"></script>
</body>
</html>
