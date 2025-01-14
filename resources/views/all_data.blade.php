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
        {{-- <div class="shapeInTable mt-3"></div> --}}
        
        <div class="px-3 pb-3">
            <div class="exportData" style="display: flex; align-items: center; gap: 20px;direction: rtl;">
                <a href="{{ route('export', ['type' => $type]) }}" style="display: flex; align-items: center;">
                    <img src="{{ asset('images/send-copy.svg') }}" alt="Export" style="width: 40px; height: 40px;">
                </a>
                <form action="{{ route('import', ['type' => $type]) }}" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center; gap: 10px;">
                    @csrf
                    <input type="file" name="file" required style="padding: 5px; border: 1px solid #ddd; border-radius: 5px;color: white">
                    <button type="submit" style="padding: 5px 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        Import
                    </button>
                </form>
            </div>
            
            
            <table class="table table-bordered text-center">
                <thead class="tableHead">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile No.</th>
                        {{-- <th scope="col">User</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index=>$user )
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->mobile}}</td>
                        {{-- <td>{{$user->score}}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $users->links() }}
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
        {{-- <div class="barDownDashed fixed-bottom">
            <img src="images/pattern22 1.png" class="w-100" alt="">
        </div> --}}
    </div>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>