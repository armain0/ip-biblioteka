 <div class="currently-market">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="section-heading">
                     <div class="line-dec"></div>
                     <h2><em>Knjige</em> Trenutno Na Stanju.</h2>
                 </div>
             </div>
             <div>
                 @if (session()->has('message'))
                     <div class="alert alert-secondary">
                         {{ session()->get('message') }}

                         <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
                     </div>
                 @endif
             </div>


             <div class="col-lg-12">
                 <div class="row grid">
                     @foreach ($data as $data)
                         <div class="col-lg-6 currently-market-item all msc" style="margin: 10px 0;">
                             <div class="item">
                                 <div class="left-image">
                                     <img src="book/{{ $data->book_img }}" alt=""
                                         style="border-radius: 20px; width: 350px; height: 300px;">
                                 </div>
                                 <div class="right-content">
                                     <h4>{{ $data->title }}</h4>
                                     <span style="margin-bottom: 30px;">
                                         <h3>
                                             @foreach ($category as $item)
                                                 @if ($item->id == $data->category_id)
                                                     Žanr: {{ $item->cat_title }}
                                                 @endif
                                             @endforeach
                                         </h3>
                                     </span>
                                     <span class="author">
                                         <h6>Autor: {{ $data->author_name }}</h6>
                                     </span>
                                     <div class="line-dec"></div>
                                     <span class="bid" style="margin-bottom: 10px;">
                                         Trenutni broj knjiga: <strong
                                             style="margin-left: 3px;">{{ $data->quantity }}</strong><br>
                                     </span>
                                     <div class="">
                                         <a class="btn btn-primary" href="{{ url('borrow_books', $data->id) }}">
                                             Posudi
                                         </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </div>
