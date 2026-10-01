<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kegiatan</title>
</head>
<body>
    <h1>Daftar Kegiatan</h1>

    <p><a href="{{ route('activities.create') }}">+ Tambah Kegiatan Baru</a></p>

    {{-- Form Filter Status & Search --}}
    <form method="GET" action="{{ route('activities.index') }}" style="margin-bottom: 20px;">
        <label for="status"><strong>Filter Status:</strong></label>
        <select name="status" id="status" onchange="this.form.submit()">
            <option value="">Semua Status</option>
            <option value="Planned" {{ ($selectedStatus ?? request('status')) == 'Planned' ? 'selected' : '' }}>Planned</option>
            <option value="Ongoing" {{ ($selectedStatus ?? request('status')) == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
            <option value="Done" {{ ($selectedStatus ?? request('status')) == 'Done' ? 'selected' : '' }}>Done</option>
            <option value="draft" {{ ($selectedStatus ?? request('status')) == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ ($selectedStatus ?? request('status')) == 'published' ? 'selected' : '' }}>Published</option>
        </select>

        {{-- Input Search --}}
        <input type="text" name="search" placeholder="Cari kegiatan..." value="{{ request('search') }}" style="margin-left: 10px;">
        <button type="submit">Cari</button>

        @if(request('status') || request('search'))
            <a href="{{ route('activities.index') }}" style="margin-left: 5px;">Reset</a>
        @endif
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

    {{-- Link Pagination --}}
    @if(method_exists($activities, 'links'))
        <div style="margin-top: 20px;">
            {{ $activities->withQueryString()->links() }}
        </div>
    @endif
</body>
</html>