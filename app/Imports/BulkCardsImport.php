<?php

namespace App\Imports;

use App\Card;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BulkCardsImport implements ToModel, WithHeadingRow
{

    public $path;
    public $setId;
    /**
     * Create a new import instance.
     *
     * @return void
     */
    public function __construct($setId, $path)
    {
        $this->setId = $setId;
        $this->path = $path;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $card = new Card([
            'set_id' => $this->setId,
            'front_text' => $row['front_text'],
            'back_text'    => $row['back_text'],
        ]);

        if($row['front_image']){
            $card
                ->addMedia($this->path . DIRECTORY_SEPARATOR . $row['front_image'])
                ->withCustomProperties(['side' => 'front'])
                //->withResponsiveImages()
                ->toMediaCollection();

            /*$card->front_image_url = $card->loadMedia()->filter(function ($media, $key) {
                return $media->custom_properties['side'] == 'front';
            })->first()->getFullUrl()*/;
        }

        if($row['back_image']){
            $card
                ->addMedia($this->path . DIRECTORY_SEPARATOR . $row['back_image'])
                ->withCustomProperties(['side' => 'back'])
                //->withResponsiveImages()
                ->toMediaCollection();

            /*$card->back_image_url = $card->getMedia()->filter(function ($media, $key) {
                return $media->custom_properties['side'] == 'back';
            })->first()->getFullUrl();*/
        }

        $card->save();

        return $card;
    }
}
