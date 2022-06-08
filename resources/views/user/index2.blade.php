<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Title-->
    <title>LU Routine</title>
    @include('user.partials2.head')

</head>

<body>
    <!----------------------------------------top area start---------------------------------------->
    @include('user.partials2.nav')
    <!----------------------------------------top area end---------------------------------------->

    <!--top slider start-->
    <section class="slider-area">
        <div class="sliders owl-carousel">
            <div class="single-slider" style="background-image: url(/frontend-asstets2/assets/image/banner/banner1.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="top-slider-content">
                                <h1>Welcome To LU Routine</h1>
                                <p>A web appliction to make routine</p>
                                <button> <a href="{{ route('see-routine.index') }}">See Routine</a></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider" style="background-image: url(/frontend-asstets2/assets/image/banner/banner2.png);">
                <!--top slider animation end-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="top-slider-content">
                                <h1>Welcome To LU Routine</h1>
                                <p>A web appliction to make routine</p>
                                <button> <a href="{{ route('see-routine.index') }}">See Routine</a></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider" style="background-image: url(/frontend-asstets2/assets/image/banner/banner3.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="top-slider-content">
                                <h1>Welcome To LU Routine</h1>
                                <p>A web appliction to make routine</p>
                                <button> <a href="{{ route('see-routine.index') }}">See Routine</a></button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--top slider end-->
    @include('user.partials2.footer')

</body>

</html>