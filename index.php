<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Music Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/slider.js"></script>
  </head>
  <body>
    <header>
      <div class="slider">
        <div class="insideSlider">
          <div class="item"><img src="images/1.jpg"/></div>
          <div class="item"><img src="images/2.jpg"/></div>
          <div class="item"><img src="images/3.jpg"/></div>
          <div class="item"><img src="images/4.jpg"/></div>
        </div>
    </header>

    <div class="row main-content">
      <aside class="col-md-3 form-panel">
        <h2>ADD ALBUM</h2>
        <form class="add-album" action="index.php" method="post">
          <input type="text" class="form-control" name="artist" placeholder="Artist" ><br>
          <input type="text" class="form-control" name="album" placeholder="Album" ><br>
          <input type="number" class="form-control" name="release-year" placeholder="Release Year" ><br>
          <input type="text" class="form-control" name="description" placeholder="Description" ><br>
          <input type="submit" class="btn btn-default" name="" value="ADD">
        </form>
      </aside>

      <article class="col-md-8 result-table">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Artist</th>
              <th>Album</th>
              <th>Release Year</th>
              <th>Annotation</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>gbbgbb</td>
              <td>Doe</td>
              <td>2412</td>
              <td>nnnn</td>
            </tr>
            <tr>
              <td>Mary</td>
              <td>ghgfggb</td>
              <td>2412</td>
              <td>2412</td>
            </tr>
            <tr>
              <td>July</td>
              <td>Dooley</td>
              <td>2412</td>
              <td>2412</td>
            </tr>
          </tbody>
        </table>
      </article>

    </div>

  </body>
</html>
