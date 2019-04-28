<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
    <style type="text/css">
        .w-wrap{
            text-align: center;
            position: absolute;
            left: 20%;
            top: 10%;
        }
        .w-wrap img{
            width: 80%;
        }
        .w-wrap span{
            color: darkred;
            font-size: 18px;
        }
        a{
            text-decoration: none;
        }
        .w-wrap .link-home{
            width: 80%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="w-wrap">
        <div><img src="{{asset('assets/uploads/404.png')}}"></div>
        <div class="link-home"><a href="{{ url()->previous() }}"><span style="font-family:Bayon;">Back</span></a></div>
    </div>
</body>
</html>
