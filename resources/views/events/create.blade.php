@include('events.navBar')

<style>


    .create-form{
        overflow: hidden;
        display: flex;
    }
    .container{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .image-upload-wrapper {
        position: relative;
        width: 430px;
        height: 330px;
        border: 2px dashed #ccc;
        border-radius: 5px;
        background-size: cover;
        background-position: center;
    }
    .image-upload-wrapper input[type="file"] {
        opacity: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    .image-upload-wrapper::after {
        content: '';
        position: absolute;
        top: 42%;
        left: 50%;
        width: 20px;
        height: 20px;
        background: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 444.019"%3E%3Cpath fill="%23f38181" fill-rule="nonzero" d="M.723 320.533c-2.482-10.26 1.698-18.299 8.38-23.044a23.417 23.417 0 018.018-3.632c2.877-.699 5.88-.864 8.764-.452 8.127 1.166 15.534 6.417 18.013 16.677a631.854 631.854 0 014.317 19.092 1205.66 1205.66 0 013.418 16.772c4.445 22.442 7.732 36.511 16.021 43.526 8.775 7.422 25.366 9.984 57.167 9.984h268.042c29.359 0 44.674-2.807 52.736-10.093 7.768-7.022 10.805-20.735 14.735-41.777l.007-.043c.916-4.946 1.889-10.139 3.426-17.758 1.298-6.427 2.722-13.029 4.34-19.703 2.484-10.255 9.886-15.503 18.008-16.677 2.861-.41 5.846-.242 8.722.449 2.905.699 5.679 1.935 8.068 3.633 6.672 4.742 10.843 12.763 8.38 22.997l-.011.044a493.707 493.707 0 00-3.958 17.975c-1.011 5.023-2.169 11.215-3.281 17.177l-.008.044c-5.792 31.052-10.544 52.357-26.462 67.318-15.681 14.742-40.245 20.977-84.699 20.977H124.823c-46.477 0-72.016-5.596-88.445-20.144-16.834-14.909-21.937-36.555-28.444-69.403-1.316-6.653-2.582-13.005-3.444-17.125-1.213-5.782-2.461-11.434-3.767-16.814zm131.02-190.804L255.079 0l125.184 131.556-34.53 32.848-66.774-70.174.201 158.278h-47.594l-.202-158.397-65.092 68.466-34.529-32.848zM279.191 276.45l.028 22.977h-47.594l-.028-22.977h47.594zm.046 37.794l.024 18.65h-47.595l-.023-18.65h47.594z"/%3E%3C/svg%3E') no-repeat center center;
        background-size: contain;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }
    .image-upload-wrapper::before {
        content: 'Upload Photo';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #f38181;
        font-size: 12px;
        pointer-events: none;
        background: #fff;
        width: 30%;
        height: 30%;
        border-radius: 5px;
        align-items: center;
        display: flex;
        justify-content: center;
    }




    .custom-select {
        position: relative;
    }

    .select-wrapper {
        position: relative;

    }

    .options {
        display: flex;

    }

    .option {
        padding: 10px;
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 20px;
        cursor: pointer;
    }

    .option:hover {
        background-color: #f0f0f0;
    }
    .option.selected {
        background-color: #f38181; /* Change to the desired highlight color */
        color: #fff; /* Change to the desired text color */
    }

</style>
<div class="create-form">
    <div class="container">
        <h1 style="font-weight: 600">Build your event page</h1>
        <p style="color: #5c6676">Add all of your event details and let attendees know what to expect</p>

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group" style="display: flex;justify-content: center">
                <div class="image-upload-wrapper" id="imageWrapper" style="background-image: url('https://via.placeholder.com/800x300');">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group custom-select" style="background: none;padding: 0;border: none;display: flex">
                <label for="category_id">Category:</label>
                <div class="select-wrapper">
                    <div class="options">
                        @foreach($categories as $category)
                            <div class="option" data-value="{{ $category->id }}">{{ $category->name }}</div>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" id="category_id" name="category_id">
            </div>

            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" name="venue" id="venue" class="form-control" value="{{ old('venue') }}">
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <select name="location" id="location" class="form-control">
                    <option value="">Select a location</option>
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
                <label for="start_datetime">Start Date and Time:</label>
                <input type="datetime-local" name="start_datetime" id="start_datetime" class="form-control" value="{{ old('start_datetime') }}">
            </div>

            <div class="form-group">
                <label for="end_datetime">End Date and Time:</label>
                <input type="datetime-local" name="end_datetime" id="end_datetime" class="form-control" value="{{ old('end_datetime') }}">
            </div>

            <button type="submit" class="btn btn-block btn-outline-primary btn-md px-5">Save and Continue</button>
        </form>
    </div>

</div>
@include('events.footer')

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imageWrapper').style.backgroundImage = 'url(' + e.target.result + ')';
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    $(document).ready(function() {
        $(".option").click(function() {
            // Remove the 'selected' class from all options
            $(".option").removeClass("selected");

            // Add the 'selected' class to the clicked option
            $(this).addClass("selected");

            // Set the selected option's value in the hidden input field
            var value = $(this).data("value");
            $(this).closest(".select-wrapper").siblings("input[type=hidden]").val(value);

            // Optionally, you can also update the displayed text to reflect the selected option
            var text = $(this).text();
            $(this).closest(".select-wrapper").find(".selected-option").text(text);
        });
    });

</script>

   {{-- <svg width="150" xmlns="http://www.w3.org/2000/svg">
        <g>
            <path transform="rotate(90 75.6898 514.471)" stroke="null" id="svg_1" d="m-460.46403,560.95014l35.74359,-15.44663c35.74359,-15.44663 107.23077,-46.33989 178.71794,-72.11645c71.48718,-25.3904 142.97436,-46.62951 214.46153,-30.89326c71.48718,15.157 142.97436,67.28938 214.46153,82.44638c71.48718,15.73625 142.97436,-5.50286 214.46153,0c71.48718,5.1167 142.97436,36.00995 178.71794,51.45658l35.74359,15.44663l0,0l-35.74359,0c-35.74359,0 -107.23077,0 -178.71794,0c-71.48718,0 -142.97436,0 -214.46153,0c-71.48718,0 -142.97436,0 -214.46153,0c-71.48718,0 -142.97436,0 -214.46153,0c-71.48718,0 -142.97436,0 -178.71794,0l-35.74359,0l0,-30.89326z" fill="#f3f4f5"/>
        </g>
    </svg>--}}
