<?php

use App\Models\User;
use App\Models\Peership;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peerships', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'first_user_id');
            $table->foreignIdFor(User::class, 'second_user_id');
            $table->foreignIdFor(User::class, 'requesting_user_id');
            $table->string('status')->default(Peership::PENDING_STATE);
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
        Schema::dropIfExists('peerships');
    }
}
