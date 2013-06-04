<html>
  <head>
    <title>Smarty</title>
  </head>
  <body>
  	<{* 这是一个注释 *}>
  	<!-- html 注释 -->
  	<h1>Hello, World!</h1>
  	<{foreach $items as $item}>
  	<ul>
  		<li><{$item}></li>
  	</ul>
  	<{/foreach}>
  </body>
</html>