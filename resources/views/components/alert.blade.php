@props(['type_alert' => 'note'])
@props(['title' => ''])
@props(['message' => ''])
@switch($type_alert)
    @case('note')
        <div class="alert alert-info mb-0 rounded-0 text-center small py-2" role="alert">
            @break

            @case('success')
                <div class="alert  alert-success mb-0 rounded-0 text-center small py-2" role="alert">
                    @break

                    @case('warning')
                        <div class="alert alert-warning mb-0 rounded-0 text-center small py-2" role="alert">
                            @break

                            @default
                                <div class="alert alert-info mb-0 rounded-0 text-center small py-2" role="alert">
                                    @endswitch
                                    @isset($title)
                                        <h3>{{ $title }}</h3>
                                    @endisset
                                    @isset($message)
                                        <p>{{ $message }}</p>
                                    @endisset
                                </div>
