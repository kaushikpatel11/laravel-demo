<div class="panel panel-default">
    <div class="panel-body">
    @for($i = 0; $i < sizeof($html); $i++)
    <div class="panel panel-default">
        <div class="panel-heading">
        {{ $html[$i]['diario']}} - {{$html[$i]['deporte']}} - {{$html[$i]['competicion']}}
        </div>
        @if(!$html[$i]['noticias'][0]['error'])
            @for($x = 0; $x < sizeof($html[$i]['noticias']); $x++)
            @if($x % 4 == 0)
            <div class="row">
            @endif
                <div class="col-md-3">
                <img class="img-responsive" src="{{$html[$i]['noticias'][$x]['image']}}"></img>
                    <a href="{{ $html[$i]['noticias'][$x]['link']}}">{{ $html[$i]['noticias'][$x]['title']}}</a>
                </div>
            @if($x % 4 == 3)
            </div>
            @endif
            @endfor
        @else
            <div class="row">
            <div class="col-md-12">
                <p class="bg-warning">@lang('Error al cargar la RSS')</p>
            </div>
            </div>
        @endif
    </div>
    @endfor
    </div>
</div>
