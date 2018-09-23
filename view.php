<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <title>Caffeine Values</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">

</head>
<body class="bg-light">

    <main role="main" class="container mt-5 bg-white">

      <div class="row">
        <div class="col-lg-12 text-center"> 
          <div id="drinks" class="mt-3">
            
            <table class="table" id="drink-table">
              <thead class="thead-light">
                <tr>
                  <th style="width: 50%" class="text-left">名前
                  <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                  <th style="width: 20%">内容量<br>(ml)
                  <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                  <th style="width: 15%">カフェイン量<br>(mg)
                  <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                  <th style="width: 15%">(mg &frasl; 100ml)
                  <i class="fa fa-sort float-right" aria-hidden="true"></i></th>
                </tr>
              </thead>
              <tbody class="list">
                <?php foreach ($drinks as $value) { ?>
                  <tr>
                    <td class="drink_name text-left">
                      <?php echo $value["drink_name"]; ?>
                    </td>
                    <td class="drink_ml">
                      <?php echo $value["drink_ml"]; ?>
                    </td>
                    <td class="caffeine_mg">
                      <?php echo $value["caffeine_mg"]; ?>
                    </td>
                    <td class="mg_per_100ml">
                      <?php echo round($value["caffeine_mg"] / $value["drink_ml"] * 100); ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </main>

    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#drink-table').DataTable();
      });
    </script>
</body>
</html>