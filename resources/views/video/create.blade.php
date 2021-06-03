@extends('layouts.app')

@section('content')

<div class="container">
    <form method="POST" action="/video">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="link">Ссылка</label>
            <input type="text" class="form-control" id="link" name="link" placeholder="Ссылка">
          </div>
          <div class="form-group col-md-6">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Название">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="queue">Очередь</label>
              <input type="text" class="form-control" id="queue" name="queue" placeholder="Очередь">
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
            <input type="text" class="form-control" name="sum" id="sum">
          </div>
          <div class="form-group col-md-4">
            <label for="start">От</label>
            <input type="time" step="1" name="start" class="form-control" id="start">
          </div>
          <div class="form-group col-md-4">
            <label for="finish">До</label>
            <input type="time" step="1" name="finish" class="form-control" id="finish">
          </div>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control noresize" id="comment" name="comment" rows="5"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
</div>

@endsection