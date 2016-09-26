@extends('layouts.emails')

@section('content')
    <table cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>
            <th width="300" valign="left" align="left">Имя: </th><td valign="left">{{ $username }}</td>
        </tr>
        <tr>
            <th width="300" valign="left" align="left">Компания: </th><td valign="left">{{ $company }}</td>
        </tr>
        <tr>
            <th width="300" valign="left" align="left">E-mail: </th><td valign="left">{{ $email }}</td>
        </tr>
        <tr>
            <th width="300" valign="left" align="left">Телефон: </th><td valign="left">{{ $phone }}</td>
        </tr>
        <tr>
            <th width="300" valign="left" align="left">Сообщение: </th><td valign="left"> </td>
        </tr>
        <tr>
            <td colspan="2">{{ $msg }}</td>
        </tr>
        <tr>
            <td colspan="2"><hr/></td>
        </tr>
        <tr>
            <th width="300" valign="left" align="left">Время отправки сообщения: </th><td valign="left">{{ date("H:i d-m-Y") }}</td>
        </tr>
    </table>
@endsection