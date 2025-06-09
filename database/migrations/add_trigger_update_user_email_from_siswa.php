<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerUpdateUserEmailFromSiswa extends Migration
{
    public function up(): void
    {
        DB::unprepared("
            CREATE TRIGGER update_user_email_after_siswa_update
            AFTER UPDATE ON siswas
            FOR EACH ROW
            BEGIN
                IF NEW.email <> OLD.email THEN
                    UPDATE users
                    SET email = NEW.email
                    WHERE id = NEW.users_id;
                END IF;
            END;
        ");
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_user_email_after_siswa_update');
    }
}
