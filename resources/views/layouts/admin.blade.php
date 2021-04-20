<!doctype html>
<html lang="en">

<head>
    @yield('title')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- font awesome cdn file -->
    <script src="https://kit.fontawesome.com/0ed0764f4c.js" crossorigin="anonymous"></script>

    <!-- box icon cdn file -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- simplebar  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">

    {{-- flatpickr calendar --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
      <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('admin')}}/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('admin')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('admin')}}/css/style.css">
    @yield('style')
</head>

<body>
    <div class="body__overlay"></div>
    <div class="ts-container">

        <!--  asidebar start -->
        @include('includes.admin.aside')
        <!-- end  asidebar -->


        <!-- ============================================================== -->
        <!-- Dashboard wrapper  -->
        <!-- ============================================================== -->

        <div class="ts__dashboard__wrapper">

          <div class="content-wrapper">
            <!--   header section   -->
            @include('includes.admin.header')
            <!-- end header section -->
            @yield('bread')
           @yield('content')
          </div>

            <!-- footer -->  
            @include('includes.admin.footer')     
            <!-- end footer -->   
        </div>

        <!-- ============================================================== -->
        <!-- Dashboard wrapper end -->
        <!-- ============================================================== -->
    </div>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('admin')}}/js/chart.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- jquery ui -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!--  Flatpickr  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

    <script src="{{asset('admin')}}/js/jquery.nice-select.min.js"></script>
    {{-- simplebar --}}
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>
    <!-- Toastr -->
    <script src="{{asset('admin')}}/js/sweetalert2.min.js"></script>
    <script src="{{asset('admin')}}/js/toastr.min.js"></script>
    <script src="{{asset('admin')}}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        var myElement = document.getElementById('simple-bar');
        new SimpleBar(myElement, {
            autoHide: true
        });
    </script>

    <script>
        switchV = (el) => {

            if (el.id == "kha") {

                document.getElementById(el.value).innerHTML = "Enabled";
                document.getElementById("soft").innerHTML = "Disable";
                document.getElementsByClassName("switch-selection")[0].style.backgroundColor = "#04D1A8"
            } else {
                document.getElementById(el.value).innerHTML = "Disabled";
                document.getElementById("piash").innerHTML = "Enable";
                document.getElementsByClassName("switch-selection")[0].style.backgroundColor = "#ff446a"

            }
        }



        $("#btn1").click(function (event) {
            $("#div1").css("display", "none");
            $("#div2").css("display", "block");
            event.preventDefault();
        });

        $("#btn2").click(function (event) {
            $("#div2").css("display", "none");
            $("#div1").css("display", "block");
            event.preventDefault();
        });
        
      $(document).ready(function () {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
      })
        //$('select').niceSelect();

    </script>
    @yield('script')
</body>

</html>
