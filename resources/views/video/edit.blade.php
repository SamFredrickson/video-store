@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="/video/{{ $video->id }}">
        @csrf
        @method('PATCH')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="link">Ссылка</label>
            <input type="text" value="{{ old('link') ? old('link') : $video->link }}" class="form-control @error('link') is-invalid @enderror" id="link" name="link" placeholder="Ссылка">
            @error('link')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="title">Название (заполняется само, если ссылка ютуба)</label>
            <input type="text" value="{{ old('title') ? old('title') : $video->title }}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Название">
            @error('title')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
           @enderror
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="queue">Очередь</label>
              <input type="text" value="{{ old('queue') ? old('queue') : $video->queue }}" class="form-control @error('queue') is-invalid @enderror" id="queue" name="queue" placeholder="Очередь">
              @error('queue')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
             @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="platform">Платформа</label>
              <select id="platform" class="form-control" name="platform">
                <option selected value="Youtube">
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
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="sum">Сумма</label>
            <input type="text" value="{{ old('sum') ? old('sum') : $video->sum }}" class="form-control @error('sum') is-invalid @enderror" name="sum" id="sum">
            @error('sum')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
           @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="start">От</label>
            <input type="time" step="1" value="{{ old('start') ? old('start') : $video->start }}" name="start" class="form-control @error('start') is-invalid @enderror" id="start">
            @error('sum')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
           @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="finish">До</label>
            <input type="time" step="1" value="{{ old('finish') ? old('finish') : $video->finish }}" name="finish" class="form-control @error('finish') is-invalid @enderror" id="finish">
            @error('sum')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control noresize" id="comment" name="comment" rows="5">
                 {{ old('comment') ? old('comment') : $video->comment }}
            </textarea>
          </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
</div>

@endsection