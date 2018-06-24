@component('mail::message')
# Book Request from website

**Name:** {{ $data['name'] }}<br>
**Surname:** {{ $data['surname'] }}<br>
**Dive Level:** {{ $data['dive_level'] }}<br>
**From \ To:** {{ $data['from_to'] }}<br>
**E-mail:** {{ $data['email'] }}<br>
**Message:**<br>
*{{ $data['message'] }}*

Thanks,<br>
{{ config('app.name') }}
@endcomponent
