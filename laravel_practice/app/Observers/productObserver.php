<?php

namespace App\Observers;

use App\Models\product;

class productObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function saving(product $product)
    {
        //
        $product->random = random_int(100000, 999999);
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function updated(product $product)
    {
        //
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function deleted(product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function restored(product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Models\product  $product
     * @return void
     */
    public function forceDeleted(product $product)
    {
        //
    }
}