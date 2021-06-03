@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1 order-sm-2">

          @if(empty( $videos->toArray() ))
            <h4>Ничего не найдено!</h4>
          @endif

           @foreach($videos as $video)
           <div class="card xs-3">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="{{ $video->preview }}" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $video->title }}</h5>
                      <p class="card-text"></p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                <button type="submit" class="btn btn-primary float-right">Применить</button>
            </form>
        </div>
    </div>
</div>

@endsection