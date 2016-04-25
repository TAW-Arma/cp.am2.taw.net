<?xml version="1.0"?>
<!DOCTYPE squad SYSTEM "squad.dtd">
<?xml-stylesheet href="squad.xsl" type="text/xsl"?>
<squad nick="TAW">
    <name>{{ $squad->name }}</name>
    <email>{{ $squad->email }}</email>
    <web>{{ $squad->web }}</web>
    <picture>{{ $squad->nickname }}.paa</picture>
    <title>{{ $squad->title }}</title>  
    @foreach($members as $member)
        <member id="{{ $member->player_id }}" nick="{{ $member->nickname }}">
            <name>{{ $member->name }}</name>
            <email>{{ $member->email }}</email>
            <icq>{{ $member->icq }}</icq>
            <remark>{{ $member->remark }}</remark>
        </member>
    @endforeach
</squad>