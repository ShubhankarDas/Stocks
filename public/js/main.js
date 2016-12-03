new Vue({
    el: '#app',
    data: {
        msg: 'Helo',
        baseUrl: 'http://localhost:8000',
        stock:{ symbol: '', ltP: '',open:'',high:'',low:'',todaysAngle:'',monthAngle:''},
        stocks:[]
    },
    created: function(){
        this.getStocks();
    },
    methods: {
        getStocks: function(){
            console.log("calling...");
            this.$http.get('http://localhost:8000/api/stocks',function(stocks){
                console.log('done');
            });
        }
    }

});
