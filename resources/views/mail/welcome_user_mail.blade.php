

<h1>Hello, {{ $user->name }}!</h1>

<p>Welcome to our platform! Use following credential for login</p>
<p>Email : {{$user->email}}</p>
<p>Password : {{$password}}</p>

<p>Feel free to explore and let us know if you have any questions.</p>

Thanks,<br>
{{ config('app.name') }}
