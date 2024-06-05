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
    .icon-svg {
        transition: width 0.3s, height 0.3s; /* Apply transition to width and height properties */
    }

    .icon-svg:hover {
        width: 40px; /* Increase width on hover */
        height: 40px; /* Increase height on hover */
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



    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }





    /*---------------*/
    .btn {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
    }

    .bg-pink {
        background-color: #f38181;
    }

    .text-white {
        color: white;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        border-radius: 8px;
        animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        font-size: 24px;
        font-weight: bold;
    }

    .modal-description {
        color: #555;
    }

    .ticket-list {
        margin-top: 20px;

    }

    .ticket-item {

        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 8px;
    }

    .font-medium {
        font-weight: 500;
    }

    .text-gray {
        color: #555;
    }

    .text-sm {
        font-size: 14px;
    }

    .text-pink {
        color: #f38181;
    }

    .bg-light-gray {
        background-color: #f0f0f0;
    }

    .modal-footer {
        margin-top: 20px;
        text-align: right;
    }

    .bg-gray {
        background-color: #e0e0e0;
    }

    .text-gray-dark {
        color: #333;
    }
    /*---------------*/
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

    <div id="ticketModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 style="text-align: center;font-weight: 600;font-size: 40px">Ticket Details</h2>
            <div>
                <div class="ticket-list">
                    <div >
                        <div id="ticketDetails"></div>
                    </div>
                </div>
            </div>
        </div>
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
                                        <th style="text-transform: uppercase;text-align: center">Actions</th>
                                        <th style="text-transform: uppercase;text-align: center">Check Users</th>
                                        {{--<th style="text-transform: uppercase">send message</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td style="text-align: center" class="id">{{ $event->id }}</td>
                                            <td style="text-align: center">{{ $event->title }} </td>
                                            <td style="text-align: center">{{ $event->description, 19, 2 }}</td>
                                            <td style="color: #f38181;font-weight: 600;text-align: center">{{ $event->category->name}}</td>
                                            <td style="text-align: center">{{ $event->venue }}</td>
                                            <td style="text-align: center">{{ date('d-M-Y',strtotime($event->start_datetime)) }}
                                                <br>
                                                {{ date('d-M-Y',strtotime($event->end_datetime)) }}
                                            </td>
                                            <td>
                                                <div
                                                    style="display: flex;font-weight: 600;color: #f38181;align-items: center;justify-content: center">
                                                    <button class="btn-show-tickets" data-event-id="{{ $event->id }}">
                                                        Details
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('events.edit', ['id' => $event->id]) }}">
                                                    <svg id="user-svg" class="user-svg edit-icon icon-svg" width="17px" height="17px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 106.86 122.88" style="enable-background:new 0 0 106.86 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path fill="#32CD32" class="st0" d="M39.62,64.58c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89c1.46,0,2.64,1.41,2.64,3.14 c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,64.58z M46.77,116.58c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15H7.33 c-2.02,0-3.85-0.82-5.18-2.15C0.82,119.4,0,117.57,0,115.55V7.33c0-2.02,0.82-3.85,2.15-5.18C3.48,0.82,5.31,0,7.33,0h90.02 c2.02,0,3.85,0.83,5.18,2.15c1.33,1.33,2.15,3.16,2.15,5.18v50.14c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15V7.33 c0-0.28-0.12-0.54-0.31-0.72c-0.19-0.19-0.44-0.31-0.72-0.31H7.33c-0.28,0-0.54,0.12-0.73,0.3C6.42,6.8,6.3,7.05,6.3,7.33v108.21 c0,0.28,0.12,0.54,0.3,0.72c0.19,0.19,0.45,0.31,0.73,0.31H46.77L46.77,116.58z M98.7,74.34c-0.51-0.49-1.1-0.72-1.78-0.71 c-0.68,0.01-1.26,0.27-1.74,0.78l-3.91,4.07l10.97,10.59l3.95-4.11c0.47-0.48,0.67-1.1,0.66-1.78c-0.01-0.67-0.25-1.28-0.73-1.74 L98.7,74.34L98.7,74.34z M78.21,114.01c-1.45,0.46-2.89,0.94-4.33,1.41c-1.45,0.48-2.89,0.97-4.33,1.45 c-3.41,1.12-5.32,1.74-5.72,1.85c-0.39,0.12-0.16-1.48,0.7-4.81l2.71-10.45l0,0l20.55-21.38l10.96,10.55L78.21,114.01L78.21,114.01 z M39.62,86.95c-1.46,0-2.65-1.43-2.65-3.19c0-1.76,1.19-3.19,2.65-3.19h17.19c1.46,0,2.65,1.43,2.65,3.19 c0,1.76-1.19,3.19-2.65,3.19H39.62L39.62,86.95z M39.62,42.26c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89 c1.46,0,2.64,1.41,2.64,3.14c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,42.26z M24.48,79.46c2.06,0,3.72,1.67,3.72,3.72 c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,81.13,22.43,79.46,24.48,79.46L24.48,79.46z M24.48,57.44 c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,59.11,22.43,57.44,24.48,57.44 L24.48,57.44z M24.48,35.42c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72 C20.76,37.08,22.43,35.42,24.48,35.42L24.48,35.42z"/></g></svg>

                                                </a>

                                                <form id="delete-user-{{ $event->id }}" action="{{ route('events.delete', ['id' => $event->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="delete-btn" style="border: none;background: transparent;" onclick="confirmDelete({{ $event->id }})">
                                                        <svg  id="delete-svg" class="delete-icon icon-svg" width="20px" height="20px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 122.88 122.879" enable-background="new 0 0 122.88 122.879" xml:space="preserve"><g><path fill="#FF4141" d="M61.44,0c16.96,0,32.328,6.882,43.453,17.986c11.104,11.125,17.986,26.494,17.986,43.453 c0,16.961-6.883,32.328-17.986,43.453C93.769,115.998,78.4,122.879,61.44,122.879c-16.96,0-32.329-6.881-43.454-17.986 C6.882,93.768,0,78.4,0,61.439C0,44.48,6.882,29.111,17.986,17.986C29.112,6.882,44.48,0,61.44,0L61.44,0z M73.452,39.152 c2.75-2.792,7.221-2.805,9.986-0.026c2.764,2.776,2.775,7.292,0.027,10.083L71.4,61.445l12.077,12.25 c2.728,2.77,2.689,7.256-0.081,10.021c-2.772,2.766-7.229,2.758-9.954-0.012L61.445,71.541L49.428,83.729 c-2.75,2.793-7.22,2.805-9.985,0.025c-2.763-2.775-2.776-7.291-0.026-10.082L51.48,61.435l-12.078-12.25 c-2.726-2.769-2.689-7.256,0.082-10.022c2.772-2.765,7.229-2.758,9.954,0.013L61.435,51.34L73.452,39.152L73.452,39.152z M96.899,25.98C87.826,16.907,75.29,11.296,61.44,11.296c-13.851,0-26.387,5.611-35.46,14.685 c-9.073,9.073-14.684,21.609-14.684,35.459s5.611,26.387,14.684,35.459c9.073,9.074,21.609,14.686,35.46,14.686 c13.85,0,26.386-5.611,35.459-14.686c9.073-9.072,14.684-21.609,14.684-35.459S105.973,35.054,96.899,25.98L96.899,25.98z"/></g></svg>

                                                    </button>
                                                </form>
                                            </td>

                                            <td><a href="{{route('events.buyers',['id' => $event->id])}}">Check</a></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the modal
        var modal = document.getElementById("ticketModal");

        // Get the button that opens the modal
        var btns = document.getElementsByClassName("btn-show-tickets");

        const closeModal = document.querySelector('.close');
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        for (var i = 0; i < btns.length; i++) {
            btns[i].onclick = function() {
                var eventId = this.getAttribute('data-event-id');
                fetchTicketDetails(eventId);
                modal.style.display = "block";
            }
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Function to fetch ticket details via AJAX
        function fetchTicketDetails(eventId) {
            fetch(`/events/${eventId}/tickets`)
                .then(response => response.json())
                .then(data => {
                    var ticketDetailsDiv = document.getElementById("ticketDetails");
                    ticketDetailsDiv.innerHTML = ''; // Clear previous details

                    if (data.length > 0) {
                        data.forEach(ticket => {
                            var ticketInfo = `
                            <div class="row ticket-item bg-light-gray" style="margin: 0 5px 12px">
                                <div class="col-6">
                                    <h4 style="font-weight: 600;font-size: 25px">${ticket.type}</h4>
                                </div>
                                <div style="display: flex;justify-content: space-around;align-items: center" class="col-6">
                                    <div class="text-pink font-medium" style="margin:0 5px;">$ ${ticket.price}</div>
                                    <div class="text-gray font-medium" style="margin:0 5px;">${ticket.quantity_available} available</div>
                                </div>
                                <hr>
                            </div>

                        `;
                            ticketDetailsDiv.innerHTML += ticketInfo;
                        });
                    } else {
                        ticketDetailsDiv.innerHTML = '<p>No tickets available for this event.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching ticket details:', error);
                });
        }
    });





    function confirmDelete(eventId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f38181',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                cancelButton: 'swal-cancel-button'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-user-' + eventId).submit();
            }
        });
    }


    document.getElementById("searchInput").addEventListener("input", function() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = this;
        filter = input.value.toUpperCase();
        table = document.getElementsByClassName("transactions-table")[0];
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            if (i === 0) continue;

            var found = false;
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    });

</script>

