@extends('front.layouts.master')
@section('title',$post->title)

@section('content')

            
                
<div class="col-md-9"> 
    {{$post->content}}
    <div class="col-md-12 pt-5">
     <div class="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                Yorumlar
            </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            
            <div class="accordion-body">
            @foreach($commen as $comment)
                {{$comment->name}}
            @endforeach
            <strong></strong>
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                Yorum Yap
            </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                
                <div class="container">
                <div class="alert alert-success" style="display:none"></div>
                <form id="myForm" method="POST" action="{{  route('comment',[$post->getCategory->slug,$post->slug])    }}" >
                    @csrf
                    <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                    <label for="type">Yorum:</label>
                    <input type="text" class="form-control" id="commen">
                    </div>
                   
                    <button class="btn btn-primary" id="ajaxSubmit">Kaydet</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>

            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

               jQuery.ajax({
                  url: "{{ route('comment',[$post->getCategory->slug,$post->slug]) }}",
                  type: 'POST',
                  data: {
                     p_id: {!!$post->id !!},
                     name: $('#name').val(),
                     comment: $('#commen').val(),
                     
                  },
                  success: function(result){
                     jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                  }});
               });
            
</script>




@include('front.widgets.categoryWidget')           
@endsection