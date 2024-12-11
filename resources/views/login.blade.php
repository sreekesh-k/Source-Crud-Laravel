@extends('components.layout')

@section('content')
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <!-- Login Form -->
              <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
                  <label class="form-label" for="typeEmailX">Email</label>
                  @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                  @enderror
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required />
                  <label class="form-label" for="typePasswordX">Password</label>
                  @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-outline-light btn-lg px-5">Login</button>
              </form>
              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="{{ route('password.request') }}">Forgot password?</a></p>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
