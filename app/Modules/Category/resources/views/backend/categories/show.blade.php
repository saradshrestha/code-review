<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="showCategoryLabel">{{  $category->title}}</h5>
            <p>Created Date : {{ $category->created_at->format('Y-m-d') ?? "No Date"}}</p>

        </div>
        <div class="modal-body">
            <p class="modal-text">{{ $category->slug}}</p>
        </div>
        <div class="modal-footer justify-content-between">
            <p>Created By : {{ $category->user->name ?? 'Sarad'}}</p>
            <a type="button" href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
