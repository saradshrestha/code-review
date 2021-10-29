<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="showPostLabel">{{  $post->post_title}}</h5>
            <p>Created Date:{{ $post->created_at->format('Y-m-d') ?? "No Date"}}</p>

        </div>
        <div class="modal-body">
            <p class="modal-text">{{ strip_tags($post->post_content) }}</p>

            <div class="col-12 custom-control-inline">

                @foreach($post->postImages as $postImage )
                <div class="card component-card_2 col-3" style="margin-right: 15px;">
                    <img src="{{$post->getImagesPath($postImage)}}" class="card-img-top custom-control-inline" style = "margin:auto" alt="widget-card-2">
                </div>
                @endforeach
            </div>


        </div>
        <div class="modal-footer justify-content-between">
            <p>Created By:{{ $post->user->name}}</p>
            <button class="btn btn-warning" data-dismiss="modal">Discard</button>
        </div>
    </div>
</div>
