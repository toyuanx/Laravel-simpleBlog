<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		for ($i=14; $i < 22; $i++) {
			\App\Comment::create([
				'nickname'   => 'yx ',
				'email'    => '4458@qq.com '.$i,
				'website' => 'https://toyuanx.github.io',
				'content'   => 'hiahia '.$i,
				'article_id'    => $i,
				'website' => 'https://toyuanx.github.io'
        ]);
		}
    }
}
