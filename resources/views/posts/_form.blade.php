 @php
    //  $isCreate = request()->is('*create'); //用routing判斷
     $isCreate = !$post->exists; //用method判斷
     $actionUrl = ($isCreate) ? '/posts' : '/posts/'.$post->id;
 @endphp

 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $key => $error)
         <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
 @endif

 <form method="post" action="{{ $actionUrl }}" enctype="multipart/form-data">
     @csrf
     @if (!$isCreate)
        <input type="hidden" name="_method" value="put">
     @endif
     <div class="form-group">
         <label>Title</label>
         <input type="text" class="form-control" name="title" value="{{ $post->title }}">
     </div>
     <div class="form-group">
         <label class="d-block">Thumbnail</label>
         @if ($post->thumbnail)
            <img width="320" src="{{ $post->thumbnail }}" alt="thumbnail">
         @endif
         <div class="custom-file">
             <input type="file" class="custom-file-input" name="thumbnail">
             <label class="custom-file-label" for="customFile">Choose file</label>
         </div>
     </div>
     <div class="form-group">
         <label>Category</label>
         <select class="form-control" name="category_id">
             <option selected value="">請選擇分類</option>
             @foreach ($categories as $key => $category)
                 <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
             @endforeach
         </select>
     </div>
     <div class="form-group">
         <label>Tags</label>
         <input type="text" class="form-control" name="tags" value="{{ $post->tagsString() }}">
     </div>
     <div class="form-group">
         <label>Content</label>
         <textarea name="content" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
     <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
 </form>
