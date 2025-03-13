

<style>

    button.navbar-toggler {
        font-size: 12px;
        border: none;
    }
</style>
<div class="navbar-header">

    <nav class="navbar navbar-expand-lg p-0">
        <div class="container-fluid">
          {{--  <a class="navbar-brand" href="#"><img src="{{ url('public/assets/image/logo.png') }}" alt="Illustration" class="img-fluid header-logo" ></a>  --}}
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
           <div class="header-contant">
            <p>{{ Session::get('adminname') }} </p>
           </div>
            <span class="navbar-text">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ url('public/assets/image/user.png') }}" alt="Illustration" class="img-fluid login-image" style="width: 45px;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start">
                      <li><a class="dropdown-item" href="#">Change password</a></li>
                      <li><a class="dropdown-item" href="#">Logout</a></li>
                      <li><a class="dropdown-item" href="#"> </a></li>
                    </ul>
                  </div>
            </span>
          </div>
        </div>
      </nav>
</div>
