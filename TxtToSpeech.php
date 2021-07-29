<?php
include_once('link.php');
session_start();
$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title>TxtToSpeech</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

		<style type="text/css">
			body{
				background: #f6f6f6;
				background-image: url("pexels-tommy-lopez-765139.jpg");
				background-size: cover;
			}
			.container{
				background: #f6f6f6;
				position: absolute;
				top:50%;
				left:50%;
				transform: translateX(-50%) translateY(-50%);
				width: 425px;
				padding:20px;
				box-shadow: 0 0 10px 0 #ccc;
			}
			.container textarea{
				width: 390px;
				height: 200px;
				resize: none;
				outline: none;
				border: 1px solid #ccc;
			}
			.container label{
				display: block;
				width: 400px;
			}
			.container label span{
				width: 100px;
				margin-top: 20px;
				display: inline-block;
			}
			.container label select, .container label input{
				width: 290px;
			}
			.button{
				display: inline-block;
				background: #f6f6f6;
				padding: 10px 20px;
				color: #000;
				border: 1px solid #ccc;
				cursor: pointer;
				margin-top: 20px;
			}
			.button{
				border: lightgreen;
				background-color: green;
				transition-delay: 0.5ms;
				margin: 0px auto;
			}
			.button:hover{
				box-shadow: 4px 4px 10px 0 #ccc;
				
				transition-delay : 0.5ms;
			}
			


		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="dropdown navbar-right" id="right">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $email;?>
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
							
						  <li><a href="logout.php">Logout</a></li>
						</ul>
					  </div>
				</div>
			</div>
			<h3>TxtToSpeech</h3>
			<textarea id="myText">Hello, this is sample text. You can add your own text and create one.</textarea>
			<label>
				<span>Voice</span>
				<select id="voiceOptions"></select>
			</label>
			<label>
				<span>Volume</span>
				<input type="range" id="volumeSlider" min="0" max="1" value="0.5" step="0.1" />
			</label>
			<label>
				<span>Speed</span>
				<input type="range" id="rateSlider" min="0" max="1" value="0.5" step="0.1" />
			</label>
			<label>
				<span>Pitch</span>
				<input type="range" id="pitchSlider" min="0" max="2" value="0.5" step="0.1" />
			</label>
			<div class="btn btn-success btn-lg" style="margin-left: 37%;" onclick="speak();">Speak</div>
		</div>
		<script type="text/javascript">

			function checkCompatibilty () {
				if(!('speechSynthesis' in window)){
					alert('Your browser is not supported. If google chrome, please upgrade!!');
				}
			};

			checkCompatibilty();

			var voiceOptions = document.getElementById('voiceOptions');
			var volumeSlider = document.getElementById('volumeSlider');
			var rateSlider = document.getElementById('rateSlider');
			var pitchSlider = document.getElementById('pitchSlider');
			var myText = document.getElementById('myText');

			var voiceMap = [];

			function loadVoices () {
				var voices = speechSynthesis.getVoices();
				for (var i = 0; i < voices.length; i++) {
					var voice = voices[i];
					var option = document.createElement('option');
					option.value = voice.name;
					option.innerHTML = voice.name;
					voiceOptions.appendChild(option);
					voiceMap[voice.name] = voice;
				};
			};

			window.speechSynthesis.onvoiceschanged = function(e){
				loadVoices();
			};

			function speak () {
				var msg = new SpeechSynthesisUtterance();
				msg.volume = volumeSlider.value;
				msg.voice = voiceMap[voiceOptions.value];
				msg.rate = rateSlider.value;
				msg.Pitch = pitchSlider.value;
				msg.text = myText.value;
				window.speechSynthesis.speak(msg);
			};
		</script>
		
	</body>
</html>