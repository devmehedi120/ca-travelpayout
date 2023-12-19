<div class="cardSection" id="cardSection">
    <div class="Searchspan">
        <div class="searchHeading">
            <b>Search Results</b>
        </div>
        <div class="fligtableCityFilter">
            <div class="custom-select-container">
            <input v-model="selectedoriginCity" @focus="showoriginDropdown" class="custom-select-input" :placeholder="selectedoriginCity?selectedoriginCity:originLocation">
            <div v-if="showOriginOptions" class="custom-select-dropdown">
                <div v-for="city in filteredOriginCities" :key="city.city_code" @click="selectOriginCity(city)" 
                    class="custom-select-option">
                    <span >{{ city.cityName }}</span>
                </div>
            </div>
        </div>
        </div>



    </div>
    <div class="card_wraper">
        <div class="card_wraper" v-if="currentPage === 'archive'">
            <div class="single__card" v-for="(singleCard, index) in filteredData" :key="index"
                @click="cityGate(singleCard.country_code)">
                <div class="card__image">
                    <img src="https://cdn.pixabay.com/photo/2018/05/09/01/00/greece-3384386_1280.jpg" alt="">
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

        <div class="card_wraper" v-if="currentPage === 'singlecity'">
            <div class="single__card" v-for="(singleCty, index) in singleCityes" :key="index"
                @click="searchInsideTicket(singleCty)">
                <div class="card__image">
                    <img src="https://cdn.pixabay.com/photo/2018/05/09/01/00/greece-3384386_1280.jpg" alt="">
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