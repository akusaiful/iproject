<?php

namespace App\Observers;

use App\Models\Mohon;

class MohonObserver
{
    /**
     * Handle the Mohon "created" event.
     *
     * @param  \App\Models\Mohon  $mohon
     * @return void
     */
    public function created(Mohon $mohon)
    {
        //
    }

    /**
     * Handle the Mohon "updated" event.
     *
     * @param  \App\Models\Mohon  $mohon
     * @return void
     */
    public function updated(Mohon $mohon)
    {
        //
    }

    /**
     * Handle the Mohon "deleted" event.
     *
     * @param  \App\Models\Mohon  $mohon
     * @return void
     */
    public function deleted(Mohon $mohon)
    {
        //
    }

    /**
     * Handle the Mohon "restored" event.
     *
     * @param  \App\Models\Mohon  $mohon
     * @return void
     */
    public function restored(Mohon $mohon)
    {
        //
    }

    /**
     * Handle the Mohon "force deleted" event.
     *
     * @param  \App\Models\Mohon  $mohon
     * @return void
     */
    public function forceDeleted(Mohon $mohon)
    {
        //
    }
}
