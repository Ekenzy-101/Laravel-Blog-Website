<legend class="mb-4">{{ $legend_label }}</legend>

<div class="form-group">
  <label for="title" class="form-control-label">Title</label>
  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post ? $post->title : old('title') }}">
  @error('title')
  <div class="invalid-feedback">
    <span>{{ $message }}</span>
  </div>
  @enderror
</div>

<div class="form-group">
  <label for="category" class="form-control-label">Category</label>
  <select type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ $post ? $post->category : old('category') }}">
    <option value="Politics">Politics</option>
    <option value="Science">Science</option>
    <option value="Sport">Sport</option>
    <option value="Technology">Technology</option>
    <option value="Entertainment">Entertainment</option>
    <option value="Health">Health</option>
    <option value="Food and Nutrition">Food and Nutrition</option>
  </select>
  @error('category')
  <div class="invalid-feedback">
    <span>{{ $message }}</span>
  </div>
  @enderror
</div>

<div class="form-group">
  <label for="image_file" class="form-control-label">Upload Post Picture</label>
  <input type="file" name="image_file" class="form-control-file">
  @error('image_file')
  <small class="mt-2 text-danger">{{ $message }}</small>
  @enderror
</div>

<div class="form-group">
  <label for="content" class="form-control-label">Content</label>
  <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="20" >{{ $post ? $post->content : old('content') }}</textarea>
  @error('content')
  <div class="invalid-feedback">
    <span>{{ $message }}</span>
  </div>
  @enderror
</div>

<div class="form-group mt-4">
  <button type="submit" class="btn create-btn">{{ $button_label }}</button>
</div>
