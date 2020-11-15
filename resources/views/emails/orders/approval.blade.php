@component('mail::message')
# Hey You Have a new Order please check it out !!



@component('mail::button', ['url' => route('approvals')])
Click To See
@endcomponent

Thanks,<br>
Irvince Store
@endcomponent
