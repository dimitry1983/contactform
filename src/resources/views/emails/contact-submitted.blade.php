<p><strong>Naam:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Bericht:</strong><br>{{ nl2br(e($data['message'])) }}</p>
