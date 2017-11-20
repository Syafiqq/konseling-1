<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCounselorAccount
 * @noinspection PhpUndefinedMethodInspection
 */
class CreateCounselorAccountsTable extends Migration
{
    /**
     * @var Illuminate\Database\Schema\Builder
     */
    private $schema;
    /**
     * @var string
     */
    private $tableName;

    /**
     * CreateCounselorAccount constructor.
     */
    public function __construct()
    {
        $this->schema    = \Illuminate\Support\Facades\Schema::getFacadeRoot();
        $this->tableName = 'counselor_accounts';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!$this->schema->hasTable($this->tableName))
        {
            /** @var Illuminate\Database\Connection $db */
            $db = \Illuminate\Support\Facades\DB::getFacadeRoot();
            $this->schema->create($this->tableName, function (Blueprint $table) use ($db) {
                $table->increments('id');
                $table->string('credential', 100)->unique();
                $table->string('name', 100);
                $table->enum('gender', ['male', 'female']);
                $table->string('avatar', 100)->nullable();
                $table->string('school', 100)->nullable();
                $table->string('school_head', 100)->nullable();
                $table->string('school_head_credential', 100)->nullable();
                $table->string('password', 60);
                $table->rememberToken();
                $table->timestamp('created_at')->default($db->raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default($db->raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            });
        }
        else
        {
            echo 'Table Already Exists';
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }

}
