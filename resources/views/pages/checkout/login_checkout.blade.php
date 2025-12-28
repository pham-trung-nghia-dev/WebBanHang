@extends('layout')

@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng Nhập Tài Khoản</h2>
                        <form action="{{URL::to('/login-customer')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="email" name="email" placeholder="Tài Khoản" />
                            <input type="password" name="password" placeholder="PassWord" />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi Nhớ Đăng Nhập
                            </span>
                            <button type="submit" class="btn btn-default">Đăng Nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Đăng Ký Tài Khoản Mới!</h2>
                        <form action="{{URL::to('/add-customer')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" placeholder="Họ Và Tên" name="customer_name" />
                            <input type="email" placeholder="Địa chỉ Email" name="customer_email" />
                            <input type="password" placeholder="Password" name="customer_password" />
                            <input type="text" placeholder="Phone" name="customer_phone" />
                            <button type="submit" class="btn btn-default">Đăng Ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
