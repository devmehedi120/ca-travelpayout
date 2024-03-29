<div id="caTravelFlight" class="travelpayoutWraper">
    <div class="loadingEnimation" v-if="caLoading">
        <div class="svgIcon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                style="margin:auto;background:none;display:block;" width="100px" height="100px" viewBox="0 0 100 100"
                preserveAspectRatio="xMidYMid">
                <g transform="scale(-1,1) translate(-100,0)">
                    <g>
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"
                            values="360 50 50;240 50 50;120 50 50;0 50 50" keyTimes="0;0.333;0.667;1" dur="1s"
                            keySplines="0.7 0 0.3 1;0.7 0 0.3 1;0.7 0 0.3 1" calcMode="spline"></animateTransform>
                        <path fill="#e15b64"
                            d="M91,74.1C75.6,98,40.7,102.4,21.2,81c11,9.9,26.8,13.5,40.8,8.7c7.4-2.5,13.9-7.2,18.7-13.3 c1.8-2.3,3.5-7.6,6.7-8C90.5,67.9,92.7,71.5,91,74.1z">
                        </path>
                        <path fill="#f8b26a"
                            d="M50.7,5c-4,0.2-4.9,5.9-1.1,7.3c1.8,0.6,4.1,0.1,5.9,0.3c2.1,0.1,4.3,0.5,6.4,0.9c5.8,1.4,11.3,4,16,7.8 C89.8,31.1,95.2,47,92,62c4.2-13.1,1.6-27.5-6.4-38.7c-3.4-4.7-7.8-8.7-12.7-11.7C66.6,7.8,58.2,4.6,50.7,5z">
                        </path>
                        <path fill="#abbd81"
                            d="M30.9,13.4C12,22.7,2.1,44.2,7.6,64.8c0.8,3.2,3.8,14.9,9.3,10.5c2.4-2,1.1-4.4-0.2-6.6 c-1.7-3-3.1-6.2-4-9.5C10.6,51,11.1,41.9,14.4,34c4.7-11.5,14.1-19.7,25.8-23.8C37,11,33.9,11.9,30.9,13.4z">
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <!-- <div class="searchFlightWraper" >
        <div>
            <h1 class='flightHeading'>Flight</h1>
        </div>


        <div id="filteWraper" class="filterWraper">
            <div class="search-filter">
                <div id="caFlyghtSearch">
                    <div class="inputBox">
                        <div class="inputWraper">
                            <input type="radio" id="return" value="return" v-model="tab" class="radioBtn" checked>
                            <label for="return">Round Ticket</label>
                        </div>
                        <div class="inputWraper">
                            <input type="radio" name="" id="oneWay" value="oneway" v-model="tab" class="radioBtn">
                            <label for="oneWay">One Way</label>
                        </div>

                    </div>
                    tab one
                    <div class="flightLocationInput" v-show="tab === 'return' || tab ===''">

                        <div class="flight-location-select">
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <div id="travelFrom" class="inputFild">

                                        <div class="custom-select-container">
                                            <label for="travelFrom">From</label>
                                            <input id="travelFrom" class="custom-select-input" @focus="showDropdown"
                                                v-model="selectedCity" @input="searchFromPlaces"
                                                :placeholder="selectedCity !==''?selectedCity:'Select A City'">
                                            <ul class="custom-select-dropdown" v-if="showOptions">
                                                <li class="custom-select-option" @click="selectCity(place)"
                                                    v-for="place in places" :key="place.id">{{ place.name }}</li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="location-toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            style="width: 1rem; height: 1rem;">
                                            <path
                                                d="M9 7.5A1.5 1.5 0 0010.5 9h6.878l-1.939 1.94a1.5 1.5 0 002.122 2.12l4.5-4.5a1.5 1.5 0 000-2.12l-4.5-4.5a1.5 1.5 0 10-2.122 2.12L17.38 6H10.5A1.5 1.5 0 009 7.5zm6 9a1.5 1.5 0 00-1.5-1.5H6.62l1.94-1.94a1.5 1.5 0 00-2.122-2.12l-4.5 4.5a1.5 1.5 0 000 2.12l4.5 4.5a1.5 1.5 0 002.122-2.12L6.62 18h6.88a1.5 1.5 0 001.5-1.5z"
                                                clip-rule="evenodd"></path>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <div class="custom-select-container">
                                        <label for="travelTO">To</label>
                                        <input id="travelTO" class="custom-select-input" @focus="showToDropdown"
                                            v-model="selectedToCity" @input="searchToPlaces"
                                            :placeholder="selectedToCity !==''?selectedToCity:'Select A city'">
                                        <ul class="custom-select-dropdown" v-if="showToOptions">
                                            <li class="custom-select-option" @click="selectToCity(place)"
                                                v-for="place in places" :key="place.id">{{ place.name }}</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <label for="depart">Depart</label>
                                    <div id="depart" class="inputFild">
                                        <Datepicker :min-date="new Date()" v-model="deparedDate"></Datepicker>
                                    </div>
                                </div>
                            </div>
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <label for="return">Return</label>
                                    <div id="return" class="inputFild">
                                        <Datepicker :min-date="new Date()" v-model="returnDate"></Datepicker>
                                    </div>
                                </div>
                            </div>
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <div class="custom-select-container">
                                        <label for="selectcurrency">currency</label>
                                        <input id="selectcurrency" v-model="selectedCurrency" @focus="showCurDropdown"
                                            class="custom-select-input"
                                            :placeholder="selectedCurrency?selectedCurrency:currentCurrencyCode">
                                        
                                        <div v-if="showCurOptions" class="custom-select-dropdown">
                                            <div v-for="currency in filteredCurrency" :key="currency"
                                                class="custom-select-option" @click="selectCurrency(currency)">
                                                <span class="currency">{{ currency }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="locationSet submitBtnWrap"> 
                                <button class="submitButtonfirst" @click="handleSpecificTicket()"> Search</button>                               
                                    
                                                                
                            </div>


                        </div>


                    </div>


                    tab no two
                    <div class="flightLocationInput" v-show="tab === 'oneway'">
                        <div class="flight-location-select">
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <div class="custom-select-container">
                                        <label for="travelFrom"><b>From</b></label>
                                        <input id="travelFrom" class="custom-select-input" @focus="showDropdown"
                                            v-model="selectedCity" @input="searchFromPlaces"
                                            :placeholder="selectedCity !==''?selectedCity:'Select A City'">
                                        <ul class="custom-select-dropdown" v-if="showOptions">
                                            <li class="custom-select-option" @click="selectCity(place)"
                                                v-for="place in places" :key="place.id">{{ place.name }}</li>
                                        </ul>
                                    </div>
                                    <div class="location-toggle" v-if="tab===''">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                            style="width: 1rem; height: 1rem;">
                                            <path
                                                d="M9 7.5A1.5 1.5 0 0010.5 9h6.878l-1.939 1.94a1.5 1.5 0 002.122 2.12l4.5-4.5a1.5 1.5 0 000-2.12l-4.5-4.5a1.5 1.5 0 10-2.122 2.12L17.38 6H10.5A1.5 1.5 0 009 7.5zm6 9a1.5 1.5 0 00-1.5-1.5H6.62l1.94-1.94a1.5 1.5 0 00-2.122-2.12l-4.5 4.5a1.5 1.5 0 000 2.12l4.5 4.5a1.5 1.5 0 002.122-2.12L6.62 18h6.88a1.5 1.5 0 001.5-1.5z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <div class="custom-select-container">
                                        <label for="travelTO">To</label>
                                        <input id="travelTO" class="custom-select-input" @focus="showToDropdown"
                                            v-model="selectedToCity" @input="searchToPlaces"
                                            :placeholder="selectedToCity !==''?selectedToCity:'Select A city'">
                                        <ul class="custom-select-dropdown" v-if="showToOptions">
                                            <li class="custom-select-option" @click="selectToCity(place)"
                                                v-for="place in places" :key="place.id">{{ place.name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="locationSet">
                                <div class="location-wrap">
                                    <label for="depart">Depart</label>
                                    <div id="depart" class="inputFild">
                                        <Datepicker :min-date="new Date()" v-model="deparedDate"></Datepicker>
                                    </div>
                                </div>
                            </div>
                         

                            <div class="locationSet">
                                <div class="location-wrap">
                                    <div class="custom-select-container">
                                        <label for="selectcurrency">currency</label>
                                        <input id="selectcurrency" v-model="selectedCurrency" @focus="showCurDropdown"
                                            class="custom-select-input"
                                            :placeholder="selectedCurrency?selectedCurrency:currentCurrencyCode">
                                       
                                        <div v-if="showCurOptions" class="custom-select-dropdown">
                                            <div v-for="currency in filteredCurrency" :key="currency"
                                                class="custom-select-option" @click="selectCurrency(currency)">
                                                <span>{{ currency }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <div class="locationSet submitBtnWrap"> 
                                <button class="submitButtonfirst" @click="handleOneWayTicket()"> Search</button>                               
                                    
                                                                
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div> -->

    <?php
    
    require_once plugin_dir_path( __FILE__ )."/ca-flight-cards.php";
    require_once plugin_dir_path( __FILE__ )."/ca-search-result.php";
  ?>
</div>