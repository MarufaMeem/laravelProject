<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{!empty($meta_title) ? $meta_title : ''}}</title>
    @if(!empty($meta_description))
    <meta name="description" content="{{$meta_description}}">
@endif
    @if(!empty($meta_keywords))
    <meta name="keywords" content="{{$meta_keywords}}">
   @endif
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{url('assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{url('assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{url('assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
</head>

<body>
    <div class="page-wrapper">
        @include('sweetalert::alert')
      @include('layouts._header')


    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

@include('layouts._mobile_menu')


       @yield('content')
       @include('layouts._footer')
       
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form class="needs-validation" novalidate action="/" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">email address <span style="color: red">*</span> </label>
                                            <input type="email" name="email" id="singin-email"  class="form-control" placeholder="Email" required>
                                            
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password <span style="color: red">*</span> </label>
                                            <input type="password" name="password" class="form-control" id="singin-password" placeholder="Password" required>
                                        </div><!-- End .form-group -->

                                     


                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                          
                                            <a href="{{url('forgot-password')}}" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                   
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" 
                                aria-labelledby="register-tab">

                                <form class="needs-validation" novalidate action="/auth_register" id="SubmitFormRegister" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label for="email">Name <span style="color: red">*</span> </label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Full name" value="{{ old('name') }}" required>
                           
                            @error('name')
                                <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="email">Email address <span style="color: red">*</span> </label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" required>
                       
                        @error('email')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror

                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password <span style="color: red">*</span> </label>
                                           <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required>
                       
                        @error('password')
                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password <span style="color: red">*</span> </label>
                                            <input type="password" name="passwordConfirm" id="passwordConfirm"
                                            class="form-control @error('passwordConfirm') is-invalid @enderror"
                                            placeholder="Retype password" required>
                                      
                                        @error('passwordConfirm')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                           
                                        </div><!-- End .form-footer -->
                                    </form>
                                 
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

   
    <!-- Plugins JS File -->
    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{url('assets/js/superfish.min.js')}}"></script>
    <script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{url('assets/js/main.js')}}"></script>
</body>
<script type="text/javascript">
$('body').delegate('#SubmitFormRegister','submit',function(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url : "{{url('auth_register')}}",
        data:$(this).serialize(),
        dataType:"json",
        success: function(data){
alert(data.message);
if(data.status == true)
{
    location.reload();

}

        },
        error:function(data){

        }
    });
});

<script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</script>

<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
</html>