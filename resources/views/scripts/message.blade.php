@if ($message = Session::get('message'))
    <script>
        notification.showNotification('{{ $message }}', 'success', 'top', 'center');
    </script>
@endif