<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pokemon</title>

    <style>
        div.mouseover:hover {
            background-color: Cyan;
        }
    </style>
</head>

<body style="background-color: cyan;">
    <div class="container mb-4 mt-4 " style="background-color: white;">
        <h1 align="center">Pokemon</h1><br />
        <?php $no = 1; ?>
        @foreach($datas as $data)
        <a href="/stats/{{ $loop->iteration }}" class="text-decoration-none text-dark">
            <div class="row border border-top-0 mouseover">
                <div class="col-2">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{{ $loop->iteration }}.png" alt="gambar" class="img-fluid">

                </div>
                <div class="col-6" id="name_pokemon">
                    {{$data['name']}}<br />
                    <?php
                    $list_no = sprintf("%03d", $no++);
                    echo "#$list_no "; // Hasil #000
                    ?>
                </div>
                <div class="col-4" id="name_pokemon">
                    @foreach($data['types'] as $t)
                          <button type="button" class="btn btn-info">{{ucfirst($t['type']['name'])}}</button>&nbsp;
                    @endforeach 
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>