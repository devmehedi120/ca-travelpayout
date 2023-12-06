jQuery(function( $ ) {
   Vue.createApp({
        data() {
          return {
            userlocation:'' ,
            tab:'',
            isDisabled:true,
          }
        },
        methods:{
          
        },
        created(){
           
          
        },

        mounted(){
          const data=JSON.parse(userLocationbyip.userLocation);
          console.log(data);
          
        }

      }).mount('#caTravelFlight');

})
