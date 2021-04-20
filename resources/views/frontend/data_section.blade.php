@if(count($courses)>0)
    @forelse($courses as $course)
    <h2>{{$course->name}}</h2>
    <img src={{$course->image->path}} width="400" height="200">
    <p>{{$course->description}}</p>
    <p class="pull-right">
        @if($course->categories->first())
            @foreach($course->categories as $item)
                <span class="tag tag-default">{{$item->name}}</span>
            @endforeach
        @else
            <span class="tag tag-default">Uncategorized</span>
        @endif
    </p>
    <ul class="list-inline">
        @for($i=0;$i<$course->rating;$i++)
            <span class="fa fa-star checked"></span>
        @endfor
        <li class="list-inline-item"><span class="glyphicon glyphicon-comment"></span> ({{$course->views}})</li>
    </ul>
    <ul class="list-inline">
    <li class="list-inline-item"><span class="glyphicon glyphicon-comment"></span> ({{$course->views}})</li></ul><hr>
    @endforeach
    {!! $courses->links() !!}
@else
    <h5>No data</h5>
@endif