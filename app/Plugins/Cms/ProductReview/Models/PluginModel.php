<?php
#App\Plugins\Cms\ProductReview\Models\PluginModel.php
namespace App\Plugins\Cms\ProductReview\Models;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class PluginModel extends Model
{
    public $table = SC_DB_PREFIX.'product_review';
    protected $connection = SC_CONNECTION;
    protected $guarded    = [];

    /**
     * [getPointProduct description]
     *
     * @param   [type]  $pId  [$pId description]
     *
     * @return  [type]        [return description]
     */
    public function getPointProduct($pId) {
        return $this->where('product_id', $pId)->where('status', 1)->get();
    }
    
    public function uninstallExtension()
    {
        $this->uninstall();

        return ['error' => 0, 'msg' => 'uninstall success'];
    }

    public function installExtension()
    {
        $this->install();
        return ['error' => 0, 'msg' => 'install success'];
    }
    

    //=========================

    public function uninstall()
    {
        if (Schema::hasTable($this->table)) {
            Schema::drop($this->table);
        }
    }

    public function install()
    {
        $this->uninstall();

        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->string('name', 100);
            $table->integer('point');
            $table->string('comment', 300);
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

}
