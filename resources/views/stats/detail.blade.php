<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .button {
            background-color: cyan;
            /* Green */
            border: none;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            width: 200px;
        }

        .btn {
            border-radius: 50px;
        }
    </style>
</head>

<body style="background-color: cyan;">
    <div class="container" style="background-color: white;">
        <div class="mt-3 p-4">
            <a href="/stats" class="btn btn-danger"><span data-feather="arrow-left"></span> Back to list</a>
        </div>

        <div align="center" class="mb-4">
            <div class="card border border-white" style="width: 18rem;">
                <img class="card-img-top" src="{{$sprites['front_default']}}" alt="Card image cap">
                <div class="card-body">
                    <h1>{{ucfirst($species['name'])}}</h1>

                    @foreach ($types as $t)
                    <button type="button" class="btn btn-primary">{{ucfirst($t['type']['name'])}}</button>&nbsp;
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                {{$desc['flavor_text']}}
            </div>
        </div>
        <div class="row" align="center" class="mb-3">
            <div class="col-lg-6">
                <button class="button btn" onclick="showhide()">STATS</button>
            </div>
            <div class="col-lg-6">
                <button class="button btn" onclick="show()">EVOLUTIONS</button>
            </div>
        </div><br />
        <hr>
        <div id="statss" class="p-4 mb-4">
            @foreach ($stats as $st)
            <div class="row">
                <div class="col-2">
                    {{ucfirst($st['stat']['name'])}}
                </div>
                <div class="col-1">
                    {{$st['base_stat']}}
                </div>
                <div class="col-9">
                    <div class="progress">
                        <?php $prcnt = $st['base_stat']; ?>
                        <div class="progress-bar" role="progressbar" style="width: <?= $prcnt; ?>%; border-radius: 50px;" aria-valuenow="{{$st['base_stat']}}" aria-valuemin="0" aria-valuemax="200"> {{$st['base_stat']}}</div>
                    </div>
                </div>
            </div>
            @endforeach<br />
            <hr>
            <h4 align="center">Weaknesses</h4>
            <hr>
            <h4 align="center">Abilities</h4>
            @foreach ($abilities as $ab)
            <b>{{ucfirst($ab['ability']['name'])}}</b><br />Desc....<br />
            @endforeach
            <hr>
            <h4 align="center">Breeding</h4>
            <div class="row" align="center">
                <div class="col-4">
                    Egg Group
                </div>
                <div class="col-4">
                    Hetch Time
                </div>
                <div class="col-4">
                    Gender
                </div>
            </div>
            <hr>
            <h4 align="center">Sprites</h4>
            <div class="row" align="center">
                <div class="col-6">
                    Normal<br />
                    <img src="{{$sprites['front_default']}}" alt="gambar" class="img-fluid" style="width: 300px;">
                </div>
                <div class="col-6">
                    Shiny<br />
                    <img src="{{$sprites['front_shiny']}}" alt="gambar" class="img-fluid" style="width: 300px;">
                </div>
            </div>
        </div>
        <div id="evolution">
            @foreach ($chain as $c)
            <div class="row" align="center">
                <div class="col-4">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$id}}.png" alt="gambar" class="img-fluid">
                    <br/>{{ucfirst($species['name'])}}
                </div>
                <div class="col-4">
                    Lv {{$c['evolution_details'][0]['min_level']}}
                    <hr>
                </div><?php $id++; ?>
                <div class="col-4">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$id}}.png" alt="gambar" class="img-fluid">
                    <br/>{{$c['species']['name']}}
                </div>
            </div>
            @foreach ($c['evolves_to'] as $ev)
            <div class="row" align="center">
                <div class="col-4">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$id}}.png" alt="gambar" class="img-fluid">
                    <br/>{{$c['species']['name']}}
                </div>
                <div class="col-4">
                    Lv {{$ev['evolution_details'][0]['min_level']}}
                    <hr>
                </div><?php $id++; ?>
                <div class="col-4">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{$id}}.png" alt="gambar" class="img-fluid">
                    <br/>{{$ev['species']['name']}}
                </div>
            </div>

            @endforeach<br />
            @endforeach<br />


        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script>
            var div = document.getElementById("evolution");
            var div2 = document.getElementById("statss");
            div.style.display = "none";
            div2.style.display = "block";

            function showhide() {
                var div = document.getElementById("evolution");
                var div2 = document.getElementById("statss");
                div.style.display = "none";
                div2.style.display = "block";
            }

            function show() {
                var div = document.getElementById("evolution");
                var div2 = document.getElementById("statss");
                div2.style.display = "none";
                div.style.display = "block";
            }
        </script>
</body>

</html>