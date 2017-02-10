<div class="ui grid">
{{$slot}}
@foreach ($messages as $message)
	<div class="four wide column">
		<div class="centered">
			{{$message}}
		</div>
	</div>
@endforeach
</div>