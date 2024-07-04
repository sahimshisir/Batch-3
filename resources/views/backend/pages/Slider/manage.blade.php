@extends('backend.layout.template')
@section('main')
    <div class="br-pagetitle">
        <div>
            <!-- <h4 class="">Dashboard</h4>
                  <p class="mg-b-0">All Brands Manage</p> -->
        </div>
    </div>
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="br-section-label">Manage Slider</h6>
            <h6 class="text-end">
                <button style="background: none; border:none; font-weight: 600" data-bs-toggle="modal" data-bs-target="#addslider">
                    Add New Slider
                </button>
            </h6>
            <div class="bd bd-gray-300 rounded table-responsive">
                <div id="slidercontainer">
                    <table class="table table-hover mb-0">
                        <thead class="thead-colored thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Uploader name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 15px">
                            @php $i = 1; @endphp
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        @if (!is_null($slider->image))
                                            <img style="width:50px; height:50px; border-radius:50%" class="border border-primary" src="{{ asset('Backend/img/slider/' . $slider->image) }}">
                                        @else
                                            No Image Uploaded
                                        @endif
                                    </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->discription }}</td>
                                    <td>{{ $slider->uplode_user_name }}</td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#updateslider_{{ $slider->id }}" class="btn btn-success rounded-circle btn-icon" style="width: 25px; height: 25px;">
                                            <div></div>
                                        </a>
                                        <a  onclick="confirmDelete({{ $slider->id }})" class="btn btn-danger btn-icon rounded-circle mg-r-5" style="width: 25px; height: 25px;">
                                            <div></div>
                                        </a>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL BOX --}}
    <!-- Add New Slider Modal -->
    <div class="modal fade" id="addslider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('slider.store') }}" method="POST" id="add_new_slider" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title Name</label>
                            <input type="text" class="form-control" name="title" placeholder="Slider Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Slider Description">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="username" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload slider image</label>
                            <input class="form_File" name="image" type="file">
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end new slider add --}}

    {{-- Update slider --}}
    @foreach (App\Models\Backend\Slider::orderBy('id', 'asc')->get() as $slider)
    <div class="modal fade" id="updateslider_{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('slider.update',$slider->id) }}" method="POST" class="updateslider" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title Name</label>
                            <input type="text" class="form-control" value="{{$slider->title}}" name="title" placeholder="Slider Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="text" class="form-control" value="{{$slider->discription}}" name="description" placeholder="Slider Description">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="username" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload slider image</label>
                            <input class=" form_File" name="image" value="{{$slider->image}}" type="file">
                            <div>
                                @if (!is_null($slider->image))
                                <img style="width:50px; height:50px; border-radius:50%" class="border border-primary" src="{{ asset('Backend/img/slider/' . $slider->image) }}">
                            @else
                                No Image Uploaded
                            @endif
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    {{-- End update slider --}}
    {{-- END MODAL BOX --}}

    <script>
    
 
    </script>
@endsection
