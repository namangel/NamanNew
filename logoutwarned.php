<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title></title>
        <style media="screen">
        html, body {
            height: 100%;
        }
        </style>
    </head>
    <body class="h-100">
        <div class="container h-100 d-flex justify-content-center">
            <div class="jumbotron my-auto">
                <h4 class="display-5">Session Expired, You will be redirected to <a href="Signing/login.php">Login Page</a> in few moments.</h4>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    window.setTimeout(function() {
    window.location.href = 'logout.php';
}, 5000);
</script>
