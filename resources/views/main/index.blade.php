@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1 order-sm-2">

          @if(empty( $videos->toArray() ))
            <h4>Ничего не найдено!</h4>
          @endif

           @foreach($videos as $video)
            <div class="card xs-3 mb-2">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                     <a href="{{ $video->link }}" target="_blank"> 
                       <img src="{{ $video->preview }}" class="card-img h-100" alt="...">
                    </a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        @if($video->platform === "Youtube")
                          <span class="badge badge-danger float-right"> {{ $video->platform }} </span>
                        @endif
                        @if($video->platform === "GoodGame")
                          <span class="badge badge-info float-right"> {{ $video->platform }} </span>
                        @endif
                        @if($video->platform === "Другая")
                          <span class="badge badge-dark float-right"> {{ $video->platform }} </span>
                        @endif
                        <h5 class="card-title">{{ $video->title }}</h5>
                        <p class="card-text">
                        <img height="18" width="18" src="/storage/svg/icons/bar-chart-fill.svg" /> Очередь: {{ $video->queue }} <br>
                          <img height="18" width="18" src="/storage/svg/icons/cash.svg" /> Сумма:   {{ $video->sum }} Р
                        </p>
                       @if($video->comment)
                          <p class="card-text">
                            Комментарий: <br> {{ $video->comment }}
                          </p>
                       @endif
                       <p class="card-text">
                         <small class="text-muted">
                           От: {{ $video->start }} <br> До: {{ $video->finish }}
                         </small>
                        </p>
                      </div>
                    </div>
                  </div>
              </div>
           @endforeach
        </div>
        <div class="col-md-4 order-md-2 order-sm-1 mb-2 bg-white p-2">
          <h4 class="text-center">Фильтрация:</h4>
            <form action="/" method="GET">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="title">Название видео</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="Название">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="queue">Очередь</label>
                    <input type="text" class="form-control" name="queue" value="{{ old('queue') }}" id="queue" placeholder="Очередь">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="paltform">Платформа</label>
                    <select id="paltform" class="form-control" name="platform">
                      <option value="0">
                          Любая
                      </option>
                      <option value="Youtube">
                        Youtube
                      </option>
                      <option value="GoodGame">
                        GoodGame
                      </option>
                      <option value="Другая">
                        Другая
                      </option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2 w-100">Применить</button>
            </form>
            <div class="alert alert-warning" role="alert">
                Перед заказом видео необходимо ознакомиться с <a href="/rules" class="alert-link">правилами</a>.
                <br>
                <br>
                Заказать видео можно <a href="https://donatepay.ru/donation/76704" target="_blank" class="alert-link"> тут. </a>
            </div>
            <div class="alert alert-info" role="alert">
             <h4 class="text-center">Тарифы:</h4>
             <ol style="font-size: 16px">
               <li>25 р / мин</li>
               <li>50 р / мин</li>
               <li>100 р / мин</li>
               <li>200 р / мин</li>
             </ol>
             <div class="text-dark">
               <strong>
                Чем выше выбранный тариф, тем скорее видео будет просмотрено.
               </strong>
             </div>
          </div>
        </div>
    </div>
</div>

@endsection