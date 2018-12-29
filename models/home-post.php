<?php

$posthead = $dbs->prepare('SELECT * FROM postingan WHERE tag="post-h1"');
$posthead->execute();
$viewposth = $posthead->fetch();

$judulh = $viewposth['judul'];
$gambarh = $viewposth['gambar'];
$deskh = $viewposth['deskripsi'];
$tombolh = $viewposth['tombol-link'];

$postr = $dbs->prepare('SELECT * FROM postingan WHERE tag="post-r" LIMIT 2');
$postr->execute();
$rawhasil = $postr->fetchAll(PDO::FETCH_OBJ);

$postg = $dbs->prepare('SELECT * FROM postingan WHERE tag="gambar" LIMIT 5');
$postg->execute();
$hasilg = $postg->fetchAll(PDO::FETCH_OBJ);

?>

<div class="py-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 px-2">
          <div class="card"> <img class="card-img-top" src="<?php echo $gambarh ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><?php echo $judulh ?></h4>
              <p class="card-text"><?php echo $deskh ?></p> <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 px-2">
          <ul class="list-group">
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"> Jam Buka <i class="fas fa-arrow-right text-muted fa-lg"></i></li>
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"> Ketersediaan Komputer <i class="fas fa-arrow-right text-muted fa-lg"></i></li>
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"> Artikel <i class="fas fa-arrow-right text-muted fa-lg"></i></li>
            <li class=" border-0 list-group-item d-flex justify-content-between align-items-center"><a href="account/"> Akun Saya <i class="fas fa-arrow-right text-muted fa-lg"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container-fluid">
      <div class="row">
      <?php
      if($postr->rowCount() > 0)
      {
      foreach($rawhasil as $postbiasa)
      {
            ?>
            <div class="col-md-4 px-2">
                <div class="card" style="height: 480px;"> <img class="card-img-top" src="<?php echo htmlentities($postbiasa->gambar) ?>" alt="image header" style="height: 279px">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlentities($postbiasa->judul) ?></h4>
                        <p class="card-text"><?php echo htmlentities($postbiasa->deskripsi) ?></p> 
                    </div>
                    <div class="card-footer">
                        <a href="pages/post/viewpost?p=<?php echo htmlentities($postbiasa->id) ?>" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
      <?php
      }
      }
      ?>
    <div class="col-md-4 px-2">
        <a class="twitter-timeline" data-height="480" data-theme="light" href="https://twitter.com/<?php echo $twitter; ?>?ref_src=twsrc%5Etfw">Tweets by <?php echo $twitter; ?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
      <?php
      if($postg->rowCount() > 0)
      {
        foreach($hasilg as $gambar)
        {
            ?>
            <div class="col-md-4 p-3"> <img class="img-fluid d-block" src="<?php echo htmlentities($gambar->gambar) ?>" style="height: 240px;"> </div>
      <?php
        }
      }
      ?>
      </div>
    </div>
</div>