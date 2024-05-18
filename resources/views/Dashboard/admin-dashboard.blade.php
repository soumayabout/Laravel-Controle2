@extends('Layouts.app')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
               <div class="page-header">
                  <div class="row">
                     <div class="col">
                        <h3 class="page-title">Dashboard</h3>
                        <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                              <li class="breadcrumb-item active">Administration</li>
                        </ul>
                     </div>
                  </div>
            </div>
        
       
            <div class="row">
               <div class="col-xl-3 col-sm-6 col-12 d-flex">
                  <div class="card bg-comman w-100">
                      <div class="card-body">
                          <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-info">
                                  <h6>Students</h6>
                                  <h3>{{ $students }}</h3>
                              </div>
                              <div class="db-icon">
                                  <img src="{{asset('assets/img/icons/dash-icon-01.svg')}}" alt="Dashboard Icon">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                  <div class="card bg-comman w-100">
                      <div class="card-body">
                          <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-info">
                                  <h6>Department</h6>
                                  <h3>{{ $departments }}</h3>
                              </div>
                              <div class="db-icon">
                                  <img src="{{asset('assets/img/icons/dash-icon-03.svg')}}" alt="Dashboard Icon">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-3 col-sm-6 col-12 d-flex">
                  <div class="card bg-comman w-100">
                      <div class="card-body">
                          <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-info">
                                  <h6>User</h6>
                                  <h3>{{ $users }}</h3>
                              </div>
                              <div class="db-icon">
                                  <img src="{{asset('assets/img/icons/teacher-icon-01.svg')}}" alt="Dashboard Icon">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-sm-6 col-12 d-flex">
                  <div class="card bg-comman w-100">
                      <div class="card-body">
                          <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-info">
                                  <h6>Teacher</h6>
                                  <h3>{{ $teachers }}</h3>
                              </div>
                              <div class="db-icon">
                                  <img src="{{asset('assets/img/icons/teacher-icon-02.svg')}}" alt="Dashboard Icon">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-6">

                   <div class="card card-chart">
                       <div class="card-header">
                           <div class="row align-items-center">
                               <div class="col-6">
                                   <h5 class="card-title">Overview</h5>
                               </div>
                               <div class="col-6">
                                   <ul class="chart-list-out">
                                       <li><span class="circle-blue"></span>Teacher</li>
                                       <li><span class="circle-green"></span>Student</li>
                                       <li class="star-menus"><a href="javascript:;"><i
                                                   class="fas fa-ellipsis-v"></i></a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="card-body">
                           <div id="apexcharts-area"></div>
                       </div>
                   </div>

               </div>
               <div class="col-md-12 col-lg-6">

                   <div class="card card-chart">
                       <div class="card-header">
                           <div class="row align-items-center">
                               <div class="col-6">
                                   <h5 class="card-title">Number of Students</h5>
                               </div>
                               <div class="col-6">
                                   <ul class="chart-list-out">
                                       <li><span class="circle-blue"></span>Girls</li>
                                       <li><span class="circle-green"></span>Boys</li>
                                       <li class="star-menus"><a href="javascript:;"><i
                                                   class="fas fa-ellipsis-v"></i></a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="card-body">
                           <div id="bar"></div>
                       </div>
                   </div>

               </div>
           </div>

          

        </div>
            <footer>
               <p>Copyright © 2024.</p>
            </footer>
    </div>
@endsection
