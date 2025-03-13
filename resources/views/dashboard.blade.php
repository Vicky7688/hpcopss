@extends('layouts.app')
@section('content')

    <style>
        .dashboard-card {
            border-radius: 10px;
            padding: 20px;
            color: #345a8e;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container.dashboard-main.mt-5 {
            width: 66%;
            position: absolute;
            top: 84px;
            left: 17%;
        }

        .dashboard-card h4 {
            font-size: 18px;
        }

        .dashboard-card h2 {
            font-size: 16px;
            color: #c1a167;
        }

        img.img-fluid.icn-image {
            width: 35px;
            margin-bottom: 8px;
        }
    </style>

    {{--  {{ dd(Session::all()); }}  --}}

<div class="container dashboard-main mt-5">
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="main-cd">
                <div class="dashboard-card">
                    <div class="img-icon">
                        <img src="{{ url('public/assets/image/Opening-cash.png') }}" alt="Illustration" class="img-fluid icn-image" >
                    </button>
                    </div>
                    <div class="car-txt">
                        <h4>Opening Cash</h4>
                        <h2>1408776.70</h2>
                    </div>
            </div>


            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="dashboard-card">
                <div class="img-icon">
                    <img src="{{ url('public/assets/image/Closing-cash.png') }}" alt="Illustration" class="img-fluid icn-image" >
                </button>
                </div>
                <div class="car-txt">
                <h4>Closing Cash</h4>
                <h2>$25,678</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="dashboard-card">
                <div class="img-icon">
                    <img src="{{ url('public/assets/image/Members-account.png') }}" alt="Illustration" class="img-fluid icn-image" >
                </button>
                </div>
                <div class="car-txt">
                <h4>Members Account</h4>
                <h2>765</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="dashboard-card">
                <div class="img-icon">
                    <img src="{{ url('public/assets/image/account.png') }}" alt="Illustration" class="img-fluid icn-image" >
                </button>
                </div>
                <div class="car-txt">
                <h4>Nominal Members</h4>
                <h2>24</h2>
                </div>
            </div>
        </div>
    </div>

    {{--  bottom cards start  --}}



    {{--  end bottom cards  --}}




</div>

@endsection


