
require('./bootstrap');

  console.log('App');
  var app =new Vue({
      el: '#app',
      data: {
          msg: 'Helo',
          loading: 'yes',
          data: '',
          baseUrl: 'http://localhost:8000',
          time: '',
          stock:{ symbol: '', ltP: '',open:'',high:'',low:'',todaysAngle:'',monthAngle:''},
          stocks:[]
      },
      created: function(){
          //this.getStocks();
          setInterval(function(){
            console.log("Syncing..");
            app.getStocks();
          }, 10000);
      },
      methods: {
          getStocks: function(){
              this.$http.get('http://localhost:8000/api/stocks').then(function(response){
                 response.json().then(function(res){
                   app.time='';
                   app.stocks = [];
                   //app.time = res.time;
                   app.time = Date();
                   res.data.forEach(function(item){
                     app.stock.symbol = item.symbol;
                     app.stock.ltP = item.ltP;
                     app.stock.open = item.open;
                     app.stock.high = item.high;
                     app.stock.low = item.low;
                     app.stock.todaysAngle =  item.image_details["todaysAngle"];
                     app.stock.monthAngle = item.image_details["30DaysAngle"];
                     app.stocks.push(app.stock);
                     app.stock = { symbol: '', ltP: '',open:'',high:'',low:'',todaysAngle:'',monthAngle:''};
                   });
                   app.loading = "no";
                 });

              },function(error){
                console.log("error");
              });
          },
          addData: function(){

          }
      }

  });
