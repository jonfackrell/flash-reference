<?php

namespace App\Listeners;

use App\Card;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddMediaUrlToCard
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
    public function handle($event)
    {
        $card = Card::find($event->media->model_id);

        if($event->media->getCustomProperty('side') == 'front'){
            $card->front_image_url = $event->media->getFullUrl();
        }else{
            $card->back_image_url = $event->media->getFullUrl();
        }

        $card->save();
    }
}
