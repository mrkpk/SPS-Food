<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="/css/default.min.css">
    <link rel="stylesheet" href="/css/alertify.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="icon" href="/img/core-img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>PT.SPS Food | Login Page</title>
</head>

<body>
    <section class="form-02-main" style="background-image: url(img/bg/bg7.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main">
                            <div class="logo">
                                <a href="/home">
                                    <img src="/img/logo/sps.png">
                                </a>

                            </div>
                            <form action="login-action" id="formLogin" method="post" enctype="multipart/form-data"
                                onsubmit="validateForm(event)">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control"
                                        type="text" placeholder="Enter Email" aria-required="true">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control"
                                        type="password" placeholder="Enter Password" aria-required="true">
                                </div>

                                <div class="d-grid gap-2" style="margin-top: 107px">
                                    <button class="btn btn-primary" type="submit">Button</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    function validateForm(e) {
        e.preventDefault();
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username == "" || password == "") {
            alertify
                .alert("Ooopss..", "Beberapa kolom wajib diisi.", function() {
                    alertify.message('OK');
                });
            return false;
        } else {
            alertify.confirm("This is a confirm dialog.",
                function() {
                    alertify.success('Ok');
                    document.getElementById('formLogin').submit();
                },
                function() {
                    alertify.error('Cancel');
                });



        }

    }
</script>

<script src="/js/alertify.js"></script>

</html>
