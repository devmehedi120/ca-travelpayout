<div class="cardSection" id="cardSection">
    <div class="Searchspan">
        <div class="searchHeading">
            <b>Search Results</b>
        </div>
        <div class="fligtableCityFilter" v-if="currentPage === 'archive'">

            
            <div class="custom-select-container">
                <label for="selectcurrency"><b>Select a currency</b></label>
                <input id="selectcurrency" v-model="selectedCurrency" @focus="showCurrencyDropdown" class="custom-select-input-1"
                    :placeholder="selectedCurrency?selectedCurrency:currentCurrencyCode">
                <div v-if="showCurrencyOptions" class="custom-select-dropdown">
                    <div v-for="currency in filteredCurrency" :key="currency" 
                        class="custom-select-option">
                        <span>{{ currency }}</span>
                    </div>
                </div>
            </div>
            <div class="custom-select-container">
                <label for="selectCity"><b>Select a city</b></label>
                <input id="selectCity" v-model="selectedoriginCity" @focus="showoriginDropdown" class="custom-select-input-1"
                    :placeholder="selectedoriginCity?selectedoriginCity:originLocation">
                <div v-if="showOriginOptions" class="custom-select-dropdown">
                    <div v-for="city in filteredOriginCities" :key="city.city_code" 
                        class="custom-select-option">
                        <span>{{ city.cityName }}</span>
                    </div>
                </div>
            </div>

             <div class="custom-select-container">
            <!-- @click="selectOriginCity()" -->
            <button >Search</button>
        </div>
        </div>
       

    </div>
    <div class="card_wraper">
        
        <div class="card_wraper" v-if="currentPage === 'archive'">
            <div class="single__card" v-for="(singleCard, index) in filteredData" :key="index"
                @click="cityGate(singleCard.country_code)">
                <div class="card__image">
                    <img :src="'https://photo.hotellook.com/static/countries/960x720/'+singleCard.country_code+'.jpg'"
                        alt="">
                </div>
                <div class="description__area">
                    <div class="country__name">
                        <h4>{{ singleCard.countryName }}</h4>
                    </div>
                    <div class="amount__area">
                        <span>Flight from</span>
                        <span class="taka"> {{currentCurrencyCode}} {{ singleCard.value }} </span>
                    </div>
                    <div class="stopeg">
                        <small v-if="singleCard.number_of_changes>0">{{singleCard.number_of_changes}}+ stops</small>
                        <small v-else>Direct</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="city_card"  v-if="currentPage === 'singlecity'">
            <div class="backbtnwraper">
                 <div v-if="currentPage === 'singlecity'" class="backBtn" @click="backPrevious()">
                <span>Back</span>
            </div>
            <div class="backBtn" v-if="isTicket" @click="backTicket()" >
                <span>
                    Next
                </span>
            </div>
            </div>
            <div class="card_wraper" v-if="currentPage === 'singlecity'">
                <div class="single__card" v-for="(singleCty, index) in singleCityes" :key="index"
                    @click="searchInsideTicket(singleCty)">
                    <div class="card__image">
                        <img :src="'https://photo.hotellook.com/static/cities/960x720/'+singleCty.city_code+'.jpg'"
                            alt="">
                    </div>
                    <div class="description__area">
                        <div class="country__name">
                            <h4>{{ singleCty.cityName }}</h4>
                        </div>
                        <div class="amount__area">
                            <span>Flight from</span>
                            <span class="taka"> {{currentCurrencyCode}} {{ singleCty.value }} </span>
                        </div>
                        <div class="stopeg">
                            <small v-if="singleCty.number_of_changes>0">{{singleCty.number_of_changes}}+ stops</small>
                            <small v-else>Direct</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>