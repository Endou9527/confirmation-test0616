@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
@endsection

@section('content')
<div class="top">
  <h2 class="top__title">商品登録</h2>
</div>

<div class="content">
  <form class="form" action="/products/register/store" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <div class="form-group__title">
        <label class="form-group__name">商品名</label>
        <span class="form-group__required">必須</span>
      </div>
      <div class="form-group__input">
        <input type="text" name="name" class="form-group__input--section" placeholder="商品名を入力" value="{{ old('name') }}" />
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
          @error('name')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    {{-- 価格 --}}
    <div class="form-group">
      <div class="form-group__title">
        <label class="form-group__name">値段</label>
        <span class="form-group__required">必須</span>
      </div>
      <div class="form-group__input">
        <input type="text" name="price" class="form-group__input--section" placeholder="値段を入力" value="{{ old('price') }}">
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
           @error('price')
          {{ $message }}
           @enderror
        </div>
      </div>
    </div>

    {{-- 画像 --}}
    <div class="form-group">
      <div class="form-group__title">
        <label class="form-group__name">商品画像</label>
        <span class="form-group__required">必須</span>
      </div>
      <div class="form-group__input">
        <input type="file" name="image" value="{{ old('image') }}">
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
           @error('image')
          {{ $message }}
           @enderror
        </div>
      </div>
    </div>

    {{-- 季節 --}}
    <div class="form-group">
      <div class="form-group__title">
        <label class="form-group__name">季節</label>
        <span class="form-group__required">必須</span>
      </div>
      <div class="form-group__input">
        @foreach($seasons as $season)
        <div class="form-group__input--select">
          <input type="checkbox" id="season_{{ $season->id }}" name="season[]" value="{{ $season->id }}" />
          <label for="season_{{ $season->id }}">{{ $season->name }}</label>
        </div>
        @endforeach
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
          @error('season')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>


    {{-- 説明 --}}
    <div class="form-group">
      <div class="form-group__title">
        <label class="form-group__name">商品説明</label>
        <span class="form-group__required">必須</span>
      </div>
      <div class="form-group__input">
        <textarea type="text" name="description" class="form-group__textarea--section" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
          @error('description')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="button">
      <div class="button__back">
        <a class="back-button" href="/products">戻る</a>
      </div>
      <div class="button__register">
        <button type="submit" class="register-button">登録</button>
      </div>
    </div>
  </form>

</div>
@endsection