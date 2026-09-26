<form action="{{ route('activities.store') }}" method="POST">
    @csrf
    
    @include('activities._form')

    <button type="submit">Simpan Kegiatan</button>
</form>