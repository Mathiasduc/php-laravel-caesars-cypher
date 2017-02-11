<form class="ui form" action="/message/new" method="post">
	{{ csrf_field() }}
	<div class="three fields">
		<div class="field">
			<label for="message">Message</label>
			<input type="text" id="message" name="message">
		</div>
		<div class="field">
			<label for="offset">Décalage</label>
			<input type="number" id="offset" name="offset">
		</div>
		<div class="field">
			<input type="submit" class="ui button">
		</div>
	</div>
</form>