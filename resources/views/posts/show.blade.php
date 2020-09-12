@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px;">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                                @if ($post->user->id != auth()->user()->id )
                                    <follow-button user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-button>
                                @else
                                    <delete-post-button post="{{ $post->id }}" userid="{{ $post->user_id }}"></delete-post-button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span> {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import DeletePostButton from "../../js/components/DeletePostButton";
    export default {
        components: {DeletePostButton}
    }
</script>
