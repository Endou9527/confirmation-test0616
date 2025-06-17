@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/detail.css') }}"/>
@endsection

@section('content')
<div class="top">
  <ul class="top__inner">
    <li class="top__inner--item">
      <a href="/products">商品一覧</a>
    </li>
    <li class="top__inner--item">
      <span class="top__inner--item--arrow">>  </span>
      <div class="top__inner--item--name">{{ $product->name }}</div>
    </li>
  </ul>
</div>

<form class="form" method="post" action="{{ route('products.update', ['productId' => $product->id]) }}" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="content">
    <div class="middle">
      <div class="left">
        {{-- 画像 --}}
        <div class="form-group">
          <div class="form-group__title">
            <label class="form-group__name">商品画像</label>
            <span class="form-group__required">必須</span>
          </div>
          {{-- 選択中の画像表示 --}}
          <div class="form-group__image">
            <img src="{{ asset($product->image) }}" alt="商品画像">
          </div>
          {{-- 画像を変更する --}}
          <div class="form-group__input">
            <input type="file" name="image">
            <input type="hidden" name="id" value="{{ $product->id }}">
          </div>
          <div class="form-group__alert">
            <div class="form-group__alert--message">
              @error('image')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
      </div>

      {{-- 「商品名」「値段」「季節」 --}}
      <div class="right">
        {{-- 商品名 --}}
        <div class="form-group">
          <div class="form-group__title">
            <label class="form-group__name">商品名</label>
            <span class="form-group__required">必須</span>
          </div>
          <div class="form-group__input">
            <input type="text" name="name" class="form-group__input--section" value="{{ old('name',$product->name) }}" />
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
            <input type="text" name="price" class="form-group__input--section" value="{{ old('price',$product->price) }}">
          </div>
          <div class="form-group__alert">
            <div class="form-group__alert--message">
              @error('price')
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
              <input type="checkbox" id="season_{{ $season->id }}" name="season[]" value="{{ $season->id }}"{{ in_array($season->id, old('season', $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }} />
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
      </div>
    </div>

    {{-- 商品詳細 --}}
    <div class="bottom">
      {{-- 説明 --}}
      <div class="form-group">
        <div class="form-group__title">
          <label class="form-group__name">商品説明</label>
          <span class="form-group__required">必須</span>
        </div>
        <div class="form-group__input">
          <textarea type="text" name="description" class="form-group__textarea--section">{{ old('description',$product->description) }}</textarea>
        </div>
        <div class="form-group__alert">
          <div class="form-group__alert--message">
            @error('description')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>
    </div>

    <div class="button">
      {{-- 戻るボタン --}}
      <div class="button__back">
        <a class="back-button" href="/products">戻る</a>
      </div>
      {{-- 登録ボタン --}}
      <div class="button__register">
        <button type="submit" class="register-button">変更を保存</button>
      </div>
    </div>
  </div>
</form>

  {{-- 削除ボタン --}}
<form action="{{ route('products.destroy',['productId' => $product->id]) }}" method="POST">
  @csrf
  @method('DELETE')
  <div class="button__delete">
    <button type="submit" class="register-delete">🗑️</button>
  </div>
</form>
@endsection