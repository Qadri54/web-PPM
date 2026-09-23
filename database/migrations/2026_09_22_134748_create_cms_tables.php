<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
                Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('operational_hours')->nullable();
            $table->json('social_media_links')->nullable();
            $table->text('google_maps_embed')->nullable();
            $table->timestamps();
        });

        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('sambutan_image')->nullable();
            $table->string('sambutan_name')->nullable();
            $table->string('sambutan_title')->nullable();
            $table->text('sambutan_text')->nullable();
            $table->string('struktur_image')->nullable();
            $table->text('tupoksi_text')->nullable();
            $table->timestamps();
        });

        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('image_path');
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('link_cta')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('icon_image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('link_terkaits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('url');
            $table->string('logo_image')->nullable();
            $table->timestamps();
        });

        Schema::create('kategori_dokumens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_dokumens')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->year('tahun_terbit');
            $table->string('file_path');
            $table->timestamps();
        });

        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('image_path');
            $table->string('category_label')->nullable();
            $table->date('date_event')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
        Schema::dropIfExists('dokumens');
        Schema::dropIfExists('kategori_dokumens');
        Schema::dropIfExists('link_terkaits');
        Schema::dropIfExists('layanans');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('profils');
        Schema::dropIfExists('pengaturans');
        Schema::dropIfExists('pesans');
    }
};
