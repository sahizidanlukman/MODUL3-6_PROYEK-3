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
        <p><strong>Kategori:</strong> {{ $activity->category }}</p>
        <p><strong>Status:</strong> {{ $activity->status }}</p>
    </div>

    <br>
    <a href="{{ route('activities.index') }}">Kembali ke Daftar</a>
</body>
</html>
