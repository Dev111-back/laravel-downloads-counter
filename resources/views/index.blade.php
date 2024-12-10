<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>File List</h1>
    <ul>
        @foreach ($files as $file)
            <li>
                <span id="downloads-{{ $file->id }}">{{ $file->downloads }}</span> downloads for 
                {{ $file->name }}
                <a href="{{ route('files.download', $file->id) }}" onclick="updateDownloadCount({{ $file->id }})" target="_blank">Download</a>
            </li>
        @endforeach
    </ul>

    <script>
        function updateDownloadCount(fileId) {
            
            setTimeout(() => {
                axios.get(`/downloads/count/${fileId}`)
                    .then(response => {
                        document.getElementById(`downloads-${fileId}`).innerText = response.data.downloads;
                    })
                    .catch(error => console.error('Error fetching download count:', error));
            }, 1000); 
        }
    </script>
</body>
</html>
