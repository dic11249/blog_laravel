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

 <form method="post" action="{{ $actionUrl }}">
     @csrf
     @if (!$isCreate)
        <input type="hidden" name="_method" value="put">
     @endif
     <div class="form-group">
         <label for="exampleInputEmail1">Title</label>
         <input type="text" class="form-control" name="title" value="{{ $post->title }}">
     </div>
     <div class="form-group">
         <label for="exampleInputPassword1">Content</label>
         <textarea name="content" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
     <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
 </form>