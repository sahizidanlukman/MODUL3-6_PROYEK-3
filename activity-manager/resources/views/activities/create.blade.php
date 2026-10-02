<form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <strong>Terjadi Kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('activities._form')

    <button type="submit">Simpan Kegiatan</button>
</form>