<div id="dynamic_data">
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
  
    @include('backend.includes.header')
    @include('backend.includes.css')

  
  </head>
  
  <body>
  
  
    @include('backend.includes.menu')
    @include('backend.includes.topbar')
    @include('backend.includes.rightsidebar')
    @include('backend.includes.animate')
  
  
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel" >
       
        @yield('main')
       
     
     
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
  
    @include('backend.includes.script')
  
  
  </body>
  
  </html>
</div>
