<html>
<body>
<div id = "screen"></div>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){
setInterval(function(){
$("#screen").load('temp.php')
}, 1000);//set interval to load temp.php in 1 second
});
</script>
</body>
</html>
