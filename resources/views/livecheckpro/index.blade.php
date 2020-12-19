<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
    {{--  <link rel="stylesheet" href="assets/custom.css">  --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
	<link rel="stylesheet" href="{{ asset('livecheckpro/custom.css') }}">
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  --}}
    <title>LIVE CHECK</title>
</head>

<body class="bg-style">
    <!-- <div class="containerx"> -->
    <div class="my-auto mx-auto w-100 p-3" align="middle" style="max-width:850px;">
        <div class="logo">
            <img src="{{asset('livecheckpro/img/logo.png')}}" alt="logo">
        </div>

        <div class="head-line ">Here is your CODE</div>
        <input type="text " class="input-design display-1 " id="unique_id " placeholder="REN SDCDASXX" value="{{$code}}" readonly required autocomplete="off ">
        <a href="{{ url('result') }}">
            <button type="button" class="verify">Verify</button>
        </a>

        <div class="footer mt-5 ">
            <div class="card-footer ">
                <div class="row ">
                    <div class="col ">
                        <a href="https://forms.gle/JaeeVeQQPzxufP958 ">
                            <img src="{{asset('livecheckpro/img/feedback.svg')}} " alt="feedback ">
                        </a>
                        <p>Feedback</p>
                    </div>
                    <div class="col ">
                        <a href="https://www.daraz.com.bd/products/maxpro-20-capsule-1-strip-esomeprazole-magnesium-i130734478-s1050722109.html?spm=a2a0e.searchlist.list.1.209e2f32NMMmYb&search=1 ">
                            <img src="{{asset('livecheckpro/img/cart.svg')}} " alt="orderOnline ">
                        </a>
                        <p>Order Online</p>
                    </div>
                    <div class="col ">
                        <a href="# ">
                            <img src="{{asset('livecheckpro/img/info.svg')}} " alt="info ">
                        </a>
                        <p>learn More</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- <div id="section_B ">
            <div class="logo">
                <img src="./assets/img/logo.png" alt="logo">
            </div>
            <div class="tick-icon ">
                <img src="./assets/img/header.png " alt="tick icon ">
            </div>
            <div class="result_div ">
                <p class="head ">This medicine is Panacea Live verified!</p>
                <div class="card">
                    <div class="card-body shadow-lg">
                        <p>
                            Manufacturer : Renata Limited <br> Manufacturing date: 19 November 2020 <br> Expiry Date: 18 November 2024 <br> Batch no: 202021 <br> Production location: Banani, Dhaka</p>
                    </div>
                </div>
            </div>
            <div class="button-dive">
                <div class="row">
                    <div class="col">
                        <button>Order Online</button>
                    </div>
                    <div class="col">
                        <button>Verify another</button>
                    </div>
                </div>
            </div>
            <div class="footer mt-5 ">
                <div class="footer-div ">
                    <p>Want to provide feedback to the manufacturer?</p>
                    <a href="https://google.com ">Click here</a>
                </div>
            </div>
        </div> -->




    </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("button ").click(function() {
            console.log('hello robin');
            $("#demo ").hide(1000);
        });
    });
</script>

</html>