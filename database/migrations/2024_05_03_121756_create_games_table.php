<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Developer;
use App\Models\Genre;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string("gameName");
            $table->foreignIdFor(Developer::class)->nullable();;
            $table->foreignIdFor(Genre::class);
            $table->timestamps();
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreignIdFor(Genre::class);
        });

        Schema::table('games', function (Blueprint $table) {
            $table->unsignedBigInteger('developer_id')->nullable()->change();
            $table->foreign("developer_id")->references("id")->on("developers");
            $table->foreign("genre_id")->references("id")->on("genres");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');

        Schema::table('games', function (Blueprint $table) {
            $table->unsignedBigInteger('developer_id')->change();
            $table->dropForeign(['genre_id']);
            $table->dropColumn('genre_id');
        });
    }
};
