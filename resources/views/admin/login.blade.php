<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Beta Byte Technologies</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 1001px;
            background: #afb5f2;
            box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border-radius: 10px;
        }

        .left-section {
            padding: 50px;
            text-align: center;
            color: #fff;
            background: #afb5f2;
            position: relative;
        }

        .left-section img {
            max-width: 250px;
            position: absolute;
            right: -68px;
        }

        .right-section {
            padding: 40px;
            background: #fff;
            box-shadow: 0px 0px 17px 0px #8080806b;
            border-radius: 40px 0px 0px 40px;
        }

        .form-control {
            background-color: #bdc2f761;
            border: none;
            padding: 12px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px 0px #808080b5;
        }

        .form-control:focus {
            box-shadow: none;
            border: 1px solid #7B61FF;
        }

        .btn-primary {
            background: linear-gradient(135deg, #8639fb87, #54AFF8);
            border: none;
            padding: 12px;
            font-weight: bold;
            border-radius: 9px;
            width: 100%;
            box-shadow: inset 0px 2px 4px 0px #80808080;
        }

        .Login-text {
            font-size: 25px;
            font-weight: 600;
            padding: 10px;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .form-cont {
            max-width: 400px;
            margin: auto;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .right-section {
                border-radius: 40px 0px 0px 40px;
            }

            .left-section img {
                max-width: 180px;
                right: -50px;
            }
        }

        @media (max-width: 768px) {
            .left-section {
                display: none;
            }

            .right-section {
                border-radius: 10px;
            }
        }

        @media (max-width: 576px) {
            .form-cont {
                width: 100%;
            }

            .Login-text {
                font-size: 20px;
                font-weight: 600;
                padding: 8px;
            }
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="row login-box">
            <!-- Left Section - Logo & Branding -->
            <div
                class="col-lg-5 col-md-6 d-none d-md-flex flex-column align-items-center justify-content-center left-section">
                <img src="{{ url('public/assets/images/Beta_Byte_logo.png') }}" alt="Beta Byte Logo">
            </div>

            <!-- Right Section - Login Form -->
            <div class="col-lg-7 col-md-6 col-12 right-section">
                <div class="log-icon text-center pt-3">
                    <img src="{{ url('public/assets/images/logicone.png')}}" alt="Beta Byte Logo">
                </div>
                <h3 class="text-center mb-4 Login-text">Login To Your Software</h3>
                <div class="form-cont pb-5">
                    <form name="loginform" id="loginform">
                        <div class="mb-3">
                            <select class="form-control" name="session_id" id="session_id">
                                <option value="" selected>Select Session</option>
                                <option value="">2024</option>
                                <option value="">2025</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" >
                        </div>
                        <div class="mb-4">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>

</body>

</html>
