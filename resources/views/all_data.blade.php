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

<body class="min-vh-100 overflow-auto">
    <div class="main">
        <div class="shapeInTable mt-3"></div>
        
        <div class="px-3 pb-3">
            <div class="exportData">
                <a href="{{ route('export') }}">
                    <img src="{{ asset('images/send-copy.svg') }}" alt="Export">
                </a>
            </div>
            
            <table class="table table-bordered text-center">
                <thead class="tableHead">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Gift</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gifts as $gift )
                    <tr>
                        <td>{{$gift->name}}</td>
                        <td>{{$gift->mobile}}</td>
                        <td>{{$gift->gift}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $gifts->links() }}
            </div>
            {{-- <div class="d-flex align-items-center justify-content-between mt-5">
                <div>
                    <div class="d-flex align-items-center justify-content-between gap-5">
                        <div class="d-flex align-items-center">
                            <img src="images/Chevron Up.svg" alt="Chevron">
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="images/Chevron Down.svg" alt="Chevron">
                        </div>
                    </div>
                </div>
                <div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                </div>
            </div> --}}
        </div>
        <div class="barDownDashed fixed-bottom">
            <img src="images/pattern22 1.png" class="w-100" alt="">
        </div>
    </div>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>