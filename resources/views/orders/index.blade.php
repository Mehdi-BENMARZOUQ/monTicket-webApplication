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

    <div class="container">
        <div style="margin-top: 3rem">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align: Center;font-size: 50px">
                {{ __('Orders Summary') }}
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
                                        <th style="text-transform: uppercase;text-align: center">Event Name</th>
                                        <th style="text-transform: uppercase;text-align: center">Total Ticket</th>
                                        <th style="text-transform: uppercase;text-align: center">Ticket Sold</th>
                                        <th style="text-transform: uppercase;text-align: center">Ticket Left</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td style="text-align: center" class="id">{{ $order['event_name'] }}</td>
                                            <td style="text-align: center">{{ $order['total_ticket'] }} </td>
                                            <td style="text-align: center">{{ $order['ticket_sold'] }}</td>
                                            <td style="color: #f38181;font-weight: 600;text-align: center">{{ $order['ticket_left'] }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                @if ($pagination['hasMorePages'])
                                    <ul class="pagination">
                                        <li class="page-item {{ $pagination['currentPage'] === 1 ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ route('orders.summary', ['page' => $pagination['currentPage'] - 1]) }}">Previous</a>
                                        </li>
                                        @for ($i = 1; $i <= $events->lastPage(); $i++)
                                            <li class="page-item {{ $i === $pagination['currentPage'] ? 'active' : '' }}">
                                                <a class="page-link" href="{{ route('orders.summary', ['page' => $i]) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ $pagination['hasMorePages'] ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ route('orders.summary', ['page' => $pagination['currentPage'] + 1]) }}">Next</a>
                                        </li>
                                    </ul>
                                @endif
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
