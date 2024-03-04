<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Books</em> Currently In The Market.</h2>
          </div>
        </div>
        <div class="col-lg-6 mt-20">
        @auth
                    <div class="filter-form">
                        <form action="{{url()->current()}}" method="get">
                            <input type="text" name="search" placeholder="Search by title or author">
                              <select  id ="category" name="category">
                              <option value="allCategories">All Categories</option>
                              @foreach($categories as $category)
                              <option value="{{$category->cat_title}}">{{$category->cat_title}}</option>
                              @endforeach
                              </select>
                              <select name="orderBy">
                              <option value="name">Name</option>
                              <option value="latest">Latest</option>
                              </select>
                              <button type="submit" 
                              style="
                              background-color:#7453FC;
                              padding:10px
                              ">Search</button>
                        </form>
                    </div>
                @endauth
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid">
          @foreach($data as $book)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="book/{{$book->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$book->title}}</h4>
                  <span class="author">
                    <img src="author/{{$book->auther_img}}" alt="" style="max-width: 50px; border-radius: 50%;">
                    <h6>{{$book->auth_namr}}</h6>
                  </span>
                  <div class="line-dec"></div>
                  <span class="bid">
                    Current Available<br><strong>{{$book->quantity}}</strong><br> 
                  </span>
                  <span class="ends">
                    Total<br><strong>20</strong><br>
                  </span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>