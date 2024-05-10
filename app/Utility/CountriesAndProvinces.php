<?php

namespace App\Utility;

/**
 * Class CountriesAndProvinces
 * @package App\Utility;
 */
class CountriesAndProvinces
{

    private $provinces = [
        "VI" => [
            "name" => "Álava",
            "pc" => "01",
            "code" => "VI"
        ],
        "AB" => [
            "name" => "Albacete",
            "pc" => "02",
            "code" => "AB"
        ],
        "A" => [
            "name" => "Alicante",
            "pc" => "03",
            "code" => "A"
        ],
        "AL" => [
            "name" => "Almería",
            "pc" => "04",
            "code" => "AL"
        ],
        "AV" => [
            "name" => "Ávila",
            "pc" => "05",
            "code" => "AV"
        ],
        "BA" => [
            "name" => "Badajoz",
            "pc" => "06",
            "code" => "BA"
        ],
        "PM" => [
            "name" => "Baleares",
            "pc" => "07",
            "code" => "PM"
        ],
        "B" => [
            "name" => "Barcelona",
            "pc" => "08",
            "code" => "B"
        ],
        "BU" => [
            "name" => "Burgos",
            "pc" => "09",
            "code" => "BU"
        ],
        "CC" => [
            "name" => "Cáceres",
            "pc" => "10",
            "code" => "CC"
        ],
        "CA" => [
            "name" => "Cádiz",
            "pc" => "11",
            "code" => "CA"
        ],
        "CS" => [
            "name" => "Castellón",
            "pc" => "12",
            "code" => "CS"
        ],
        "CR" => [
            "name" => "Ciudad Real",
            "pc" => "13",
            "code" => "CR"
        ],
        "CO" => [
            "name" => "Córdoba",
            "pc" => "14",
            "code" => "CO"
        ],
        "C" => [
            "name" => "La Coruña",
            "pc" => "15",
            "code" => "C"
        ],
        "CU" => [
            "name" => "Cuenca",
            "pc" => "16",
            "code" => "CU"
        ],
        "GI" => [
            "name" => "Girona",
            "pc" => "17",
            "code" => "GI"
        ],
        "GR" => [
            "name" => "Granada",
            "pc" => "18",
            "code" => "GR"
        ],
        "GU" => [
            "name" => "Guadalajara",
            "pc" => "19",
            "code" => "GU"
        ],
        "SS" => [
            "name" => "Guipúzcoa",
            "pc" => "20",
            "code" => "SS"
        ],
        "H" => [
            "name" => "Huelva",
            "pc" => "21",
            "code" => "H"
        ],
        "HU" => [
            "name" => "Huesca",
            "pc" => "22",
            "code" => "HU"
        ],
        "J" => [
            "name" => "Jaén",
            "pc" => "23",
            "code" => "J"
        ],
        "LE" => [
            "name" => "León",
            "pc" => "24",
            "code" => "LE"
        ],
        "L" => [
            "name" => "Lleida",
            "pc" => "25",
            "code" => "L"
        ],
        "LO" => [
            "name" => "La Rioja",
            "pc" => "26",
            "code" => "LO"
        ],
        "LU" => [
            "name" => "Lugo",
            "pc" => "27",
            "code" => "LU"
        ],
        "M" => [
            "name" => "Madrid",
            "pc" => "28",
            "code" => "M"
        ],
        "MA" => [
            "name" => "Málaga",
            "pc" => "29",
            "code" => "MA"
        ],
        "MU" => [
            "name" => "Murcia",
            "pc" => "30",
            "code" => "MU"
        ],
        "NA" => [
            "name" => "Navarra",
            "pc" => "31",
            "code" => "NA"
        ],
        "OR" => [
            "name" => "Orense",
            "pc" => "32",
            "code" => "OR"
        ],
        "O" => [
            "name" => "Asturias",
            "pc" => "33",
            "code" => "O"
        ],
        "P" => [
            "name" => "Palencia",
            "pc" => "34",
            "code" => "P"
        ],
        "GC" => [
            "name" => "Las Palmas",
            "pc" => "35",
            "code" => "GC"
        ],
        "PO" => [
            "name" => "Pontevedra",
            "pc" => "36",
            "code" => "PO"
        ],
        "SA" => [
            "name" => "Salamanca",
            "pc" => "37",
            "code" => "SA"
        ],
        "TF" => [
            "name" => "Santa Cruz de Tenerife",
            "pc" => "38",
            "code" => "TF"
        ],
        "S" => [
            "name" => "Cantabria",
            "pc" => "39",
            "code" => "S"
        ],
        "SG" => [
            "name" => "Segovia",
            "pc" => "40",
            "code" => "SG"
        ],
        "SE" => [
            "name" => "Sevilla",
            "pc" => "41",
            "code" => "SE"
        ],
        "SO" => [
            "name" => "Soria",
            "pc" => "42",
            "code" => "SO"
        ],
        "T" => [
            "name" => "Tarragona",
            "pc" => "43",
            "code" => "T"
        ],
        "TE" => [
            "name" => "Teruel",
            "pc" => "44",
            "code" => "TE"
        ],
        "TO" => [
            "name" => "Toledo",
            "pc" => "45",
            "code" => "TO"
        ],
        "V" => [
            "name" => "Valencia",
            "pc" => "46",
            "code" => "V"
        ],
        "VA" => [
            "name" => "Valladolid",
            "pc" => "47",
            "code" => "VA"
        ],
        "BI" => [
            "name" => "Vizcaya",
            "pc" => "48",
            "code" => "BI"
        ],
        "ZA" => [
            "name" => "Zamora",
            "pc" => "49",
            "code" => "ZA"
        ],
        "Z" => [
            "name" => "Zaragoza",
            "pc" => "50",
            "code" => "Z"
        ],
        "CE" => [
            "name" => "Ceuta",
            "pc" => "51",
            "code" => "CE"
        ],
        "ML" => [
            "name" => "Melilla",
            "pc" => "52",
            "code" => "ML"
        ]
    ];



    private $countries = [
        "AFG" => [
            "name" => "Afganistán",
            "iso3" => "AFG",
            "code" => "004"
        ],
        "ALI" => [
            "name" => "Åland Islands",
            "iso3" => "ALI",
            "code" => "248"
        ],
        "ALB" => [
            "name" => "Albania",
            "iso3" => "ALB",
            "code" => "008"
        ],
        "DEU" => [
            "name" => "Alemania",
            "iso3" => "DEU",
            "code" => "276"
        ],
        "AND" => [
            "name" => "Andorra",
            "iso3" => "AND",
            "code" => "020"
        ],
        "AGO" => [
            "name" => "Angola",
            "iso3" => "AGO",
            "code" => "024"
        ],
        "AIA" => [
            "name" => "Anguila",
            "iso3" => "AIA",
            "code" => "660"
        ],
        "ATA" => [
            "name" => "Antártida",
            "iso3" => "ATA",
            "code" => "010"
        ],
        "ATG" => [
            "name" => "Antigua y Barbuda",
            "iso3" => "ATG",
            "code" => "028"
        ],
        "SAU" => [
            "name" => "Arabia Saudita",
            "iso3" => "SAU",
            "code" => "682"
        ],
        "DZA" => [
            "name" => "Argelia",
            "iso3" => "DZA",
            "code" => "012"
        ],
        "ARG" => [
            "name" => "Argentina",
            "iso3" => "ARG",
            "code" => "032"
        ],
        "ARM" => [
            "name" => "Armenia",
            "iso3" => "ARM",
            "code" => "051"
        ],
        "ABW" => [
            "name" => "Aruba",
            "iso3" => "ABW",
            "code" => "533"
        ],
        "AUS" => [
            "name" => "Australia",
            "iso3" => "AUS",
            "code" => "036"
        ],
        "AUT" => [
            "name" => "Austria",
            "iso3" => "AUT",
            "code" => "040"
        ],
        "AZE" => [
            "name" => "Azerbaiyán",
            "iso3" => "AZE",
            "code" => "031"
        ],
        "BHS" => [
            "name" => "Bahamas",
            "iso3" => "BHS",
            "code" => "044"
        ],
        "BHR" => [
            "name" => "Bahrein",
            "iso3" => "BHR",
            "code" => "048"
        ],
        "BGD" => [
            "name" => "Bangladesh",
            "iso3" => "BGD",
            "code" => "050"
        ],
        "BRB" => [
            "name" => "Barbados",
            "iso3" => "BRB",
            "code" => "052"
        ],
        "BLR" => [
            "name" => "Belarús",
            "iso3" => "BLR",
            "code" => "112"
        ],
        "BEL" => [
            "name" => "Bélgica",
            "iso3" => "BEL",
            "code" => "056"
        ],
        "BLX" => [
            "name" => "Bélgica-Luxemburgo",
            "iso3" => "BLX",
            "code" => "058"
        ],
        "BLZ" => [
            "name" => "Belice",
            "iso3" => "BLZ",
            "code" => "084"
        ],
        "BEN" => [
            "name" => "Benin",
            "iso3" => "BEN",
            "code" => "204"
        ],
        "BMU" => [
            "name" => "Bermudas",
            "iso3" => "BMU",
            "code" => "060"
        ],
        "BTN" => [
            "name" => "Bhután",
            "iso3" => "BTN",
            "code" => "064"
        ],
        "BOL" => [
            "name" => "Bolivia",
            "iso3" => "BOL",
            "code" => "068"
        ],
        "BES" => [
            "name" => "Bonaire",
            "iso3" => "BES",
            "code" => "535"
        ],
        "BIH" => [
            "name" => "Bosnia y Herzegovina",
            "iso3" => "BIH",
            "code" => "070"
        ],
        "BWA" => [
            "name" => "Botswana",
            "iso3" => "BWA",
            "code" => "072"
        ],
        "BRA" => [
            "name" => "Brasil",
            "iso3" => "BRA",
            "code" => "076"
        ],
        "BRN" => [
            "name" => "Brunei Darussalam",
            "iso3" => "BRN",
            "code" => "096"
        ],
        "BGR" => [
            "name" => "Bulgaria",
            "iso3" => "BGR",
            "code" => "100"
        ],
        "BFA" => [
            "name" => "Burkina Faso",
            "iso3" => "BFA",
            "code" => "854"
        ],
        "BDI" => [
            "name" => "Burundi",
            "iso3" => "BDI",
            "code" => "108"
        ],
        "CPV" => [
            "name" => "Cabo Verde",
            "iso3" => "CPV",
            "code" => "132"
        ],
        "KHM" => [
            "name" => "Camboya",
            "iso3" => "KHM",
            "code" => "116"
        ],
        "CMR" => [
            "name" => "Camerún",
            "iso3" => "CMR",
            "code" => "120"
        ],
        "CAN" => [
            "name" => "Canadá",
            "iso3" => "CAN",
            "code" => "124"
        ],
        "SPE" => [
            "name" => "Categorías especiales",
            "iso3" => "SPE",
            "code" => "839"
        ],
        "TCD" => [
            "name" => "Chad",
            "iso3" => "TCD",
            "code" => "148"
        ],
        "CSK" => [
            "name" => "Checoslovaquia",
            "iso3" => "CSK",
            "code" => "200"
        ],
        "CHL" => [
            "name" => "Chile",
            "iso3" => "CHL",
            "code" => "152"
        ],
        "CHN" => [
            "name" => "China",
            "iso3" => "CHN",
            "code" => "156"
        ],
        "CYP" => [
            "name" => "Chipre",
            "iso3" => "CYP",
            "code" => "196"
        ],
        "COL" => [
            "name" => "Colombia",
            "iso3" => "COL",
            "code" => "170"
        ],
        "USP" => [
            "name" => "Comando I del Pacífico de Estados Unidos",
            "iso3" => "USP",
            "code" => "849"
        ],
        "COM" => [
            "name" => "Comoras",
            "iso3" => "COM",
            "code" => "174"
        ],
        "COG" => [
            "name" => "Congo, Rep. del",
            "iso3" => "COG",
            "code" => "178"
        ],
        "ZAR" => [
            "name" => "Congo, Rep. Dem. del",
            "iso3" => "ZAR",
            "code" => "180"
        ],
        "KOR" => [
            "name" => "Corea, Rep. de",
            "iso3" => "KOR",
            "code" => "410"
        ],
        "PRK" => [
            "name" => "Corea, Rep. Dem. de",
            "iso3" => "PRK",
            "code" => "408"
        ],
        "CRI" => [
            "name" => "Costa Rica",
            "iso3" => "CRI",
            "code" => "188"
        ],
        "CIV" => [
            "name" => "Côte d'Ivoire",
            "iso3" => "CIV",
            "code" => "384"
        ],
        "HRV" => [
            "name" => "Croacia",
            "iso3" => "HRV",
            "code" => "191"
        ],
        "CUB" => [
            "name" => "Cuba",
            "iso3" => "CUB",
            "code" => "192"
        ],
        "CUW" => [
            "name" => "Curacao",
            "iso3" => "CUW",
            "code" => "531"
        ],
        "DNK" => [
            "name" => "Dinamarca",
            "iso3" => "DNK",
            "code" => "208"
        ],
        "DJI" => [
            "name" => "Djibouti",
            "iso3" => "DJI",
            "code" => "262"
        ],
        "DMA" => [
            "name" => "Dominica",
            "iso3" => "DMA",
            "code" => "212"
        ],
        "ECU" => [
            "name" => "Ecuador",
            "iso3" => "ECU",
            "code" => "218"
        ],
        "EGY" => [
            "name" => "Egipto, Rep. ?rabe de",
            "iso3" => "EGY",
            "code" => "818"
        ],
        "SLV" => [
            "name" => "El Salvador",
            "iso3" => "SLV",
            "code" => "222"
        ],
        "ARE" => [
            "name" => "Emiratos ?rabes Unidos",
            "iso3" => "ARE",
            "code" => "784"
        ],
        "ERI" => [
            "name" => "Eritrea",
            "iso3" => "ERI",
            "code" => "232"
        ],
        "SVN" => [
            "name" => "Eslovenia",
            "iso3" => "SVN",
            "code" => "705"
        ],
        "ESP" => [
            "name" => "España",
            "iso3" => "ESP",
            "code" => "724"
        ],
        "USA" => [
            "name" => "Estados Unidos",
            "iso3" => "USA",
            "code" => "840"
        ],
        "EST" => [
            "name" => "Estonia",
            "iso3" => "EST",
            "code" => "233"
        ],
        "ETH" => [
            "name" => "Etiopía (excluida Eritrea)",
            "iso3" => "ETH",
            "code" => "231"
        ],
        "ETF" => [
            "name" => "Etiopía (incluida Eritrea)",
            "iso3" => "ETF",
            "code" => "230"
        ],
        "EUN" => [
            "name" => "European Union",
            "iso3" => "EUN",
            "code" => "918"
        ],
        "SDN" => [
            "name" => "Ex Sudán",
            "iso3" => "SDN",
            "code" => "736"
        ],
        "RUS" => [
            "name" => "Federación de Rusia",
            "iso3" => "RUS",
            "code" => "643"
        ],
        "FJI" => [
            "name" => "Fiji",
            "iso3" => "FJI",
            "code" => "242"
        ],
        "PHL" => [
            "name" => "Filipinas",
            "iso3" => "PHL",
            "code" => "608"
        ],
        "FIN" => [
            "name" => "Finlandia",
            "iso3" => "FIN",
            "code" => "246"
        ],
        "codeZ" => [
            "name" => "Fm Panama Cz",
            "iso3" => "codeZ",
            "code" => "592"
        ],
        "ZW1" => [
            "name" => "Fm Rhod Nyas",
            "iso3" => "ZW1",
            "code" => "717"
        ],
        "TAN" => [
            "name" => "Fm Tanganyik",
            "iso3" => "TAN",
            "code" => "835"
        ],
        "VDR" => [
            "name" => "Fm Vietnam DR",
            "iso3" => "VDR",
            "code" => "866"
        ],
        "SVR" => [
            "name" => "Fm Vietnam Rp",
            "iso3" => "SVR",
            "code" => "868"
        ],
        "ZPM" => [
            "name" => "Fm Zanz-Pemb",
            "iso3" => "ZPM",
            "code" => "836"
        ],
        "FRA" => [
            "name" => "Francia",
            "iso3" => "FRA",
            "code" => "250"
        ],
        "GAB" => [
            "name" => "Gabón",
            "iso3" => "GAB",
            "code" => "266"
        ],
        "GMB" => [
            "name" => "Gambia",
            "iso3" => "GMB",
            "code" => "270"
        ],
        "GAZ" => [
            "name" => "Gaza Strip",
            "iso3" => "GAZ",
            "code" => "274"
        ],
        "GEO" => [
            "name" => "Georgia",
            "iso3" => "GEO",
            "code" => "268"
        ],
        "GHA" => [
            "name" => "Ghana",
            "iso3" => "GHA",
            "code" => "288"
        ],
        "GIB" => [
            "name" => "Gibraltar",
            "iso3" => "GIB",
            "code" => "292"
        ],
        "GRD" => [
            "name" => "Granada",
            "iso3" => "GRD",
            "code" => "308"
        ],
        "GRC" => [
            "name" => "Grecia",
            "iso3" => "GRC",
            "code" => "300"
        ],
        "GRL" => [
            "name" => "Groenlandia",
            "iso3" => "GRL",
            "code" => "304"
        ],
        "GLP" => [
            "name" => "Guadalupe",
            "iso3" => "GLP",
            "code" => "312"
        ],
        "GUM" => [
            "name" => "Guam",
            "iso3" => "GUM",
            "code" => "316"
        ],
        "GTM" => [
            "name" => "Guatemala",
            "iso3" => "GTM",
            "code" => "320"
        ],
        "GUF" => [
            "name" => "Guayana Francesa",
            "iso3" => "GUF",
            "code" => "254"
        ],
        "GIN" => [
            "name" => "Guinea",
            "iso3" => "GIN",
            "code" => "324"
        ],
        "GNQ" => [
            "name" => "Guinea Ecuatorial",
            "iso3" => "GNQ",
            "code" => "226"
        ],
        "GNB" => [
            "name" => "Guinea-Bissau",
            "iso3" => "GNB",
            "code" => "624"
        ],
        "GUY" => [
            "name" => "Guyana",
            "iso3" => "GUY",
            "code" => "328"
        ],
        "HTI" => [
            "name" => "Haití",
            "iso3" => "HTI",
            "code" => "332"
        ],
        "HND" => [
            "name" => "Honduras",
            "iso3" => "HND",
            "code" => "340"
        ],
        "HKG" => [
            "name" => "Hong Kong (China)",
            "iso3" => "HKG",
            "code" => "344"
        ],
        "HUN" => [
            "name" => "Hungría",
            "iso3" => "HUN",
            "code" => "348"
        ],
        "IND" => [
            "name" => "India",
            "iso3" => "IND",
            "code" => "356"
        ],
        "IDN" => [
            "name" => "Indonesia",
            "iso3" => "IDN",
            "code" => "360"
        ],
        "IRN" => [
            "name" => "Irán, Rep. Islámica del",
            "iso3" => "IRN",
            "code" => "364"
        ],
        "IRQ" => [
            "name" => "Iraq",
            "iso3" => "IRQ",
            "code" => "368"
        ],
        "IRL" => [
            "name" => "Irlanda",
            "iso3" => "IRL",
            "code" => "372"
        ],
        "BVT" => [
            "name" => "Isla Bouvet",
            "iso3" => "BVT",
            "code" => "074"
        ],
        "BUN" => [
            "name" => "Isla Bunker",
            "iso3" => "BUN",
            "code" => "837"
        ],
        "CXR" => [
            "name" => "Isla de Navidad",
            "iso3" => "CXR",
            "code" => "162"
        ],
        "NFK" => [
            "name" => "Isla Norfolk",
            "iso3" => "NFK",
            "code" => "574"
        ],
        "ISL" => [
            "name" => "Islandia",
            "iso3" => "ISL",
            "code" => "352"
        ],
        "CYM" => [
            "name" => "Islas Caimán",
            "iso3" => "CYM",
            "code" => "136"
        ],
        "CCK" => [
            "name" => "Islas Cocos (Keeling)",
            "iso3" => "CCK",
            "code" => "166"
        ],
        "COK" => [
            "name" => "Islas Cook",
            "iso3" => "COK",
            "code" => "184"
        ],
        "codeE" => [
            "name" => "Islas del Pacífico",
            "iso3" => "codeE",
            "code" => "582"
        ],
        "FLK" => [
            "name" => "Islas Falkland",
            "iso3" => "FLK",
            "code" => "238"
        ],
        "FRO" => [
            "name" => "Islas Feroe",
            "iso3" => "FRO",
            "code" => "234"
        ],
        "SGS" => [
            "name" => "Islas Georgias del Sur y Sandwich del Sur",
            "iso3" => "SGS",
            "code" => "239"
        ],
        "HMD" => [
            "name" => "Islas Heard y McDonald",
            "iso3" => "HMD",
            "code" => "334"
        ],
        "MHL" => [
            "name" => "Islas Marshall",
            "iso3" => "MHL",
            "code" => "584"
        ],
        "SLB" => [
            "name" => "Islas Salomón",
            "iso3" => "SLB",
            "code" => "090"
        ],
        "TCA" => [
            "name" => "Islas Turcas y Caicos",
            "iso3" => "TCA",
            "code" => "796"
        ],
        "UMI" => [
            "name" => "Islas Ultramarinas Menores de Estados Unidos",
            "iso3" => "UMI",
            "code" => "581"
        ],
        "VIR" => [
            "name" => "Islas Vírgenes (EE.UU.)",
            "iso3" => "VIR",
            "code" => "850"
        ],
        "VGB" => [
            "name" => "Islas Vírgenes Británicas",
            "iso3" => "VGB",
            "code" => "092"
        ],
        "WLF" => [
            "name" => "Islas Wallis y Futuna",
            "iso3" => "WLF",
            "code" => "876"
        ],
        "ISR" => [
            "name" => "Israel",
            "iso3" => "ISR",
            "code" => "376"
        ],
        "ITA" => [
            "name" => "Italia",
            "iso3" => "ITA",
            "code" => "380"
        ],
        "JAM" => [
            "name" => "Jamaica",
            "iso3" => "JAM",
            "code" => "388"
        ],
        "JPN" => [
            "name" => "Japón",
            "iso3" => "JPN",
            "code" => "392"
        ],
        "JTN" => [
            "name" => "Jhonston Island",
            "iso3" => "JTN",
            "code" => "396"
        ],
        "JOR" => [
            "name" => "Jordania",
            "iso3" => "JOR",
            "code" => "400"
        ],
        "KAZ" => [
            "name" => "Kazajistán",
            "iso3" => "KAZ",
            "code" => "398"
        ],
        "KEN" => [
            "name" => "Kenia",
            "iso3" => "KEN",
            "code" => "404"
        ],
        "KIR" => [
            "name" => "Kiribati",
            "iso3" => "KIR",
            "code" => "296"
        ],
        "PRK" => [
            "name" => "Corea del Norte",
            "iso3" => "PRK",
            "code" => "408"
        ],
        "KOR" => [
            "name" => "Corea del Sur",
            "iso3" => "KOR",
            "code" => "410"
        ],
        "KWT" => [
            "name" => "Kuwait",
            "iso3" => "KWT",
            "code" => "414"
        ],
        "KGZ" => [
            "name" => "Kirguistán",
            "iso3" => "KGZ",
            "code" => "417"
        ],
        "LAO" => [
            "name" => "Laos",
            "iso3" => "LAO",
            "code" => "418"
        ],
        "LVA" => [
            "name" => "Letonia",
            "iso3" => "LVA",
            "code" => "428"
        ],
        "LSO" => [
            "name" => "Lesoto",
            "iso3" => "LSO",
            "code" => "426"
        ],
        "LBR" => [
            "name" => "Liberia",
            "iso3" => "LBR",
            "code" => "430"
        ],
        "LBN" => [
            "name" => "Líbano",
            "iso3" => "LBN",
            "code" => "422"
        ],
        "LBY" => [
            "name" => "Libia",
            "iso3" => "LBY",
            "code" => "434"
        ],
        "LIE" => [
            "name" => "Liechtenstein",
            "iso3" => "LIE",
            "code" => "438"
        ],
        "LTU" => [
            "name" => "Lituania",
            "iso3" => "LTU",
            "code" => "440"
        ],
        "LUX" => [
            "name" => "Luxemburgo",
            "iso3" => "LUX",
            "code" => "442"
        ],
        "MAC" => [
            "name" => "Macao",
            "iso3" => "MAC",
            "code" => "446"
        ],
        "MKD" => [
            "name" => "Macedonia",
            "iso3" => "MKD",
            "code" => "807"
        ],
        "MDG" => [
            "name" => "Madagascar",
            "iso3" => "MDG",
            "code" => "450"
        ],
        "MWI" => [
            "name" => "Malawi",
            "iso3" => "MWI",
            "code" => "454"
        ],
        "MYS" => [
            "name" => "Malasia",
            "iso3" => "MYS",
            "code" => "458"
        ],
        "MDV" => [
            "name" => "Maldivas",
            "iso3" => "MDV",
            "code" => "462"
        ],
        "MLI" => [
            "name" => "Malí",
            "iso3" => "MLI",
            "code" => "466"
        ],
        "MLT" => [
            "name" => "Malta",
            "iso3" => "MLT",
            "code" => "470"
        ],
        "MHL" => [
            "name" => "Islas Marshall",
            "iso3" => "MHL",
            "code" => "584"
        ],
        "MTQ" => [
            "name" => "Martinica",
            "iso3" => "MTQ",
            "code" => "474"
        ],
        "MRT" => [
            "name" => "Mauritania",
            "iso3" => "MRT",
            "code" => "478"
        ],
        "MUS" => [
            "name" => "Mauricio",
            "iso3" => "MUS",
            "code" => "480"
        ],
        "MYT" => [
            "name" => "Mayotte",
            "iso3" => "MYT",
            "code" => "175"
        ],
        "MEX" => [
            "name" => "México",
            "iso3" => "MEX",
            "code" => "484"
        ],
        "FSM" => [
            "name" => "Micronesia",
            "iso3" => "FSM",
            "code" => "583"
        ],
        "MDA" => [
            "name" => "Moldavia",
            "iso3" => "MDA",
            "code" => "498"
        ],
        "MCO" => [
            "name" => "Mónaco",
            "iso3" => "MCO",
            "code" => "492"
        ],
        "MNG" => [
            "name" => "Mongolia",
            "iso3" => "MNG",
            "code" => "496"
        ],
        "MNE" => [
            "name" => "Montenegro",
            "iso3" => "MNE",
            "code" => "499"
        ],
        "MSR" => [
            "name" => "Montserrat",
            "iso3" => "MSR",
            "code" => "500"
        ],
        "MAR" => [
            "name" => "Marruecos",
            "iso3" => "MAR",
            "code" => "504"
        ],
        "MOZ" => [
            "name" => "Mozambique",
            "iso3" => "MOZ",
            "code" => "508"
        ],
        "MMR" => [
            "name" => "Myanmar",
            "iso3" => "MMR",
            "code" => "104"
        ],
        "NAM" => [
            "name" => "Namibia",
            "iso3" => "NAM",
            "code" => "516"
        ],
        "NRU" => [
            "name" => "Nauru",
            "iso3" => "NRU",
            "code" => "520"
        ],
        "NPL" => [
            "name" => "Nepal",
            "iso3" => "NPL",
            "code" => "524"
        ],
        "NLD" => [
            "name" => "Países Bajos",
            "iso3" => "NLD",
            "code" => "528"
        ],
        "NCL" => [
            "name" => "Nueva Caledonia",
            "iso3" => "NCL",
            "code" => "540"
        ],
        "NZL" => [
            "name" => "Nueva Zelanda",
            "iso3" => "NZL",
            "code" => "554"
        ],
        "NIC" => [
            "name" => "Nicaragua",
            "iso3" => "NIC",
            "code" => "558"
        ],
        "NER" => [
            "name" => "Níger",
            "iso3" => "NER",
            "code" => "562"
        ],
        "NGA" => [
            "name" => "Nigeria",
            "iso3" => "NGA",
            "code" => "566"
        ],
        "NIU" => [
            "name" => "Niue",
            "iso3" => "NIU",
            "code" => "570"
        ],
        "NFK" => [
            "name" => "Isla Norfolk",
            "iso3" => "NFK",
            "code" => "574"
        ],
        "MNP" => [
            "name" => "Islas Marianas del Norte",
            "iso3" => "MNP",
            "code" => "580"
        ],
        "NOR" => [
            "name" => "Noruega",
            "iso3" => "NOR",
            "code" => "578"
        ],
        "OMN" => [
            "name" => "Omán",
            "iso3" => "OMN",
            "code" => "512"
        ],
        "PAK" => [
            "name" => "Pakistán",
            "iso3" => "PAK",
            "code" => "586"
        ],
        "PLW" => [
            "name" => "Palau",
            "iso3" => "PLW",
            "code" => "585"
        ],
        "PSE" => [
            "name" => "Territorios Palestinos",
            "iso3" => "PSE",
            "code" => "275"
        ],
        "PAN" => [
            "name" => "Panamá",
            "iso3" => "PAN",
            "code" => "591"
        ],
        "PNG" => [
            "name" => "Papúa Nueva Guinea",
            "iso3" => "PNG",
            "code" => "598"
        ],
        "PRY" => [
            "name" => "Paraguay",
            "iso3" => "PRY",
            "code" => "600"
        ],
        "PER" => [
            "name" => "Perú",
            "iso3" => "PER",
            "code" => "604"
        ],
        "PHL" => [
            "name" => "Filipinas",
            "iso3" => "PHL",
            "code" => "608"
        ],
        "codeN" => [
            "name" => "Pitcairn",
            "iso3" => "codeN",
            "code" => "612"
        ],
        "POL" => [
            "name" => "Polonia",
            "iso3" => "POL",
            "code" => "616"
        ],
        "PRT" => [
            "name" => "Portugal",
            "iso3" => "PRT",
            "code" => "620"
        ],
        "PRI" => [
            "name" => "Puerto Rico",
            "iso3" => "PRI",
            "code" => "630"
        ],
        "QAT" => [
            "name" => "Qatar",
            "iso3" => "QAT",
            "code" => "634"
        ],
        "REU" => [
            "name" => "Reunión",
            "iso3" => "REU",
            "code" => "638"
        ],
        "ROU" => [
            "name" => "Rumania",
            "iso3" => "ROU",
            "code" => "642"
        ],
        "RUS" => [
            "name" => "Federación de Rusia",
            "iso3" => "RUS",
            "code" => "643"
        ],
        "RWA" => [
            "name" => "Ruanda",
            "iso3" => "RWA",
            "code" => "646"
        ],
        "BLM" => [
            "name" => "San Bartolomé",
            "iso3" => "BLM",
            "code" => "652"
        ],
        "SHN" => [
            "name" => "Santa Elena",
            "iso3" => "SHN",
            "code" => "654"
        ],
        "KNA" => [
            "name" => "San Cristóbal y Nieves",
            "iso3" => "KNA",
            "code" => "659"
        ],
        "LCA" => [
            "name" => "Santa Lucía",
            "iso3" => "LCA",
            "code" => "662"
        ],
        "SPM" => [
            "name" => "San Pedro y Miquelón",
            "iso3" => "SPM",
            "code" => "666"
        ],
        "VCT" => [
            "name" => "San Vicente y las Granadinas",
            "iso3" => "VCT",
            "code" => "670"
        ],
        "WSM" => [
            "name" => "Samoa",
            "iso3" => "WSM",
            "code" => "882"
        ],
        "SMR" => [
            "name" => "San Marino",
            "iso3" => "SMR",
            "code" => "674"
        ],
        "STP" => [
            "name" => "Santo Tomé y Príncipe",
            "iso3" => "STP",
            "code" => "678"
        ],
        "SAU" => [
            "name" => "Arabia Saudita",
            "iso3" => "SAU",
            "code" => "682"
        ],
        "SEN" => [
            "name" => "Senegal",
            "iso3" => "SEN",
            "code" => "686"
        ],
        "SRB" => [
            "name" => "Serbia",
            "iso3" => "SRB",
            "code" => "688"
        ],
        "SYC" => [
            "name" => "Seychelles",
            "iso3" => "SYC",
            "code" => "690"
        ],
        "SLE" => [
            "name" => "Sierra Leona",
            "iso3" => "SLE",
            "code" => "694"
        ],
        "SGP" => [
            "name" => "Singapur",
            "iso3" => "SGP",
            "code" => "702"
        ],
        "SXM" => [
            "name" => "Sint Maarten",
            "iso3" => "SXM",
            "code" => "534"
        ],
        "SVK" => [
            "name" => "Eslovaquia",
            "iso3" => "SVK",
            "code" => "703"
        ],
        "SVN" => [
            "name" => "Eslovenia",
            "iso3" => "SVN",
            "code" => "705"
        ],
        "SLB" => [
            "name" => "Islas Salomón",
            "iso3" => "SLB",
            "code" => "090"
        ],
        "SOM" => [
            "name" => "Somalia",
            "iso3" => "SOM",
            "code" => "706"
        ],
        "ZAF" => [
            "name" => "Sudáfrica",
            "iso3" => "ZAF",
            "code" => "710"
        ],
        "SGS" => [
            "name" => "Islas Georgias del Sur y Sandwich del Sur",
            "iso3" => "SGS",
            "code" => "239"
        ],
        "MLI" => [
            "name" => "Malí",
            "iso3" => "MLI",
            "code" => "466"
        ],
        "MLT" => [
            "name" => "Malta",
            "iso3" => "MLT",
            "code" => "470"
        ],
        "MHL" => [
            "name" => "Islas Marshall",
            "iso3" => "MHL",
            "code" => "584"
        ],
        "MTQ" => [
            "name" => "Martinica",
            "iso3" => "MTQ",
            "code" => "474"
        ],
        "MRT" => [
            "name" => "Mauritania",
            "iso3" => "MRT",
            "code" => "478"
        ],
        "MUS" => [
            "name" => "Mauricio",
            "iso3" => "MUS",
            "code" => "480"
        ],
        "MYT" => [
            "name" => "Mayotte",
            "iso3" => "MYT",
            "code" => "175"
        ],
        "MEX" => [
            "name" => "México",
            "iso3" => "MEX",
            "code" => "484"
        ],
        "FSM" => [
            "name" => "Micronesia",
            "iso3" => "FSM",
            "code" => "583"
        ],
        "MDA" => [
            "name" => "Moldavia",
            "iso3" => "MDA",
            "code" => "498"
        ],
        "MCO" => [
            "name" => "Mónaco",
            "iso3" => "MCO",
            "code" => "492"
        ],
        "MNG" => [
            "name" => "Mongolia",
            "iso3" => "MNG",
            "code" => "496"
        ],
        "MNE" => [
            "name" => "Montenegro",
            "iso3" => "MNE",
            "code" => "499"
        ],
        "MSR" => [
            "name" => "Montserrat",
            "iso3" => "MSR",
            "code" => "500"
        ],
        "MAR" => [
            "name" => "Marruecos",
            "iso3" => "MAR",
            "code" => "504"
        ],
        "MOZ" => [
            "name" => "Mozambique",
            "iso3" => "MOZ",
            "code" => "508"
        ],
        "MMR" => [
            "name" => "Myanmar",
            "iso3" => "MMR",
            "code" => "104"
        ],
        "NAM" => [
            "name" => "Namibia",
            "iso3" => "NAM",
            "code" => "516"
        ],
        "NRU" => [
            "name" => "Nauru",
            "iso3" => "NRU",
            "code" => "520"
        ],
        "NPL" => [
            "name" => "Nepal",
            "iso3" => "NPL",
            "code" => "524"
        ],
        "NLD" => [
            "name" => "Países Bajos",
            "iso3" => "NLD",
            "code" => "528"
        ],
        "NCL" => [
            "name" => "Nueva Caledonia",
            "iso3" => "NCL",
            "code" => "540"
        ],
        "NZL" => [
            "name" => "Nueva Zelanda",
            "iso3" => "NZL",
            "code" => "554"
        ],
        "NIC" => [
            "name" => "Nicaragua",
            "iso3" => "NIC",
            "code" => "558"
        ],
        "NER" => [
            "name" => "Níger",
            "iso3" => "NER",
            "code" => "562"
        ],
        "NGA" => [
            "name" => "Nigeria",
            "iso3" => "NGA",
            "code" => "566"
        ],
        "NIU" => [
            "name" => "Niue",
            "iso3" => "NIU",
            "code" => "570"
        ],
        "NFK" => [
            "name" => "Isla Norfolk",
            "iso3" => "NFK",
            "code" => "574"
        ],
        "MNP" => [
            "name" => "Islas Marianas del Norte",
            "iso3" => "MNP",
            "code" => "580"
        ],
        "NOR" => [
            "name" => "Noruega",
            "iso3" => "NOR",
            "code" => "578"
        ],
        "OMN" => [
            "name" => "Omán",
            "iso3" => "OMN",
            "code" => "512"
        ],
        "PAK" => [
            "name" => "Pakistán",
            "iso3" => "PAK",
            "code" => "586"
        ],
        "PLW" => [
            "name" => "Palau",
            "iso3" => "PLW",
            "code" => "585"
        ],
        "PSE" => [
            "name" => "Territorios Palestinos",
            "iso3" => "PSE",
            "code" => "275"
        ],
        "PAN" => [
            "name" => "Panamá",
            "iso3" => "PAN",
            "code" => "591"
        ],
        "PNG" => [
            "name" => "Papúa Nueva Guinea",
            "iso3" => "PNG",
            "code" => "598"
        ],
        "PRY" => [
            "name" => "Paraguay",
            "iso3" => "PRY",
            "code" => "600"
        ],
        "PER" => [
            "name" => "Perú",
            "iso3" => "PER",
            "code" => "604"
        ],
        "PHL" => [
            "name" => "Filipinas",
            "iso3" => "PHL",
            "code" => "608"
        ],
        "codeN" => [
            "name" => "Pitcairn",
            "iso3" => "codeN",
            "code" => "612"
        ],
        "POL" => [
            "name" => "Polonia",
            "iso3" => "POL",
            "code" => "616"
        ],
        "PRT" => [
            "name" => "Portugal",
            "iso3" => "PRT",
            "code" => "620"
        ],
        "PRI" => [
            "name" => "Puerto Rico",
            "iso3" => "PRI",
            "code" => "630"
        ],
        "QAT" => [
            "name" => "Qatar",
            "iso3" => "QAT",
            "code" => "634"
        ],
        "REU" => [
            "name" => "Reunión",
            "iso3" => "REU",
            "code" => "638"
        ],
        "ROU" => [
            "name" => "Rumania",
            "iso3" => "ROU",
            "code" => "642"
        ],
        "RUS" => [
            "name" => "Federación de Rusia",
            "iso3" => "RUS",
            "code" => "643"
        ],
        "RWA" => [
            "name" => "Ruanda",
            "iso3" => "RWA",
            "code" => "646"
        ],
        "BLM" => [
            "name" => "San Bartolomé",
            "iso3" => "BLM",
            "code" => "652"
        ],
        "SHN" => [
            "name" => "Santa Elena",
            "iso3" => "SHN",
            "code" => "654"
        ],
        "KNA" => [
            "name" => "San Cristóbal y Nieves",
            "iso3" => "KNA",
            "code" => "659"
        ],
        "LCA" => [
            "name" => "Santa Lucía",
            "iso3" => "LCA",
            "code" => "662"
        ],
        "SPM" => [
            "name" => "San Pedro y Miquelón",
            "iso3" => "SPM",
            "code" => "666"
        ],
        "VCT" => [
            "name" => "San Vicente y las Granadinas",
            "iso3" => "VCT",
            "code" => "670"
        ],
        "WSM" => [
            "name" => "Samoa",
            "iso3" => "WSM",
            "code" => "882"
        ],
        "SMR" => [
            "name" => "San Marino",
            "iso3" => "SMR",
            "code" => "674"
        ],
        "STP" => [
            "name" => "Santo Tomé y Príncipe",
            "iso3" => "STP",
            "code" => "678"
        ],
        "SAU" => [
            "name" => "Arabia Saudita",
            "iso3" => "SAU",
            "code" => "682"
        ],
        "SEN" => [
            "name" => "Senegal",
            "iso3" => "SEN",
            "code" => "686"
        ],
        "SRB" => [
            "name" => "Serbia",
            "iso3" => "SRB",
            "code" => "688"
        ],
        "SYC" => [
            "name" => "Seychelles",
            "iso3" => "SYC",
            "code" => "690"
        ],
        "SLE" => [
            "name" => "Sierra Leona",
            "iso3" => "SLE",
            "code" => "694"
        ],
        "SGP" => [
            "name" => "Singapur",
            "iso3" => "SGP",
            "code" => "702"
        ],
        "SXM" => [
            "name" => "Sint Maarten",
            "iso3" => "SXM",
            "code" => "534"
        ],
        "SVK" => [
            "name" => "Eslovaquia",
            "iso3" => "SVK",
            "code" => "703"
        ],
        "SVN" => [
            "name" => "Eslovenia",
            "iso3" => "SVN",
            "code" => "705"
        ],
        "SLB" => [
            "name" => "Islas Salomón",
            "iso3" => "SLB",
            "code" => "090"
        ],
        "SOM" => [
            "name" => "Somalia",
            "iso3" => "SOM",
            "code" => "706"
        ],
        "ZAF" => [
            "name" => "Sudáfrica",
            "iso3" => "ZAF",
            "code" => "710"
        ],
        "SGS" => [
            "name" => "Islas Georgias del Sur y Sandwich del Sur",
            "iso3" => "SGS",
            "code" => "239"
        ],
    ];


    public function countries()
    {
        return $this->countries;
    }

    public function provinces()
    {
        return $this->provinces;
    }


    /**
     * Function that returns an array with the country information corresponding to the provided ISO3 code.
     * @param string
     *  $iso ISO3 code of the country to search.
     * @return array
     *  If the country is founded, it returns an associative array with the country information.
     *  If the country is not founded, it returns an empty array.
     */
    public function getCountryByIso3($iso)
    {
        if (isset($this->countries[$iso])) {
            return $this->countries[$iso];
        }
        return [];
    }

    /**
     * Function that returns an array with the province information corresponding to the provided code.
     * @param string
     *  $code code of the province to search.
     * @return array
     *  If the province is founded, it returns an associative array with the province information.
     *  If the province is not founded, it returns an empty array.
     */
    public function getProvinceByCode($code)
    {
        if (isset($this->provinces[$code])) {
            return $this->provinces[$code];
        }
        return [];
    }
}
