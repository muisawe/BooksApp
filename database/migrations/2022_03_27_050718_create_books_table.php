<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use App\Models\Book;
use App\Models\Category;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('avatar')->nullable();
            $table->string('author');
            $table->foreignIdFor(Category::class);
            $table->timestamps();
        });


        Schema::create('favorite', function (Blueprint $table) {
            // $table->id();

            $table->primary(["user_id", 'book_id']);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Book::class);

            $table->timestamps();
        });
        Schema::create('ratings', function (Blueprint $table) {
            // $table->id();

            $table->primary(["user_id", 'book_id']);

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Book::class);
            $table->tinyInteger('rate');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
