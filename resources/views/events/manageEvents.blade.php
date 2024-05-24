@include('events.navbar')
<style>
    .delete-btn:focus {
        border: none;
    }

    .filter-buttons {
        display: flex;
        justify-content: end;
        align-items: center;
    }

    .download-button {
        background: #f38181;
        display: flex;
        padding: 10px;
        border-radius: 4px;
        margin-right: 10px;
        color: #fff;
        font-weight: 600;
    }

    #searchInput:focus {
        border-radius: 10px;
        padding: 8px;
        border: 2px solid #f38181;
        box-shadow: none;
    }

    .download-button:hover {
        color: #fff;
        background: #ff5a5a;
        /* background: #2b648a;*/
    }
</style>
<section>
    <div class="background-svg" style="position: absolute;top: 0;z-index: -1;height: 100vh;overflow: hidden;">
        <svg width="1140" height="1024" xmlns="http://www.w3.org/2000/svg">

            <g>
                <title>Layer 1</title>
                <path transform="rotate(90 75.6898 514.471)" stroke="null" id="svg_1"
                      d="m-460.46403,560.95014l35.74359,-15.44663c35.74359,-15.44663 107.23077,-46.33989 178.71794,-72.11645c71.48718,-25.3904 142.97436,-46.62951 214.46153,-30.89326c71.48718,15.157 142.97436,67.28938 214.46153,82.44638c71.48718,15.73625 142.97436,-5.50286 214.46153,0c71.48718,5.1167 142.97436,36.00995 178.71794,51.45658l35.74359,15.44663l0,0l-35.74359,0c-35.74359,0 -107.23077,0 -178.71794,0c-71.48718,0 -142.97436,0 -214.46153,0c-71.48718,0 -142.97436,0 -214.46153,0c-71.48718,0 -142.97436,0 -214.46153,0c-71.48718,0 -142.97436,0 -178.71794,0l-35.74359,0l0,-30.89326z"
                      fill="#f38181"/>
            </g>
        </svg>
    </div>


    <div class="container">
        <div style="margin-top: 3rem">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: Center;font-size: 50px">
                {{ __('Event') }}
            </h2>
        </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="content" style="background: #FAFCFF;width: 100%;">
                        <div class="List-container">
                            <div class="cars" style="padding: 10px 35px;">
                                <div class="filter-buttons" style="text-align: end;padding-bottom: 30px">
                                    <div class="btn">
                                        <input id="searchInput" type="search" placeholder="Search.."
                                               style="    border-radius: 10px;padding: 8px;">
                                    </div>
                                    <a href="{{route('events.create')}}" id="downloadButton" class="download-button"
                                       onclick="generatePDF()">
                                        Create Event
                                    </a>
                                </div>

                                <table class="transactions-table" style="width: 100%;line-height: 2.7rem">
                                    <thead style="border-bottom: 1px solid #0000005c;">
                                    <tr>
                                        <th style="text-transform: uppercase;text-align: center">ID</th>
                                        <th style="text-transform: uppercase;text-align: center">title</th>
                                        <th style="text-transform: uppercase;text-align: center">description</th>
                                        <th style="text-transform: uppercase;text-align: center">Category</th>
                                        <th style="text-transform: uppercase;text-align: center">venue</th>
                                        <th style="text-transform: uppercase;text-align: center">Start and End</th>
                                        <th style="text-transform: uppercase;text-align: center">Show Tickets</th>
                                        {{--<th style="text-transform: uppercase">send message</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td style="text-align: center" class="id">{{ $event->id }}</td>
                                            <td style="text-align: center">{{ $event->title }} </td>
                                            <td style="text-align: center">{{ $event->description }}</td>
                                            <td style="color: #f38181;font-weight: 600;text-align: center">{{ $event->category->name}}</td>
                                            <td style="text-align: center">{{ $event->venue }}</td>
                                            <td style="text-align: center">{{ $event->start_datetime }}
                                                <br>
                                                {{ $event->end_datetime }}
                                            </td>
                                            <td>
                                                <div
                                                    style="display: flex;font-weight: 600;color: #f38181;align-items: center">
                                                    Send Message
                                                    <svg width="17px" height="17px" id="Layer_1"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 111.686 122.879"
                                                         enable-background="new 0 0 111.686 122.879"
                                                         xml:space="preserve"><g>
                                                            <path fill="#f38181"
                                                                  d="M83.896,5.08H27.789c-12.491,0-22.709,10.219-22.709,22.71v40.079c0,12.489,10.22,22.71,22.709,22.71h17.643 c-2.524,9.986-5.581,18.959-14.92,27.241c17.857-4.567,31.642-13.8,41.759-27.241h3.051c12.488,0,31.285-10.219,31.285-22.71V27.79 C106.605,15.299,96.387,5.08,83.896,5.08L83.896,5.08z M81.129,41.069c-4.551,0-8.24,3.691-8.24,8.242s3.689,8.242,8.24,8.242 c4.553,0,8.242-3.691,8.242-8.242S85.682,41.069,81.129,41.069L81.129,41.069z M30.556,41.069c-4.552,0-8.242,3.691-8.242,8.242 s3.69,8.242,8.242,8.242c4.551,0,8.242-3.691,8.242-8.242S35.107,41.069,30.556,41.069L30.556,41.069z M55.843,41.069 c-4.551,0-8.242,3.691-8.242,8.242s3.691,8.242,8.242,8.242c4.552,0,8.241-3.691,8.241-8.242S60.395,41.069,55.843,41.069 L55.843,41.069z M27.789,0h56.108h0.006v0.02c7.658,0.002,14.604,3.119,19.623,8.139l-0.01,0.01 c5.027,5.033,8.148,11.977,8.15,19.618h0.02v0.003h-0.02v40.079h0.02v0.004h-0.02c-0.004,8.17-5.68,15.289-13.24,20.261 c-7.041,4.629-15.932,7.504-23.104,7.505v0.021H75.32v-0.021h-0.576c-5.064,6.309-10.941,11.694-17.674,16.115 c-7.443,4.888-15.864,8.571-25.31,10.987l-0.004-0.016c-1.778,0.45-3.737-0.085-5.036-1.552c-1.852-2.093-1.656-5.292,0.437-7.144 c4.118-3.651,6.849-7.451,8.826-11.434c1.101-2.219,1.986-4.534,2.755-6.938h-10.95h-0.007v-0.021 c-7.656-0.002-14.602-3.119-19.622-8.139C3.138,82.478,0.021,75.53,0.02,67.871H0v-0.003h0.02V27.79H0v-0.007h0.02 C0.021,20.282,3.023,13.46,7.878,8.464C7.967,8.36,8.059,8.258,8.157,8.16c5.021-5.021,11.968-8.14,19.628-8.141V0H27.789L27.789,0 z"/>
                                                        </g></svg>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $events->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('events.footer')
