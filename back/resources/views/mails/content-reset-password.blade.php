@extends('mails.html-template')
@section('content')
	<br />
	<h1>@{{$data['greeting']}}</h1>
	<br>
	<p class="lead">@{{$data['message']}}</p>

	<table class="button large secondary">
		<tr>
			<td>
				<table>
					<tr>
						<td style="background-color:#139BF2 !important;"><a href="@{{$data['action_link']}}">@{{$data['action_text']}}</a></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

  <p>@{{$data['to_thank']}}</p>
  
@endsection