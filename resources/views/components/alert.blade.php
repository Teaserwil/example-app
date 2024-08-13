@props(['type_alert' => 'note'])
@props(['attributes_button' => []])
@props(['attributes_text' => []])
@switch($type_alert)
    @case('note')
        {{ $classes_button ='btn btn-lg btn-primary'}}
        {{ $classes_text = '' }}
        @break

    @case('success')
        {{ $classes_button ='btn btn-lg btn-success'}}
        {{ $classes_text = 'text-success' }}
        @break

    @case('warning')
        {{ $classes_button ='btn btn-lg btn-danger'}}
        {{ $classes_text = 'text-warning' }}
        @break

    @default
        {{ $classes_button ='btn btn-lg btn-primary'}}
        {{ $classes_text = '' }}
@endswitch
<div class="modal modal-sheet position-absolute d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
     id="modalSheet">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                @isset($title)
                    <h1 class="modal-title fs-5 {{ $classes_text }}">{{ $title }}</h1>
                @endisset
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                @isset($message)
                    <p class="{{ $classes_text }}">{{ $message }} - {{ $type_alert }}</p>
                @endisset
            </div>
            <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                <button type="button" class="{{ $classes_button }}" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>