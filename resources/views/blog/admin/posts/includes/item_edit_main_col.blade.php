@php /** @var \App\Models\BlogPost $item */ @endphp
@php /** @var \Illuminate\Database\Eloquent\Collection $categoryList */ @endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    published: true
                @else
                    published: false
                @endif
            </div>
            <div class="card-body">
                <div class="card-title">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home"
                                    type="button" role="tab">Main
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="optional-tab" data-bs-toggle="tab"
                                    data-bs-target="#optional"
                                    type="button" role="tab">Optional
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
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
                                        <label for="content_raw">content-raw</label>
                                        <textarea name="content_raw"
                                                  class="form-control"
                                                  id="content_raw"
                                                  rows="10">
                                {{old('content_raw', $item->content_raw)}}</textarea>
                                    </div>
                                </div>

                                <div class="tab-pane" id='additiondata' role="tabpanel">
                                    <div role="presentation"></div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="optional" role="tabpanel">
                            <div class="form-group">
                                <label for="category_id">category</label>
                                <select name="category_id"
                                        id="category_id"
                                        required
                                        class="form-control">
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{$categoryOption->id}}"
                                                @if(($categoryOption->id == $item->category->id))
                                                selected @endif
                                        >
                                            {{$categoryOption->id_title}}
                                        </option>
                                    @endforeach
                                </select>
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
                                <label for="excerpt">excerpt</label>
                                <textarea rows="3"
                                          name="excerpt"
                                          id="excerpt"
                                          class="form-control"
                                >{{old('excerpt', $item->excerpt)}}
                                    </textarea>
                            </div>
                            <div class="form-check">
                                <input type="hidden"
                                       name="is_published"
                                       value="0">

                                <input class="form-check-input"
                                       id="is_published"
                                       type="checkbox"
                                       value="1"
                                       @if($item->is_published)
                                       checked="checked"
                                       @endif
                                       name="is_published">
                                <label class="form-check-label"
                                       for="is_published">is published</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
