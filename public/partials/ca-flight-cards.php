<div class="cardSection" id="cardSection">
    <div class="Searchspan">
        <b>Search Results</b>
    </div>
    <div class="card_wraper">
        <div v-for="(location, index) in popularLocations" :key="index" class="single__card">
            <div class="card__image">
                <img src="https://cdn.pixabay.com/photo/2018/05/09/01/00/greece-3384386_1280.jpg" alt="">
            </div>
            <div class="description__area">
                <div class="country__name">
                    <h4>{{location.destination}}</h4>
                </div>
                <div class="amount__area">
                    <span>Flight from</span>
                    <span class="taka"> BDT {{formatPrice(location.price)}} </span>
                </div>
                <div class="stopeg">
                    <small>1+ stops</small>
                </div>
            </div>
        </div>
    </div>
</div>