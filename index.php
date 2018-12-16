<?php include('pages/header.php'); ?>
<body>
    <?php include('pages/navbar.php'); ?>
      <!-- gambar header -->
  <div class="py-5 text-center text-md-right section-parallax" style="	background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);	background-position: right top;	background-size: cover;	background-repeat: repeat;	background-attachment: fixed;">
    <div class="container">
      <div class="row section-light shadow">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
          <h3 class="display-3">Selamat Datang di Sipuda!</h3>
          <p class="mb-3 lead">Of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
          <form class="form-inline d-flex justify-content-end">
            <div class="input-group"> <input type="email" class="form-control" placeholder="Surel Anda" id="formcover1">
              <div class="input-group-append"> <button class="btn btn-primary" type="button">Langganan</button> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container-fluid" style="	max-height: 78px;">
      <div class="row justify-content-md-center">
        <h1 class="display-1 text-center" contenteditable="false">Mulai Petualanganmu!</h1>
        <div class="col-lg-10 col-md-10">
          <form action="pages/search" method="GET" >
          <div class="input-group search-box">
            <i class="fa fa-search fa-2x shadow"></i>
            <input type="search" class="form-control align-items-center text-dark text-center shadow" name="q" placeholder="Cari buku berdasarkan Judul, ISBN atau Penulis disini..." style="height: 82px; font-size:25px;">
            <!--<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
              <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button></div>-->
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php include($_SERVER['DOCUMENT_ROOT'].'/models/carouselbooks.php'); ?>
  <!--
  <div class="py-5 my-5">
    <div class="container-fluid my-5">
      <h1 class="text-center mb-3">Buku baru telah tiba!</h1>
      <div id="sipudaCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto">
          <div class="carousel-item col-md-4 active">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f44242/fff" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card 1</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-md-4">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/800x600/418cf4/fff" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card 2</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-md-4">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/800x600/3ed846/fff" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card 3</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-md-4">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/800x600/42ebf4/fff" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card 4</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-md-4">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f49b41/fff" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card 5</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-md-4">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f4f141/fff" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card 6</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="carousel-item col-md-4">
            <div class="card">
              <img class="card-img-top img-fluid" src="http://placehold.it/800x600/8e41f4/fff" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title">Card 7</h4>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#sipudaCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Sebelumnya</span>
        </a>
        <a class="carousel-control-next" href="#sipudaCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Selanjutnya</span>
        </a>
      </div>
    </div>
  </div>
-->
  <div class="py-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 px-2">
          <div class="card"> <img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 px-2">
          <ul class="list-group">
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"> MY LISTS <i class="fa fa-list text-muted fa-lg"></i></li>
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"> ANALYTICS <i class="fa fa-pie-chart text-muted fa-lg"></i></li>
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"> SETTINGS <i class="fa fa-cog text-muted fa-lg"></i></li>
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"> LOG OUT <i class="fa fa-sign-out text-muted fa-lg"></i></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 px-2">
          <div class="card"> <img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 px-2">
          <div class="card"> <img class="card-img-top" src="https://static.pingendo.com/cover-moon.svg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 px-2">
          <div class="carousel slide" data-ride="carousel" id="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active"> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-dark.svg">
                <div class="carousel-caption">
                  <h5 class="m-0">Carousel</h5>
                  <p>with controls</p>
                </div>
              </div>
              <div class="carousel-item"> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-bubble-light.svg">
                <div class="carousel-caption">
                  <h5 class="m-0">Carousel</h5>
                  <p>with controls</p>
                </div>
              </div>
              <div class="carousel-item"> <img class="d-block img-fluid w-100" src="https://static.pingendo.com/cover-moon.svg">
                <div class="carousel-caption">
                  <h5 class="m-0">Carousel</h5>
                  <p>with controls</p>
                </div>
              </div>
            </div> <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carousel" role="button" data-slide="next"> <span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span> </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="text-center mx-auto col-md-12">
          <h1>Balikpapan Dalam Sejarah</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 p-3"> <img class="img-fluid d-block" src="https://static.pingendo.com/cover-bubble-light.svg"> </div>
        <div class="col-md-4 p-3"> <img class="img-fluid d-block" src="https://static.pingendo.com/cover-moon.svg"> </div>
        <div class="col-md-4 p-3"> <img class="img-fluid d-block" src="https://static.pingendo.com/cover-bubble-dark.svg"> </div>
      </div>
    </div>
  </div>
<?php include('pages/footer.php'); ?>