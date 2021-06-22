@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1 order-sm-2">

          @if(empty( $videos->all() ))
            <h4>Ничего не найдено!</h4>
          @endif

           @foreach($videos as $video)
            <div class="card xs-3 mb-2">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                     <a href="{{ $video->link }}" target="_blank"> 
                       <img src="{{ $video->preview }}" class="card-img h-100 w" alt="...">
                    </a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <span class="badge badge-success float-right ml-1"> {{ $video->sum }} Р </span>
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
                        </p>
                       <p class="card-text">
                         <small class="text-muted">
                           Смотреть: {{ $video->start }} - {{ $video->finish }}
                         </small>
                         <br>
                        @if($video->comment)
                          <small class="text-muted">
                            Комменатрий: <strong>{{ $video->comment }}</strong>
                          </small>
                        @endif
                        </p>
                        <p class="card-text">
                          <a href="{{ $video->skip() }}" target="_blank">
                            <small>
                              <img height="18" width="18" src="/storage/svg/icons/skip-forward-btn.svg" />
                              Скипнуть видео
                            </small>
                          </a>
                         @can('update', $video, 'App\Models\Video')
                            <a href="/video/{{ $video->id }}/edit" class="float-right ml-1">
                              <small>
                                | Редактировать
                              </small>
                            </a>
                            <a href="" @click.prevent="toggleWatched" class="float-right text-danger">
                              <small data-video-id="{{ $video->id }}">
                                 В просмотрено
                              </small>
                            </a>
                         @endcan
                         </p>
                      </div>
                    </div>
                  </div>
              </div>
           @endforeach
          <div class="row justify-content-center">
              {{ $videos->links() }}
          </div>
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
                    <label for="platform">Платформа</label>
                    <select id="platform" class="form-control" name="platform">
                      <option value="0" @if (old('platform') == "0") {{ 'selected' }} @endif>
                          Все
                      </option>
                      <option value="Youtube"  @if (old('platform') == "Youtube") {{ 'selected' }} @endif>
                        Youtube
                      </option>
                      <option value="GoodGame" @if (old('platform') == "GoodGame") {{ 'selected' }} @endif>
                        GoodGame
                      </option>
                      <option value="Другая" @if (old('platform') == "Другая") {{ 'selected' }} @endif>
                        Другая
                      </option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2 w-100">Применить</button>
            </form>
            <div class="alert alert-warning" role="alert">
                Перед <strong>заказом</strong> или <strong>скипом</strong> видео необходимо ознакомиться с <a href="/rules" class="alert-link">правилами</a>.
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
          <div class="alert alert-danger" role="alert">
              <strong>
                НЕЛЬЗЯ
              </strong>
              скипать видео, если оно <strong>НЕ</strong> просматривается в данный момент
          </div>
        </div>
    </div>
</div>

@endsection