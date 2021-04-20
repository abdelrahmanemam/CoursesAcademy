@foreach($courses as $course)
        <article class="col-xs-12">
            <h2>{{$course['name']}}</h2>
            <img src="{{$course->image->path}}" width="400" height="200">
            <p>{{substr($course['description'] , 0 , 30)}}</p>
            <p class="pull-right">
                @if($course->categories->first())
                @foreach($course->categories as $item)
                    <span class="tag tag-default">{{$item->first()->name}}</span>
                @endforeach
                @else
                    <span class="tag tag-default">Uncategorized</span>
                @endif
            </p>
            <ul class="list-inline">
                @for($i=0;$i<$course['rating'];$i++)
                    <span class="fa fa-star checked"></span>
                @endfor
                <li class="list-inline-item"><span class="glyphicon glyphicon-comment"></span> ({{$course['views']}})</li>
            </ul>
        </article>
    <hr>
@endforeach
{!! $courses->links() !!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '/search',
            data:{'search':$value},
            success:function(data){
                $('#table_data').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

