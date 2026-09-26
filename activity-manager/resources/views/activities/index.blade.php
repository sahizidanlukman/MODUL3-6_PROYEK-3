<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kegiatan</title>
</head>
<body>
    <h1>Daftar Kegiatan</h1>

    <p><a href="{{ route('activities.create') }}">+ Tambah Kegiatan Baru</a></p>

    {{-- Form Filter Status (Independent Challenge) --}}
    <form method="GET" action="{{ route('activities.index') }}" style="margin-bottom: 20px;">
        <label for="status"><strong>Filter Status:</strong></label>
        <select name="status" id="status" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="Planned" {{ ($selectedStatus ?? '') == 'Planned' ? 'selected' : '' }}>Planned</option>
            <option value="Ongoing" {{ ($selectedStatus ?? '') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
            <option value="Done" {{ ($selectedStatus ?? '') == 'Done' ? 'selected' : '' }}>Done</option>
        </select>
    </form>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @forelse ($activities as $activity)
        <article style="margin-bottom: 20px;">
            <h2>{{ $activity->title }}</h2>
            <p>{{ $activity->activity_date }}</p>
            <p>Status: {{ $activity->status }}</p>
            
            <a href="{{ route('activities.show', $activity->id) }}">Detail</a> |
            <a href="{{ route('activities.edit', $activity->id) }}">Edit</a>

            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
            </form>
        </article>
    @empty
        <p>Belum ada kegiatan.</p>
    @endforelse
</body>
</html>
