<?php

namespace App\Http\Controllers;

use App\Models\movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function show() {
        $movies = movies::paginate(15);
        $related_movies = [];
        foreach($movies as $movie) {
            $related_movies[$movie->movie_titles] = Http::get('https://related-movies.herokuapp.com/' . $movie->movie_titles)->body();
            $related_movies[$movie->movie_titles] = json_decode($related_movies[$movie->movie_titles], true);
            if($related_movies[$movie->movie_titles] == null) {
                $related_movies[$movie->movie_titles] = ["No related movies at the moment!"];
            }
        }

        foreach($movies as $movie) {
            $related_movies[$movie->movie_titles] = array_slice($related_movies[$movie->movie_titles], 0, 10);
        }

        return view('related_movies', compact('movies', 'related_movies'));
    }
}
