<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createUserLabel">Update User Details</h5>
        </div>
        <div class="modal-body">
            <form id="userUpdate" data-id={{ $user->id }} enctype="multipart/form-data">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="name">User Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{  $user->name ?? old('name') }}">
                        <div class="name"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="email">User E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter E-Mail Address" name="email" value="{{ $user->email ?? old('email') }}">
                        <div class="email"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for = "status">Status</label>
                        <select class="custom-select" name="status">
                            <option disabled selected>Selete User Status</option>
                            <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <div class="status"></div>
                    </div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>User's Role</label>
                        <select class="custom-select" name="role">
                            <option disabled >Select Role For User</option>
                            <option value="author" {{ $user->getRoles == 'author' ? 'selected' : '' }} >Author</option>
                            <option value="editor" {{ $user->getRoles == 'editor' ? 'selected' : '' }} >Editor</option>
                            <option value="admin" {{ $user->getRoles == 'admin' ? 'selected' : '' }} >Admin</option>
                        </select>
                        <div class="role"></div>
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


@endpush
@section('content')

<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item"><a href= "{{route('backend.users.index')}}" >Users</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.users.edit')) ? 'active' : '' }}">Edit </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div id="flFormsGrid" class="col-lg-5 layout-spacing" style="margin:auto">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <h4>Edit User's Details</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{route('backend.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-row mb-12">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">User Full Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Full Name" name="name" value="{{$user->name ?? old ('name') }}" required>
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
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Enter E-Mail Address" name="email" value="{{$user->email ??old ('email') }}" required>
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
                            <select class="custom-select mb-2" name="status">
                                <option disabled>Selete User Status</option>
                                <option value="1" {{ $user->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{ $user->status == 0 ? 'selected' : ''}}>Inactive</option>
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
                            <select class="custom-select mb-2" name="role">
                                <option disabled>Select Role For User</option>
                                <option value="author" {{ $user->getRoles == 'author' ? 'selected' : ''}}>Author</option>
                                <option value="editor" {{ $user->getRoles == 'editor' ? 'selected' : ''}}>Editor</option>
                                <option value="admin" {{ $user->getRoles == 'admin' ? 'selected' : ''}}>Admin</option>
                            </select>
                            <div class="has-error">
                                @error('role')
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('backend-scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->
@endpush --}}
