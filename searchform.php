<h3>searchform.php</h3>
<!-- el action debe estar dirigido a la pagina raiz del proyecto de wordpress como tal. -->
<form action="<?php home_url();?>" method="get">
<label for="search">Search</label>
<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" required>
<button type="submit">Search!</button>
</form>
<h3>/searchform.php</h3>