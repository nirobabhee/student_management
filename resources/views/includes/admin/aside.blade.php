<!-- ============================================================== -->
<!-- start aside section  -->
<!-- ============================================================== -->
<div class="aside-bar-wrapper">
    <span class="aside-bar-close d-lg-none"></span>
    <div class="ts__sidebar" id="simple-bar">
        <a class="navbar-brand mr-0" href="{{URL::to('/')}}">
            <img src="{{URL::to('/')}}/images/logo.png"
                                    alt="" style="max-width: 100%">
            
        </a>
        <div>
            <nav class="navbar navbar-light pt-1"> 
                <ul class="navbar-nav flex-column">
                    <li class="nav-item nav-li">
                    <a class="nav-link" href="{{URL::to('/')}}"><i class='bx bxs-home'></i>Dashboard</a>
                    </li>


                    
                    <li class="nav-item nav-li">
                        <a class="nav-link {{request()->route()->getName()=='fee.index'?'active-child-nav':''}}" href="{{route('fee.index')}}"><i class="fas fa-fw fa-table"></i>Fee</a>
                    </li>
                    <li class="nav-item nav-li">
                        <a class="nav-link {{request()->route()->getName()=='student.index'?'active-child-nav':''}}" href="{{route('student.index')}}"><i class="fas fa-fw fa-table"></i>Student</a>
                    </li>

                    
    
                </ul>
            </nav>
        </div>
    </div>
</div>
 <!-- ============================================================== -->
<!-- End aside section  -->
<!-- ============================================================== -->