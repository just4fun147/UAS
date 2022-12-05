@extends('layout.main')

@section('container')
<div class="bg bg-light text-dark">
    <div class="container min-vh-100 mt-5 d-flex align-items-center justifycontent-center">
        <div class="card text-white p-3 mb-2 bg-dark ma-5 shadow " style="min-width: 25rem;">

            <form action="/user" method="post" enctype="multipart/form-data">
                @csrf
                <!-- JENIS USER -->
                <label for="R1">User</label>
                <input class="@error('type') is-invalid @enderror" type="Radio" name="type" value="1" id="R1">
                <label for="R2">Pesawat</label>
                <input class="@error('type') is-invalid @enderror" type="Radio" name="type" value="2" id="R2">
                <label for="R3">Kereta</label>
                <input class="@error('type') is-invalid @enderror" type="Radio" name="type" value="3" id="R3">
                <label for="R4">Bus</label>
                <input class="@error('type') is-invalid @enderror" type="Radio" name="type" value="4" id="R4">
                <label for="R5">Penyewaan</label>
                <input class="@error('type') is-invalid @enderror" type="Radio" name="type" value="5" id="R5">
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <p style="font-size: 15px; opacity:0.4">Nama Maksimal 60 karakter</p>
                <div class="mb-3">
                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" required value="{{ old('name') }}">
                </div>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <div class="mb-3"> 
                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <label for="exampleInputEmail1" class="form-label">Foto</label>
                <div class="mb-3">
                    <input type="file" accept="image/jpeg" class="form-control mt-2 mb-2 @error('image') is-invalid @enderror" id="image" name="image" required>
                </div>
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label for="exampelInputEmail1">Password</label>
                <p style="font-size: 15px; opacity:0.4">Password minimal 6 karakter terdiri dari huruf besar, kecil, angka, dan simbol</p>
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
                    <button type="submit" class="btn btn-primary" name="register"
                        style="background-color:#ff4e44;">Register</button>
                </div>
            </form>
            <p class="mt-2 mb-0">You already have an account?
                <a href="/login" class="textprimary">Please Sign in!</a>
            </p>
        </div>
    </div>
</div>

<script defer src="/js/scriptPerpus.js"></script>
@endsection