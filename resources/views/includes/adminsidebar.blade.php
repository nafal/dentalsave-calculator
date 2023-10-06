sidebar start
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                <!--   <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p> -->
                  <h5 class="centered">{{ Auth::user()->name }}</h5>
                    
             <!--      <li class="mt">
                      <a class="active" href="{{ route('getfeeform') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
-->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Procedure Category</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ route('createProcedure') }}">Create Category</a></li>
                          <li><a  href="{{ url('index') }}">Category List</a></li>
                          <!-- <li><a  href="panels.html">Panels</a></li> -->
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Dental Procedures</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ route('createCourse')}}">Create Procedure</a></li>
                          <li><a  href="{{ route('courseList')}}"> Procedure List</a></li>
                            <li><a  href="{{ route('uploaddsroute') }}">Upload Excel</a></li>
                         
                        
                      </ul>
                  </li>
                  
                  
                 
                  <!--  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Dental Fees</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ route('createDentalFee') }}">Dental Fees</a></li>
                          <li><a  href="{{ url('dental-fee-index') }}">Dental Fees List</a></li>
                        
                      </ul>
                  </li>
                 <!--    <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Settings</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ route('addPin') }}">Add Pin Code</a></li>
                          <li><a  href="{{ route('createNetwork') }}">Add Ds Network</a></li>
                          <li><a  href="{{ route('mapPrefixNetwork') }}">Ds Network Mapping</a></li>
                        
                      </ul>
                  </li>-->
                 
				          <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Post Code</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ url('pin-index') }}">Post code Listing</a></li>
                           <li><a  href="{{ route('addPin') }}">Add Post Code</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>DS network</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ URL('network-index') }}"> Ds Network Listing</a></li>
                            <li><a  href="{{ route('createNetwork') }}">Add Ds Network</a></li>
                          <li><a  href="{{ route('uploadroute') }}">Upload Excel</a></li>
                            
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ route('showchangepasswordform')}}">Change password</a></li>
                          
                        
                      </ul>
                  </li>

                 
                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Fees</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ route('createUsualFee') }}">Create Fees</a></li>
                          <li><a  href="{{ url('usual-fee-index') }}"> Fees List</a></li>
                         
                      </ul>
                  </li> -->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end