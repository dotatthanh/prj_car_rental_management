<x-app-layout>
   @section('content')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            
                            <div class="card-body pt-0"> 
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Nhập email" value="{{ old('email') }}" name="email">
                                        </div>

                                        <div class="form-group">
                                            <label for="userpassword">Mật khẩu</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Nhập mật khẩu" name="password" autocomplete="current-password">
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Đăng nhập</button>
                                        </div>

                                        
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection('content')
</x-app-layout>