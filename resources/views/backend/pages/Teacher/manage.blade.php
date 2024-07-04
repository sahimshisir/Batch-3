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
            <h6 class="br-section-label">Manage teacher</h6>
            <h6 class="text-end">
                <button style="background: none; border:none; font-weight: 600" data-bs-toggle="modal" data-bs-target="#addteacher">
                    Add New teacher
                </button>
            </h6>
            <div class="bd bd-gray-300 rounded table-responsive">
                <div id="teachercontainer">
                    <table class="table table-hover mb-0">
                        <thead class="thead-colored thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Sub title</th>
                                <th>Description</th>
                                <th>Uploader name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 15px">
                            @php $i = 1; @endphp
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        @if (!is_null($teacher->image))
                                            <img style="width:50px; height:50px; border-radius:50%" class="border border-primary" src="{{ asset('Backend/img/teacher/' . $teacher->image) }}">
                                        @else
                                            No Image Uploaded
                                        @endif
                                    </td>
                                    <td>{{ $teacher->name }}</td>
                                    <td style="width: 6rem">{{ $teacher->subtitle }}</td>
                                    <td>{{ $teacher->description }}</td>
                                    <td>{{ $teacher->uplode_user_name }}</td>
                                    <td style="width: 6rem">
                                        <a data-bs-toggle="modal" data-bs-target="#updateteacher_{{ $teacher->id }}" class="btn btn-success rounded-circle btn-icon" style="width: 25px; height: 25px;">
                                            <div></div>
                                        </a>
                                        <a  onclick="confirmDelete({{ $teacher->id }})" class="btn btn-danger btn-icon rounded-circle mg-r-5" style="width: 25px; height: 25px;">
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
    <!-- Add New teacher Modal -->
    <div class="modal fade" id="addteacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New teacher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('teacher.store') }}" method="POST" id="add_new_teacher" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title Name</label>
                            <input type="text" class="form-control" name="name" placeholder="teacher Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Sub title name</label>
                            <input type="text" class="form-control" name="subtitle" placeholder="teacher Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="teacher Description">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="username" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload teacher image</label>
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
    {{-- end new teacher add --}}

    {{-- Update teacher --}}
    @foreach (App\Models\Backend\teacher::orderBy('id', 'asc')->get() as $teacher)
    <div class="modal fade" id="updateteacher_{{ $teacher->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update teacher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('teacher.update',$teacher->id) }}" method="POST" class="updateteacher" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{$teacher->name}}" name="name" placeholder="teacher Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Sub title name</label>
                            <input type="text" class="form-control" value="{{$teacher->subtitle}}" name="subtitle" placeholder="teacher Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="text" class="form-control" value="{{$teacher->description}}" name="description" placeholder="teacher Description">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="username" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload teacher image</label>
                            <input class=" form_File" name="image" value="{{$teacher->image}}" type="file">
                            <div>
                                @if (!is_null($teacher->image))
                                <img style="width:50px; height:50px; border-radius:50%" class="border border-primary" src="{{ asset('Backend/img/teacher/' . $teacher->image) }}">
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
    {{-- End update teacher --}}
    {{-- END MODAL BOX --}}

    <script>
    
 
    </script>
@endsection
