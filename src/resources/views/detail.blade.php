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
      <div class="top__inner--item--name">キウイ</div>
    </li>
  </ul>
</div>

<div class="content">
  <form class="form" method="post" action="{{-- {{ route('product.store') }}" --}}>
    @csrf

    <div class="middle">
      <!-- 画像選択 -->
      <div class="left">
        {{-- 画像 --}}
        <div class="form-group">
          <div class="form-group__title">
            <label class="form-group__name">商品画像</label>
            <span class="form-group__required">必須</span>
          </div>
          <!-- 画像表示 -->
          <div class="form-group__image">
            <img> {{-- ここに選択中の画像はいる --}}
          </div>
          <!-- 画像選択 -->
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
      </div>

      <!-- 「商品名」「値段」「季節」 -->
      <div class="right">
        {{-- 商品名 --}}
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
            <input type="text" name="price" class="form-group__input--section" placeholder="値段を入力" value="{{ old('price') }}">
          </div>
          <div class="form-group__alert">
            <div class="form-group__alert--message">
              {{-- @error('price') --}}
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
              <input type="radio" id="春" name="season" value="春" {{ old('season')==1 ? 'checked' : '' }} />
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



        
      </div>
    </div>

    <!-- 商品詳細 -->
    <div class="bottom">
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
            {{-- @error('description') --}}
            {{-- $message --}}
            {{-- @enderror --}}
          </div>
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
    <button class="register-button">変更を保存</button>
  </div>
</div>
@endsection