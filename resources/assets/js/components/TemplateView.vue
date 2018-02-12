<template>

 <div id="app">
			
	<section id="body" class="width">
		<aside id="sidebar" class="column-left">

			<header>
				<h1><a href="#">Distract</a></h1>

				<h2>Get everything from popular sources!</h2>
				
			</header>

			<nav id="mainnav">
				<ul>
					<li class="selected-item">
						<a href="#" @click.prevent="load('hackernews')">HackerNews</a>
					</li>
					<li>
						<a href="#" @click.prevent="load('reddit')">Reddit</a>
					</li>
					<li><a href="#" @click.prevent="load('medium')">Medium</a></li>
					<li><a href="#" @click.prevent="load('lifehacker')">LifeHacker</a></li>
					<li><a href="#" @click.prevent="load('slashdot')">SlashDot</a></li>
				</ul>
			</nav>

			
			
		</aside>
		<section id="content" class="column-right">

			<article>
				
			<div v-for="item in items">
				<h4></h4>
 				<div class="article-info">Posted on <time datetime="2013-05-14">14 May</time> by <a href="#" rel="author">Joe Bloggs</a></div>
			</div>
				



			</article>

			<article class="expanded">

				
			</article>

			
			<footer class="clear">
				<p>&copy; 2014 sitename. <a href="#">Free CSS Templates</a> by ZyPOP</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>



 	</div>
</template>

<script>
	
	export default {

		
	}

</script>