<?php

namespace App\Listeners;

use App\Models\Store;
use Prettus\Repository\Events\RepositoryEntityCreated;

class CreateCodeStoreListenet
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RepositoryEntityCreated $event)
    {
        $model = $event->getModel();
        if(!($model instanceof  Store)){
            return;
        }

       $model->order_code = date('Y-m-').$model->id;
       $model->save();
    }
}
