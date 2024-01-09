<div class="cardSection" id="cardSection">
    <div class="Searchspan">
        <div class="searchHeading">
            <b>Latest Round Trip Ticket Price</b>
        </div>
        <div class="fligtableCityFilter" v-if="currentPage === 'archive'">

            <div class="custom-select-container">
                <label for="selectCity"><b>Select a city</b></label>
                <input id="selectCity" class="custom-select-input-1" @focus="showoriginDropdown" v-model="searchTerm"
                    @input="searchPlaces" :placeholder="selectedoriginCity?selectedoriginCity:originLocation">
                <ul class="custom-select-dropdown" v-if="showOriginOptions">
                    <li class="custom-select-option" @click="selectOriginCity(place)" v-for="place in places"
                        :key="place.id">{{ place.name }}</li>
                </ul>
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
                        <p class="countryName">{{ singleCard.countryName }}</p>
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

        <div class="city_card" v-if="currentPage === 'singlecity'">
            <div class="backbtnwraper">
                <div v-if="currentPage === 'singlecity'" class="backBtn" @click="backPrevious()">
                    <span>Back</span>
                </div>
                <div class="backBtn" v-if="isTicket" @click="backTicket()">
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