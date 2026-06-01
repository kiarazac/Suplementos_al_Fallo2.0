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

        /*
        |--------------------------------------------------------------------------
        | TABLA USERS
        |--------------------------------------------------------------------------
        | Acá guardamos toda la información de los usuarios
        | registrados en el sistema.
        |--------------------------------------------------------------------------
        */

        Schema::create('users', function (Blueprint $table) {

            // ID único autoincremental
            $table->id();



            /*
            |--------------------------------------------------------------------------
            | DATOS PERSONALES
            |--------------------------------------------------------------------------
            */

            // Nombre del usuario
            $table->string('name');

            // Apellido
            $table->string('apellido');



            /*
            |--------------------------------------------------------------------------
            | USERNAME
            |--------------------------------------------------------------------------
            | unique() evita usernames repetidos.
            |--------------------------------------------------------------------------
            */

            $table->string('username')->unique();



            /*
            |--------------------------------------------------------------------------
            | EMAIL
            |--------------------------------------------------------------------------
            | También es único para evitar duplicados.
            |--------------------------------------------------------------------------
            */

            $table->string('email')->unique();



            /*
            |--------------------------------------------------------------------------
            | DATOS DE DIRECCIÓN
            |--------------------------------------------------------------------------
            */

            $table->string('direccion');

            $table->string('ciudad');

            $table->string('pais');



            /*
            |--------------------------------------------------------------------------
            | ROLE
            |--------------------------------------------------------------------------
            | Define el tipo de usuario:
            |
            | admin
            | customer
            |--------------------------------------------------------------------------
            |
            | Todos los usuarios nuevos serán customer
            | automáticamente.
            |--------------------------------------------------------------------------
            */

            $table->string('role')
                  ->default('customer');



            /*
            |--------------------------------------------------------------------------
            | EMAIL VERIFICADO
            |--------------------------------------------------------------------------
            | Laravel lo usa para verificar correos si más adelante
            | implementás verificación por email.
            |--------------------------------------------------------------------------
            */

            $table->timestamp('email_verified_at')->nullable();



            /*
            |--------------------------------------------------------------------------
            | PASSWORD
            |--------------------------------------------------------------------------
            */

            $table->string('password');



            /*
            |--------------------------------------------------------------------------
            | REMEMBER TOKEN
            |--------------------------------------------------------------------------
            | Laravel lo usa para "recordarme"
            | al iniciar sesión.
            |--------------------------------------------------------------------------
            */

            $table->rememberToken();



            /*
            |--------------------------------------------------------------------------
            | CREATED_AT Y UPDATED_AT
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

        });





        /*
        |--------------------------------------------------------------------------
        | PASSWORD RESET TOKENS
        |--------------------------------------------------------------------------
        | Tabla utilizada por Laravel para recuperación
        | de contraseñas.
        |--------------------------------------------------------------------------
        */

        Schema::create('password_reset_tokens', function (Blueprint $table) {

            $table->string('email')->primary();

            $table->string('token');

            $table->timestamp('created_at')->nullable();

        });





        /*
        |--------------------------------------------------------------------------
        | SESSIONS
        |--------------------------------------------------------------------------
        | Laravel guarda acá las sesiones activas.
        |--------------------------------------------------------------------------
        */

        Schema::create('sessions', function (Blueprint $table) {

            $table->string('id')->primary();

            $table->foreignId('user_id')
                  ->nullable()
                  ->index();

            $table->string('ip_address', 45)
                  ->nullable();

            $table->text('user_agent')
                  ->nullable();

            $table->longText('payload');

            $table->integer('last_activity')
                  ->index();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('users');

        Schema::dropIfExists('password_reset_tokens');

        Schema::dropIfExists('sessions');

    }
};