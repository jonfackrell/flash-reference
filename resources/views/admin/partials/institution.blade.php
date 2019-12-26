<div class="ui main raised very padded text container segment">
    <h3 class="ui header">
        {{ $institution->name }}
    </h3>

    <div class="ui fluid action input">
        <input type="text" id="{{ 'consumer_key_' . $institution->id }}" value="{{ $institution->consumer_key }}">
        <button class="ui teal right labeled icon button" onclick="copy('{{ 'consumer_key_' . $institution->id }}')">
            <i class="copy icon"></i>
            Copy
        </button>
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="ui fluid action input">
        <input type="text" id="{{ 'secret_' . $institution->id }}" value="{{ $institution->secret }}">
        <button class="ui teal right labeled icon button" onclick="copy('{{ 'secret_' . $institution->id }}')">
            <i class="copy icon"></i>
            Copy
        </button>
    </div>

</div>

@push('scripts')
    <script>
        function copy(target) {
            /* Get the text field */
            var copyText = document.getElementById(target);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");
        }
    </script>
@endpush
