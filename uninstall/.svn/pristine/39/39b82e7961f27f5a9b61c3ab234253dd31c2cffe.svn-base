<section style="text-align: center">
	<h1>Warning</h1>
	<h2>
		This will delete Wordpress, all themes, all plugins and the associated database.
	</h2>
	<h3>
		Be sure to back everything up if you need to keep it!
	</h3>
	<p>Click "Uninstall" to remove everything</p>
	<button id="uninstall">UNINSTALL</button>
</section>
<script>
document.getElementById('uninstall').addEventListener('click', function() {
	var finalAnswer = confirm('Sure you want to delete Wordpress entirely and the associated database?');
	if(finalAnswer === false) {
		return;
	}
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '/wp-admin/admin-ajax.php?action=uninstall', true);
	xhr.send();
	xhr.onreadystatechange = function (event) {
  		if (xhr.readyState === 4 && xhr.status === 200) {
  			if(xhr.response === "TRUE") {
  				alert('Wordpress was succesfully been uninstalled');
  			} else {
  				alert("There was a error performing the uninstall, delete it manually");
  			}
     	}
  	}
});
</script>