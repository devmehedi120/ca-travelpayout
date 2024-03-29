


jQuery(function ($) {


  // Register the vue-multiselect component globally
  
  Vue.createApp({
    components: { Datepicker: VueDatePicker },
    data() {
      return {
        searchTerm:this.originLocation?originLocation: "",
        places: [],
        ticket: "",
        errMsg: null,
        selectedoriginCity: '',
        showOriginOptions: false,
        isTicket: false,
        navdisbled: false,
        selectedCityCode: "",
        selectedToCityCode: "",
        selectedCity: '',
        selectedToCity: '',
        showOptions: false,
        showToOptions: false,
        showCurrencyOptions: false,
        showCurOptions: false,
        deparedDate: null,
        formatedDeparedDate: null,
        returnDate: null,
        formatedReturnDate: null,
        currentPage: "archive",
        caLoading: true,
        userlocation: "",
        tab: "",
        isDisabled: true,
        popularLocations: [],
        allCountriesName: [],
        allCities: [],
        allCityPrices: [],
        countriesCodesnames: [
          {
            name_translations: { en: "Cyprus" },
            cases: { su: "Cyprus" },
            code: "CY",
            name: "Cyprus",
            currency: "EUR",
          },
          {
            name_translations: { en: "Monaco" },
            cases: { su: "Monaco" },
            code: "MC",
            name: "Monaco",
            currency: "EUR",
          },
          {
            name_translations: { en: "Hungary" },
            cases: { su: "Hungary" },
            code: "HU",
            name: "Hungary",
            currency: "HUF",
          },
          {
            name_translations: { en: "Latvia" },
            cases: { su: "Latvia" },
            code: "LV",
            name: "Latvia",
            currency: "EUR",
          },
          {
            name_translations: { en: "Curaçao" },
            cases: { su: "Curaçao" },
            code: "CW",
            name: "Curaçao",
            currency: "ANG",
          },
          {
            name_translations: { en: "Guinea" },
            cases: { su: "Guinea" },
            code: "GN",
            name: "Guinea",
            currency: "GNF",
          },
          {
            name_translations: { en: "Iraq" },
            cases: { su: "Iraq" },
            code: "IQ",
            name: "Iraq",
            currency: "IQD",
          },
          {
            name_translations: { en: "Saint Kitts and Nevis" },
            cases: { su: "Saint Kitts and Nevis" },
            code: "KN",
            name: "Saint Kitts and Nevis",
            currency: "XCD",
          },
          {
            name_translations: { en: "San Marino" },
            cases: { su: "San Marino" },
            code: "SM",
            name: "San Marino",
            currency: "EUR",
          },
          {
            name_translations: { en: "Wallis and Futuna" },
            cases: { su: "Wallis and Futuna" },
            code: "WF",
            name: "Wallis and Futuna",
            currency: "XPF",
          },
          {
            name_translations: { en: "Tokelau" },
            cases: { su: "Tokelau" },
            code: "TK",
            name: "Tokelau",
            currency: "NZD",
          },
          {
            name_translations: { en: "Madagascar" },
            cases: { su: "Madagascar" },
            code: "MG",
            name: "Madagascar",
            currency: "MGA",
          },
          {
            name_translations: { en: "Pakistan" },
            cases: { su: "Pakistan" },
            code: "PK",
            name: "Pakistan",
            currency: "PKR",
          },
          {
            name_translations: { en: "Falkland Islands" },
            cases: { su: "Falkland Islands" },
            code: "FK",
            name: "Falkland Islands",
            currency: "FKP",
          },
          {
            name_translations: { en: "New Caledonia" },
            cases: { su: "New Caledonia" },
            code: "NC",
            name: "New Caledonia",
            currency: "XPF",
          },
          {
            name_translations: { en: "Turks and Caicos Islands" },
            cases: { su: "Turks and Caicos Islands" },
            code: "TC",
            name: "Turks and Caicos Islands",
            currency: "USD",
          },
          {
            name_translations: { en: "Dominica" },
            cases: { su: "Dominica" },
            code: "DM",
            name: "Dominica",
            currency: "XCD",
          },
          {
            name_translations: { en: "Sint Maarten" },
            cases: { su: "Sint Maarten" },
            code: "SX",
            name: "Sint Maarten",
            currency: "ANG",
          },
          {
            name_translations: { en: "Laos" },
            cases: { su: "Laos" },
            code: "LA",
            name: "Laos",
            currency: "LAK",
          },
          {
            name_translations: { en: "French Polynesia" },
            cases: { su: "French Polynesia" },
            code: "PF",
            name: "French Polynesia",
            currency: "XPF",
          },
          {
            name_translations: { en: "Puerto Rico" },
            cases: { su: "Puerto Rico" },
            code: "PR",
            name: "Puerto Rico",
            currency: "USD",
          },
          {
            name_translations: { en: "United Kingdom" },
            cases: { su: "United Kingdom" },
            code: "GB",
            name: "United Kingdom",
            currency: "GBP",
          },
          {
            name_translations: { en: "Colombia" },
            cases: { su: "Colombia" },
            code: "CO",
            name: "Colombia",
            currency: "COP",
          },
          {
            name_translations: { en: "Mozambique" },
            cases: { su: "Mozambique" },
            code: "MZ",
            name: "Mozambique",
            currency: "MZN",
          },
          {
            name_translations: { en: "Macau" },
            cases: { su: "Macau" },
            code: "MO",
            name: "Macau",
            currency: "MOP",
          },
          {
            name_translations: { en: "French Southern Territories" },
            cases: { su: "French Southern Territories" },
            code: "TF",
            name: "French Southern Territories",
            currency: "EUR",
          },
          {
            name_translations: { en: "Chad" },
            cases: { su: "Chad" },
            code: "TD",
            name: "Chad",
            currency: "XAF",
          },
          {
            name_translations: { en: "Namibia" },
            cases: { su: "Namibia" },
            code: "NA",
            name: "Namibia",
            currency: "NAD",
          },
          {
            name_translations: { en: "Myanmar" },
            cases: { su: "Myanmar" },
            code: "MM",
            name: "Myanmar",
            currency: "MMK",
          },
          {
            name_translations: { en: "Bolivia" },
            cases: { su: "Bolivia" },
            code: "BO",
            name: "Bolivia",
            currency: "BOB",
          },
          {
            name_translations: { en: "Sri Lanka" },
            cases: { su: "Sri Lanka" },
            code: "LK",
            name: "Sri Lanka",
            currency: "LKR",
          },
          {
            name_translations: { en: "Slovakia" },
            cases: { su: "Slovakia" },
            code: "SK",
            name: "Slovakia",
            currency: "EUR",
          },
          {
            name_translations: { en: "Svalbard and Jan Mayen" },
            cases: { su: "Svalbard and Jan Mayen" },
            code: "SJ",
            name: "Svalbard and Jan Mayen",
            currency: "NOK",
          },
          {
            name_translations: { en: "Zimbabwe" },
            cases: { su: "Zimbabwe" },
            code: "ZW",
            name: "Zimbabwe",
            currency: "ZWD",
          },
          {
            name_translations: { en: "Montenegro" },
            cases: { su: "Montenegro" },
            code: "ME",
            name: "Montenegro",
            currency: "EUR",
          },
          {
            name_translations: { en: "United States Minor Outlying Islands" },
            cases: { su: "United States Minor Outlying Islands" },
            code: "UM",
            name: "United States Minor Outlying Islands",
            currency: "USD",
          },
          {
            name_translations: { en: "Montserrat" },
            cases: { su: "Montserrat" },
            code: "MS",
            name: "Montserrat",
            currency: "XCD",
          },
          {
            name_translations: { en: "Bahrain" },
            cases: { su: "Bahrain" },
            code: "BH",
            name: "Bahrain",
            currency: "BHD",
          },
          {
            name_translations: { en: "Iran" },
            cases: { su: "Iran" },
            code: "IR",
            name: "Iran",
            currency: "IRR",
          },
          {
            name_translations: { en: "Tonga" },
            cases: { su: "Tonga" },
            code: "TO",
            name: "Tonga",
            currency: "TOP",
          },
          {
            name_translations: { en: "Belarus" },
            cases: { su: "Belarus" },
            code: "BY",
            name: "Belarus",
            currency: "BYN",
          },
          {
            name_translations: { en: "São Tomé and Príncipe" },
            cases: { su: "São Tomé and Príncipe" },
            code: "ST",
            name: "São Tomé and Príncipe",
            currency: "STD",
          },
          {
            name_translations: { en: "Åland Islands" },
            cases: { su: "Åland Islands" },
            code: "AX",
            name: "Åland Islands",
            currency: "EUR",
          },
          {
            name_translations: { en: "Serbia" },
            cases: { su: "Serbia" },
            code: "RS",
            name: "Serbia",
            currency: "RSD",
          },
          {
            name_translations: { en: "Nigeria" },
            cases: { su: "Nigeria" },
            code: "NG",
            name: "Nigeria",
            currency: "NGN",
          },
          {
            name_translations: { en: "Guam" },
            cases: { su: "Guam" },
            code: "GU",
            name: "Guam",
            currency: "USD",
          },
          {
            name_translations: { en: "Pitcairn Islands" },
            cases: { su: "Pitcairn Islands" },
            code: "PN",
            name: "Pitcairn Islands",
            currency: "NZD",
          },
          {
            name_translations: { en: "Poland" },
            cases: { su: "Poland" },
            code: "PL",
            name: "Poland",
            currency: "PLN",
          },
          {
            name_translations: { en: "Solomon Islands" },
            cases: { su: "Solomon Islands" },
            code: "SB",
            name: "Solomon Islands",
            currency: "SBD",
          },
          {
            name_translations: { en: "Australia" },
            cases: { su: "Australia" },
            code: "AU",
            name: "Australia",
            currency: "AUD",
          },
          {
            name_translations: { en: "Andorra" },
            cases: { su: "Andorra" },
            code: "AD",
            name: "Andorra",
            currency: "EUR",
          },
          {
            name_translations: { en: "Georgia" },
            cases: { su: "Georgia" },
            code: "GE",
            name: "Georgia",
            currency: "GEL",
          },
          {
            name_translations: {
              en: "South Georgia and the South Sandwich Islands",
            },
            cases: { su: "South Georgia and the South Sandwich Islands" },
            code: "GS",
            name: "South Georgia and the South Sandwich Islands",
            currency: "GBP",
          },
          {
            name_translations: { en: "El Salvador" },
            cases: { su: "El Salvador" },
            code: "SV",
            name: "El Salvador",
            currency: "USD",
          },
          {
            name_translations: { en: "Eritrea" },
            cases: { su: "Eritrea" },
            code: "ER",
            name: "Eritrea",
            currency: "ERN",
          },
          {
            name_translations: { en: "Norway" },
            cases: { su: "Norway" },
            code: "NO",
            name: "Norway",
            currency: "NOK",
          },
          {
            name_translations: { en: "Lebanon" },
            cases: { su: "Lebanon" },
            code: "LB",
            name: "Lebanon",
            currency: "LBP",
          },
          {
            name_translations: { en: "Sudan" },
            cases: { su: "Sudan" },
            code: "SD",
            name: "Sudan",
            currency: "SDG",
          },
          {
            name_translations: { en: "Netherlands" },
            cases: { su: "Netherlands" },
            code: "NL",
            name: "Netherlands",
            currency: "EUR",
          },
          {
            name_translations: { en: "Palau" },
            cases: { su: "Palau" },
            code: "PW",
            name: "Palau",
            currency: "USD",
          },
          {
            name_translations: { en: "Somalia" },
            cases: { su: "Somalia" },
            code: "SO",
            name: "Somalia",
            currency: "SOS",
          },
          {
            name_translations: { en: "Vanuatu" },
            cases: { su: "Vanuatu" },
            code: "VU",
            name: "Vanuatu",
            currency: "VUV",
          },
          {
            name_translations: { en: "Burkina Faso" },
            cases: { su: "Burkina Faso" },
            code: "BF",
            name: "Burkina Faso",
            currency: "XOF",
          },
          {
            name_translations: { en: "Uganda" },
            cases: { su: "Uganda" },
            code: "UG",
            name: "Uganda",
            currency: "UGX",
          },
          {
            name_translations: { en: "Guyana" },
            cases: { su: "Guyana" },
            code: "GY",
            name: "Guyana",
            currency: "GYD",
          },
          {
            name_translations: { en: "Senegal" },
            cases: { su: "Senegal" },
            code: "SN",
            name: "Senegal",
            currency: "XOF",
          },
          {
            name_translations: { en: "Kosovo" },
            cases: { su: "Kosovo" },
            code: "XK",
            name: "Kosovo",
            currency: "EUR",
          },
          {
            name_translations: { en: "Denmark" },
            cases: { su: "Denmark" },
            code: "DK",
            name: "Denmark",
            currency: "DKK",
          },
          {
            name_translations: { en: "Greenland" },
            cases: { su: "Greenland" },
            code: "GL",
            name: "Greenland",
            currency: "DKK",
          },
          {
            name_translations: { en: "Paraguay" },
            cases: { su: "Paraguay" },
            code: "PY",
            name: "Paraguay",
            currency: "PYG",
          },
          {
            name_translations: { en: "Papua New Guinea" },
            cases: { su: "Papua New Guinea" },
            code: "PG",
            name: "Papua New Guinea",
            currency: "PGK",
          },
          {
            name_translations: { en: "Uzbekistan" },
            cases: { su: "Uzbekistan" },
            code: "UZ",
            name: "Uzbekistan",
            currency: "UZS",
          },
          {
            name_translations: { en: "Libya" },
            cases: { su: "Libya" },
            code: "LY",
            name: "Libya",
            currency: "LYD",
          },
          {
            name_translations: { en: "Malaysia" },
            cases: { su: "Malaysia" },
            code: "MY",
            name: "Malaysia",
            currency: "MYR",
          },
          {
            name_translations: { en: "Japan" },
            cases: { su: "Japan" },
            code: "JP",
            name: "Japan",
            currency: "JPY",
          },
          {
            name_translations: { en: "Jersey" },
            cases: { su: "Jersey" },
            code: "JE",
            name: "Jersey",
            currency: "GBP",
          },
          {
            name_translations: { en: "Bulgaria" },
            cases: { su: "Bulgaria" },
            code: "BG",
            name: "Bulgaria",
            currency: "BGN",
          },
          {
            name_translations: { en: "Niger" },
            cases: { su: "Niger" },
            code: "NE",
            name: "Niger",
            currency: "XOF",
          },
          {
            name_translations: { en: "Venezuela" },
            cases: { su: "Venezuela" },
            code: "VE",
            name: "Venezuela",
            currency: "VEF",
          },
          {
            name_translations: { en: "Slovenia" },
            cases: { su: "Slovenia" },
            code: "SI",
            name: "Slovenia",
            currency: "EUR",
          },
          {
            name_translations: { en: "Aruba" },
            cases: { su: "Aruba" },
            code: "AW",
            name: "Aruba",
            currency: "AWG",
          },
          {
            name_translations: { en: "Togo" },
            cases: { su: "Togo" },
            code: "TG",
            name: "Togo",
            currency: "XOF",
          },
          {
            name_translations: { en: "Sweden" },
            cases: { su: "Sweden" },
            code: "SE",
            name: "Sweden",
            currency: "SEK",
          },
          {
            name_translations: { en: "Western Sahara" },
            cases: { su: "Western Sahara" },
            code: "EH",
            name: "Western Sahara",
            currency: "MAD",
          },
          {
            name_translations: { en: "Nepal" },
            cases: { su: "Nepal" },
            code: "NP",
            name: "Nepal",
            currency: "NPR",
          },
          {
            name_translations: { en: "Guadeloupe" },
            cases: { su: "Guadeloupe" },
            code: "GP",
            name: "Guadeloupe",
            currency: "EUR",
          },
          {
            name_translations: { en: "British Virgin Islands" },
            cases: { su: "British Virgin Islands" },
            code: "VG",
            name: "British Virgin Islands",
            currency: "USD",
          },
          {
            name_translations: { en: "Antigua and Barbuda" },
            cases: { su: "Antigua and Barbuda" },
            code: "AG",
            name: "Antigua and Barbuda",
            currency: "XCD",
          },
          {
            name_translations: { en: "South Korea" },
            cases: { su: "South Korea" },
            code: "KR",
            name: "South Korea",
            currency: "KRW",
          },
          {
            name_translations: { en: "Botswana" },
            cases: { su: "Botswana" },
            code: "BW",
            name: "Botswana",
            currency: "BWP",
          },
          {
            name_translations: { en: "British Indian Ocean Territory" },
            cases: { su: "British Indian Ocean Territory" },
            code: "IO",
            name: "British Indian Ocean Territory",
            currency: "USD",
          },
          {
            name_translations: { en: "Faroe Islands" },
            cases: { su: "Faroe Islands" },
            code: "FO",
            name: "Faroe Islands",
            currency: "DKK",
          },
          {
            name_translations: { en: "Honduras" },
            cases: { su: "Honduras" },
            code: "HN",
            name: "Honduras",
            currency: "HNL",
          },
          {
            name_translations: { en: "Angola" },
            cases: { su: "Angola" },
            code: "AO",
            name: "Angola",
            currency: "AOA",
          },
          {
            name_translations: { en: "Micronesia" },
            cases: { su: "Micronesia" },
            code: "FM",
            name: "Micronesia",
            currency: "USD",
          },
          {
            name_translations: { en: "Czech Republic" },
            cases: { su: "Czech Republic" },
            code: "CZ",
            name: "Czech Republic",
            currency: "CZK",
          },
          {
            name_translations: { en: "Guernsey" },
            cases: { su: "Guernsey" },
            code: "GG",
            name: "Guernsey",
            currency: "GBP",
          },
          {
            name_translations: { en: "Seychelles" },
            cases: { su: "Seychelles" },
            code: "SC",
            name: "Seychelles",
            currency: "SCR",
          },
          {
            name_translations: { en: "Ghana" },
            cases: { su: "Ghana" },
            code: "GH",
            name: "Ghana",
            currency: "GHS",
          },
          {
            name_translations: { en: "Haiti" },
            cases: { su: "Haiti" },
            code: "HT",
            name: "Haiti",
            currency: "HTG",
          },
          {
            name_translations: { en: "Austria" },
            cases: { su: "Austria" },
            code: "AT",
            name: "Austria",
            currency: "EUR",
          },
          {
            name_translations: { en: "Algeria" },
            cases: { su: "Algeria" },
            code: "DZ",
            name: "Algeria",
            currency: "DZD",
          },
          {
            name_translations: { en: "Anguilla" },
            cases: { su: "Anguilla" },
            code: "AI",
            name: "Anguilla",
            currency: "XCD",
          },
          {
            name_translations: { en: "Philippines" },
            cases: { su: "Philippines" },
            code: "PH",
            name: "Philippines",
            currency: "PHP",
          },
          {
            name_translations: { en: "Dominican Republic" },
            cases: { su: "Dominican Republic" },
            code: "DO",
            name: "Dominican Republic",
            currency: "DOP",
          },
          {
            name_translations: { en: "Indonesia" },
            cases: { su: "Indonesia" },
            code: "ID",
            name: "Indonesia",
            currency: "IDR",
          },
          {
            name_translations: { en: "Barbados" },
            cases: { su: "Barbados" },
            code: "BB",
            name: "Barbados",
            currency: "BBD",
          },
          {
            name_translations: { en: "Antarctica" },
            cases: { su: "Antarctica" },
            code: "AQ",
            name: "Antarctica",
            currency: "",
          },
          {
            name_translations: { en: "Jamaica" },
            cases: { su: "Jamaica" },
            code: "JM",
            name: "Jamaica",
            currency: "JMD",
          },
          {
            name_translations: { en: "Eswatini" },
            cases: { su: "Eswatini" },
            code: "SZ",
            name: "Eswatini",
            currency: "SZL",
          },
          {
            name_translations: { en: "Singapore" },
            cases: { su: "Singapore" },
            code: "SG",
            name: "Singapore",
            currency: "SGD",
          },
          {
            name_translations: { en: "Central African Republic" },
            cases: { su: "Central African Republic" },
            code: "CF",
            name: "Central African Republic",
            currency: "XAF",
          },
          {
            name_translations: { en: "Democratic Republic of the Congo" },
            cases: { su: "Democratic Republic of the Congo" },
            code: "CD",
            name: "Democratic Republic of the Congo",
            currency: "CDF",
          },
          {
            name_translations: { en: "Saudi Arabia" },
            cases: { su: "Saudi Arabia" },
            code: "SA",
            name: "Saudi Arabia",
            currency: "SAR",
          },
          {
            name_translations: { en: "Heard Island and McDonald Islands" },
            cases: { su: "Heard Island and McDonald Islands" },
            code: "HM",
            name: "Heard Island and McDonald Islands",
            currency: "AUD",
          },
          {
            name_translations: { en: "Liechtenstein" },
            cases: { su: "Liechtenstein" },
            code: "LI",
            name: "Liechtenstein",
            currency: "CHF",
          },
          {
            name_translations: { en: "Ireland" },
            cases: { su: "Ireland" },
            code: "IE",
            name: "Ireland",
            currency: "EUR",
          },
          {
            name_translations: { en: "Belgium" },
            cases: { su: "Belgium" },
            code: "BE",
            name: "Belgium",
            currency: "EUR",
          },
          {
            name_translations: { en: "Crimea" },
            cases: { su: "Crimea" },
            code: "KX",
            name: "Crimea",
            currency: "",
          },
          {
            name_translations: { en: "Costa Rica" },
            cases: { su: "Costa Rica" },
            code: "CR",
            name: "Costa Rica",
            currency: "CRC",
          },
          {
            name_translations: { en: "Finland" },
            cases: { su: "Finland" },
            code: "FI",
            name: "Finland",
            currency: "EUR",
          },
          {
            name_translations: { en: "Oman" },
            cases: { su: "Oman" },
            code: "OM",
            name: "Oman",
            currency: "OMR",
          },
          {
            name_translations: { en: "French Guiana" },
            cases: { su: "French Guiana" },
            code: "GF",
            name: "French Guiana",
            currency: "EUR",
          },
          {
            name_translations: { en: "Ivory Coast" },
            cases: { su: "Ivory Coast" },
            code: "CI",
            name: "Ivory Coast",
            currency: "XOF",
          },
          {
            name_translations: { en: "Estonia" },
            cases: { su: "Estonia" },
            code: "EE",
            name: "Estonia",
            currency: "EUR",
          },
          {
            name_translations: { en: "Niue" },
            cases: { su: "Niue" },
            code: "NU",
            name: "Niue",
            currency: "NZD",
          },
          {
            name_translations: { en: "Greece" },
            cases: { su: "Greece" },
            code: "GR",
            name: "Greece",
            currency: "EUR",
          },
          {
            name_translations: { en: "Vatican City" },
            cases: { su: "Vatican City" },
            code: "VA",
            name: "Vatican City",
            currency: "EUR",
          },
          {
            name_translations: { en: "Ukraine" },
            cases: { su: "Ukraine" },
            code: "UA",
            name: "Ukraine",
            currency: "UAH",
          },
          {
            name_translations: { en: "Armenia" },
            cases: { su: "Armenia" },
            code: "AM",
            name: "Armenia",
            currency: "AMD",
          },
          {
            name_translations: { en: "Gibraltar" },
            cases: { su: "Gibraltar" },
            code: "GI",
            name: "Gibraltar",
            currency: "GIP",
          },
          {
            name_translations: { en: "Bosnia and Herzegovina" },
            cases: { su: "Bosnia and Herzegovina" },
            code: "BA",
            name: "Bosnia and Herzegovina",
            currency: "BAM",
          },
          {
            name_translations: { en: "Republic of the Congo" },
            cases: { su: "Republic of the Congo" },
            code: "CG",
            name: "Republic of the Congo",
            currency: "XAF",
          },
          {
            name_translations: { en: "Gambia" },
            cases: { su: "Gambia" },
            code: "GM",
            name: "Gambia",
            currency: "GMD",
          },
          {
            name_translations: { en: "Hong Kong" },
            cases: { su: "Hong Kong" },
            code: "HK",
            name: "Hong Kong",
            currency: "HKD",
          },
          {
            name_translations: { en: "Croatia" },
            cases: { su: "Croatia" },
            code: "HR",
            name: "Croatia",
            currency: "HRK",
          },
          {
            name_translations: { en: "Saint Barthélemy" },
            cases: { su: "Saint Barthélemy" },
            code: "BL",
            name: "Saint Barthélemy",
            currency: "EUR",
          },
          {
            name_translations: { en: "Comoros" },
            cases: { su: "Comoros" },
            code: "KM",
            name: "Comoros",
            currency: "KMF",
          },
          {
            name_translations: { en: "Burundi" },
            cases: { su: "Burundi" },
            code: "BI",
            name: "Burundi",
            currency: "BIF",
          },
          {
            name_translations: { en: "Rwanda" },
            cases: { su: "Rwanda" },
            code: "RW",
            name: "Rwanda",
            currency: "RWF",
          },
          {
            name_translations: { en: "Egypt" },
            cases: { su: "Egypt" },
            code: "EG",
            name: "Egypt",
            currency: "EGP",
          },
          {
            name_translations: { en: "Belize" },
            cases: { su: "Belize" },
            code: "BZ",
            name: "Belize",
            currency: "BZD",
          },
          {
            name_translations: { en: "Cook Islands" },
            cases: { su: "Cook Islands" },
            code: "CK",
            name: "Cook Islands",
            currency: "NZD",
          },
          {
            name_translations: { en: "Bouvet Island" },
            cases: { su: "Bouvet Island" },
            code: "BV",
            name: "Bouvet Island",
            currency: "NOK",
          },
          {
            name_translations: { en: "Nicaragua" },
            cases: { su: "Nicaragua" },
            code: "NI",
            name: "Nicaragua",
            currency: "NIO",
          },
          {
            name_translations: { en: "Vietnam" },
            cases: { su: "Vietnam" },
            code: "VN",
            name: "Vietnam",
            currency: "VND",
          },
          {
            name_translations: { en: "Saint Pierre and Miquelon" },
            cases: { su: "Saint Pierre and Miquelon" },
            code: "PM",
            name: "Saint Pierre and Miquelon",
            currency: "EUR",
          },
          {
            name_translations: { en: "North Korea" },
            cases: { su: "North Korea" },
            code: "KP",
            name: "North Korea",
            currency: "KPW",
          },
          {
            name_translations: { en: "Kyrgyzstan" },
            cases: { su: "Kyrgyzstan" },
            code: "KG",
            name: "Kyrgyzstan",
            currency: "KGS",
          },
          {
            name_translations: {
              en: "Saint Helena, Ascension and Tristan da Cunha",
            },
            cases: { su: "Saint Helena, Ascension and Tristan da Cunha" },
            code: "SH",
            name: "Saint Helena, Ascension and Tristan da Cunha",
            currency: "SHP",
          },
          {
            name_translations: { en: "Brazil" },
            cases: { su: "Brazil" },
            code: "BR",
            name: "Brazil",
            currency: "BRL",
          },
          {
            name_translations: { en: "Guinea-Bissau" },
            cases: { su: "Guinea-Bissau" },
            code: "GW",
            name: "Guinea-Bissau",
            currency: "XOF",
          },
          {
            name_translations: { en: "Grenada" },
            cases: { su: "Grenada" },
            code: "GD",
            name: "Grenada",
            currency: "XCD",
          },
          {
            name_translations: { en: "Palestine" },
            cases: { su: "Palestine" },
            code: "PS",
            name: "Palestine",
            currency: "ILS",
          },
          {
            name_translations: { en: "Morocco" },
            cases: { su: "Morocco" },
            code: "MA",
            name: "Morocco",
            currency: "MAD",
          },
          {
            name_translations: { en: "Christmas Island" },
            cases: { su: "Christmas Island" },
            code: "CX",
            name: "Christmas Island",
            currency: "AUD",
          },
          {
            name_translations: { en: "Albania" },
            cases: { su: "Albania" },
            code: "AL",
            name: "Albania",
            currency: "ALL",
          },
          {
            name_translations: { en: "Malawi" },
            cases: { su: "Malawi" },
            code: "MW",
            name: "Malawi",
            currency: "MWK",
          },
          {
            name_translations: { en: "South Africa" },
            cases: { su: "South Africa" },
            code: "ZA",
            name: "South Africa",
            currency: "ZAR",
          },
          {
            name_translations: { en: "Gabon" },
            cases: { su: "Gabon" },
            code: "GA",
            name: "Gabon",
            currency: "XAF",
          },
          {
            name_translations: { en: "Portugal" },
            cases: { su: "Portugal" },
            code: "PT",
            name: "Portugal",
            currency: "EUR",
          },
          {
            name_translations: { en: "Fiji" },
            cases: { su: "Fiji" },
            code: "FJ",
            name: "Fiji",
            currency: "FJD",
          },
          {
            name_translations: { en: "Nauru" },
            cases: { su: "Nauru" },
            code: "NR",
            name: "Nauru",
            currency: "AUD",
          },
          {
            name_translations: { en: "Ecuador" },
            cases: { su: "Ecuador" },
            code: "EC",
            name: "Ecuador",
            currency: "USD",
          },
          {
            name_translations: { en: "Kenya" },
            cases: { su: "Kenya" },
            code: "KE",
            name: "Kenya",
            currency: "KES",
          },
          {
            name_translations: { en: "Mauritania" },
            cases: { su: "Mauritania" },
            code: "MR",
            name: "Mauritania",
            currency: "MRO",
          },
          {
            name_translations: { en: "Cambodia" },
            cases: { su: "Cambodia" },
            code: "KH",
            name: "Cambodia",
            currency: "KHR",
          },
          {
            name_translations: { en: "Benin" },
            cases: { su: "Benin" },
            code: "BJ",
            name: "Benin",
            currency: "XOF",
          },
          {
            name_translations: { en: "Qatar" },
            cases: { su: "Qatar" },
            code: "QA",
            name: "Qatar",
            currency: "QAR",
          },
          {
            name_translations: { en: "Malta" },
            cases: { su: "Malta" },
            code: "MT",
            name: "Malta",
            currency: "EUR",
          },
          {
            name_translations: { en: "France" },
            cases: { su: "France" },
            code: "FR",
            name: "France",
            currency: "EUR",
          },
          {
            name_translations: { en: "Argentina" },
            cases: { su: "Argentina" },
            code: "AR",
            name: "Argentina",
            currency: "ARS",
          },
          {
            name_translations: { en: "Brunei" },
            cases: { su: "Brunei" },
            code: "BN",
            name: "Brunei",
            currency: "BND",
          },
          {
            name_translations: { en: "Saint Martin" },
            cases: { su: "Saint Martin" },
            code: "MF",
            name: "Saint Martin",
            currency: "EUR",
          },
          {
            name_translations: { en: "Liberia" },
            cases: { su: "Liberia" },
            code: "LR",
            name: "Liberia",
            currency: "LRD",
          },
          {
            name_translations: { en: "Germany" },
            cases: { su: "Germany" },
            code: "DE",
            name: "Germany",
            currency: "EUR",
          },
          {
            name_translations: { en: "Cameroon" },
            cases: { su: "Cameroon" },
            code: "CM",
            name: "Cameroon",
            currency: "XAF",
          },
          {
            name_translations: { en: "Tuvalu" },
            cases: { su: "Tuvalu" },
            code: "TV",
            name: "Tuvalu",
            currency: "AUD",
          },
          {
            name_translations: { en: "Romania" },
            cases: { su: "Romania" },
            code: "RO",
            name: "Romania",
            currency: "RON",
          },
          {
            name_translations: { en: "Ethiopia" },
            cases: { su: "Ethiopia" },
            code: "ET",
            name: "Ethiopia",
            currency: "ETB",
          },
          {
            name_translations: { en: "New Zealand" },
            cases: { su: "New Zealand" },
            code: "NZ",
            name: "New Zealand",
            currency: "NZD",
          },
          {
            name_translations: { en: "American Samoa" },
            cases: { su: "American Samoa" },
            code: "AS",
            name: "American Samoa",
            currency: "USD",
          },
          {
            name_translations: { en: "East Timor" },
            cases: { su: "East Timor" },
            code: "TL",
            name: "East Timor",
            currency: "USD",
          },
          {
            name_translations: { en: "United Arab Emirates" },
            cases: { su: "United Arab Emirates" },
            code: "AE",
            name: "United Arab Emirates",
            currency: "AED",
          },
          {
            name_translations: { en: "Tanzania" },
            cases: { su: "Tanzania" },
            code: "TZ",
            name: "Tanzania",
            currency: "TZS",
          },
          {
            name_translations: { en: "Turkey" },
            cases: { su: "Turkey" },
            code: "TR",
            name: "Turkey",
            currency: "TRY",
          },
          {
            name_translations: { en: "Zambia" },
            cases: { su: "Zambia" },
            code: "ZM",
            name: "Zambia",
            currency: "ZMK",
          },
          {
            name_translations: { en: "Moldova" },
            cases: { su: "Moldova" },
            code: "MD",
            name: "Moldova",
            currency: "MDL",
          },
          {
            name_translations: { en: "Syria" },
            cases: { su: "Syria" },
            code: "SY",
            name: "Syria",
            currency: "SYP",
          },
          {
            name_translations: { en: "Israel" },
            cases: { su: "Israel" },
            code: "IL",
            name: "Israel",
            currency: "ILS",
          },
          {
            name_translations: { en: "Afghanistan" },
            cases: { su: "Afghanistan" },
            code: "AF",
            name: "Afghanistan",
            currency: "AFN",
          },
          {
            name_translations: { en: "Turkmenistan" },
            cases: { su: "Turkmenistan" },
            code: "TM",
            name: "Turkmenistan",
            currency: "TMT",
          },
          {
            name_translations: { en: "Djibouti" },
            cases: { su: "Djibouti" },
            code: "DJ",
            name: "Djibouti",
            currency: "DJF",
          },
          {
            name_translations: { en: "Marshall Islands" },
            cases: { su: "Marshall Islands" },
            code: "MH",
            name: "Marshall Islands",
            currency: "USD",
          },
          {
            name_translations: { en: "North Macedonia" },
            cases: { su: "North Macedonia" },
            code: "MK",
            name: "North Macedonia",
            currency: "MKD",
          },
          {
            name_translations: { en: "India" },
            cases: { su: "India" },
            code: "IN",
            name: "India",
            currency: "INR",
          },
          {
            name_translations: { en: "Tunisia" },
            cases: { su: "Tunisia" },
            code: "TN",
            name: "Tunisia",
            currency: "TND",
          },
          {
            name_translations: { en: "Mauritius" },
            cases: { su: "Mauritius" },
            code: "MU",
            name: "Mauritius",
            currency: "MUR",
          },
          {
            name_translations: { en: "Cape Verde" },
            cases: { su: "Cape Verde" },
            code: "CV",
            name: "Cape Verde",
            currency: "CVE",
          },
          {
            name_translations: { en: "Taiwan" },
            cases: { su: "Taiwan" },
            code: "TW",
            name: "Taiwan",
            currency: "TWD",
          },
          {
            name_translations: { en: "Thailand" },
            cases: { su: "Thailand" },
            code: "TH",
            name: "Thailand",
            currency: "THB",
          },
          {
            name_translations: { en: "Kuwait" },
            cases: { su: "Kuwait" },
            code: "KW",
            name: "Kuwait",
            currency: "KWD",
          },
          {
            name_translations: { en: "Equatorial Guinea" },
            cases: { su: "Equatorial Guinea" },
            code: "GQ",
            name: "Equatorial Guinea",
            currency: "XAF",
          },
          {
            name_translations: { en: "Spain" },
            cases: { su: "Spain" },
            code: "ES",
            name: "Spain",
            currency: "EUR",
          },
          {
            name_translations: { en: "Guatemala" },
            cases: { su: "Guatemala" },
            code: "GT",
            name: "Guatemala",
            currency: "GTQ",
          },
          {
            name_translations: { en: "China" },
            cases: { su: "China" },
            code: "CN",
            name: "China",
            currency: "CNY",
          },
          {
            name_translations: { en: "Panama" },
            cases: { su: "Panama" },
            code: "PA",
            name: "Panama",
            currency: "PAB",
          },
          {
            name_translations: { en: "U.S. Virgin Islands" },
            cases: { su: "U.S. Virgin Islands" },
            code: "VI",
            name: "U.S. Virgin Islands",
            currency: "USD",
          },
          {
            name_translations: { en: "Yemen" },
            cases: { su: "Yemen" },
            code: "YE",
            name: "Yemen",
            currency: "YER",
          },
          {
            name_translations: { en: "Canada" },
            cases: { su: "Canada" },
            code: "CA",
            name: "Canada",
            currency: "CAD",
          },
          {
            name_translations: { en: "Cayman Islands" },
            cases: { su: "Cayman Islands" },
            code: "KY",
            name: "Cayman Islands",
            currency: "KYD",
          },
          {
            name_translations: { en: "Martinique" },
            cases: { su: "Martinique" },
            code: "MQ",
            name: "Martinique",
            currency: "EUR",
          },
          {
            name_translations: { en: "Mexico" },
            cases: { su: "Mexico" },
            code: "MX",
            name: "Mexico",
            currency: "MXN",
          },
          {
            name_translations: { en: "Bhutan" },
            cases: { su: "Bhutan" },
            code: "BT",
            name: "Bhutan",
            currency: "BTN",
          },
          {
            name_translations: { en: "Saint Lucia" },
            cases: { su: "Saint Lucia" },
            code: "LC",
            name: "Saint Lucia",
            currency: "XCD",
          },
          {
            name_translations: { en: "Norfolk Island" },
            cases: { su: "Norfolk Island" },
            code: "NF",
            name: "Norfolk Island",
            currency: "AUD",
          },
          {
            name_translations: { en: "Lithuania" },
            cases: { su: "Lithuania" },
            code: "LT",
            name: "Lithuania",
            currency: "EUR",
          },
          {
            name_translations: { en: "Isle of Man" },
            cases: { su: "Isle of Man" },
            code: "IM",
            name: "Isle of Man",
            currency: "GBP",
          },
          {
            name_translations: { en: "Peru" },
            cases: { su: "Peru" },
            code: "PE",
            name: "Peru",
            currency: "PEN",
          },
          {
            name_translations: { en: "Tajikistan" },
            cases: { su: "Tajikistan" },
            code: "TJ",
            name: "Tajikistan",
            currency: "TJS",
          },
          {
            name_translations: { en: "Northern Mariana Islands" },
            cases: { su: "Northern Mariana Islands" },
            code: "MP",
            name: "Northern Mariana Islands",
            currency: "USD",
          },
          {
            name_translations: { en: "South Sudan" },
            cases: { su: "South Sudan" },
            code: "SS",
            name: "South Sudan",
            currency: "",
          },
          {
            name_translations: { en: "Mayotte" },
            cases: { su: "Mayotte" },
            code: "YT",
            name: "Mayotte",
            currency: "EUR",
          },
          {
            name_translations: { en: "Azerbaijan" },
            cases: { su: "Azerbaijan" },
            code: "AZ",
            name: "Azerbaijan",
            currency: "AZN",
          },
          {
            name_translations: { en: "Luxembourg" },
            cases: { su: "Luxembourg" },
            code: "LU",
            name: "Luxembourg",
            currency: "EUR",
          },
          {
            name_translations: { en: "Uruguay" },
            cases: { su: "Uruguay" },
            code: "UY",
            name: "Uruguay",
            currency: "UYU",
          },
          {
            name_translations: { en: "Jordan" },
            cases: { su: "Jordan" },
            code: "JO",
            name: "Jordan",
            currency: "JOD",
          },
          {
            name_translations: { en: "Caribbean Netherlands" },
            cases: { su: "Caribbean Netherlands" },
            code: "BQ",
            name: "Caribbean Netherlands",
            currency: "USD",
          },
          {
            name_translations: { en: "Iceland" },
            cases: { su: "Iceland" },
            code: "IS",
            name: "Iceland",
            currency: "ISK",
          },
          {
            name_translations: { en: "Italy" },
            cases: { su: "Italy" },
            code: "IT",
            name: "Italy",
            currency: "EUR",
          },
          {
            name_translations: { en: "Trinidad and Tobago" },
            cases: { su: "Trinidad and Tobago" },
            code: "TT",
            name: "Trinidad and Tobago",
            currency: "TTD",
          },
          {
            name_translations: { en: "Sierra Leone" },
            cases: { su: "Sierra Leone" },
            code: "SL",
            name: "Sierra Leone",
            currency: "SLL",
          },
          {
            name_translations: { en: "Lesotho" },
            cases: { su: "Lesotho" },
            code: "LS",
            name: "Lesotho",
            currency: "LSL",
          },
          {
            name_translations: { en: "Cocos (Keeling) Islands" },
            cases: { su: "Cocos (Keeling) Islands" },
            code: "CC",
            name: "Cocos (Keeling) Islands",
            currency: "AUD",
          },
          {
            name_translations: { en: "Chile" },
            cases: { su: "Chile" },
            code: "CL",
            name: "Chile",
            currency: "CLP",
          },
          {
            name_translations: { en: "Cuba" },
            cases: { su: "Cuba" },
            code: "CU",
            name: "Cuba",
            currency: "CUP",
          },
          {
            name_translations: { en: "Kazakhstan" },
            cases: { su: "Kazakhstan" },
            code: "KZ",
            name: "Kazakhstan",
            currency: "KZT",
          },
          {
            name_translations: { en: "Northern Cyprus" },
            cases: { su: "Northern Cyprus" },
            code: "NY",
            name: "Northern Cyprus",
            currency: "TRY",
          },
          {
            name_translations: { en: "Réunion" },
            cases: { su: "Réunion" },
            code: "RE",
            name: "Réunion",
            currency: "EUR",
          },
          {
            name_translations: { en: "Bahamas" },
            cases: { su: "Bahamas" },
            code: "BS",
            name: "Bahamas",
            currency: "BSD",
          },
          {
            name_translations: { en: "Mongolia" },
            cases: { su: "Mongolia" },
            code: "MN",
            name: "Mongolia",
            currency: "MNT",
          },
          {
            name_translations: { en: "Kiribati" },
            cases: { su: "Kiribati" },
            code: "KI",
            name: "Kiribati",
            currency: "AUD",
          },
          {
            name_translations: { en: "United States" },
            cases: { su: "United States" },
            code: "US",
            name: "United States",
            currency: "USD",
          },
          {
            name_translations: { en: "Saint Vincent and the Grenadines" },
            cases: { su: "Saint Vincent and the Grenadines" },
            code: "VC",
            name: "Saint Vincent and the Grenadines",
            currency: "XCD",
          },
          {
            name_translations: { en: "Switzerland" },
            cases: { su: "Switzerland" },
            code: "CH",
            name: "Switzerland",
            currency: "CHF",
          },
          {
            name_translations: { en: "Suriname" },
            cases: { su: "Suriname" },
            code: "SR",
            name: "Suriname",
            currency: "SRD",
          },
          {
            name_translations: { en: "Samoa" },
            cases: { su: "Samoa" },
            code: "WS",
            name: "Samoa",
            currency: "WST",
          },
          {
            name_translations: { en: "Bangladesh" },
            cases: { su: "Bangladesh" },
            code: "BD",
            name: "Bangladesh",
            currency: "BDT",
          },
          {
            name_translations: { en: "Mali" },
            cases: { su: "Mali" },
            code: "ML",
            name: "Mali",
            currency: "XOF",
          },
          {
            name_translations: { en: "Russia" },
            cases: { su: "Russia" },
            code: "RU",
            name: "Russia",
            currency: "RUB",
          },
          {
            name_translations: { en: "Maldives" },
            cases: { su: "Maldives" },
            code: "MV",
            name: "Maldives",
            currency: "MVR",
          },
          {
            name_translations: { en: "Bermuda" },
            cases: { su: "Bermuda" },
            code: "BM",
            name: "Bermuda",
            currency: "BMD",
          },
        ],
        cardData: [],
        filteredData: [],
        singleCityes: [],
        flightTicket: [],
        depertTime: "",
        returnTime: "",
        currentCurrencyCode: catp_fragments.currentCurrency,
        originLocation: catp_fragments.originLocation,
        originDefaultCode: catp_fragments.originLocationIatacode,
        redirectLink: catp_fragments.redirectLink,

        uniqueCurrencies: [],
        selectedCurrency: null,
      };
    },
    watch: {
      deparedDate(value) {
        if (value) {
          const depDate = new Date(value);
          const month = (depDate.getMonth() + 1).toString().padStart(2, "0");
          const day = depDate.getDate().toString().padStart(2, "0");
          this.formatedDeparedDate = `${depDate.getFullYear()}-${month}-${day}`;
        }
      },
      returnDate(value) {
        if (value) {
          const returnDate = new Date(value);
          const month = (returnDate.getMonth() + 1).toString().padStart(2, "0");
          const day = returnDate.getDate().toString().padStart(2, "0");
          this.formatedReturnDate = `${returnDate.getFullYear()}-${month}-${day}`;
        }
      }
    },
    computed: {
      
      filteredCurrency() {
        if (!this.selectedCurrency) {
          return this.uniqueCurrencies;
        }

        const searchTerm = this.selectedCurrency.toLowerCase();
        return this.uniqueCurrencies.filter((cur) =>
          cur.toLowerCase().includes(searchTerm)
        );
      },
      
    },
    methods: {
      handleSortChange() {
      // Get the selected option value
      const selectedOption = document.getElementById('short').value;

      // Call the appropriate sorting function based on the selected option
      if (selectedOption === 'lowToHigh') {
        this.sortArrayLowToHigh();
      } else if (selectedOption === 'highToLow') {
        this.sortArrayHighToLow();
      }
    },
    sortArrayLowToHigh() {
      this.filteredData.sort((a, b) => {
        const valueA = parseFloat(a.value.replace(',', ''));
        const valueB = parseFloat(b.value.replace(',', ''));
        return valueA - valueB;
      });
    },
    sortArrayHighToLow() {
      this.filteredData.sort((a, b) => {
        const valueA = parseFloat(a.value.replace(',', ''));
        const valueB = parseFloat(b.value.replace(',', ''));
        return valueB - valueA;
      });
    
  },
      async searchPlaces() {
        try {
          const response = await axios.get(
            "https://autocomplete.travelpayouts.com/places2",
            {
              params: {
                locale: "en",
                types: ["city"],
                term:
                  this.selectedoriginCity !== ""
                    ? this.selectedoriginCity
                    : this.originLocation,
              },
            }
          );

          this.places = response.data;
        } catch (error) {
          console.error("Error:", error);
        }
      },
      async searchFromPlaces() {
        try {
          const response = await axios.get(
            "https://autocomplete.travelpayouts.com/places2",
            {
              params: {
                locale: "en",
                types: ["city"],
                term:
                  this.selectedCity !== ""
                    ? this.selectedCity
                    : this.originLocation,
              },
            }
          );

          this.places = response.data;
        } catch (error) {
          console.error("Error:", error);
        }
      },
      async searchToPlaces() {
        try {
          const response = await axios.get(
            "https://autocomplete.travelpayouts.com/places2",
            {
              params: {
                locale: "en",
                types: ["city"],
                term:
                  this.selectedToCity !== ""
                    ? this.selectedToCity
                    : this.originLocation,
              },
            }
          );

          this.places = response.data;
        } catch (error) {
          console.error("Error:", error);
        }
      },

      selectCurrency(currency) {
        this.selectedCurrency = currency;
      },

      extractUniqueCurrencies() {
        this.uniqueCurrencies = [
          ...new Set(
            this.countriesCodesnames.map((country) => country.currency)
          ),
        ];
      },
      backTicket() {
        this.currentPage = "flightTicket";
      },
      backPreviousCity() {
        this.currentPage = "singlecity";
        this.isTicket = true;
      },
      backPrevious() {
        this.currentPage = "archive";
      },
      showoriginDropdown() {
        this.showOriginOptions = true;
        this.showCurrencyOptions = false;
        this.showOptions = false;
        this.showToOptions = false;
      },
      showCurDropdown() {
        this.showCurOptions = true;
        this.showOriginOptions = false;
        this.showOptions = false;
        this.showToOptions = false;
        this.showCurrencyOptions = false;
      },
      showCurrencyDropdown() {
        this.showCurrencyOptions = true;
        this.showOriginOptions = false;
        this.showOptions = false;
        this.showToOptions = false;
      },
      async selectOriginCity(city) {
        this.selectedoriginCity = city.name;
        return new Promise((resolve, reject) => {
          const self = this;
          self.caLoading = true;
          self.showOriginOptions = false;

          jQuery.ajax({
            type: "get",
            url: catp_fragments.ajaxurl,
            data: {
              action: "get_all_price",
              originCode: city.code,
            },
            dataType: "json",
            success: function (response) {
              self.caLoading = false;

              if (self.allCities.length > 0 && response.data.length > 0) {
                const mergedData = response.data.map((city) => {
                  const matchingResponseCity = self.allCities.find(
                    (responseCity) =>
                      responseCity.city_code === city.destination
                  );

                  const countryName = self.countriesCodesnames.find(
                    (cc) => cc.code === matchingResponseCity.country_code
                  );

                  if (countryName) {
                    matchingResponseCity.countryName = countryName.name;
                  }

                  // If there's a match, merge properties
                  if (matchingResponseCity) {
                    return { ...city, ...matchingResponseCity };
                  }

                  return city;
                });

                self.cardData = mergedData.sort((a, b) => {
                  return parseFloat(a.value) - parseFloat(b.value);
                });

                const sortedData = mergedData.sort((a, b) => {
                  if (a.country_code !== b.country_code) {
                    return a.country_code.localeCompare(b.country_code);
                  }
                  return parseFloat(a.value) - parseFloat(b.value);
                });

                const filteredData = [];
                sortedData.forEach((data) => {
                  if (
                    !filteredData.some(
                      (c) => c.country_code === data.country_code
                    )
                  ) {
                    filteredData.push(data);
                  }
                });

                const sortedCountries = filteredData.sort((a, b) => {
                  return parseFloat(a.value) - parseFloat(b.value);
                });

                console.log(sortedCountries);

                self.filteredData = sortedCountries;
                console.log(self.filteredData);
                
                self.caLoading = false;

                // Resolve the promise with any relevant data
                resolve(true);
              }
            },
            error: (error) => {
              self.caLoading = false;
              reject(error);
            },
          });
        });
      },
      showDropdown() {
        this.showOptions = true;
        this.showToOptions = false;
        this.showCurrencyOptions = false;
        this.showOriginOptions = false;
      },
      showToDropdown() {
        this.showOptions = false;
        this.showToOptions = true;
        this.showCurrencyOptions = false;
        this.showOriginOptions = false;
      },
      selectCity(city) {
        this.selectedCity = city.name;
        this.searchTerm=city.name;
        this.selectedCityCode = city.code;
        this.showOptions = false;
        this.showCurrencyOptions = false;
        this.showOriginOptions = false;
      },
      selectToCity(city) {
        this.selectedToCity = city.name;
        this.selectedToCityCode = city.code;
        this.showToOptions = false;
        this.showCurrencyOptions = false;
        this.showOriginOptions = false;
      },
      getFormattedTime(minutes) {
        if (isNaN(minutes) || minutes < 0) {
          return "Invalid input";
        }

        const hours = Math.floor(minutes / 60);
        const remainingMinutes = minutes % 60;

        const formattedHours = String(hours).padStart(2, "0");
        const formattedMinutes = String(remainingMinutes).padStart(2, "0");

        return `${formattedHours}:${formattedMinutes}`;
      },
      // ticket area
      handleOneWayTicket() {
        const self = this;
        self.flightTicket = [];
        self.currentPage = "flightTicket";
        self.ticket = "single";
        self.caLoading = true;

        jQuery.ajax({
          type: "get",
          url: catp_fragments.ajaxurl,
          data: {
            action: "get_specific_ticket",
            apiParam: {
              origin: self.selectedCityCode,
              destination: self.selectedToCityCode,
              depure: self.formattedDepartureDate,
              currency: self.selectedCurrency,
            },
          },
          dataType: "json",
          success: function (response) {
            self.caLoading = false;
            self.currentPage = "flightTicket";
            self.ticket = "single";
            self.currentCurrencyCode = self.selectedCurrency;
            if (response.data.length > 0) {
              self.flightTicket = response.data.map((d) => {
                const departureDate = new Date(d.departure_at);
                // Use a separate date object for return_at

                d.departure_at = `${departureDate.getHours()}:${departureDate.getMinutes()}`;
                // Use returnDate for return_at
                departureDate.setMinutes(
                  departureDate.getMinutes() + d.duration_to
                );
                d.duration_time = `${departureDate.getHours()}:${departureDate.getMinutes()}`;

                return d;
              });
            }
          },
          error: function (error) {},
        });
      },
      handleSpecificTicket() {
        const self = this;
        self.currentCurrencyCode = self.selectedCurrency;
        self.flightTicket = [];
        self.currentPage = "flightTicket";
        self.ticket = "double";
        self.caLoading = true;

        jQuery.ajax({
          type: "get",
          url: catp_fragments.ajaxurl,
          data: {
            action: "get_specific_ticket",
            apiParam: {
              origin: self.selectedCityCode,
              destination: self.selectedToCityCode,
              depure: self.formattedDepartureDate, // Corrected typo in variable name
              return: self.formattedReturnDate, // Corrected typo in variable name
              currency: self.selectedCurrency,
              oneway: false,
            },
          },
          dataType: "json",
          success: function (response) {
            self.caLoading = false;
            self.currentPage = "flightTicket";
            self.ticket = "double";
            self.currentCurrencyCode = self.selectedCurrency;

            if (response.data.length > 0) {
              self.flightTicket = response.data.map((d) => {
                const departureDate = new Date(d.departure_at);
                const returnDate = new Date(d.return_at); // Use a separate date object for return_at

                d.departure_at = `${departureDate.getHours()}:${departureDate.getMinutes()}`;
                d.return_at = `${returnDate.getHours()}:${returnDate.getMinutes()}`; // Use returnDate for return_at

                departureDate.setMinutes(
                  departureDate.getMinutes() + d.duration_to
                );
                returnDate.setMinutes(
                  returnDate.getMinutes() + d.duration_back
                );

                d.duration_time = `${departureDate.getHours()}:${departureDate.getMinutes()}`;
                d.duration_back = `${returnDate.getHours()}:${returnDate.getMinutes()}`;

                return d;
              });


            }
            
          },
          error: function (error) {},
        });
      },

      async searchInsideTicket(destinc) {
        const self = this;
        self.caLoading = true;
        jQuery.ajax({
          type: "get",
          url: catp_fragments.ajaxurl,
          data: {
            action: "get_flight_ticket_from_city",
            singleTicketData: destinc,
          },
          dataType: "json",
          success: function (response) {
            self.caLoading = false;
            self.currentPage = "flightTicket";
            self.ticket = "double";

            if (response.data.length > 0) {
              self.flightTicket = response.data.map((d) => {
                const departureDate = new Date(d.departure_at);
                const returnDate = new Date(d.return_at); // Use a separate date object for return_at

                d.departure_at = `${departureDate.getHours()}:${departureDate.getMinutes()}`;
                d.return_at = `${returnDate.getHours()}:${returnDate.getMinutes()}`; // Use returnDate for return_at

                departureDate.setMinutes(
                  departureDate.getMinutes() + d.duration_to
                );
                returnDate.setMinutes(
                  returnDate.getMinutes() + d.duration_back
                );

                d.duration_time = `${departureDate.getHours()}:${departureDate.getMinutes()}`;
                d.duration_back = `${returnDate.getHours()}:${returnDate.getMinutes()}`;

                return d;
              });
            }
          },
          error: function (error) {},
        });
      },

      cityGate(destination) {
        this.caLoading = true;
        setTimeout(() => {
          const citiesWithDestination = this.cardData.filter(
            (country) => country.country_code === destination
          );

          this.singleCityes = citiesWithDestination;
          this.currentPage = "singlecity";
          this.caLoading = false;
        }, 1000);
      },
      //

      async allCountries() {
        return new Promise((resolve, reject) => {
          jQuery.ajax({
            type: "get",
            url: catp_fragments.ajaxurl,
            data: {
              action: "get_all_countries",
            },
            dataType: "json",
            success: function (response) {
              resolve(response);
            },
            error: (error) => {
              reject(error);
            },
          });
        });
      },
      async allPrices() {
        return new Promise((resolve, reject) => {
          jQuery.ajax({
            type: "get",
            url: catp_fragments.ajaxurl,
            data: {
              action: "get_all_price",
            },
            dataType: "json",
            success: function (response) {
              resolve(response);
            },
            error: (error) => {
              reject(error);
            },
          });
        });
      },
      async allCityNamesHandle() {
        const self = this;
        return new Promise((resolve, reject) => {
          jQuery.ajax({
            type: "get",
            url: catp_fragments.ajaxurl,
            data: {
              action: "get_allCityName",
            },
            dataType: "json",
            success: function (response) {
              self.caLoading = false;
              resolve(response);
            },
            error: (error) => {
              reject(error);
            },
          });
        });
      },
    },
    async created() {
      const self = this;
      console.log(this.filteredData);
      // await self.getPopularLocations().then((response) => {
      //   self.popularLocations = response.data;
      //   //  console.log(self.popularLocations);
      // });

      // await self.allCountries().then(response => {
      //   self.caLoading  = false;
      //   self.allCountriesName=response.data;
      // });

      await self.allPrices().then((response) => {
        self.allCityPrices = response.data;
      });

      await self.allCityNamesHandle().then((response) => {
        if (self.allCityPrices.length > 0 && response.data.length > 0) {
          const mergedData = self.allCityPrices.map((city) => {
            const matchingResponseCity = response.data.find(
              (responseCity) => responseCity.city_code === city.destination
            );

            const countryName = self.countriesCodesnames.find(
              (cc) => cc.code === matchingResponseCity.country_code
            );
            if (countryName) {
              matchingResponseCity.countryName = countryName.name;
            }

            // If there's a match, merge properties
            if (matchingResponseCity) {
              return { ...city, ...matchingResponseCity };
            }

            return city;
          });

          self.cardData = mergedData.sort((a, b) => {
            return parseFloat(a.value) - parseFloat(b.value);
          });

          const sortedData = mergedData.sort((a, b) => {
            if (a.country_code !== b.country_code) {
              return a.country_code.localeCompare(b.country_code);
            }
            return parseFloat(a.value) - parseFloat(b.value);
          });

          const filteredData = [];
          sortedData.forEach((data) => {
            if (
              !filteredData.some((c) => c.country_code === data.country_code)
            ) {
              filteredData.push(data);
            }
          });

          const sortedCountries = filteredData.sort((a, b) => {
            return parseFloat(a.value) - parseFloat(b.value);
          });

          self.allCities = response.data;

          self.filteredData = sortedCountries;
          console.log(self.filteredData);
        }
      });
    },
    async mounted() {

      
      document.addEventListener("click", (event) => {
        if (
          event.target.className !== "custom-select-container" &&
          event.target.className !== "custom-select-input-1" &&
          event.target.className !== "custom-select-input"
        ) {
          this.showCurrencyOptions = false;
          this.showOriginOptions = false;
          this.showOptions = false;
          this.showToOptions = false;
          this.showCurOptions = false;
        }
      });

      this.extractUniqueCurrencies();
    },
  }).mount("#caTravelFlight");
});
