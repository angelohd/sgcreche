<html>
    <form action="{{ route('enviar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">exportar do excel</button>
    </form>
</html>
