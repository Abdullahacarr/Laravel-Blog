@isset($categories)


                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Kategoriler
                        </div>
                        
                            <div class="list-group">
                                @foreach($categories as $category)
                                <li  class="list-group-item @if(Request::segment(2)==$category->slug) active @endif" > 
                                    <a @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}} @endif"> {{$category->name}} 
                                        <span class="badge bg-danger float-right"> {{$category->postCount()}}</span>
                                    </a>
                                </li>
                                @endforeach
                                
                            </div>
                    </div>
                </div>
@endif