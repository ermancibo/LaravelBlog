<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class FeedController extends Controller
{
    //
    public function index(){
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        //$feed->setCache(60, 'laravelFeedKey');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            $posts = Feed::where('status',1)->orderBy('created_at', 'desc')->take(10)->get();
            //return dd($posts);
            // set your feed's title, description, link, pubdate and language
            $feed->title = config('settings.title');
            $feed->description = config('settings.description');
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $posts[0]->created_at;
            $feed->lang = 'en';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($posts as $post)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add($post->title, $post->user->name, URL::to('/posts/'.$post->slug), $post->created_at, $post->content, $post->content);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }
}
