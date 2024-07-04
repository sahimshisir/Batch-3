   <!-- ########## START: LEFT PANEL ########## -->
   <div class="br-logo"><a href="{{route('dashboard')}}"><span>[</span>DASHBOARD_<i>B-3</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{route('dashboard')}}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
        <!-- <li class="br-menu-item">
          <a href="mailbox.html" class="br-menu-link">
            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
            <span class="menu-item-label">Mailbox</span>
          </a>
        </li>br-menu-item -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Slider</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            {{-- <li class="sub-item"><a href="{{route('slider.create')}}" id="Slider2" class="sub-link" rel="page">Add Brand</a></li> --}}
            <li class="sub-item"><a href="{{route('slider.manage')}}" id="Slider" rel="page" class="sub-link">Manage Slider</a></li>
            <!-- <li class="sub-item"><a href="card-listing.html" class="sub-link">Shop &amp; Listing</a></li> -->
          </ul>
        </li>

         <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Teacher</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            {{-- <li class="sub-item"><a href="{{route('slider.create')}}" id="Slider2" class="sub-link" rel="page">Add Brand</a></li> --}}
            <li class="sub-item"><a href="{{route('teacher.manage')}}" id="Teacher" rel="page" class="sub-link">Manage Teacher</a></li>
            <!-- <li class="sub-item"><a href="card-listing.html" class="sub-link">Shop &amp; Listing</a></li> -->
          </ul>
        </li>

        
      </ul><!-- br-sideleft-menu -->

    

      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
 