@php /** @var \App\Models\BlogCategory $item */ @endphp
@php /** @var \Illuminate\Database\Eloquent\Collection $categoryList */ @endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <ul class="nav nav-tabs" role='tablist'>
                        <li class="nav-item">
                            <a href="#maindata" data-toggle="tab" role="tab" class="nav-link active">Main data</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input
                                    name="title"
                                    id="title"
                                    type="text"
                                    required
                                    minlength="3"
                                    class="form-control"
                                    value="{{old('title', $item->title)}}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="slug">Identificator</label>
                                <input
                                    name="slug"
                                    id="slug"
                                    value="{{old('slug', $item->slug)}}"
                                    type="text"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Parent</label>
                                <select name="parent_id"
                                        id="parent_id"
                                        required
                                        class="form-control">
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{$categoryOption->id}}"
                                                @if(($categoryOption->id == $item->parent_id))
                                                selected @endif
                                        >
                                            {{$categoryOption->id}}.{{$categoryOption->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea name="description"
                                          class="form-control"
                                          id="description"
                                          rows="3">
                                {{old('description', $item->description)}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
