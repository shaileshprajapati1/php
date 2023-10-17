<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *,
        *::after,
        *::before {
            box-sizing: inherit;
        }

        body {
            font-family: 'Montserrat';
            background: #f2f2f2;
            font-size: 14px;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container {
            max-width: 800px;
            min-width: 640px;
            margin: 0 auto;
        }

        .column {
            width: 50%;
            float: left;
            padding: 0 25px;
        }

        .title {
            color: #666666;
            text-transform: uppercase;
        }



        .post-card {
            position: relative;
            box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
            background: #fff;
            min-width: 270px;
            height: 470px;
        }

        .post-card:hover,
        .hover {
            -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
        }

        .post-card:hover .post-img,
        .hover .post-img,
        {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        transform: scale(1.1);
        opacity: .6;
        }

        .post-img {
            height: 400px;
            overflow: hidden;
        }

        .post-card img {
            display: block;
            width: 135%;

        }

        .date {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1;
            background: #e74c3c;
            width: 55px;
            height: 55px;
            border-radius: 100%;
            color: #FFFFFF;
            text-align: center;
            padding: 12.5px 0;
        }

        .post-content {
            position: absolute;
            bottom: 0;
            background: #FFFFFF;
            width: 100%;
            padding: 30px;
        }

        .category {
            position: absolute;
            top: -34px;
            left: 0;
            background: #e74c3c;
            padding: 10px 15px;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .title {
            margin: 0;
            padding: 0 0 10px;
            color: #333333;
            font-size: 26px;
            font-weight: 700;
        }

        .sub_title {
            margin: 0;
            padding: 0 0 20px;
            color: #e74c3c;
            font-size: 20px;
            font-weight: 400;
        }

        .description {
            color: #666666;
            font-size: 14px;
            line-height: 1.8em;
            display: none;
        }

        .up-title {
            margin: 0 0 15px;
            color: #666666;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .hover .post-content .description {
            display: block !important;
            height: auto !important;
            opacity: 1 !important;
        }

        .post-meta {
            margin: 30px 0 0;
            color: #999999;
        }

        .timestamp {
            margin: 0 16px 0 0;
        }

        .post-meta a {
            color: #999999;
            text-decoration: none;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="column">
                <div class="up-title">Normal state</div>
                <div class="post-card">
                    <div class="post-img">
                        <div class="date">
                            <div class="day">
                                <input type="date" name="date" id="date">
                            </div>

                        </div>
                        <img src="https://images.unsplash.com/photo-1467307983825-619715426c70?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&s=fae278c7b8eeffec370bda6e42f5a827" />
                    </div>
                    <div class="post-content">
                        <div class="category">
                            Photos</div>
                        <h1 class="title">India</h1>
                        <h2 class="sub_title">An upcoming superpower</h2>
                        <p class="description">India is a vast South Asian country with diverse terrain from Himalayan peaks to Indian Ocean coastline and history reaching back 5 millennia.</p>
                        <div class="post-meta"><span class="timestamp"><i class="fa fa-clock-o"></i> 6 mins ago</span><span class="comments"><i class="fa fa-comments"></i><a href="#"> 39 comments</a></span></div>
                    </div>
                </div>

            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        fetch().then((res)=>res.json()).then((result)=>{
            console.log(result);
        })
    </script>
</body>

</html>