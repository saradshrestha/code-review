<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="showCategoryLabel">{{  $category->title}}</h5>
            <p>Created Date : {{ $category->created_at->format('Y-m-d') ?? "" }}</p>

        </div>
        <div class="modal-body">
            <p class="modal-text">{{ $category->slug }}</p>
        </div>

    </div>
</div>
