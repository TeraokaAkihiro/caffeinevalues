<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <title>Caffeine Values</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>
<body class="bg-light">

    <main role="main" class="container mt-5 bg-white">

      <div class="row">
        <div class="col-lg-12 text-center"> 
          <div id="drinks" class="mt-3">

            <div class="input-group mb-3">
              <input type="text" class="search form-control" placeholder="search word" aria-label="search word">
              <div class="input-group-append">
                <button class="sort btn btn-outline-secondary" type="button" data-sort="drink_name">Sort</button>
              </div>
            </div>
            
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th style="width: 50%" class="text-left">名前</th>
                  <th style="width: 20%">内容量<br>(ml)</th>
                  <th style="width: 15%">カフェイン量<br>(mg)</th>
                  <th style="width: 15%">(mg &frasl; 100ml)</th>
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
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/list.min.js"></script>
    <script>
      var options = {
        valueNames: [ 'drink_name', 'caffeine_mg', 'drink_ml', 'mg_per_100ml' ]
      };
      var drinkList = new List('drinks', options);
    </script>
</body>
</html>