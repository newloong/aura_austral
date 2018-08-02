<article @php(post_class()) style="background-image:url({{ get_the_post_thumbnail_url( null, 'large' ) }});">
  <div class="container">
    <div class="row">
      <div class="col">
        <header class="ediciones">
          <h1 class="entry-title">{{ get_the_title() }}</h1>
        </header>

        <div class="entry-content">
          @php(the_excerpt())
        </div>
      </div>
    </div>
    <div class="row">
         @foreach($contenidos_edicion as $item)
            @include('partials.content-editem')
         @endforeach
    </div>
  </div>
  
</article>
