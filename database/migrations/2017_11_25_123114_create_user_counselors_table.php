<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCounselorsTable extends Migration
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
        $this->tableName = 'user_counselors';
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
                $table->integer('user')->unsigned();
                $table->string('school', 100)->nullable();
                $table->string('school_head', 100)->nullable();
                $table->string('school_head_credential', 100)->nullable();
                $table->foreign('user')
                    ->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        if ($this->schema->hasTable($this->tableName))
        {
            $this->schema->table($this->tableName, function (Blueprint $table) {
                $table->dropForeign('user_counselors_user_foreign');
            });
        }
        else
        {
            echo 'Table Not Exists';
        }

        $this->schema->dropIfExists($this->tableName);
    }
}
