<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<?php echo link_tag('src/bundle.css?v='.$version); ?>
</head>
<body>
<div id="app">
<v-app>
<!-- HEADER: MENU + HEROE SECTION -->
<header>
 
	<div class="heroe">

		<h1 class="text-center">Welcome to CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h1>
		 
		<h2 class="text-center">The small framework with powerful features</h2>
		 
		<h1 class="text-center">CodeIgniter  <?= CodeIgniter\CodeIgniter::CI_VERSION ?> using Vuetify JS</h1>
		<div class="d-flex justify-center">
			<img  src="https://cdn.worldvectorlogo.com/logos/codeigniter.svg" width="100">
			 <div style="font-size:100px;"> + </div>
			<img  src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png" width="100">  
		</div>
	</div>

</header>

<!-- CONTENT -->

 


<template>
  <v-row justify="space-around">
    <v-color-picker class="ma-2" hide-canvas></v-color-picker>
    <v-color-picker class="ma-2" canvas-height="300"></v-color-picker>
    <v-color-picker class="ma-2" dot-size="30"></v-color-picker>
  </v-row>
</template>


 
 
<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
	<div class="environment">

		<p>Page rendered in {elapsed_time} seconds</p>

		<p>Environment: <?= ENVIRONMENT ?></p>

	</div>

	<div class="copyrights">

		<p>&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT
			open source licence.</p>

	</div>

</footer>
</v-app>
</div>
<!-- SCRIPTS -->

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->
<?php echo script_tag('src/bundle.js?v='.$version); ?>
</body>
</html>
