{{--
<style>
    .sidebar {
    width: 15%;
    min-height: calc(100vh - 70px);
    background: #FDFEFF;
    border-right: 1px solid #DCDCDC;
}
.accordion-body li.sub-menu-item {
    background: #375f9414;
    padding: 10px 12px;
    margin-bottom: 9px;
}

.accordion-body li.sub-menu-item:hover {
    background: #375f9414;
    color: #fff;
    padding: 10px 12px;
    margin-bottom: 9px;
}

.iconcls {
    padding: 7px 8px;
    background: #ffffff59;
    border-radius: 21px;
    margin-right: 6px;
}
</style>

<div class="sidebar">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button sidebar-open collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa fa-user iconcls mr-2" aria-hidden="true"></i>  Master
                </button>
            </h2>

            <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="false" style="">
                        <li class="sub-menu-item">
                            <a href="{{ route('headofficeindex') }}" class="waves-effect">Create Head Office</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('branchindex') }}" class="waves-effect">Branch Master</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('useragentindex') }}" class="waves-effect">User/Agent</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('session') }}" class="waves-effect">Session Master</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('groupindex') }}" class="waves-effect">Group Master</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('ledgerindex') }}" class="waves-effect">Ledger Master</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('sharemaster') }}" class="waves-effect">Share Master</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button sidebar-open collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa fa-sign-out iconcls mr-2" aria-hidden="true"></i> Transactions
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="false" style="">
                        <li class="sub-menu-item">
                            <a href="{{ route('kycindex') }}" class="waves-effect">KYC Form</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('memberaccountindex') }}" class="waves-effect">Member Account</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="{{ route('contributionIndex') }}" class="waves-effect">Contribution Form</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button sidebar-open collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fa fa-file-text iconcls mr-2" aria-hidden="true"></i> Reports
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="false" style="">
                        <li class="sub-menu-item">
                            <a href="CreateSessionMaster.php" class="waves-effect">All Reports</a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="post_master.php" class="waves-effect">Trading Reports</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>  --}}


{{--  second sidebar  --}}

<aside>
    <style>
        * {
            box-sizing: border-box;
        }

        aside {
            position: fixed;
            width: 265px;
            height: 100%;
            overflow: auto;
            box-shadow: 0px 0px 6px 0px #80808052;
            top: 0;
            background: #fff;
        }

        .main label:hover {
            background: #355c901f;
            padding: 9px;
            border-radius: 7px;
            margin-left: 10px;
        }

        .main label {
            padding: 9px;
            margin-left: 10px;
        }

        .logo {
            background-color: #fff;
            height: 90px;
            font-family: sans-serif;
            font-size: 22px;
            padding: 10px 20px;
            text-transform: uppercase;
        }

        .logo span span {
            color: rgb(25, 118, 210);
        }

        .logo select {
            display: block;
            height: 20px;
            margin-top: 22px;
            width: 40px;
            font-size: 10px;
            text-transform: capitalize;
        }

        ul li label i:first-child {
            color: rgb(119, 119, 119);
        }


        input[name="menu"],
        input[name=dropdowns] {
            display: none;
        }

        input[type=radio]:checked~label {
            color: rgb(53 92 144);
        }

        input[type=radio]:checked~label>i:first-child {
            color: rgb(53 92 144);
        }

        input:not(checked)~label {
            color: rgb(60, 33, 33);
        }

        input[type=checkbox]:checked~ul {
            display: block;
        }

        #uparrow,
        #downarrow {
            float: right;
        }

        input[name=dropdowns]:checked~label>#downarrow {
            display: none;
        }

        input[name=dropdowns]:checked~label>#uparrow {
            display: inline-block;
        }

        input[name=dropdowns]:not(checked)~label>#uparrow {
            display: none;
        }



        ul li {
            font-family: Roboto, sans-serif;
            font-size: 15px;
            font-weight: 600;
            margin-top: 10px;
            text-transform: capitalize;
        }

        .drop li {
            margin-top: 5px !important;
        }

        ul li label i {
            width: 50px;
            margin-right: 5px;
            text-align: center;

        }

        ul li label {
            display: inline-block;
            width: 240px;
            color: #355c90;
        }

        ul li label:hover {
            cursor: pointer;
        }

        .drop li:hover {
            background: #355c900d;
            color: #fff !important;
        }

        .main {
            list-style-type: none;
            padding-left: 0;
        }

        .drop {
            display: none;
        }

        .drop li {
            display: block;
            font-size: 14px;
            padding-left: 20px;
            {{--  background: #355c900d;  --}} margin-right: 25px;
        }

        .drop li label {
            width: 100%;
        }

        a.waves-effect {
            text-decoration: none;
            color: #365e92;
            font-weight: 600;
            font-size: 14px;
        }
        label i.fa {
            color: rgb(62 107 163);
        }


        @media (max-width: 1200px) {

            aside {
                width: 57px !important;
            }

            .main label {
                margin-left: 0;
            }
            img.img-fluid.header-logo {
                display: none;
            }
        }
    </style>


    <div class="logo">

        <a class="navbar-brand" href="#"><img src="{{ url('public/assets/image/logo.png') }}" alt="Illustration"
                class="img-fluid header-logo"></a>
    </div>


    <ul class="main">

        <li>
            <input type="radio" id="dashboard" name="menu" checked>
            <label for="dashboard">
                <i id="1" class="fa fa-th-large" aria-hidden="true"></i>
                <a href="{{ route('dashboard') }}" class="waves-effect">Dashboard</a>
            </label>
        </li>


        <!-- Start Chats Dropdown -->
        <li>
            {{--  <input type="checkbox" id="chats" name="dropdowns">
            <label for="chats">
                <i class="fa fa-commenting" aria-hidden="true"></i>
                Master
                <i id="downarrow" class="fa fa-angle-down" aria-hidden="true"></i>
                <i id="uparrow" class="fa fa-angle-up" aria-hidden="true"></i>
            </label>
            <ul class="drop">
                <li class="sub-menu-item">
                    <a href="{{ route('headofficeindex') }}" class="waves-effect">Create Head Office</a>
                </li>
                <li class="sub-menu-item">
                    <a href="{{ route('branchindex') }}" class="waves-effect">Branch Master</a>
                </li>
                <li class="sub-menu-item">
                    <a href="{{ route('useragentindex') }}" class="waves-effect">User/Agent</a>
                </li>

                <li class="sub-menu-item">
                    <a href="{{ route('groupindex') }}" class="waves-effect">Group Master</a>
                </li>

                <li class="sub-menu-item">
                    <a href="{{ route('ledgerindex') }}" class="waves-effect">Ledger Master</a>
                </li>
                <li class="sub-menu-item">
                    <a href="{{ route('sharemaster') }}" class="waves-effect">Share Master</a>
                </li>

            </ul>  --}}
        </li>
        <!-- End Chats Dropdown -->


        <!-- Start Forms Dropdown -->
        <li>
            <input type="checkbox" id="forms" name="dropdowns">
            {{--  <label for="forms">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                Transactions
                <i id="downarrow" class="fa fa-angle-down" aria-hidden="true"></i>
                <i id="uparrow" class="fa fa-angle-up" aria-hidden="true"></i>
            </label>
            <ul class="drop">
                <li class="sub-menu-item">
                    <a href="{{ route('kycindex') }}" class="waves-effect">KYC Form</a>
                </li>

                <li class="sub-menu-item">
                    <a href="{{ route('memberaccountindex') }}" class="waves-effect">Member Account</a>
                </li>

                <li class="sub-menu-item">
                    <a href="{{ route('contributionIndex') }}" class="waves-effect">Contribution Form</a>
                </li>
            </ul>  --}}
        </li>
        <!-- End Forms Dropdown -->

        <!-- Start Layout Dropdown -->
        <li>
            <input type="checkbox" id="layout" name="dropdowns">
            <label for="layout">
                <i class="fa fa-laptop" aria-hidden="true"></i>
                Reports
                <i id="downarrow" class="fa fa-angle-down" aria-hidden="true"></i>
                <i id="uparrow" class="fa fa-angle-up" aria-hidden="true"></i>
            </label>
            <ul class="drop">
                <li class="sub-menu-item">
                    <a href="CreateSessionMaster.php" class="waves-effect">All Reports</a>
                </li>
                <li class="sub-menu-item">
                    <a href="post_master.php" class="waves-effect">Trading Reports</a>
                </li>
            </ul>
        </li>
        <!-- End Layout Dropdown -->
    </ul>
</aside>
