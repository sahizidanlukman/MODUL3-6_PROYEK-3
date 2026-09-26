<form action="{{ route('activities.update', $activity->id) }}" method="POST">
    @csrf
    @method('PUT')

    @include('activities._form')

    <button type="submit">Update Kegiatan</button>
</form>