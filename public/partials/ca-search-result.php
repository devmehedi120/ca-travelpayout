<div id="flightTicketPage" class="flightTicketPage" v-if="currentPage === 'flightTicket'">
    <div class="stopsFilterWrap">
        <div class="allertPriceupdate">
            <span class="alertMsg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                    class="PriceAlertsSignUp_iconFillBlue__MDZhZ BpkIcon_bpk-icon--rtl-support__YWE2M"
                    style="width: 1rem; height: 1rem;">
                    <path
                        d="M12 1.5a7.202 7.202 0 00-7.186 7.219v.659A10.361 10.361 0 013.73 13.99l-.51 1.025A2.062 2.062 0 005.056 18h13.888a2.062 2.062 0 001.837-2.985l-.51-1.025a10.35 10.35 0 01-1.085-4.612v-.66A7.202 7.202 0 0012 1.5zM9.076 20.939A1.021 1.021 0 019.83 19.5h4.338a1.02 1.02 0 01.755 1.439 2.26 2.26 0 01-1.931 1.561h-2a2.244 2.244 0 01-1.917-1.561z">
                    </path>
                </svg>
                <p class="alertPriceUpdate">Get price alert</p>
            </span>
        </div>
        <div class="shortMainWraper">
            <div class="shortFlight">
                <div class="stops__wraper">
                    <span>Stops</span>
                    <span class="arrowSvg"><svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon "
                            version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z"
                                fill="#fff" />
                        </svg></span>
                </div>
                <div class="short___list">
                    <div class="inputWraper__short">
                        <div class="inputGroup">
                            <div class="checkbox-wrapper-27">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    <span class="checkbox__icon"></span>
                                    Direct Flight
                                </label>
                            </div>

                        </div>
                        <div class="inputGroup">
                            <div class="checkbox-wrapper-27">
                                <label class="checkbox">
                                    <input type="checkbox">
                                    <span class="checkbox__icon"></span>
                                    1+ stops
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="flightTIcke" class="flightTicket">
        <div id="ticketNavbar" class="ticketNavbar">
            <div class="ticketnav__wraper" v-show="navdisbled">
                <div class="navList">
                    <button class="navItem borderleftRadius">
                        <div class="bestPricewraer">
                            <span class="best__pp pp_size">Best</span>
                            <span class="Best__pp__amount">1300 BDT</span>
                            <span class="note">oh 20 ticket</span>
                        </div>
                    </button>
                    <button class="navItem ">
                        <div class="bestPricewraer">
                            <span class="best__pp pp_size">Chepest</span>
                            <span class="Best__pp__amount">1200 BDT</span>
                            <span class="note">oh 25 ticket</span>
                        </div>
                    </button>
                    <button class="navItem borderrighttRadius ">
                        <div class="bestPricewraer">
                            <span class="best__pp pp_size">Fastest</span>
                            <span class="Best__pp__amount">1300 BDT</span>
                            <span class="note">oh 20 ticket</span>
                        </div>
                    </button>

                </div>
            </div>
        </div>
        <div class="ticketWrap">
            <div class="backBtn" @click="backPreviousCity()">
                <span>Back</span>
            </div>
           <div class="doubl_ticket" v-if="ticket==='double'"  v-for="(ticket, index) in flightTicket" :key="index">
                <div class="double_ticket_fragment">
                    <div class="logoNtime">
                        <div class="flightLogo">
                            <div class="logoImg">
                                <span>
                                   <img :src="'https://pics.avs.io/200/200/' + ticket.airline + '.png'" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="flightTime">
                            <div class="startTimeContainer">
                                <span class="stTime timeStmp">{{ticket.departure_at}}</span>
                                <span class="stlocation flghtLocation">{{ticket.origin_airport}}</span>
                            </div>
                            <div class="timeHours">
                                <span class="tJTime  tjNtjn">{{ticket.duration_to}}</span>
                                <div class="leantGroup">
                                    <span class="timeLeanth"></span>
                                    <span class="svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 12 12"
                                            class="LegInfo_planeEnd__ZDkxM">
                                            <path fill="#545860"
                                                d="M3.922 12h.499a.52.52 0 0 0 .444-.247L7.949 6.8l3.233-.019A.8.8 0 0 0 12 6a.8.8 0 0 0-.818-.781L7.949 5.2 4.866.246A.525.525 0 0 0 4.421 0h-.499a.523.523 0 0 0-.489.71L5.149 5.2H2.296l-.664-1.33a.523.523 0 0 0-.436-.288L0 3.509 1.097 6 0 8.491l1.196-.073a.523.523 0 0 0 .436-.288l.664-1.33h2.853l-1.716 4.49a.523.523 0 0 0 .489.71">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <span v-if="ticket.transfers==0" class="flightType tjNtjn">Direct</span>
                                <span v-else class="flightType tjNtjn">{{ticket.transfers}} +stops</span>

                            </div>
                            <div class="reachTimeContainer">
                                <span class="rchTime timeStmp">{{ticket.duration_time}}</span>
                                <span class="rchLocatioon flghtLocation"> {{ticket.destination_airport}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="logoNtime">
                        <div class="flightLogo">
                            <div class="logoImg">
                                <span>
                                   <img :src="'https://pics.avs.io/200/200/' + ticket.airline + '.png'" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="flightTime">
                            <div class="startTimeContainer">
                                <span class="stTime timeStmp">{{ticket.return_at}}</span>
                                <span class="stlocation flghtLocation">{{ticket.destination_airport}}</span>
                            </div>
                            <div class="timeHours">
                                <span class="tJTime  tjNtjn">{{ticket.duration}}</span>
                                <div class="leantGroup">
                                    <span class="timeLeanth"></span>
                                    <span class="svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 12 12"
                                            class="LegInfo_planeEnd__ZDkxM">
                                            <path fill="#545860"
                                                d="M3.922 12h.499a.52.52 0 0 0 .444-.247L7.949 6.8l3.233-.019A.8.8 0 0 0 12 6a.8.8 0 0 0-.818-.781L7.949 5.2 4.866.246A.525.525 0 0 0 4.421 0h-.499a.523.523 0 0 0-.489.71L5.149 5.2H2.296l-.664-1.33a.523.523 0 0 0-.436-.288L0 3.509 1.097 6 0 8.491l1.196-.073a.523.523 0 0 0 .436-.288l.664-1.33h2.853l-1.716 4.49a.523.523 0 0 0 .489.71">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <span v-if="ticket.return_transfers==0" class="flightType tjNtjn">Direct</span>
                                <span v-else class="flightType tjNtjn">{{ticket.return_transfers}} +stops</span>
                            </div>
                            <div class="reachTimeContainer">
                                <span class="rchTime timeStmp">{{ticket.duration_back}}</span>
                                <span class="rchLocatioon flghtLocation">{{ticket.origin_airport}} </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ticketPrice">
                    <span class="deallenth">One deals from</span>
                    <span class="totalAmount">{{currentCurrencyCode}} {{ticket.price}}</span>
                    <a :href="'https://aviasales.com' + ticket.link">
                        <button class="pricebutton">
                            <p class="textSelect">Select</p>
                            <svg fill="#fff" width="25px" height="25px" viewBox="0 0 24 24" id="right-arrow"
                                xmlns="http://www.w3.org/2000/svg" class="icon line">
                                <path id="primary" d="M3,12H21m-3,3,3-3L18,9"
                                    style="fill: none; stroke: #fff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.0;">
                                </path>
                            </svg>
                        </button>
                    </a>
                </div>
            </div>


            <!-- single ticket -->
             <div class="single_ticket" v-if="ticket==='single'"  v-for="(ticket, index) in flightTicket" :key="index">
                <div class="double_ticket_fragment">
                    <div class="logoNtime">
                        <div class="flightLogo">
                            <div class="logoImg">
                                <span>
                                   <img :src="'https://pics.avs.io/200/200/' + ticket.airline + '.png'" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="flightTime">
                            <div class="startTimeContainer">
                                <span class="stTime timeStmp">{{ticket.departure_at}}</span>
                                <span class="stlocation flghtLocation">{{ticket.origin_airport}}</span>
                            </div>
                            <div class="timeHours">
                                <span class="tJTime  tjNtjn">{{ticket.duration_to}}</span>
                                <div class="leantGroup">
                                    <span class="timeLeanth"></span>
                                    <span class="svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 12 12"
                                            class="LegInfo_planeEnd__ZDkxM">
                                            <path fill="#545860"
                                                d="M3.922 12h.499a.52.52 0 0 0 .444-.247L7.949 6.8l3.233-.019A.8.8 0 0 0 12 6a.8.8 0 0 0-.818-.781L7.949 5.2 4.866.246A.525.525 0 0 0 4.421 0h-.499a.523.523 0 0 0-.489.71L5.149 5.2H2.296l-.664-1.33a.523.523 0 0 0-.436-.288L0 3.509 1.097 6 0 8.491l1.196-.073a.523.523 0 0 0 .436-.288l.664-1.33h2.853l-1.716 4.49a.523.523 0 0 0 .489.71">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <span v-if="ticket.transfers==0" class="flightType tjNtjn">Direct</span>
                                <span v-else class="flightType tjNtjn">{{ticket.transfers}} +stops</span>

                            </div>
                            <div class="reachTimeContainer">
                                <span class="rchTime timeStmp">{{ticket.duration_time}}</span>
                                <span class="rchLocatioon flghtLocation"> {{ticket.destination_airport}}</span>
                            </div>
                        </div>
                    </div>
                  </div>
                <div class="ticketPrice">
                    <span class="deallenth">One deals from</span>
                    <span class="totalAmount">{{currentCurrencyCode}} {{ticket.price}}</span>
                    <a :href="'https://aviasales.com' + ticket.link">
                        <button class="pricebutton">
                            <p class="textSelect">Select</p>
                            <svg fill="#fff" width="25px" height="25px" viewBox="0 0 24 24" id="right-arrow"
                                xmlns="http://www.w3.org/2000/svg" class="icon line">
                                <path id="primary" d="M3,12H21m-3,3,3-3L18,9"
                                    style="fill: none; stroke: #fff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.0;">
                                </path>
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>