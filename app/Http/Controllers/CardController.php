<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Card $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        if($request->has('front_text')){
            $card->front_text = $request->get('front_text');
        }
        if($request->has('back_text')){
            $card->back_text = $request->get('back_text');
        }

        $card->save();

        return response()->json($card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Card $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return back();
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Card  $card
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request, Card $card)
    {
        $mediaItems = $card->getMedia();

        if($request->hasFile('front_image')){
            foreach ($mediaItems as $media){
                if($media->getCustomProperty('side') == 'front'){
                    $media->delete();
                }
            }
            $card
                ->addMediaFromRequest('front_image')
                ->usingFileName(Str::uuid().'.'.$request->file('front_image')->extension())
                ->withCustomProperties(['side' => 'front'])
                //->withResponsiveImages()
                ->toMediaCollection();
        }
        if($request->hasFile('back_image')){
            foreach ($mediaItems as $media){
                if($media->getCustomProperty('side') == 'back'){
                    $media->delete();
                }
            }
            $card
                ->addMediaFromRequest('back_image')
                ->usingFileName(Str::uuid().'.'.$request->file('back_image')->extension())
                ->withCustomProperties(['side' => 'back'])
                //->withResponsiveImages()
                ->toMediaCollection();
        }

        return redirect()->route('sets.show', [
            'set' => $card->set_id,
            '#' . $card->id,
        ]);
    }
}
