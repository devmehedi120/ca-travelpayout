<div id="caTravelFlight" class="travelpayoutWraper">
<div  class=" searchFlightWraper shadow-lg shadow-indigo-500/40 bg-indigo-500">
    <div >
        <h1 class='flightHeading'>Flight</h1>
    </div>

    
    <div id="filteWraper" class="filterWraper">
        <div class="search-filter">
        <div action="" id="caFlyghtSearch">
        <div class="inputBox">
            <div class="inputWraper">
                    <input type="radio" id="return" value="return" v-model="tab" class="radioBtn" checked>
                    <label for="return">One Way</label>
                </div>
                <div class="inputWraper">
                    <input type="radio" name="" id="oneWay"  value="oneway" v-model="tab" class="radioBtn">
                    <label for="oneWay">One Way</label>
                </div>
                <div class="inputWraper">
                    <input type="radio" name="" id="multiCity"  value="multicity" v-model="tab" class="radioBtn">
                   <label for="multiCity"> Multy-City</label>
                </div>
    </div>
     <!-- tab one -->
      <div class="flightLocationInput" v-show="tab === 'return' || tab ===''">
            <div class="flight-location-select">
                 <div class="locationSet">
               <div  class="location-wrap">
               <label for="travelFrom">From</label>
                <input id="travelFrom" type="text" class="inputFild">
                <div class="location-toggle">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" style="width: 1rem; height: 1rem;"><path d="M9 7.5A1.5 1.5 0 0010.5 9h6.878l-1.939 1.94a1.5 1.5 0 002.122 2.12l4.5-4.5a1.5 1.5 0 000-2.12l-4.5-4.5a1.5 1.5 0 10-2.122 2.12L17.38 6H10.5A1.5 1.5 0 009 7.5zm6 9a1.5 1.5 0 00-1.5-1.5H6.62l1.94-1.94a1.5 1.5 0 00-2.122-2.12l-4.5 4.5a1.5 1.5 0 000 2.12l4.5 4.5a1.5 1.5 0 002.122-2.12L6.62 18h6.88a1.5 1.5 0 001.5-1.5z" clip-rule="evenodd"></path></svg>

                  </div>
               </div>
               <div class="checkbox__wrap">
                   <div class="checkBox__group">
                   <div class="checkbox-wrapper-27">
                    <label class="checkbox">
                   <input type="checkbox">
                   <span class="checkbox__icon"></span>
                    check Nearby
                   </label>
                    </div>
                   </div>
                   <div class="checkBox__group">
                   <div class="checkbox-wrapper-27">
                    <label class="checkbox">
                   <input type="checkbox">
                   <span class="checkbox__icon"></span>
                    Direct flight only
                   </label>
                    </div>
                   </div>
               </div>
            </div>
            <div class="locationSet">
                 <div class="location-wrap">
                 <label for="travelTO">To</label>
                <input id="travelTo" type="text" class="inputFild">
                 </div>
                 <div class="checkbox__wrap">
                   <div class="checkBox__group">
                   <div class="checkbox-wrapper-27">
                    <label class="checkbox">
                   <input type="checkbox">
                   <span class="checkbox__icon"></span>
                    Add nearby airport
                   </label>
                    </div>
                   </div>
               </div>
            </div>
            <div class="locationSet">
                <div class="location-wrap">
                <label for="depart">Depart</label>
                <input id="depart" type="text" class="inputFild">
                </div>
            </div>
            <div class="locationSet">
                    <div class="location-wrap">
                        <label for="return">Return</label>
                        <input id="return" type="text" class="inputFild">
                    </div>
            </div>
            </div>
           
           </div>  

          <!-- tab number two -->

           <div class="flightLocationInput" v-show="tab === 'oneway'">
            <div class="flight-location-select">
            <div class="locationSet">
               <div  class="location-wrap">
               <label for="travelFrom">From</label>
                <input id="travelFrom" type="text" class="inputFild">
                <div class="location-toggle" v-if="tab===''">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" style="width: 1rem; height: 1rem;"><path d="M9 7.5A1.5 1.5 0 0010.5 9h6.878l-1.939 1.94a1.5 1.5 0 002.122 2.12l4.5-4.5a1.5 1.5 0 000-2.12l-4.5-4.5a1.5 1.5 0 10-2.122 2.12L17.38 6H10.5A1.5 1.5 0 009 7.5zm6 9a1.5 1.5 0 00-1.5-1.5H6.62l1.94-1.94a1.5 1.5 0 00-2.122-2.12l-4.5 4.5a1.5 1.5 0 000 2.12l4.5 4.5a1.5 1.5 0 002.122-2.12L6.62 18h6.88a1.5 1.5 0 001.5-1.5z" clip-rule="evenodd"></path></svg>
            </div>
               </div>

            </div>
            <div class="locationSet">
                 <div class="location-wrap">
                 <label for="travelTO">To</label>
                <input id="travelTo" type="text" class="inputFild">
                 </div>
            </div>
            <div class="locationSet">
                <div class="location-wrap">
                <label for="depart">Depart</label>
                <input id="depart" type="text" class="inputFild" disabled>
                </div>
            </div>
            <div class="locationSet">
                    <div class="location-wrap">
                        <label for="return">Return</label>
                        <input id="return" type="text" class="inputFild" v-bind:disabled='isDisabled'>
                    </div>
            </div>
            </div>
           
           </div>    
        

           <!-- tab number three -->

           <div class="multiCitysection" v-show="tab === 'multicity'" >
           <div class="multiCityWraper">
             <div class="fieldGroup">
               <input type="text" placeholder="From">
               <input type="text" placeholder="To">
               <input type="text" placeholder="Depart">
               <span class="closeGroup">+</span>
             </div>           
           </div>
           <div class="multiCityWraper">
             <div class="fieldGroup">
               <input type="text" placeholder="From">
               <input type="text" placeholder="To">
               <input type="text" placeholder="Depart">
               <span class="closeGroup">+</span>
             </div>           
           </div>
           </div>

           <div class="search__buton">
                    <div class="search__inner">
                        <input id="submitBtn" type="submit" value="search" class="inputFild">
                    </div>
            </div>
     </div>
    </div>
  </div>
</div>

   <?php
     require_once plugin_dir_path( __FILE__ )."/ca-flight-card.php";
     require_once plugin_dir_path( __FILE__ )."/ca-search-result.php";
   ?>


</div>