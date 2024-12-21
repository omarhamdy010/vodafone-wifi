<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vodafone</title>
    <link rel="shortcut icon" href="{{ asset('images/Vodafone icon.svg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>
    <div class="main">
        <div class="upperHeader position-relative d-flex align-items-center justify-content-between">
            <div class="logo p-2 mt-3">
                <img src="images/RED logo.png" alt="">
            </div>
            <div class="shape-one">
                <img src="images/elements 1.png" alt="">
            </div>
        </div>
        
        <div class="content">
            <form id="giftForm">
                @csrf
                <label for="name">Name :</label>
                <input type="text" placeholder="Enter Your Name" name="name" id="name" class="form-control" required>
                
                <label for="mobile">Mobile No :</label>
                <input 
                type="tel" 
                placeholder="Enter Your Mobile" 
                name="mobile" 
                id="mobile" 
                class="form-control" 
                pattern="[0-9]{11}" 
                maxlength="11" 
                required 
                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            
                <label for="gift">Gift :</label>
                <select name="gift" id="gift" class="form-select form-control" required>
                    <option selected disabled>Open this select menu</option>
                    <option value="Ornament with TBS Cookies">Ornament with TBS Cookies</option>
                    <option value="Old Socks">Old Socks</option>
                    <option value="Tree">Tree</option> 
                    <option value="Ornament with Pictures">Ornament with Pictures</option>
                    <option value="Hot Chocolate">Hot Chocolate</option>
                    <option value="Hoodie">Hoodie</option>
                    <option value="Clogs">Clogs</option>
                    <option value="Robe IYS">Robe IYS</option>
                    <option value="Hoodie IYS">Hoodie IYS</option>
                    <option value="Planner">Planner</option>
                    <option value="New Socks">New Socks</option>
                    <option value="Candle">Candle</option>
                    <option value="Tote bag ">Tote bag </option>
                    <option value="Serums">Serums</option>
                    <option value="Scrunchies">Scrunchies</option>
                    <option value="Frames">Frames</option>
                </select>
                
                <button type="submit" class="btn btn-outline-light">Submit</button>
            </form>
        </div>
        <div class="barDownDashed fixed-bottom">
            <img src="images/pattern22 1.png" class="w-100" alt="">
        </div>
        <div class="christmasTree">
            <img src="images/Christmas RED Pattern FOR BOOTH ONLY 2024 1.png" alt="">
        </div>
    </div>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#giftForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Collect the form data
            var formData = $(this).serialize();

            // Send the AJAX request
            $.ajax({
                url: '{{ route("store.gift") }}', // The URL for form submission
                type: 'POST', // The HTTP method
                data: formData, // The data to send
                success: function(response) {
                    success()
                },
                error: function(xhr) {
                    if(xhr.status == 400){
                        var errors = xhr.responseJSON.message;
                        var image = xhr.responseJSON.image;
                        error(errors , image)
                    }                    
                }
            });
        });
    });
</script>
</body>

</html>