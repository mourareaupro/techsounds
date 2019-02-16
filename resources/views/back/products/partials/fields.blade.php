@if($product)
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" value="{{$product->name}}">
</div>

<div class="form-group">
    <label for="name">slug</label>
    <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
</div>

<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" rows="3" name="description">{{$product->description}}</textarea>
</div>

<div class="form-group">
    <label>Price</label>
    <input type="text" class="form-control" name="price" value="{{$product->price}}">
</div>


<div class="form-group">
    <label for="name">Audio sample URL</label>
    <input type="text" class="form-control" name="audio" value="{{$product->audio}}">
</div>

<h6 class="page-header">Audio</h6>
<div class="form-group col-md-4">
    <label for="name">File Name</label>
    <input type="text" class="form-control" name="file" value="{{$product->file}}">
</div>

<div class="form-group col-md-2">
    <label for="name">Size</label>
    <input type="text" class="form-control" name="size" value="{{$product->size}}">
</div>

@else
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="name">slug</label>
        <input type="text" class="form-control" name="slug">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" name="price">
    </div>


    <div class="form-group">
        <label for="name">Audio sample URL</label>
        <input type="text" class="form-control" name="audio">
    </div>

    <h6 class="page-header">Audio</h6>
    <div class="form-group col-md-4">
        <label for="name">File Name</label>
        <input type="text" class="form-control" name="file">
    </div>

    <div class="form-group col-md-2">
        <label for="name">Size</label>
        <input type="text" class="form-control" name="size">
    </div>

@endif
