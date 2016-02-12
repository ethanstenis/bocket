<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
      
	      $users = factory(App\User::class, 50)->create();
	       
	       // creates a collection of users [App\User 1, User 2];
	      
	      $users->each(function($user) {
	      	
	      	// Create Bookmarks
	      	foreach (range(1, rand(2, 5)) as $int) {
		      	$bookmark = factory(App\Bookmark::class)->make();
		      	$user->bookmarks()->save($bookmark);
	      }

	      	
	      	// Create Tags

	     foreach (range(1, rand(2, 5)) as $int) {
		     	$tag = factory(App\Tag::class)->make();
		     	$user->tags()->save($tag);
	     }



	     $tags = $user->tags;
		     foreach ($tags as $tag) {
		     	$bookmarks = $user->bookmarks;
		     	foreach(range(1, rand(2, 5)) as $int) {
			     	$bookmark = $bookmarks[rand(0, $bookmarks->count() -1)];
				     if	(!$bookmark->bookmarkTags()->where('tag_id', $tag->id)->exists()) {
				     	$bookmark->bookmarkTags()->attach($tag);
		     		}

		     	}
		     }

		});
    }
}
