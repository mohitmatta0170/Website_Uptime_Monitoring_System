
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('url');
            $table->enum('last_status',['up','down','unknown'])->default('unknown');
            $table->timestamp('last_checked_at')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('websites');
    }
};
