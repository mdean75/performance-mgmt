<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Employee Management System</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <a class="navbar-brand" href="#">Performance Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="eventsMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
                <div class="dropdown-menu" aria-labelledBy="eventsMenu">
                    <a class="dropdown-item" href="#">List</a>
                    <a class="dropdown-item" href="#">Create</a>
                    <a class="dropdown-item" href="#">Show</a>
                    <a class="dropdown-item" href="#">Edit</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="reviewsMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reviews</a>
                <div class="dropdown-menu" aria-labelledBy="reviewsMenu">
                    <a class="dropdown-item" href="#">List</a>
                    <a class="dropdown-item" href="#">Create</a>
                    <a class="dropdown-item" href="#">Show</a>
                    <a class="dropdown-item" href="#">Edit</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="equipmentMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Equipment</a>
                <div class="dropdown-menu" aria-labelledBy="equipmentMenu">
                    <a class="dropdown-item" href="#">List</a>
                    <a class="dropdown-item" href="#">Create</a>
                    <a class="dropdown-item" href="#">Show</a>
                    <a class="dropdown-item" href="#">Edit</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                <div class="dropdown-menu" aria-labelledBy="adminMenu">
                    <a class="dropdown-item" href="users">Employees</a>
                    <a class="dropdown-item" href="/departments">Departments</a>
                    <a class="dropdown-item" href="/teams">Teams</a>
                    <a class="dropdown-item" href="/job_titles">Job Titles</a>
                    <a class="dropdown-item" href="/pay_grades">Pay Grades</a>

                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><span class="navbar-text mr-3">Logged in as: mdeangelo</span></li>
            <li class="nav-item"><a class="btn btn-outline-light" href="#">Logout</a></li>
        </ul>
    </div>


</nav>

<div class="container">
    <div class="row justify-content-center">

        <div class="card border-primary col-sm-8 bg-light" style="margin-top: 50px;">
            <div class="card-body text-dark mb-3">
                <h1 class="text-center">@yield('title')</h1>
                <h2 class="text-center">@yield('subtitle')</h2>
                <div class="row justify-content-center">
                    <div class="message col-md-6 mb-5">

                        <p class="text-center">Tuesday February 12, 2018</p></hr>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div style="color: red">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>

                        @endforeach
                        @if(session()->has('message'))
                        <p>{{ session()->get('message') }}</p>
                            @endif
                    </div>
                </div>



                @yield('content')



            </div>
        </div>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>