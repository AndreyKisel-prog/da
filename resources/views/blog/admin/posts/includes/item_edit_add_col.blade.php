@php /** @var \App\Models\BlogPost $item */ @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
<br>
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="list-unstyled">
                        <div>iD:: {{$item->id}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Created at</label>
                        <input id="title" type="text" class="form-control" value="{{$item->created_at}} " disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Updated at</label>
                        <input id="title" type="text" class="form-control" value="{{$item->updated_at}} " disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Deleted at</label>
                        <input id="title" type="text" class="form-control" value="{{$item->deleted_at}} " disabled>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif
