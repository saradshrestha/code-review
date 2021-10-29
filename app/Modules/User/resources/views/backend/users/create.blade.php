<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createUserLabel">Add New User</h5>
        </div>
        <div class="modal-body">
            <form id="userStore" enctype="multipart/form-data">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="name">User Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{ old('name') }}" >
                        <div class="name"></div>

                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="email">User E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter E-Mail Address" name="email" value="{{ old('email') }}" >
                        <div class="email"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for = "status">Status</label>
                        <select class="custom-select" name="status">
                            <option disabled selected>Selete User Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <div class="status"></div>
                    </div>

                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>User's Role</label>
                        <select class="custom-select" name="role">
                            <option disabled selected>Select Role For User</option>
                            <option value="author">Author</option>
                            <option value="editor">Editor</option>
                        </select>
                        <div class="role"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="{{old ('password') }}">
                        <div class="password"></div>
                    </div>
                </div>

                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password" name="password_confirmation">
                        <div class="password_confirmation"></div>
                    </div>
                </div>
                <button class="btn btn-warning" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                <button type="submit" class="btn btn-primary float-right">Submit</button>

            </form>
        </div>
    </div>
</div>





{{-- @extends('backends.layouts.master')
@push('backend-stylesheet')
    <!-- BEGIN PAGE LEVEL STYLES -->

    <!-- END PAGE LEVEL STYLES -->
@endpush
@section('content')

<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}" >Users</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.users.create')) ? 'active' : '' }}">Create User</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div id="flFormsGrid" class="col-lg-6 layout-spacing" style="margin:auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h4>Create User</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <form action ="{{route('backend.users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-12">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">User Full Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Full Name" name="name" value="{{old ('name') }}" required>
                            @error('name')
                                <div class="has-error">
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-12">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">User E-Mail</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Enter E-Mail Address" name="email" value="{{old ('email') }}" required>
                            @error('email')
                                <div class="has-error">
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-12">
                        <div class="form-group col-md-12">
                            <label for = "status">Status</label>
                            <select class="custom-select mb-4" name="status">
                                <option disabled>Selete User Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                         <div class="has-error">
                            @error('status')
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mb-12">
                        <div class="form-group col-md-12">
                            <label>User's Role</label>
                            <select class="custom-select mb-4" name="role">
                                <option disabled>Select Role For User</option>
                                <option value="author">Author</option>
                                <option value="editor">Editor</option>
                            </select>
                            <div class="has-error">
                                @error('role')
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-12">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Password</label>
                            <input type="password" class="form-control" id="inpuPassword" placeholder="Enter Password" name="password" value="{{old ('password') }}" required>
                            @error('password')
                                <div class="has-error">
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-12">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Confirm Password</label>
                            <input type="password" class="form-control" id="inputEmail4" placeholder="Enter Confirm Password" name="password_confirmation" required>
                            @error('password')
                                <div class="has-error">
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('backend-scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('backend/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/custom-select2.js')}}"></script>


    <script>
        $(".placeholder").select2({
            placeholder: "Choose a Category",

        });
    </script>

@endpush --}}
