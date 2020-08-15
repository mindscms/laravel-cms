<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker      = Factory::create();
        $comments    = [];
        $users       = collect(User::where('id', '>', 2)->get()->modelKeys());
        $posts       = collect(Post::wherePostType('post')->whereStatus(1)->whereCommentAble(1)->get());

        for($i = 0 ; $i < 5000; $i++) {

            $selected_post = $posts->random();
            $post_date = $selected_post->created_at->timestamp;
            $current_date = Carbon::now()->timestamp;

            $comments[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'url' => $faker->url,
                'ip_address' => $faker->ipv4,
                'comment' => $faker->paragraph(2, true),
                'status' => rand(0, 1),
                'post_id' => $selected_post->id,
                'user_id' => $users->random(),
                'created_at' => date('Y-m-d H:i:s', rand($post_date, $current_date)),
                'updated_at' => date('Y-m-d H:i:s', rand($post_date, $current_date)),
            ];

        }


        $chunks = array_chunk($comments, 500);
        foreach ($chunks as $chunk) {
            Comment::insert($chunk);
        }


    }
}
