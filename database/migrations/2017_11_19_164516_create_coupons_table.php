<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateCouponsTable
 */
class CreateCouponsTable extends Migration
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
     * CreateCouponsTable constructor.
     */
    public function __construct()
    {
        $this->schema    = \Illuminate\Support\Facades\Schema::getFacadeRoot();
        $this->tableName = 'coupons';
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
                $table->string('coupon', 20)->unique();
                $table->integer('assignee')->unsigned();
                $table->timestamp('created_at')->default($db->raw('CURRENT_TIMESTAMP'));

                $table->foreign('assignee')
                    ->references('id')->on('counselor_accounts')
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
                $table->dropForeign('coupons_assignee_foreign');
            });
        }
        else
        {
            echo 'Table Not Exists';
        }

        $this->schema->dropIfExists($this->tableName);
    }

}
