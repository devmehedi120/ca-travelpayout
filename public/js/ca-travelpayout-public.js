jQuery(function( $ ) {
   Vue.createApp({
        data() {
          return {
            isLoading: true,
            userlocation:'' ,
            tab:'',
            isDisabled:true,
            popularLocations: []
          }
        },
        methods:{
          async getPopularLocations(){
            return new Promise((resolve, reject) => {
              jQuery.ajax({
                type: "get",
                url: catp_fragments.ajaxurl,
                data: {
                  action: "getpopuplar_locations"
                },
                dataType: "json",
                success: function (response) {
                  resolve(response);
                },
                error: (error) => {
                  reject(error);
                }
              });
            })
          },
          formatPrice(price) {
            const priceInDollars = price / 100;
            const formattedPrice = priceInDollars.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });
            return formattedPrice.slice(1);
          },
        },
        async created(){
          
          await this.getPopularLocations().then(response => {
            this.isLoading = false;
            this.popularLocations = response.data;
          });
          
          

          // const locationData = userLocationbyip.popularLocation.data; 
          // console.log(locationData);
        }
      }).mount('#caTravelFlight');

})
