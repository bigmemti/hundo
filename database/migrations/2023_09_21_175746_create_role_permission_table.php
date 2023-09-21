<?php

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('role_permission', function (Blueprint $table) {
            $table->foreignIdFor(Role::class)->constrained();
            $table->foreignIdFor(Permission::class)->constrained();
            $table->timestamps();

            $table->unique(['role_id','permission_id'], 'role_permission_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permission');
    }
};
