@include('includes.header')
        
        <div class="container auth-ct">
            <div class="card mx-auto p-3 child_sub" style="width: 25rem;">
            <h3 class="py-2 text-center mb-4 title">Sign Up</h3>
            <div class="card-body">
                <form action="{{ route('store') }}" method="post">
                @csrf
                <div class="input-group">
                    <span class="input-group-text"><i class="large material-icons">account_circle</i></span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" id="name" name="name" value="{{ old('name') }}">
                </div>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif

                <div class="input-group mt-2">
                    <span class="input-group-text"><i class="large material-icons">account_circle</i></span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif

                <div class="input-group mt-2">
                    <span class="input-group-text"><i class="large material-icons">fingerprint</i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password">
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif

                <div class="input-group mt-2">
                    <span class="input-group-text"><i class="large material-icons">fingerprint</i></span>
                    <input type="password" class="form-control" placeholder="Konfirmasi Password" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn" name="login">Signup</button>
                </div>
                </form>
                <p class="text-center">
                    <a href="{{ route('login') }}">Sudah punya akun?</a>
                </p>
            </div>
            <div class="result text-center"></div>
        </div>
    </div>
    @include('includes.footer')