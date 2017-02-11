<div class="ui grid">
	{{$slot}}
	@foreach ($messages as $message)
	<div id="{{$message->id}}" class="six wide column messageCard">
		<div>
			<span class="message" style="font-size: 1.5rem;">{{$message->message}}</span>
		</div>
		<input class="offset" style="max-width: 65%;" type="number" placeholder="Décalage de cryptage" name="offset">
		<button data-id="{{$message->id}}" class="ui orange button">Traduire</button>
	</div>
	@endforeach
</div>