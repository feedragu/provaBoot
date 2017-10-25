<style>
		div.calendar {
			width: 100%;
			border: 3px solid gray;
		}
		
		header {
			padding: 2em;
			color: white;
			background-color: #4d88ff;
			clear: right;
			text-align: center;
		}
		
		.tablediv {
			border-left: 3px solid gray;
			margin-top: 2%;
			width: 80%;
			float: right;
		}
		
		.title {
			float: top;
		}
		
		input[type=text],
		input[type=password],
		input[type=date],
		input[type=email] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		
		button,
		input[type=button] {
			background-color: #4CAF50;
			color: white;
			border: none;
			cursor: pointer;
			width: auto;
		}
		
		button:hover {
			opacity: 0.8;
		}
		
		input[type=button]:hover {
			opacity: 0.8;
		}
	</style>

<?php
session_start();

session_unset();

session_start();

$_SESSION['loggedOut']=0;

echo "<button type='button' data-toggle='modal' data-target='#myModalLog'>LOGIN</button>";
?>