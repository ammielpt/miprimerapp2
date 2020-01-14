<div class="form-group">
    <label for='title'>Titulo del proyecto</label>
    <input class="form-control bg-light shadow-sm" type="text" id="title" name="title" placeholder="Titulo" value="{{old('title',$project->title)}}">
</div>
<div class="form-group">
    <label for='url'>URL del proyecto</label>
    <input class="form-control bg-light shadow-sm" type="text" id="url" name="url" placeholder="Url" value="{{old('url',$project->url)}}">
</div>
<div class="form-group">
    <label for='description'>URL del proyecto</label>
    <textarea  class="form-control bg-light shadow-sm" name="description">{{old('description',$project->description)}}</textarea>
</div>
<button class="btn btn-primary btn-lg btn-block">{{$btnText}}</button>