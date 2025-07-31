<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mekar Tani Desa Sukaraja</title>

  <!-- Custom styles -->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

  <style>
    /* Center the container and adjust width */
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      background: #4e73df; /* Add background color for the body */
    }
    .container {
      max-width: 450px; /* Adjusted width to match the login page */
      margin: 0;
    }
    .card {
      padding: 1rem; /* Adjusted padding */
      border-radius: 10px;
    }
    img {
      width: 110px; /* Same image size as login page */
      height: auto;
      margin-bottom: 0.5rem;
    }
    .form-control-user, .btn-user {
      padding: 0.5rem;
      font-size: 0.95rem; /* Same font size as login page */
    }
    .form-group {
      margin-bottom: 0.8rem; /* Same margin as login page */
    }

    /* Enhanced heading style with gradient and no bottom border */
    h3 {
      font-size: 1.3rem;
      font-weight: bold;
      text-align: center;
      background: linear-gradient(90deg, #4e73df, #1cc88a);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
      padding-bottom: 0.25rem;
      margin-bottom: 1rem; /* Adjusted margin */
    }

    /* Style for the Create Account heading */
    .heading-login {
      font-size: 1.2rem;
      font-weight: bold;
      color: #555555; /* Soft dark gray */
      text-align: center;
      margin-bottom: 1rem; /* Adjusted margin */
    }
  </style>
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg">
      <div class="card-body text-center">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <h3>Rencana Kebutuhan Petani</h3>
        <h4 class="heading-login">Create Account</h4>
        
        <!-- Registration Form -->
        <form action="{{ route('register.simpan') }}" method="POST" class="user mt-2">
          @csrf
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="form-group">
            <input name="nama" type="text" class="form-control form-control-user" placeholder="Name">
          </div>
          <div class="form-group">
            <input name="email" type="email" class="form-control form-control-user" placeholder="Email Address">
          </div>
          <div class="form-group row">
            <div class="col-6">
              <input name="password" type="password" class="form-control form-control-user" placeholder="Password">
            </div>
            <div class="col-6">
              <input name="password_confirmation" type="password" class="form-control form-control-user" placeholder="Repeat Password">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
        </form>

        <!-- Link to Login Page -->
        <div class="text-center mt-2">
          <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
