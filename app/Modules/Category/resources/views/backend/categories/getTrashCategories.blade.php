<table id="zero-config" class="table table-hover" style="width:100%">
    <thead>
    <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>Created By</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($trashCategories as $category)
    <tr>
        <td>{{$category->title}}</td>
        <td>{{$category->slug}}</td>
        <td>{{$category->user->name ?? 'sarad'}}</td>
        <td>
            <a type="button" data-id ="{{$category->id}}" class="btn btn-primary undoDelete" style="display: inline-block">Undo Delete</a>
            <a type="button" data-id="{{ $category->id }}" class="btn btn-danger permaDeleteCategory" style="display: inline-block">Delete Permanently</a>
        </td>
    @endforeach
    </tbody>
</table>
