jQuery(function( $ ) {
   Vue.createApp({
        data() {
          return {
            userlocations:userLocationbyip.userLocation,
            tab:'',
            isDisabled:true,
          }
        },
        methods:{
          
        },
        created(){
           
          
        },

        mounted(){
          const self=this;
          const jsonData=JSON.parse(self.userlocations)
          console.log(jsonData);
          
        }

      }).mount('#caTravelFlight');

})
