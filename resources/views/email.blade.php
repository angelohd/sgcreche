<html>
    <form action="{{ route('enviar') }}" method="POST">
        @csrf
        <button type="submit">Enviar email</button>
    </form>
</html>
