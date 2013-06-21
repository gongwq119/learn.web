<html>
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Smarty</title>
  </head>
  <body>
  	<!-- html 注释 -->
    <p>Hello, <{$name}> !<p>
    <{foreach $no as $key=>$val}>
    	<p><{$key}></p>
        <{if $key}>
    	<p>you you you </P>
   		<{/if}>
    <{/foreach}>

  </body>
</html>