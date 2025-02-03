<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country and Place Description</title>
    <style>
        .container {
            display: flex;
        }
        .country-list, .description-list {
            margin: 10px;
        }
        .search-container {
            margin-bottom: 20px;
        }
    </style>
    <script>
        // Sample data from the JSON file
        const data = [
            {
                "Country": "india",
                "Place description": "this is nagpur. we speak bangla"
            },
            {
                "Country": "usa",
                "Place description": "this is new york. we speak english"
            },
            {
                "Country": "france",
                "Place description": "this is paris. we speak french"
            },
            {
                "Country": "japan",
                "Place description": "this is tokyo. we speak japanese"
            },
            {
                "Country": "brazil",
                "Place description": "this is rio de janeiro. we speak portuguese"
            },
            {
                "Country": "china",
                "Place description": "this is beijing. we speak mandarin"
            },
            {
                "Country": "germany",
                "Place description": "this is berlin. we speak german"
            },
            {
                "Country": "italy",
                "Place description": "this is rome. we speak italian"
            },
            {
                "Country": "russia",
                "Place description": "this is moscow. we speak russian"
            },
            {
                "Country": "egypt",
                "Place description": "this is cairo. we speak arabic"
            },
            {
                "Country": "mexico",
                "Place description": "this is mexico city. we speak spanish"
            }
        ];

        function updateDescriptions() {
            const checkboxes = document.querySelectorAll('input[name="country"]:checked');
            const descriptionList = document.getElementById('descriptionList');
            descriptionList.innerHTML = ''; // Clear previous descriptions

            checkboxes.forEach(checkbox => {
                const country = checkbox.value;
                const place = data.find(item => item.Country === country);
                if (place) {
                    const listItem = document.createElement('li');
                    listItem.textContent = place["Place description"];
                    descriptionList.appendChild(listItem);
                }
            });
        }

        function searchDescriptions() {
            const searchInput = document.getElementById('searchBox').value.toLowerCase();
            const descriptionList = document.getElementById('descriptionList');
            const countryList = document.querySelector('.country-list');
            descriptionList.innerHTML = ''; // Clear previous descriptions
            countryList.innerHTML = ''; // Clear previous country list

            data.forEach(item => {
                if (item["Place description"].toLowerCase().includes(searchInput)) {
                    const listItem = document.createElement('li');
                    listItem.textContent = item["Place description"];
                    descriptionList.appendChild(listItem);

                    // Add country to the country list
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'country';
                    checkbox.value = item.Country;
                    checkbox.id = item.Country;
                    checkbox.onchange = updateDescriptions;

                    const label = document.createElement('label');
                    label.htmlFor = item.Country;
                    label.textContent = item.Country.charAt(0).toUpperCase() + item.Country.slice(1);

                    const br = document.createElement('br');

                    countryList.appendChild(checkbox);
                    countryList.appendChild(label);
                    countryList.appendChild(br);
                }
            });
        }
    </script>
</head>
<body>
    <h1>Country and Place Description</h1>
    <div class="search-container">
        <input type="text" id="searchBox" placeholder="Search descriptions..." oninput="searchDescriptions()">
    </div>
    <div class="container">
        <div class="country-list">
            <h2>Select Countries</h2>
            <!-- Country checkboxes will be populated dynamically based on search results -->
        </div>
        <div class="description-list">
            <h2>Place Descriptions</h2>
            <ul id="descriptionList">
                <!-- Descriptions will be populated here -->
            </ul>
        </div>
    </div>
</body>
</html> 