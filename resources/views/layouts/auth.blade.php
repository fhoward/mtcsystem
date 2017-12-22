<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>
<div id="box">
                <div id="side1">SPED</div>
                <div id="side2">PT</div>
                <div id="side3">OT</div>
                <div id="side4">ST</div>


</div>
<body class="page-header-fixed">
<style>
            html, body {
                /*background: url("/images/backgroun.jpg") no-repeat;*/
            /*    display: flex;*/
                background: linear-gradient(to top right, #80ff80, #e699ff) fixed;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
#box{
    margin-top: -60px;
    margin-left: 280px;
    width: 100px;
    float: left;
    transform-style: preserve-3d;
    -webkit-animation: rotate 10s ease-in-out infinite;

}
#side1{
    position: absolute;
    width: 100px;
    height: 50px;
    color: white;
    font-family: arial;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    transform: translateZ(50px);
    background-color: #330033;
}
#side2{
    position: absolute;
    width: 100px;
    height: 50px;
    color: white;
    font-family: arial;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    transform: rotateY(-90deg) translateX(-50px);
    background-color: #660033;
    transform-origin: left;
}
#side3{
    position: absolute;
    width: 100px;
    height: 50px;
    color: white;
    font-family: arial;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    transform: rotateY(180deg) translateZ(50px);
    background-color: #330033;
    
}
#side4{
    position: absolute;
    width: 100px;
    height: 50px;
    color: white;
    font-family: arial;
    text-align: center;
    line-height: 50px;
    font-size: 20px;
    transform: rotateY(90deg) translateX(50px);
    background-color: #660033;
    transform-origin: right;
    
}
@-webkit-keyframes rotate{
    0%{transform: rotateY(0);}
    25%{transform: rotateY(90deg);}
    50%{transform: rotateY(180deg);}
    75%{transform: rotateY(270deg);}
    100%{transform: rotateY(360deg);}
}
</style>

    <div style="margin-top: 10%;"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>
</html>