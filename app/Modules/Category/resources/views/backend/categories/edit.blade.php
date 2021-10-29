<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="categoryUpdate" data-id="{{ $category->id }}">
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="title">Category Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Category Title" name="title" value="{{ $category->title ?? old ('title') }}">
                        <div class="title"></div>
                    </div>
                </div>
                 <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select class="placeholder js-states form-control" name="status">
                            <option disabled>Select Category Status</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : ''}}>Inactive</option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : ''}}>Active</option>
                        </select>
                        <div class="status"></div>
                    </div>
                    <div class="status"></div>
                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Select Main Category</label>
                        <select class="placeholder js-states form-control" name="parent_id">
                            <option value="0">Set as Main Category</option>
                             @foreach($categories as $cat )
                             <option value="{{$cat->id}}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}> {{$cat->title}}</option>
                             @endforeach
                        </select>
                        <div class="parent_id"></div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-warning float-right" data-dismiss="modal">Discard</button>
                </div>
            </form>
        </div>
    </div>
</div>











{{-- @extends('backends.layouts.master')
@push('backend-stylesheet')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{asset('backend/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/select2/select2.min.css')}}">
@endpush
@section('content')

<div class="page-header">
    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item"><a href= "{{route('backend.categories.index')}}" >Categories</a></li>
            <li class="breadcrumb-item {{ (request()->routeIs('backend.categories.edit')) ? 'active' : '' }}">Edit Category</li>
        </ol>
    </nav>
</div>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="showCategoryLabel">Edit Category</h5>
        </div>
        <div class="modal-body">
            <form action="{{route('backend.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Category Title</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Category Title" name="title" value="{{ $category->title ?? old ('title') }}">
                        @error('title')
                            <div class="has-error">
                                <span class="text-danger">{{$errors->first('title')}}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                 <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Status</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status" name="status" class="custom-control-input" value="1"  {{$category->status == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label" for="status">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="status2" name="status" class="custom-control-input" value="0" {{$category->status == 0 ? 'checked' : ''}}>
                            <label class="custom-control-label" for="status2">In Active</label>
                        </div>
                    </div>
                     <div class="has-error">
                        @error('status'))
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        @enderror
                    </div>

                </div>
                <div class="form-row mb-12">
                    <div class="form-group col-md-12">
                        <label>Select Main Category</label>
                        <select class="placeholder js-states form-control" name="parent_id">
                            <option value="0">Set as Main Category</option>
                             @foreach($categories as $category )
                             <option value="{{$category->id}}" name="parent_id"> {{$category->title}}</option>
                             @endforeach
                        </select>
                    </div>
                     <div class="has-error">
                        @error('parent_id')
                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                        @enderror
                    </div>
                </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>

        </div>

    </div>
</div>

@endsection
@push('backend-scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script src="{{asset('backend/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend/plugins/select2/custom-select2.js')}}"></script>

    <!-- END PAGE LEVEL PLUGINS -->
@endpush --}}
