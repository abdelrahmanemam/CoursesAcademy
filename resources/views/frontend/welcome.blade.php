<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Courses Academy</title>

    <!-- Bootstrap 4 CSS. This is for the alpha 3 release of Bootstrap 4. This should be updated when Bootstrap 4 is officially released. -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- For icons -->
    <link href="css/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Navigation -->
<nav id="topNav" class="navbar navbar-full navbar-static-top navbar-dark bg-inverse m-b-1">
    <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#navbar">
        &#9776;
    </button>
    <a class="navbar-brand" href="#">Course Academy</a>
    <div class="collapse navbar-toggleable-sm" id="navbar">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
        <!-- Search -->
        <form class="form-inline pull-xs-right">
            <input class="form-control" type="text" placeholder="Search" id="search">
            <button class="btn btn-secondary" type="submit">Search</button>
        </form>

        </ul>
    </div>
</nav>


<div class="container-fluid">

    <!-- Left Column -->
    <div class="col-sm-3">
        <form action="{{ route('filter') }}" id="filter" method="post" enctype="multipart/form-data">

        @csrf
        <!-- List-Group Panel -->
        <!-- Text Panel -->
        <div class="card">
            <div class="card-header p-b-0">
                <h5 class="card-title"><i class="fa fa-cog" aria-hidden="true"></i> Categories</h5>
            </div>

            <div class="card-block">
                <select class="form-control" name="category_id">
                        <option value="0">Select Category</option>
                @foreach($categories as $category)
                        <option value={{$category['id']}}>{{$category['name']}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <!-- Text Panel -->
        <div class="card">
            <div class="card-header p-b-0">
                <h5 class="card-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> Levels</h5>
            </div>
            <div class="card-block">
                <select class="form-control" name="level_id">
                        <option value="0">Select Level</option>
                @foreach($levels as $level)
                        <option value={{$level['id']}}>{{$level['name']}}</option>
                @endforeach
                </select>

            </div>
        </div>

        <!-- Text Panel -->
        <div class="card">
            <div class="card-header p-b-0">
                <h5 class="card-title"><i class="fa fa-cog" aria-hidden="true"></i> Rating</h5>
            </div>

            <div class="card-block">
                <select class="form-control" name="rating">
                    <option value="0">Select Option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Apply</button>
        <div class="clearfix"></div>
        </form>
    </div><!--/Left Column-->


    <!-- Center Column -->
    <div class="col-sm-6" id="courses">
        <div class="row" id="table_data">
            @include('frontend.data_section')
        </div>
    <!--/Center Column-->
    </div>    <!-- Right Column -->
    <div class="col-sm-3">

        <!-- Form -->
        <div class="card">
            <div class="card-header p-b-0">
                <h5 class="card-title">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Log In
                </h5>
            </div>
            <div class="card-block">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="uid" name="uid" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Log In</button>
                </form>
            </div>
        </div>

    </div><!--/Right Column -->

</div><!--/container-fluid-->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Tether -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>

<!-- Bootstrap 4 JavaScript. This is for the alpha 3 release of Bootstrap 4. This should be updated when Bootstrap 4 is officially released. -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>

<!-- Initialize Bootstrap functionality -->
<script>
    // Initialize tooltip component
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Initialize popover component
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>

<!-- Placeholder Images -->
<script src="js/holder.min.js"></script>

<script>

    $(document).ready(function(){

        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page)
        {
            $.ajax({
                url:"/indexPaginate?page="+page,
                success:function(data)
                {
                    $('#table_data').html(data);
                }
            });
        }

    });

    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'post',
            url : 'filter',
            data:{'search':$value , 'by':'search' , '_token': '{{ csrf_token() }}' },
            success:function(data){
                $('#table_data').html(data);
            }
        });
    })

    $("#filter").submit(function(e){
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');
        $.ajax({
            type: "POST",
            url: url,
            data: {'_token': '{{ csrf_token() }}','data': form.serialize(),'by':'filter'}, // serializes the form's elements.
            success: function(data)
            {
                $('#table_data').html(data);
            }
        });
    })

</script>
</body>

</html>
