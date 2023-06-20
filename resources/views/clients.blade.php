<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clients</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="antialiased">
<div id="data-main-content" class="main-content">
    <div class="title">Clients</div>
    <a href="/create">Create new client</a>
    <div class="clients-grid" id="clients-grid"></div>
    <div class="buttons-grid" id="buttons-grid"></div>
</div>
<script src="{{asset('js/renderClientsTable.js')}}"></script>
<script src="{{asset('js/generatePageButtons.js')}}"></script>
<script type="text/javascript" charset="utf-8">
    //Get all client count
    const pageSize = 10;
    let pages = 0;
    let totalClientCount = 0;

    //Get page load parameters
    let params = (new URL(document.location)).searchParams;
    if (params.size === 0) {
        params = new URLSearchParams({
            'page': '1',
            'pageSize': pageSize
        });
    }

    fetch("http://" + window.location.host + "/clients/get?" + params).then(function (response) {
        return response.json();
    }).then(function (apiJsonData) {
        totalClientCount = parseInt(apiJsonData['total']);
        pages = Math.ceil(totalClientCount / pageSize);
        //Render clients
        renderClientsTable(apiJsonData['clientData']);
        //Generate buttons for clients
        generatePageButtons();
    });
</script>
</body>
</html>
