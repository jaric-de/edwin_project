<form id="deleteForm" action="" method="POST" style="display: none;">
    {{ csrf_field() }}
    {{ method_field('delete') }}
</form>