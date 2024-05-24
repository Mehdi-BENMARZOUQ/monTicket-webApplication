@include('tickets.navbar')

<style>
    .card {
        border-radius: 10px;
        border: 1px solid black;
    }
</style>

<div class="container">
    <h1 style="font-weight: 600;">Create Ticket for "{{ $event->title }}"</h1>

    <form id="ticketForm" action="{{ route('tickets.store') }}" method="POST">
        @csrf

        @if($event)
            <input type="hidden" name="event_id" value="{{ $event->id }}">
        @endif

        <button type="button" id="addTicketBtn" class="btn btn-success">Add Ticket</button>
        <button type="submit" class="btn btn-primary">Create Tickets</button>

        <div class="ticket">
            <div class="card p-3 mb-3" style="">
                <div class="form-group">
                    <label for="type">Type:</label>
                    <input type="text" name="type[]" class="form-control" value="{{ old('type.0') }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" name="price[]" class="form-control" value="{{ old('price.0') }}" required>
                </div>

                <div class="form-group">
                    <label for="quantity_available">Quantity Available:</label>
                    <input type="number" name="quantity_available[]" class="form-control" value="{{ old('quantity_available.0') }}" required>
                </div>
            </div>
        </div>


    </form>


</div>

@include('tickets.footer')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("addTicketBtn").addEventListener("click", function () {
            var ticketContainer = document.querySelector(".ticket");
            var clone = ticketContainer.cloneNode(true);
            document.getElementById("ticketForm").appendChild(clone);
        });
    });
</script>
