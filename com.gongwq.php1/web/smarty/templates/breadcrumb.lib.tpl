			<!-- Begin of the breadcrumb -->
			<div id="breadcrumb">
				<strong><a href="<{$breadcrumb_top.url}>"><{$breadcrumb_top.name}></a></strong>
				<span>
					<{foreach $breadcrumb as $bd}>
						 &nbsp;&gt;&nbsp;<a href="<{$bd.url}>" ><{$bd.name}></a>
					<{/foreach}>
				</span>
			</div>
			<!-- End of the breadcrumb-->