<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .nav-link {
            font-size: 20px;
        }

        .bg-image {
            background-repeat: no-repeat;
            background-size: cover;
            height: 1000px;
            background-attachment: fixed;
        }

        .overlayer {
            background-color: rgba(45, 45, 219, 0.479);
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .testbox h2{
            font-size: 60px;
            font-weight: 900;
            padding-bottom: 20px;
        }
        .testbox p{
            font-size: 25px;
            font-weight: 700;
        }
        .testbox{
            color: #fff;
        }

    </style>
</head>

<body>

    <header class="navbar-dark bg-primary">
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
                <a class="navbar-brand" href="/">Navbar</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/" aria-current="page">Home <span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('showdiet')}}" >Diet </a>
                        </li>
                    </ul>
                </div>
                <div class="auth ps-5 ">
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item pe-2">
                            <a class="nav-link btn btn-success" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                    
                </div>
            </nav>
        </div>
    </header>
    <section class="bg-image " style="background-image:url('588595864r-LS.webp');">
        <div class="overlayer pt-5 pb-5">
            <div class="container">
                <div class="testbox">
                    <h2 class="text-center">LOVE FOR FOOD</h2>
                    <p>Cooking is an important life skill that everyone should know. It can be a great way to show
                        someone you care, and it can also be a fun activity to do with friends or family. There are many
                        different techniques and recipes that you can try, so there’s always something new to learn.
                        Plus, cooking at home is usually healthier and cheaper than eating out. So if you’re looking for
                        a way to improve your life, learning how to cook is a great place to start.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
