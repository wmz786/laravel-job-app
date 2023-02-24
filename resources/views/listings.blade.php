<h1>{{$headers}}</h1>
@foreach ($listings as $list)
    <h2>
        <a href="/listing/{{$list['id']}}">
            {{$list['title']}}
        </a>
    </h2>
    <p>{{$list['description']}}</p>
@endforeach
