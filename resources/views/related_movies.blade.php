<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Movies Hub</title>
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-lg-3 p-2">
                <div class="card">
                    <img src="img/movie_icon.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->movie_titles }}</h5>
                        <p class="card-text">Very interesting movie description!</p>
                        <div class="d-flex justify-content-end">
                            <button data-bs-toggle="modal" data-bs-target={{ '#movie-details-modal' . $movie->id }}
                                class="btn btn-primary">Movie Details</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id={{ 'movie-details-modal' . $movie->id }} tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $movie->movie_titles }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>{{ $movie->movie_descriptions }}</p>
                            @foreach ($related_movies[$movie->movie_titles] as $related_movie)
                                <p>{{$related_movie}}</p>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    {{ $movies->links() }}

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
