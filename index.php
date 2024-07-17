<?php
$data = [
  [
    "first" => 'Mark',
    "last" => 'Otto',
    "handle" => '@mdo'
  ],
  [
    "first" => 'Jacob',
    "last" => 'Thornton',
    "handle" => '@fat'
  ],
  [
    "first" => 'Larry',
    "last" => 'the Bird',
    "handle" => '@twitter'
  ],
  [
    "first" => 'Steve',
    "last" => 'Jobs',
    "handle" => '@apple'
  ],
  [
    "first" => 'Bill',
    "last" => 'Gates',
    "handle" => '@microsoft'
  ],
];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Testing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body data-bs-theme="dark">
  <!-- <div class="container"> -->
  <div class="container mx-auto">
    <?php include "./components/header.php" ?>

    <!-- <h1>Data Mahasiswa</h1> -->
    <div class="container mt-5">
      <div class="row ">
        <div class="col-sm-8 ">
          <h2>Data <b>Mahasiswa</b></h2>
        </div>
        <div class="col-sm-4  text-end">

          <a href="application/tambahmhs.php">
            <button type="button" class="btn btn-primary add-new"><i class="bi bi-plus"></i> Add New</button>
          </a>
        </div>
      </div>
      <form action="" method="POST">
        <div class="input-group my-3">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
        </div>
      </form>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($data as $id => $value) {
            echo "<tr>
                    <th scope='row'>" . ($id + 1) . "</th>
                    <td>" . htmlspecialchars($value['first']) . "</td>
                    <td>" . htmlspecialchars($value['last']) . "</td>
                    <td>" . htmlspecialchars($value['handle']) . "</td>
                  </tr>";
          }
          ?>

        </tbody>
      </table>

    </div>


  </div>
  <?php include "./components/footer.php" ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>