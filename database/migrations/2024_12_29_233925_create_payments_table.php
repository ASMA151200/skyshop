<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Exécuter la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // La colonne 'name' doit être de type string
            $table->string('phone'); // La colonne 'phone' pour le numéro de téléphone
            $table->string('email'); // La colonne 'email' pour l'adresse e-mail
            $table->enum('status', ['pending', 'completed', 'failed']); // Statut du paiement
            $table->timestamps(); // Colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Revenir à l'état précédent de la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments'); // Suppression de la table 'payments'
    }
}
