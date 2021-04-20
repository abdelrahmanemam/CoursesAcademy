<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DiviPay Login</title>
    <link rel="stylesheet" href="{{ asset('style/backend/login/css/style.css') }}">
</head>

<body>
<!-- contact1 -->
<section class="w3l-simple-contact-form1">
    <div class="contact-form section-gap">

        <div class="wrapper">
            <div class="contact-form" style="max-width: 450px; margin: 0 auto;">
                <div class="form-mid">
                    <form action="{{ route('backend.login') }}" method="post">

                        @csrf

                        <div class="field">
                            <input type="text" class="form-control" name="username" id="w3lName" placeholder="Username" required="">
                        </div>
                        <div class="field">
                            <input type="password" class="form-control" name="password" id="w3lSender" placeholder="Password"
                                   required="">
                        </div>

                        <div class="field">
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button type="submit" class="btn btn-contact">Login</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /contact1 -->
</body>

</html>
