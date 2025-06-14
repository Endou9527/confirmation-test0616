@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
@endsection

@section('content')
<div class="top">
  <div class="top__title"></div>
</div>

<div class="content">
  <form class="form" method="post" action="{{ route('product.store') }}">
    @csrf
    <div class="form-group">
      <div class="form-group__title">
        <label class="form-group__name">商品名</label>
        <span class="form-group__required">必須</span>
      </div>
      <div class="form-group__input">
        <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
          {{-- @error('name') --}}
          {{-- $message --}}
          {{-- @enderror --}}
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
        <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}">
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
          {{-- @error('price') --}}
          {{-- $message --}}
          {{-- @enderror --}}
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
          {{-- @error('image') --}}
          {{-- $message --}}
          {{-- @enderror --}}
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
        {{-- @foreach($seasons as $season) --}}
        <div class="form-group__input--select">
          <input type="radio" id="春" name="season" value="春" {{ old('season')== '春' $ || old('season')==null ? 'checked' : '' }} />
          <label for="春">春</label>
        </div>
        <div class="form-group__input--select">
          <input type="radio" id="夏" name="season" value="夏" {{ old('season')==2 ? 'checked' : '' }} />
          <label>夏</label>
        </div>
        <div class="form-group__input--select">
          <input type="radio" id="秋" name="season" value="秋" {{ old('season')==3 ? 'checked' : '' }} />
          <label>秋</label>
        </div>
        <div class="form-group__input--select">
          <input type="radio" id="冬" name="season" value="冬" {{ old('season')==4 ? 'checked' : '' }} />
          <label>冬</label>
        </div>
        {{-- @endforeach --}}
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
          {{-- @error('season') --}}
          {{-- {{ $message }} --}}
          {{-- @enderror --}}
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
        <textarea type="text" name="description" placeholder="商品
        の説明を入力">{{ old('description') }}</textarea>
      </div>
      <div class="form-group__alert">
        <div class="form-group__alert--message">
          {{-- @error('description') --}}
          {{-- $message --}}
          {{-- @enderror --}}
        </div>
      </div>
    </div>

  </form>
</div>

<div class="button">
  <div class="button__back">
    <a class="back-button" href="/products">戻る</a>
  </div>
  <div class="button__register">
    <button class="register-button">登録</button>
  </div>
</div>
@endsection