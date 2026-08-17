<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug', 190)->nullable()->unique()->after('type');
        });

        DB::table('posts')->select('id', 'title')->orderBy('id')->each(function ($post) {
            $base = Str::slug($post->title) ?: 'artikel';
            $slug = $base;
            $suffix = 2;

            while (DB::table('posts')->where('slug', $slug)->exists()) {
                $slug = $base . '-' . $suffix++;
            }

            DB::table('posts')->where('id', $post->id)->update(['slug' => $slug]);
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropUnique('posts_slug_unique');
            $table->dropColumn('slug');
        });
    }
};
