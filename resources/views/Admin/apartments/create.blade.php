
<html>

<head>
    {{-- Map --}}
    <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps-web.min.js"></script>

    <!-- Styles css/app.css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

    {{-- Search --}}
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox-web.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox.css" />


    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>

    {{-- BOot --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- Font Awsome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.css'
        integrity='sha512-+ouAqATs1y4kpPMCHfKHVJwf308zo+tC9dlEYK9rKe7kiP35NiP+Oi35rCFnc16zdvk9aBkDUtEO3tIPl0xN5w=='
        crossorigin='anonymous' />
</head>

<body style="">

    {{-- BOdy --}}
    <div class="{{-- container-fluid w-75 m-auto right-section py-2 --}} container  mt-3">

        <div>
            <h1 class=" p-4">Add Apartment</h1>
        </div>

        <div class="container">
            <a href="{{ route('admin.apartments.index') }}">
                {{-- <div class="btn btn-danger fw-bold mt-5 mb-4"><i class="fa-solid fa-left-long"></i> Dashboard</div> --}}
                <button>Dashboard</button>
            </a>
        </div>


    </div>

    <div class="d-flex align-items-center justify-content-center h-50">
        <div id="map" style="width: 40%; height: 90%;" class="me-3"></div>
        <div>

            <div class="mb-5 fs-1 form-label">
                <i class="fa-solid fa-hand-point-left"></i>
                Dove ti trovi?

            </div>

        </div>
    </div>

    <form class="d-flex flex-column w-50 m-auto" method="POST" action="{{ route('admin.apartments.store') }}"
        enctype="multipart/form-data">

        @csrf

        {{-- INPUT LAT LONG HIDDEN --}}
        <div class="d-flex  justify-content-center ">

            <input class="form-control d-none" name="lat" type="text" id="lat" required > </input>

            <input class="form-control d-none" name="lon" type="text" id="long" required> </input>

            @error('lat')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- NAME --}}


        <div class="mb-4 ">
            <label class="form-label">Name *</label>
            <input name="name" type="text" class="form-control " required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-4">
            <label class="form-label">Description *</label>
            <textarea name="description" class="form-control" required></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- IMMAGINE --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Image *</label>
            <input type="file" name="cover" class="form-control-file" required>
            @error('cover_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- ROOMS --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Rooms *</label>
            <input type="number" min="1" max="50" class="form-control" name="rooms" required>
            @error('rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- BEDS --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Beds *</label>
            <input type="number" min="1" max="50" class="form-control" name="beds" required>
            @error('beds')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- BATHROOM --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Bathrooms *</label>
            <input type="number" min="1" max="50" class="form-control" name="baths" required>
            @error('bathrooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- MQ --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Mq *</label>
            <input type="number" min="1" max="1000" class="form-control" name="meters" required>
            @error('mq')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- ADDRESS  --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Address *</label>
            <input type="text" class="form-control" name="address" id="address" required readonly="readonly">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- PRICE --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Price *</label>
            <input type="number" min="1" class="form-control" name="price" required>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- AVAILABLE --}}
        <div class="mb-4">
            <label class="form-label form-check-label" for="">Visibility <i
                    class="fa-solid fa-caret-down"></i></label>
            <select name="visibility" class="form-control">
                <option value=1>Visible</option>
                <option value=0>Not visible</option>
            </select>
        </div>

        {{-- SERVICES --}}
        <div>
            @foreach ($services as $service)
                <div class="cat action">
                    <label>
                        <input type="checkbox" name="services[]" value="{{ $service->id }}"><span
                            class="ps-2 form-label">{{ $service->name }}</span>
                    </label>
                </div>
            @endforeach

            <div class="text-danger fw-bold fs-5" id="avviso">

            </div>
        </div>

        {{-- class=" text-danger fw-bold fs-3" --}}
        {{-- <div class="mt-4">
            <label>Servizi: </label>
            @php
                $isRequired = false;
            @endphp
            @foreach ($services as $service)
                <label class="mx-2" for="service{{ $service->id }}">
                    <input type="checkbox" id="service{{ $service->id }}" name="services[]" value="{{ $service->id }}"
                    onclick="@php $isRequired = true; @endphp"
                    >
                    {{ $service->name }}
                </label>
            @endforeach
            <script>
                const checkboxes = document.getElementsByName('services[]');
                const checkRequired = () => {
                    let isChecked = false;
                    for (let i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].checked) {
                            isChecked = true;
                            break;
                        }
                    }
                    if (!isChecked) {
                        checkboxes[Math.floor(Math.random() * checkboxes.length)].checked = true;
                    }
                };
                document.getElementById('form-id').addEventListener('submit', checkRequired);
            </script>
        </div>                  NON FUNZIONA UN 8==D DI NIENTE         --}}

        {{-- INPUT LAT LONG HIDDEN --}}
        {{-- <input  name="lat" type="text" id="lat"> </input>
        <input  name="lon" type="text" id="long"> </input> --}}

        {{-- INVIO d-flex align-item-center justify-content-evenly --}}
        <div class="mt-5 mb-5 d-flex ">
            <div>
                <button type="submit" class="me-2" onclick="return validateForm()">Crea Nuovo</button>
            </div>

            {{-- <div>
                <a href="{{ route('admin.apartments.index') }}">
                    <div class="btn btn-danger ">Annulla</div>
                </a>
            </div> --}}

        </div>
    </form>

    <script>
        function validateForm() {
            var checkboxes = document.getElementsByName("services[]");
            var checked = false;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checked = true;
                    break;
                }
            }
            if (!checked) {
                /* alert("Seleziona almeno un servizio."); */
                document.getElementById("avviso").innerHTML = "*Seleziona almeno un servizio!*"
                /* const avviso = getElementById("avviso");
                avviso.classList.remove("d-none"); */
                /* `if ( /*___directives_script_0___*/

                return false;
            }
        }
    </script>



    <script>
        var ITALIA = [12.49427, 41.89056]
        var map = tt.map({
            key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
            container: "map",
            center: ITALIA,
            zoom: 4
        })



        var options = {
            searchOptions: {
                key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
                language: "en-GB",
                limit: 1,
            },
            autocompleteOptions: {
                key: "0HdIeR7zDtKAE4DzRGUEAamM4AA7X491",
                language: "en-GB",
            },
        }
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
        var search = document.getElementById(map)
        document.body.append(searchBoxHTML)

        // ATACCARE SEARCH A MAP
        var searchMarkersManager = new SearchMarkersManager(map)
        ttSearchBox.on("tomtom.searchbox.resultsfound", handleResultsFound)
        ttSearchBox.on("tomtom.searchbox.resultselected", handleResultSelection)
        ttSearchBox.on("tomtom.searchbox.resultfocused", handleResultSelection)
        ttSearchBox.on("tomtom.searchbox.resultscleared", handleResultClearing)
        map.addControl(ttSearchBox, "top-left")




        // EVENT HENDLER
        function handleResultsFound(event) {
            var results = event.data.results.fuzzySearch.results

            if (results.length === 0) {
                searchMarkersManager.clear()
            }
            searchMarkersManager.draw(results)
            fitToViewport(results)

            // Lat
            var lat
            var address
            results.forEach(element => {
                lat = element.position.lat
                address = element.address
                document.getElementById('address').value = address.freeformAddress
            });

            console.log(address)
            var latitudine = document.getElementById('lat');
            latitudine.value = lat;
            // Long
            var long
            results.forEach(element => {
                long = element.position.lng
            });

            var longitudine = document.getElementById('long');
            longitudine.value = long;
        }

        function handleResultSelection(event) {
            var result = event.data.result
            if (result.type === "category" || result.type === "brand") {
                return
            }
            searchMarkersManager.draw([result])
            fitToViewport(result)
        }

        function fitToViewport(markerData) {
            if (!markerData || (markerData instanceof Array && !markerData.length)) {
                return
            }
            var bounds = new tt.LngLatBounds()
            if (markerData instanceof Array) {
                markerData.forEach(function(marker) {
                    bounds.extend(getBounds(marker))
                })
            } else {
                bounds.extend(getBounds(markerData))
            }
            map.fitBounds(bounds, {
                padding: 100,
                linear: true
            })
        }

        function getBounds(data) {
            var btmRight
            var topLeft
            if (data.viewport) {
                btmRight = [
                    data.viewport.btmRightPoint.lng,
                    data.viewport.btmRightPoint.lat,
                ]
                topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat]
            }
            return [btmRight, topLeft]
        }

        function handleResultClearing() {
            searchMarkersManager.clear()
        }


        // Manipulation
        function SearchMarkersManager(map, options) {
            this.map = map
            this._options = options || {}
            this._poiList = undefined
            this.markers = {}
        }

        SearchMarkersManager.prototype.draw = function(poiList) {
            this._poiList = poiList
            this.clear()
            this._poiList.forEach(function(poi) {
                var markerId = poi.id
                var poiOpts = {
                    name: poi.poi ? poi.poi.name : undefined,
                    address: poi.address ? poi.address.freeformAddress : "",
                    distance: poi.dist,
                    classification: poi.poi ? poi.poi.classifications[0].code : undefined,
                    position: poi.position,
                    entryPoints: poi.entryPoints,
                }
                var marker = new SearchMarker(poiOpts, this._options)
                marker.addTo(this.map)
                this.markers[markerId] = marker
            }, this)
        }

        SearchMarkersManager.prototype.clear = function() {
            for (var markerId in this.markers) {
                var marker = this.markers[markerId]
                marker.remove()
            }
            this.markers = {}
            this._lastClickedMarker = null
        }




        // -------------
        function SearchMarker(poiData, options) {
            this.poiData = poiData
            this.options = options || {}
            this.marker = new tt.Marker({
                element: this.createMarker(),
                anchor: "bottom",
            })
            var lon = this.poiData.position.lng || this.poiData.position.lon
            this.marker.setLngLat([lon, this.poiData.position.lat])
        }

        SearchMarker.prototype.addTo = function(map) {
            this.marker.addTo(map)
            this._map = map
            return this
        }

        SearchMarker.prototype.createMarker = function() {
            var elem = document.createElement("div")
            elem.className = "tt-icon-marker-black tt-search-marker"
            if (this.options.markerClassName) {
                elem.className += " " + this.options.markerClassName
            }
            var innerElem = document.createElement("div")
            innerElem.setAttribute(
                "style",
                "background: white; width: 10px; height: 10px; border-radius: 50%; border: 3px solid black;"
            )

            elem.appendChild(innerElem)
            return elem
        }

        SearchMarker.prototype.remove = function() {
            this.marker.remove()
            this._map = null
        }
    </script>
</body>

</html>
