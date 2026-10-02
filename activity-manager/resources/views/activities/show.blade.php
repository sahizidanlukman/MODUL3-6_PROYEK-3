<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Kegiatan</title>
</head>
<body>
    <h1>Detail Kegiatan</h1>

    <div>
        <h2>{{ $activity->title }}</h2>
        <p><strong>Deskripsi:</strong> {{ $activity->description ?? '-' }}</p>
        <p><strong>Tanggal:</strong> {{ $activity->activity_date }}</p>
        <p><strong>Kategori:</strong> {{ $activity->category->name ?? '-' }}</p>
        <p><strong>Status:</strong> {{ $activity->status }}</p>

        @if ($activity->poster_path)
            <div style="margin-top: 15px;">
                <p><strong>Poster Kegiatan:</strong></p>
                <img src="{{ asset('storage/' . $activity->poster_path) }}" 
                     alt="Poster {{ $activity->title }}" 
                     style="max-width: 300px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
        @endif
    </div>

    <br>
    <a href="{{ route('activities.index') }}">Kembali ke Daftar</a>
</body>
</html>