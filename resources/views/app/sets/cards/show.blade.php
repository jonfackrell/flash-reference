<div class="ui fluid card" id="{{ $card->id }}" data-id="{{ $card->id }}">
    <div class="content">
        <div class="ui two column centered grid">
            <div class="column">
                <div class="ui items">
                    <a class="ui red ribbon label">{{ __('Front') }}</a>
                    <div class="item">
                        @if($card->front_image_url)
                            <div class="image">
                                <img src="{{ $card->front_image_url }}">
                            </div>
                        @endif
                        <div class="content">
                            <div class="meta">
                                {!! Form::bind($card)->post()->route('cards.store', [
                                        'card' => $card
                                    ])
                                !!}
                                    {!! Form::textarea('front_text')
                                                ->label('')->hideLabel()
                                                    ->id('front_text_'.$card->id)
                                                ->addClass('summernote');
                                    !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="content">
                    <div class="ui items">
                        <a class="ui teal right ribbon label">{{ __('Back') }}</a>
                        <div class="item">
                            @if($card->back_image_url)
                                <div class="image">
                                    <img src="{{ $card->back_image_url }}">
                                </div>
                            @endif
                            <div class="content">
                                <div class="meta">
                                    {!! Form::bind($card)->post()->route('cards.store', [
                                            'card' => $card
                                        ])
                                    !!}
                                        {!! Form::textarea('back_text')
                                                    ->label('')->hideLabel()
                                                    ->id('back_text_'.$card->id)
                                                    ->addClass('summernote');
                                        !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="extra content">
        <div class="ui two column centered grid">
            <div class="column">
                {!! Form::post()->route('cards.image.upload', [
                        'card' => $card
                    ])
                    ->addClass('image-upload-form')
                    ->enctype('multipart/form-data')
                !!}
                    <input type="file" name="front_image" class="inputfile" id="front_image_{{ $card->id }}" />
                    <label for="front_image_{{ $card->id }}" class="ui icon small black button" title="@if($card->front_image_url) {{ __('Change Image') }} @else {{ __('Add Image') }} @endif">
                        <i class="ui image icon"></i>
                    </label>
                {!! Form::close() !!}
            </div>
            <div class="column">
                <div class="right floated">
                    {!! Form::delete()->route('cards.destroy', [
                            'card' => $card
                        ])
                    !!}
                        <button type="submit" class="ui icon red button" title="{{ __('Delete Card') }}">
                            <i class="trash icon"></i>
                        </button>
                    {!! Form::close() !!}
                </div>
                {!! Form::post()->route('cards.image.upload', [
                        'card' => $card
                    ])
                    ->addClass('image-upload-form')
                    ->enctype('multipart/form-data')
                !!}
                    <input type="file" name="back_image" class="inputfile" id="back_image_{{ $card->id }}" />
                    <label for="back_image_{{ $card->id }}" class="ui icon small black button" title="@if($card->back_image_url) {{ __('Change Image') }} @else {{ __('Add Image') }} @endif">
                        <i class="ui image icon"></i>
                    </label>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
