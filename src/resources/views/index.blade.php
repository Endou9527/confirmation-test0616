@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')
  <div class="top">
    <div class="top__page-title">
      <h2>商品一覧</h2>
    </div>
  </div>

  <div class="left">
    <div class="left__search">
      <form class="search-section">
        <div class="search-section__word">
          <input type="text" class="word--input" placeholder="　商品名で検索">
        </div>
        <div class="search-section__button">
          <button class="button-submit">検索</button>
        </div>
      </form>
    </div>
    <div class="left__order">
      <div class="order__description">
        <p>価格順で表示</p>
      </div>
      <div class="order__select">
        <select class="order__select--box">
          <option value="">価格で並べ替え</option>
          <option>高い順に表示</option>     {{--  ascending-order  --}}
          <option>低い順に表示</option>    {{--  descending-order  --}}
        </select>
      </div>
    </div>
  </div>

  <div class="right">
    <div class="right__register">
      <div class="register-button">
        <a href="/products/register" class="button__a">＋商品を追加</a>
      </div>
    </div>
    <div class="right__product">
      {{--  @foreach( as )  --}}
      <div class="product__image">
        <img src="{{ asset('storage/images/kiwi.png') }}" alt="" class="product__image--img">
      </div>
      <div class="product__content">
        <div class="product__content--name"></div>
        <div class="product__content--price"></div>
      </div>
      {{--  @endforeach  --}}
    </div>
    <div class="right__pagination">

    </div>
  </div>
@endsection