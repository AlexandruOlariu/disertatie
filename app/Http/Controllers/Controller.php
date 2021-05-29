<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sitemap()
    {
        // create new sitemap object
        $sitemap = App::make('sitemap');
        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 60);
        // check if there is cached sitemap and build new only if is not
        if (!$sitemap->isCached()) {
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(URL::to('/'), '2021-02-25T20:10:00+02:00', '1.0', 'monthly');
            $sitemap->add(URL::to('/home'), '2021-02-26T12:30:00+02:00', '0.05', 'monthly');
            // get all posts from db
            $posts = Post::query()->orderBy('created_at', 'desc')->get();
            // add every post to the sitemap
            foreach ($posts as $post) {
                // add item with images
                $sitemap->add(URL::to('/post/'.$post->id),$post->created_at,'0.5');
            }
        }
        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
    }
}
