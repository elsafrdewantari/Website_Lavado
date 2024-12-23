<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZvU4dfUP9B2k0Ed0X9g0D5OB6H3+z/0Z8h3e6hbHEJr96l2PvYNtH2fh6Og9cY" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 200px;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .content {
            margin-left: 220px; /* Memberi ruang untuk sidebar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center">Admin Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">Pelanggan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#pesananDropdown" role="button" aria-expanded="false" aria-controls="pesananDropdown">
                    Pesanan <i class="fas fa-caret-down"></i>
                </a>
                <div class="collapse" id="pesananDropdown">
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pesanan.index') }}">Pesanan Proses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pesananselesai.index') }}">Pesanan Selesai</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Saran</a>
            </li>
        
        </ul>
    </div>

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="https://kit.fontawesome.com/586c7cf24e.js" crossorigin="anonymous"></script>
    <script>
        function updateStatus(id_pesanan, status) {
            // Send AJAX request
            fetch(`{{ url('/pesanan/update-status') }}/${id_pesanan}`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Refresh to see updated status
                } else {
                    alert('Status update failed');
                }
            })
            .catch(error => console.error('Error:', error));
        }
        </script>
            <!-- Include Bootstrap JS for Dropdown functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- (Include your additional scripts here) -->
        
</body>
</html>
