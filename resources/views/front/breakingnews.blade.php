@php
      $breakingnews=DB::table('breaking_news')->where('breakingnews_status',1)->get();
@endphp

 <section id="newsSection">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="latest_newsarea "> <span class="bg_color">Breaking News</span>
            <ul id="ticker01" class="news_sticker">
              @forelse($breakingnews as $brnews)
              <li><a href="{{route('/breakingnews_single',['id'=>$brnews->id])}}"><img class="latest_news_img" src="{{asset('image/admin/breakingnews/'.$brnews->breakingnews_img)}}" alt="">{{$brnews->breakingnews_title}}</a></li>
              <li>
                @empty
                No Breaking News
                @endforelse
            </ul>
            <div class="social_area">
              <ul class="social_nav">
                <li class="facebook"><a href="https://www.facebook.com/shishant.shtha" target="_blank"></a></li>
                <li class="twitter"><a href="#"></a></li>
                <li class="flickr"><a href="#"></a></li>
                <li class="pinterest"><a href="https://pl.pinterest.com/" target="_blank"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="vimeo"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
                <li class="mail"><a href="#"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
