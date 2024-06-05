@include('events.navbar')
<style>
    .swal-button{
        display: inline-block;
        border-radius: 2px;
        padding: 4px 15px;
        color: #fff;
        font-weight: 600;
        background: #f38181;
    }
    .swal-cancel-button{
        color: #f38181 !important;
        border: 1px solid #f38181 !important;
        background: transparent !important;
    }

    .swal-cancel-button:hover{
        color: #fff !important;
        border: 1px solid #f38181 !important;
        background: #f38181 !important;
    }
    .active{
        background: #f38181;
    }

    .flex-container {
        display: flex;
        min-height: 100vh;
    }

    .icon-svg {
        transition: width 0.3s, height 0.3s; /* Apply transition to width and height properties */
    }

    .icon-svg:hover {
        width: 40px; /* Increase width on hover */
        height: 40px; /* Increase height on hover */
    }


    .popup {
        display: none;
        background-color: rgb(0, 0, 0);
        z-index: 1000;
        width: 100vw;
        top: 0;
        height: 100vh;
        position: fixed;
        left: 0;
    }
    .popup-container{

        transform: translate(-50%, -50%);
        position: absolute;
        background: white;
        top: 50%;
        left: 50%;
    }

    /* Close button styling */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;
    }

    .popup-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        width: 600px;
        height: 374px;
    }

    .popup-close {
        position: absolute;
        top: 0px;
        right: 20px;
        font-size: 30px;
        color: #f38181;
        cursor: pointer;
    }

    #update-form {
        margin-top: 20px;
    }

    #update-form p {
        margin-bottom: 10px;
    }

    #update-form label {
        display: inline-block;
        width: 100px;
    }

    #update-form input[type="text"],
    #update-form select {
        width: calc(100% - 110px);
        padding: 5px;
    }

    #update-button {
        background-color: #f38181;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #update-button:hover {
        background-color: #ff5a5a;
    }

    #close-button {
        background-color: #ccc;
        color: #333;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #close-button:hover {
        background-color: #999;
    }
    .delete-btn:focus{
        border: none;
    }

    .filter-buttons{
        display: flex;
        justify-content: end;
        align-items: center;
    }

    .download-button{
        background: #f38181;
        display: flex;
        padding: 10px;
        border-radius: 4px;
        margin-right: 10px;
        color: #fff;
        font-weight: 600;
    }
    #searchInput:focus{
        border-radius: 10px;
        padding: 8px;
        border: 2px solid #f38181;
        box-shadow: none;
    }
</style>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="content" style="background: #FAFCFF;width: 100%;">
                <div class="List-container">
                    <div class="cars" style="padding: 10px 35px;">
                        <div class="filter-buttons" style="text-align: end;padding-bottom: 30px">
                            <div class="btn">
                                <input id="searchInput" type="search" placeholder="Search.." style="    border-radius: 10px;padding: 8px;">
                            </div>
                            <button id="downloadButton" class="download-button" onclick="generatePDF()">

                                <svg width="19px" height="19px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 115.28 122.88" style="enable-background:new 0 0 115.28 122.88;margin-right: 5px;" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path fill="#fff" class="st0" d="M25.38,57h64.88V37.34H69.59c-2.17,0-5.19-1.17-6.62-2.6c-1.43-1.43-2.3-4.01-2.3-6.17V7.64l0,0H8.15 c-0.18,0-0.32,0.09-0.41,0.18C7.59,7.92,7.55,8.05,7.55,8.24v106.45c0,0.14,0.09,0.32,0.18,0.41c0.09,0.14,0.28,0.18,0.41,0.18 c22.78,0,58.09,0,81.51,0c0.18,0,0.17-0.09,0.27-0.18c0.14-0.09,0.33-0.28,0.33-0.41v-11.16H25.38c-4.14,0-7.56-3.4-7.56-7.56 V64.55C17.82,60.4,21.22,57,25.38,57L25.38,57z M29.5,67.4h13.19c2.87,0,5.02,0.68,6.46,2.05c1.43,1.37,2.14,3.31,2.14,5.84 c0,2.59-0.78,4.62-2.34,6.08c-1.56,1.46-3.94,2.19-7.14,2.19h-4.35v9.49H29.5V67.4L29.5,67.4z M37.45,78.37h1.95 c1.54,0,2.62-0.27,3.24-0.8c0.62-0.53,0.93-1.21,0.93-2.04c0-0.81-0.27-1.49-0.81-2.05c-0.54-0.56-1.55-0.84-3.05-0.84h-2.27V78.37 L37.45,78.37z M54.99,67.4h11.78c2.32,0,4.2,0.32,5.63,0.94c1.43,0.63,2.61,1.53,3.55,2.71c0.93,1.18,1.61,2.55,2.02,4.11 c0.42,1.56,0.63,3.22,0.63,4.97c0,2.74-0.31,4.87-0.94,6.38c-0.62,1.51-1.49,2.78-2.6,3.8c-1.11,1.02-2.3,1.7-3.57,2.04 c-1.74,0.47-3.31,0.7-4.72,0.7H54.99V67.4L54.99,67.4z M62.9,73.21v14.01h1.95c1.66,0,2.84-0.19,3.55-0.55 c0.7-0.37,1.25-1.01,1.65-1.92c0.4-0.92,0.6-2.4,0.6-4.45c0-2.72-0.44-4.57-1.33-5.58c-0.89-1-2.36-1.5-4.42-1.5H62.9L62.9,73.21z M82.25,67.4h19.6v5.52H90.21v4.48h9.96v5.2h-9.96v10.46h-7.95V67.4L82.25,67.4z M97.79,57h9.93c4.16,0,7.56,3.41,7.56,7.56v31.42 c0,4.15-3.41,7.56-7.56,7.56h-9.93v13.55c0,1.61-0.65,3.04-1.7,4.1c-1.06,1.06-2.49,1.7-4.1,1.7c-29.44,0-56.59,0-86.18,0 c-1.61,0-3.04-0.64-4.1-1.7c-1.06-1.06-1.7-2.49-1.7-4.1V5.85c0-1.61,0.65-3.04,1.7-4.1c1.06-1.06,2.53-1.7,4.1-1.7h58.72 C64.66,0,64.8,0,64.94,0c0.64,0,1.29,0.28,1.75,0.69h0.09c0.09,0.05,0.14,0.09,0.23,0.18l29.99,30.36c0.51,0.51,0.88,1.2,0.88,1.98 c0,0.23-0.05,0.41-0.09,0.65V57L97.79,57z M67.52,27.97V8.94l21.43,21.7H70.19c-0.74,0-1.38-0.32-1.89-0.78 C67.84,29.4,67.52,28.71,67.52,27.97L67.52,27.97z"/></g></svg>
                                Download
                            </button>
                        </div>
                        <table class="transactions-table" style="width: 100%;line-height: 2.7rem">
                            <thead style="border-bottom: 1px solid #0000005c;">
                            <tr>
                                <th style="text-transform: uppercase;text-align: center">ID</th>
                                <th style="text-transform: uppercase;text-align: center">QR Code</th>
                                <th style="text-transform: uppercase;text-align: center">Event</th>
                                <th style="text-transform: uppercase;text-align: center">Ticket</th>
                                <th style="text-transform: uppercase;text-align: center">Start Datetime</th>
                                <th style="text-transform: uppercase;text-align: center">End Datetime</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td style="text-align: center">{{ $order->id }}</td>
                                    <td style="display: flex;justify-content: center;align-items: center;">
                                        <div style="width: 100px;height: 100px">
                                            <img style="height:100%;width:100%;" src="{{ asset('storage/' . $order->qr_code_path) }}" alt="QR Code">

                                        </div>
                                    </td>
                                    <td style="text-align: center">{{ $order->event->title }}</td>

                                    <td style="text-align: center">{{ $order->ticket->type }}</td>
                                    <td style="text-align: center">{{ date('d-M-Y',strtotime($order->event->start_datetime)) }}</td>
                                    <td style="text-align: center">{{ date('d-M-Y',strtotime($order->event->end_datetime)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/rangeslider.min.js"></script>
<!-- Include jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>

<script src="js/typed.js"></script>

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

    function generatePDF() {
        const doc = new jsPDF();
        const table = document.querySelector('.transactions-table');
        const rows = table.querySelectorAll('tr');

        let y = 15; // Initial y position

        // Header row
        const headerRow = rows[0];
        headerRow.querySelectorAll('th').forEach((cell, index) => {
            doc.text(cell.innerText, index * 40 + 10, y);
        });
        y += 10; // Increment y position for next row

        // Data rows
        rows.forEach((row, rowIndex) => {
            if (rowIndex !== 0) { // Skip header row
                let x = 10; // Initial x position
                row.querySelectorAll('td').forEach((cell, cellIndex) => {
                    doc.text(cell.innerText, x, y);
                    x += 40; // Increment x position for next cell
                });
                y += 10; // Increment y position for next row
            }
        });

        doc.save('userList.pdf');
    }


</script>

<script src="js/main.js"></script>

</body>
</html>
