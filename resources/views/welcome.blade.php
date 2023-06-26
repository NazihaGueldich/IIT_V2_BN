<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>iit </title>
    <meta name="description" content="Notification iit.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f2f3f8;
        }

        .fond {
            display: flex;
            margin-top: 2em;
            justify-content: center
        }

        .adminEnsg {
            display: flex;
            margin-top: 8em;
            justify-content: space-around;
        }

        .fa-5x {
            color: #114388;
        }

        .tittre {
            font-weight: 800;
            font-size: 16px;
            color: #114388;
            text-align: center;
            margin-top: 5px;

            text-decoration-color: #114388;

        }

        .tittre::first-letter {
            font-weight: 900;
            font-size: 20px;
            color: #F2C300;
        }
    </style>

</head>

<body>



    <div class="fond">

        <div class="logo">

            <a href="https://iit.tn" title="logo" target="_blank">
                <img width="250" src="https://iit.tn/wp-content/uploads/2019/06/logoISB1-1.png" title="logo" alt="logo">
            </a>

        </div>

    </div>

    <div class=" adminEnsg mt-3">
        <div class="admin d-inline-block">

            {{-- <a href="https://iitadmin.tn/adming36uw549dg/login" title="logo">  --}}
                <a href="http://127.0.0.1:8000/login" title="logo">
             <i class="fa-solid fa-right-to-bracket  fa-5x  "></i></a>
            <div class="tittre">
                Administration
            </div>
        </div>
        <div class="ensegnant d-inline-block">

            <a href="https://enseignant.iitadmin.tn/login" title="logo">
                <i class="fa-solid fa-graduation-cap fa-5x "></i></a>

            <div class="tittre">
                Enseignant
            </div>
        </div>
    </div>

    <div class="fond">
        <a href="https://exadev.tn/" title="logo" target="_blank">
            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>Exadev.tn</strong>

            </p>

    </div>
</body>

</html>
