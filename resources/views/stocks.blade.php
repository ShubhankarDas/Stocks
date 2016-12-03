<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet" />
        <link href="/css/main.css" rel="stylesheet" />


        <title>Stocks</title>

    </head>

    <body>
        <div class="container" id="app">
          <div class="row baner">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <h1>Stocks</h1>
              </div>
              <div class="refresh col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <p>Last sync: @{{time}} </p>
              </div>

          </div>
          <div v-show="loading === 'yes'" class="loader"></div>
            <div id="content">
              <table v-show="loading === 'no'" class="table">
                <head>
                <tr>
                  <th>Symbol</th>
                  <th>ltP</th>
                  <th>Open</th>
                  <th>High</th>
                  <th>Low</th>
                  <th>Todays Angle</th>
                  <th>30 Days Angle</th>
                </tr>
              </head>
              <body>
                <tr v-for="stock in stocks">
                  <td>@{{stock.symbol}}</td>
                  <td>@{{stock.ltP}}</td>
                  <td>@{{stock.open}}</td>
                  <td>@{{stock.high}}</td>
                  <td>@{{stock.low}}</td>
                  <td>@{{stock.todaysAngle}}</td>
                  <td>@{{stock.monthAngle}}</td>
                </tr>
              </body>
              </table>
            </div>
        </div>

      <script>
          window.Laravel = { csrfToken: '{{ csrf_token() }}' };
      </script>
        <script src="/js/app.js"></script>

    </body>

</html>
