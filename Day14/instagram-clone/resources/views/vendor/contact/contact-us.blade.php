<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h5> Contact Us Page</h5>
            <form action="{{ route('contact.send') }}" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Please enter your name" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Please enter your name" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</div>

</body>
</html>
