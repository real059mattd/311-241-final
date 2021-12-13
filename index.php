<html>
<head>
	<link rel="stylesheet" href="style.css">
	<script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
	<script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
	<script src="https://unpkg.com/@babel/standalone/babel.min.js" crossorigin></script>
</head>
<body>
<form method="POST">
<?php
//setup
$dbname = "matthew-davis-2_color"; //enter db name
$username = "matthew-davis-2"; //enter username
$password = "Dav#059microword2"; //enter password
$table = "color"; //enter table name
extract($_POST);

//control structure
//
if ($button=="start")
	namePage();
elseif ($button=="is my name"){
	$conn = mysqli_connect("localhost", $username, $password, $dbname);
	$query = "SELECT * FROM $table WHERE name = '$name';";
	$result = mysqli_query($conn,$query);
	if ($row = mysqli_fetch_assoc($result)){
		$color = $row['color'];
		finalPage($name, $color);
	} else
		colorPage($name);
} elseif ($button=="is my fav"){
	$conn = mysqli_connect("localhost", $username, $password, $dbname);
	$query = "INSERT INTO $table VALUES('$name', '$color');";
	mysqli_query($conn,$query);
	finalPage($name, $color);
} else 
	titlePage();



//php functions with imbeded html
//
function titlePage(){
	echo <<< HERE
	<div id="color"></div>
	<input type="submit" name="button" value="start">
	<script type="text/babel">
	function Rainbow() {
		const [count, setCount] = React.useState(0);
		React.useEffect(() => {
			setTimeout(() => {
				setCount((count) => count + 1);
			}, 200);
		});
		return <h1 style={{ color: `rgb(\${randInt(0, 255)},\${randInt(0, 255)},\${randInt(0, 255)})` }}>Welcome to our Colorful Site</h1>;
	}
	ReactDOM.hydrate(<Rainbow />, document.getElementById('color'));
	</script>
HERE;
}

function namePage(){
	echo <<< HERE
	<div id="color"></div>
	<script type="text/babel">
	function Rainbow() {
		const [count, setCount] = React.useState(0);
		React.useEffect(() => {
			setTimeout(() => {
				setCount((count) => count + 1);
			}, 200);
		});
		return <h1 style={{ color: `rgb(\${randInt(0, 255)},\${randInt(0, 255)},\${randInt(0, 255)})` }}>What is your name?</h1>;
	}
		ReactDOM.render(<Rainbow />, document.getElementById('color'));
	</script>
	<form method="POST">
		<input type="text" name="name">
		<input type="submit" name="button" value="is my name">
	</form>
HERE;
}

function colorPage($name){
	echo <<< HERE
	<div id="color"></div>
	<script type="text/babel">
	function Rainbow() {
		const [count, setCount] = React.useState(0);
		React.useEffect(() => {
			setTimeout(() => {
				setCount((count) => count + 1);
			}, 200);
		});
		return <h1 style={{ color: `rgb(\${randInt(0, 255)},\${randInt(0, 255)},\${randInt(0, 255)})` }}>What is your favorite color?</h1>;
	}
		ReactDOM.render(<Rainbow />, document.getElementById('color'));
	</script>
	<form method="POST">
		<input type="text" name="color">
		<input type="hidden" name="name" value="$name">
		<input type="submit" name="button" value="is my fav">
	</form>
HERE;
}

function finalPage($name, $color){   
	echo "<h3 style='color:$color' > $name, we stored $color as your favorite color and made it the text color!!! </h3>";
}

//javascript Function

echo <<< HERE
	<script>
	function randInt(minVal, maxVal){
		var size = maxVal-minVal +1;
		return Math.floor(minVal + size*Math.random());
	}
	</script>
HERE;

?>
</form>
</body>
</html>
