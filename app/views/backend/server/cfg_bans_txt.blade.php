# GUID,TIME,REASON
@foreach($bans as $ban)
{{ $ban->guid }} {{ $ban->time }} "{{ $ban->reason }}"
@endforeach