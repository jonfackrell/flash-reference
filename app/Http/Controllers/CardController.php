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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $card = new Card();
        $card->set_id = $request->set_id;
        $card->save();

        if(request()->ajax()) {
            return view('app.sets.cards.show', [
                'card' => $card,
            ]);
        }
        else{
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = new Card();
        $card->set_id = $request->set_id;
        $card->save();

        /*return redirect()->route('sets.show', [
            'set' => $card->set_id,
            '#' . $card->id,
        ]);*/
        return view('app.sets.cards.show', [
            'card' => $card,
        ]);
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

        if(request()->ajax()){
            return response()->json([
                'status' => 'deleted',
            ]);
        }else{
            return back();
        }
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
            $media = $card
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
            $media = $card
                ->addMediaFromRequest('back_image')
                ->usingFileName(Str::uuid().'.'.$request->file('back_image')->extension())
                ->withCustomProperties(['side' => 'back'])
                //->withResponsiveImages()
                ->toMediaCollection();
        }

        return $request->hasFile('front_image') ? ['image' => 'front_image', 'image_url' => $media->getFullUrl()] :  ['image' => 'back_image', 'image_url' => $media->getFullUrl()];

        /*return redirect()->route('sets.show', [
            'set' => $card->set_id,
            '#' . $card->id,
        ]);*/
    }

    /**
     * Star the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function star(Request $request, Card $card)
    {
        $user = auth()->user();

        if($request->get('action') == 'true'){
            $user->starred()->attach($card);
        }else{
            $user->starred()->detach($card);
        }

        return response()->json($card);
    }
}
