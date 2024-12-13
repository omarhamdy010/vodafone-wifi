<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vodafone - Login</title>
    <link rel="shortcut icon" href="images/Vodafone icon.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <div class="main">
        <div class="upperHeader position-relative d-flex align-items-center justify-content-between">
            <div class="logo p-2 mt-5 mt-lg-3">
                <img src="images/RED logo.png" alt="">
            </div>
            <div class="shape-one">
                <img src="images/elements 1.png" alt="">
            </div>
        </div>
        
        <div class="content">
            <form method="POST" action="{{ route('login') }}">
                <label for="email">Email :</label>
                <input type="email" placeholder="Enter Your Email" name="email" id="email" class="form-control">
                <label for="password">Password :</label>
                <input type="password" placeholder="Enter Your Password" name="password" id="password" class="form-control">
                  <button type="submit" class="btn btn-outline-light">Login</button>
            </form>

        </div>
        <div class="barDownDashed fixed-bottom">
            <img src="images/pattern22 1.png" class="w-100" alt="">
        </div>
        <div class="christmasTree">
            <img src="images/Christmas RED Pattern FOR BOOTH ONLY 2024 1.png" alt="">
        </div>
    </div>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>