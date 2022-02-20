<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/shop.css">
</head>
<body>
  <div class="container">
    <nav class="nav" id="nav">
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Logout</a></li>
        <li><a href="">Mypage</a></li>
      </ul>
    </nav>
    <div class="menu" id="menu">
      <span class="menu_line-top"></span>
      <span class="munu_line-middle"></span>
      <span class="menu_line-bottom"></span>
    </div>
    <h1>Rese</h1>
    <form action="/" method="post">
      @csrf
      <select name="area_id" id="">
        <option value="">All area</option>
        @foreach($items as $item)
        <option value="{{ $item->area->name }}">{{ $item->area->name }}</option>
        @endforeach
      </select>
      <select name="genre_id" id="">
        <option value="">All genre</option>
        @foreach($items as $item)
        <option value="{{ $item->genre->name }}">{{ $item->genre->name }}</option>
        @endforeach
      </select>
      <input type="search" name="name" placeholder="search..." />
    </form>
    @if(isset($items))
    <main>
      <div class="shoplist">
      @foreach ($items as $item)
      <div class="shop_card">
        <div class="shop_img">
          <img src="{{$item->image_url}}" alt="">
        </div>
        <div class="shop_content">
          <p class="shop_name">{{$item->name}}</p>
          <p class="shop_tag">
            <span class="shop_area">＃{{$item->area->name}}</span>
            <span class="shop_genre">＃{{$item->genre->name}}</span>
          </p>
          <form action="/detail/{shop_id}" method="GET">
          @csrf
            <input type="hidden" name="id" value="{{$item->id}}" />
            <input type="hidden" name="name" value="{{ $item->name }}" />
            <input type="hidden" name="area_id" value="{{ $item->area->name }}" />
            <input type="hidden" name="genre_id" value="{{ $item->genre->name }}" />
            <input type="hidden" name="description" value="{{ $item->description }}" />
            <input type="hidden" name="image_url" value="{{ $item->image_url }}" />
            <input type="submit" class="detail_btn" value="詳しく見る" />
          </form>
        </div>
      </div>
      @endforeach
      </div>
    </main>
     @endif
     <script>
       const target = document.getElementById("menu");
    target.addEventListener('click', () => {
    target.classList.toggle('open');
    const nav = document.getElementById("nav");
    nav.classList.toggle('in');
    });
     </script>
</body>
</html>