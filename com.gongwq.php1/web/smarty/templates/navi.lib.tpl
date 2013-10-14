<!-- Begin of the navigation -->
		<div class="navigation">
			<ul class="menu">
				<li>
					<a href="index.php" class="menu" style="width : 84px"><h3>首页</h3></a>
				</li>
				<{foreach $navis as $navi}>
				<li>
					<a href="<{$navi.link}>" class="menu" style="width : 84px"><h3><{$navi.name}></h3></a>
				</li>				
				<{/foreach}>
				<li>
					<a class="menu" style="width : 84px"><h3>更多</h3></a>
				</li>
			</ul>
		</div>
		<!-- End of the navigation -->