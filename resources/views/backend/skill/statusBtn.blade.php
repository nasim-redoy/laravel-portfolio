<form class="statusChangeById">
    @csrf
    @method('PATCH')
    <input type="hidden" value="{{$id}}" name="skillId">
    @if ($status == 1)
        <button type="submit" name="status" id="{{$id}}" class="status btn btn-success btn-sm">Active</button>
    @else
        <button type="submit" name="status" id="{{$id}}" class="status btn btn-warning btn-sm">Inactive</button>
    @endif
</form>
