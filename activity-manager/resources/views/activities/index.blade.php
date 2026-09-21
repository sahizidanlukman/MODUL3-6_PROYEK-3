<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kegiatan</title>
</head>
<body>
    <h1>Daftar Kegiatan</h1>

    @forelse ($activities as $activity)
        <article>
            <h2>{{ $activity->title }}</h2>
            <p>{{ $activity->activity_date }}</p>
            <p>Status: {{ $activity->status }}</p>
        </article>
    @empty
        <p>Belum ada kegiatan.</p>
    @endforelse
</body>
</html>