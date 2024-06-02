<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 1rem;
    }

    .form-container {
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .title {
        font-size: 2rem;
        font-weight: bold;
        color: #f38181;
        margin-bottom: 1rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        font-weight: bold;
        color: #f38181;
        display: block;
        margin-bottom: 0.5rem;
    }

    .form-input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
    }

    .btn {
        background-color: #f38181;
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #f38181cc;
    }

    @media (min-width: 768px) {
        .container {
            grid-template-columns: 1fr 1fr;
        }
    }

</style>
<body>

<div style=" margin-top: 12px;"><a href="{{route("events.myList")}}" style="color: #1b1bbd;text-decoration: none;font-weight: 600;padding: 0 2rem;">
        <svg width="12px" height="12px" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 108.06"><title>back-arrow</title><path fill="#1b1bbd" d="M63.94,24.28a14.28,14.28,0,0,0-20.36-20L4.1,44.42a14.27,14.27,0,0,0,0,20l38.69,39.35a14.27,14.27,0,0,0,20.35-20L48.06,68.41l60.66-.29a14.27,14.27,0,1,0-.23-28.54l-59.85.28,15.3-15.58Z"/></svg>
        Back to events
    </a></div>

<div class="container">

    <div class="form-container">
        <h2 class="title">Edit Event</h2>
        <form id="editEventForm" method="POST" action="{{ route('events.update', ['id' => $event->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image" class="form-input">
            </div>
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-input" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" rows="3" class="form-input">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category_id" class="form-input">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $event->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" id="venue" name="venue" class="form-input" value="{{ $event->venue }}">
            </div>

            <div class="form-group">
                <label for="location" class="form-label">Location:</label>
                <select name="location" id="location" class="form-input" >
                    <option value="{{ $event->location }}">{{ $event->location }}</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Fes">Fes</option>
                    <option value="Marrakech">Marrakech</option>
                    <option value="Tangier">Tangier</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Meknes">Meknes</option>
                    <option value="Oujda">Oujda</option>
                    <option value="Kenitra">Kenitra</option>
                </select>
            </div>


            <div class="form-group">
                <label for="start-date" class="form-label">Start Date</label>
                <input type="date" id="start-date" name="start_datetime" class="form-input" value="{{ \Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="end-date" class="form-label">End Date</label>
                <input type="date" id="end-date" name="end_datetime" class="form-input" value="{{ \Carbon\Carbon::parse($event->end_datetime)->format('Y-m-d') }}">
            </div>
            <button type="submit" class="btn">Update Event</button>
        </form>
    </div>
    <div class="form-container">
        <h2 class="title">Tickets</h2>
        <form id="editTicketForm" method="POST" action="{{ route('tickets.update', ['id' => $event->id]) }}">
            @csrf
            @method('PUT')
            @foreach($tickets as $ticket)
                <div class="ticket-group">
                    <input type="hidden" name="tickets[{{ $ticket->id }}][id]" value="{{ $ticket->id }}">
                    <div class="form-group">
                        <label for="ticket-type-{{ $ticket->id }}" class="form-label">Ticket Type</label>
                        <input type="text" id="ticket-type-{{ $ticket->id }}" name="tickets[{{ $ticket->id }}][type]" class="form-input" value="{{ $ticket->type }}">
                    </div>
                    <div class="form-group">
                        <label for="price-{{ $ticket->id }}" class="form-label">Price</label>
                        <input type="number" id="price-{{ $ticket->id }}" name="tickets[{{ $ticket->id }}][price]" class="form-input" value="{{ $ticket->price }}">
                    </div>
                    <div class="form-group">
                        <label for="quantity-{{ $ticket->id }}" class="form-label">Quantity</label>
                        <input type="number" id="quantity-{{ $ticket->id }}" name="tickets[{{ $ticket->id }}][quantity]" class="form-input" value="{{ $ticket->quantity }}">
                    </div>
                </div>
            @endforeach
            <div id="newTicketsContainer"></div>
            <button type="button" id="addTicketBtn" class="btn">Add Ticket</button>
            <button type="submit" class="btn">Update Tickets</button>
        </form>

    </div>
</div>
<script>
    document.getElementById('addTicketBtn').addEventListener('click', function() {
        const container = document.getElementById('newTicketsContainer');
        const index = container.children.length;
        const newTicket = document.createElement('div');
        newTicket.classList.add('ticket-group');
        newTicket.innerHTML = `
            <div class="form-group">
                <label for="new-ticket-type-${index}" class="form-label">Ticket Type</label>
                <input type="text" id="new-ticket-type-${index}" name="newTickets[${index}][type]" class="form-input">
            </div>
            <div class="form-group">
                <label for="new-price-${index}" class="form-label">Price</label>
                <input type="number" id="new-price-${index}" name="newTickets[${index}][price]" class="form-input">
            </div>
            <div class="form-group">
                <label for="new-quantity-${index}" class="form-label">Quantity</label>
                <input type="number" id="new-quantity-${index}" name="newTickets[${index}][quantity]" class="form-input">
            </div>
        `;
        container.appendChild(newTicket);
    });
</script>
</body>
</html>
