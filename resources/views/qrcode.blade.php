    
    {{-- {!! QrCode::size(300)->generate('MyNotePaper'); !!} --}}
 
    {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('pid:'.$id)) !!} "> --}}
{!! QrCode::wiFi([
	// 'encryption' => 'WPA/WEP',
	'ssid' => 'ROOM - 216',
	// 'password' => '123456789',
	// 'hidden' => 'Whether the network is a hidden SSID or not.'
]); !!}

 