@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')
  <div class="top">
    <div class="top__page-title">
      <h2>{{ $keyword }}の商品一覧</h2>
    </div>
  </div>

  <div class="left">
    <div class="left__search">
      <form class="search-section"  method="GET" action="{{ route('products.search') }}">
        <div class="search-section__word">
          <input type="text" class="word--input" name
          ="keyword" value="{{ old('keyword', $keyword) }}" placeholder="　商品名で検索">
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
    <div class="right__product">
      @if ($products->count())
      @foreach($products as $product)
      <a href="{{ route('products.detail', $product->id) }}" class="right__product--each">
        <div class="right__product--each-a">
          {{-- 画像 --}}
          <div class="product__image">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product__image--img">
          </div>
          {{-- 商品名＆値段 --}}
          <div class="product__content">
            <div class="product__content--name">{{ $product->name }}</div>
            <div class="product__content--price">¥{{ number_format($product->price) }}</div>
          </div>
        </div>
      </a>
      @endforeach
      @else
        <p>該当する商品はありません。</p>
      @endif
    </div>
    <div class="right__pagination">

    </div>
  </div>
@endsection