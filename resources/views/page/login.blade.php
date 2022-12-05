@extends('layout.main')

@section('container')
    <div class="bg bg-dark text-dark">
        <div class="container min-vh-100 mt-5 d-flex align-items-center justifycontent-center">
            <div class="card text-white p-3 mb-2 bg-dark ma-5 shadow " style="min-width: 25rem;">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" autofocus required value="{{ old('email') }}"> 
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label for="exampelInputEmail1">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-eye-slash" id="togglePassword" 
                           style="cursor: pointer"></i>
                           </span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="login"
                            style="background-color:#ff4e44;">Login</button>
                    </div>
                </form>
                <p class="mt-2 mb-0">Don’t have an account yet?
                    <a href="/register" class="textprimary">Click here!</a>
                </p>
            </div>
        </div>
       
    </div>
    <script defer src="/js/scriptPerpus.js"></script>
@endsection