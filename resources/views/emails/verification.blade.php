<table>
    <tbody>
        <tr>
            <td>Ваш логин:</td>
            <th>{{ $user->email }}</th>
        </tr>
        <tr>
            <td>Ваш пароль:</td>
            <th>{{ $user->tmp_password }}</th>
        </tr>
    </tbody>
</table>
<hr>
<p>Перейдите по ссылке для <a href="{{ route('users.verification', ['email_token' => $user->email_token]) }}">подтверждения аккаунта</a></p>