<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tickets</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #f38181;
        }

        .form-section {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            position: relative;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            color: white;
            background-color: #f38181;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #f38181cc;
        }

        .remove-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            color: gray;
            cursor: pointer;
        }

        .remove-btn:hover {
            color: black;
        }

        .flex {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
@include('tickets.navbar')
<div class="container">
    <h1>Add Tickets</h1>
    <form id="ticketForm" class="space-y-6" action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="form-section" id="ticket-section-0">
            <div class="grid">
                @if($event)
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                @endif
                <div>
                    <label for="type-0">Ticket Type</label>
                    <input type="text" id="type-0" value="{{ old('type.0') }}" name="type[]" required>
                </div>
                <div>
                    <label for="price-0">Price</label>
                    <input type="number" id="price-0" value="{{ old('price.0') }}" name="price[]" required>
                </div>
                <div>
                    <label for="quantity-0">Quantity Available</label>
                    <input type="number" id="quantity-0" value="{{ old('quantity_available.0') }}" name="quantity_available[]" required>
                </div>
            </div>
            <button type="button" class="remove-btn" onclick="removeTicket(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
        <div class="flex">
            <button type="button" class="btn" onclick="addTicket()">Add Ticket</button>
            <button type="submit" class="btn">Submit</button>
        </div>
    </form>
</div>
@include('tickets.footer')
<script>
    let ticketCount = 1;

    function addTicket() {
        const form = document.getElementById('ticketForm');
        const newSection = document.createElement('div');
        newSection.className = 'form-section';
        newSection.id = `ticket-section-${ticketCount}`;
        newSection.innerHTML = `
            <div class="grid">
                <div>
                    <label for="type-${ticketCount}">Ticket Type</label>
                    <input type="text" id="type-${ticketCount}" name="type[]" required>
                </div>
                <div>
                    <label for="price-${ticketCount}">Price</label>
                    <input type="number" id="price-${ticketCount}" name="price[]" required>
                </div>
                <div>
                    <label for="quantity-${ticketCount}">Quantity Available</label>
                    <input type="number" id="quantity-${ticketCount}" name="quantity_available[]" required>
                </div>
            </div>
            <button type="button" class="remove-btn" onclick="removeTicket(${ticketCount})">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        `;
        form.insertBefore(newSection, form.lastElementChild);
        ticketCount++;
    }

    function removeTicket(index) {
        const section = document.getElementById(`ticket-section-${index}`);
        section.remove();
    }

    document.getElementById('ticketForm').addEventListener('submit', function (e) {
        const form = document.getElementById('ticketForm');
        form.querySelectorAll('.form-section').forEach((section, index) => {
            section.querySelector(`#type-${index}`).name = `type[${index}]`;
            section.querySelector(`#price-${index}`).name = `price[${index}]`;
            section.querySelector(`#quantity-${index}`).name = `quantity_available[${index}]`;
        });
    });
</script>
</body>
</html>
