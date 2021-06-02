@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 order-md-1 order-sm-2">
            <div class="card xs-3">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4 order-md-2 order-sm-1 mb-2">
          <h4 class="text-center">Фильтрация:</h4>
            <form action="">
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="title">Название видео</label>
                    <input type="text" class="form-control" id="title" placeholder="Название">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="queue">Очередь</label>
                    <input type="text" class="form-control" id="queue" placeholder="Очередь">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="paltform">Платформа</label>
                    <select id="paltform" class="form-control">
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