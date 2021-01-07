<?php


// API information.
$originalUrl = 'https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=';
$pageNumber = 1;
$url = $originalUrl . $pageNumber;
$imgURL   = "https://image.tmdb.org/t/p/w1280";
$searchUrl =  "https://api.themoviedb.org/3/search/movie?&api_key=04c35731a5ee918f014970082a0088b1&query=";


$response = file_get_contents($url);
$data = json_decode($response);
$data = $data->results;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie App</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
  <div id="main" class="container-fluid">
    <div class="px-lg-5">

      <!-- Top part-->
      <div class="row py-3 ">
        <div class="col-lg-12 mx-auto">
          <div class="text-white p-5 shadow-sm rounded banner  bg-info">
            <h1 class="display-4">Movies search App</h1>
            <p class="lead">Search for latest movies</p>
            <!-- Search form -->
            <form action="" id="form">
              <div class="col-lg-6 md-form active-cyan active-cyan-2 mb-3">
                <input id="search" class="form-control" type="text" placeholder="Search for Movies" aria-label="Search">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End -->
      <?php
      $count = 3;

      echo '<div class="row">';
      foreach ($data as $movies) {
      ?>
        <div id="movie" class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="bg-white rounded shadow-sm">
            <img id="img" src="
            <?php
            echo $imgURL . $movies->poster_path;
            ?> 
            " alt="" class="img-fluid card-img-top">
            <div class="p-4">
              <h5 id="title" class="text-dark">
                <?php
                echo $movies->title;
                ?>
              </h5>
              <p id="desc" class="small text-muted mb-1">
                <?php
                echo "Ratings: " . '' . $movies->vote_average;
                ?>
              </p>
              <p id="desc" class="small text-muted mb-0">
                <?php
                switch ($movies->original_language) {
                  case 'en':
                    $moviesLanguage = 'English';
                    break;
                  case 'fr':
                    $moviesLanguage = 'French';
                    break;
                  case 'ja':
                    $moviesLanguage = 'Japanese';
                    break;
                  case 'es':
                    $moviesLanguage = 'Japanese';
                    break;
                  case 'hi':
                    $moviesLanguage = 'Hindi';
                    break;
                  case 'ru':
                    $moviesLanguage = 'Russian';
                    break;
                  case 'de':
                    $moviesLanguage = 'German';
                    break;

                  default:
                    $moviesLanguage = $movies->original_language;
                    break;
                }
                echo "Language: " . '' . $moviesLanguage;
                ?>
              </p>
              <div class="d-flex align-items-center justify-content-between rounded-pill bg-light mb-2  mt-1">
                <p class="small mb-0">
                  <?php
                  $desc = strlen($movies->overview) > 15 ? substr($movies->overview, 0, 50) . "..." : $movies->overview;
                  echo $desc;
                  ?>
                  <span class="font-weight-bold"> </span>
                </p>
                <div class="badge badge-success px-3 rounded-pill font-weight-normal">Hot</div>
              </div>
              <p id="desc" class="small text-muted mb-0">
                <?php
                echo date_format(date_create($movies->release_date), "d, F Y");

                ?>
              </p>


            </div>
          </div>
        </div>
        <?php
        if ($count == 6) {
          echo "</div><div class='row'>";
        }
        ?>
      <?php $count++;
      }
      ?>

      <div class="py-5 text-right">
        <form action="" method="post">
          <button name="submit" type="submit" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</button>
        </form>
      </div>
      <?php
        if (isset($_POST['submitpg'])) {
          echo $_POST['submitpg'];
        }


      ?>
      <nav aria-label="Page navigation example">
        <ul class="list-inline pagination justify-content-left">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <form action="" method="post">
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" value="1" class="page-link">1</btn>
            </li>
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" class="page-link">2</btn>
            </li>
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" class="page-link">3</btn>
            </li>
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" class="page-link">4</btn>
            </li>
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" class="page-link">5</btn>
            </li>
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" class="page-link">6</btn>
            </li>
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" class="page-link">7</btn>
            </li>
            <li class="list-inline-item page-item">
              <btn type="submit" name="submitpg" class="page-link">8</btn>
            </li>

          </form>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
  <script src="index.js"></script>
</body>

</html>
