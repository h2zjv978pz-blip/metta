<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('buddhist_sites', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
        });

        $sites = \DB::table('buddhist_sites')->select('id', 'name')->get();
        $usedSlugs = [];

        foreach ($sites as $site) {
            $base = Str::slug($site->name) ?: 'site';
            $slug = $base;
            $i = 1;

            while (in_array($slug, $usedSlugs) || \DB::table('buddhist_sites')->where('slug', $slug)->exists()) {
                $slug = $base . '-' . (++$i);
            }

            $usedSlugs[] = $slug;
            \DB::table('buddhist_sites')->where('id', $site->id)->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        Schema::table('buddhist_sites', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
