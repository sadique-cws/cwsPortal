<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Admin Panel</a>

            <ul class="navbar-nav">
               @auth
               <li class="nav-item"><form action="{{ route("logout") }}" method="POST" >
                @csrf
                    <input type="submit" class="nav-link bg-transparent border-0" value="Logout">
                </form></li>
               @endauth
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="{{ route("admin.dashboard") }}" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="{{ route("admin.manage.student.active") }}" class="list-group-item list-group-item-action">Manage Student</a>
                    <a href="{{ route('admin.manage.student.new') }}" class="list-group-item list-group-item-action">New Admission</a>
                    <a href="{{ route('admin.manage.payment.due') }}" class="list-group-item list-group-item-action">Manage Payments</a>
                    <a href="" class="list-group-item list-group-item-action">Manage Courses</a>
                    <a href="" class="list-group-item list-group-item-action">Manage Placement</a>
                </div>
            </div>
            <div class="col-10">
                @section('content')
                @show
            </div>
        </div>
    </div>

   
    
</body>
</html>