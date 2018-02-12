<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Distract</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--
agile, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution
//-->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

  <div id="app">	
	<section id="body" class="width">
		<aside id="sidebar" class="column-left">

			<header>
				<h1><a href="#">Distract</a></h1>

				<h2>Get everything from popular sources!</h2>
				
			</header>

			<nav id="mainnav">
				<ul>
					<li>
						<a href="#" @click.prevent="load('all')">All in One!</a>
						<a href="#" @click.prevent="load('hackernews')">HackerNews</a>
					</li>
					<li>
						<a href="#" @click.prevent="load('reddit')">Reddit</a>
					</li>
					<li><a href="#" @click.prevent="load('medium')">Medium</a></li>
					<li><a href="#" @click.prevent="load('lifehacker')">Life Hacker</a></li>
					<li><a href="#" @click.prevent="load('slashdot')">SlashDot</a></li>
					<li><a href="#" @click.prevent="load('producthunt')">Product Hunt</a></li>
				</ul>
			</nav>

			
			
		</aside>
		<section id="content" class="column-right" v-if="loading">
				
				<article class="expanded">
						<h3>One Moment...</h3>

				</article>

		</section>
		<section id="content" class="column-right" v-else>

			<article>
				
			<div v-for="item in items">
				<h3>@{{ item.service }}</h1>
				<br>
				<a href="@{{ item.link }}" target="_blank"><h4>@{{ item.title }}</h4></a>
				<div class="article-info">Posted on <time datetime="2013-05-14">@{{ item.timestamp }}</time> @{{ item.read_time }}<a href="#" rel="author" v-if="item.author"> by @{{ item.author }}</a>Score: @{{ item.score }} &nbsp; @{{ item.service }}</div>
			</div>
				



			</article>

			<article class="expanded">

				
			</article>

			
			<footer class="clear">
				<p><a href="https://github.com/rohitpotato">Open Source Project Rohit Kashyap :)</a></p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>
 </div>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script>

<script>
	
	var app = new Vue({

		el: '#app',
		delimiters: ['${', '}'],
		data: {

			items: [],
			loading:false
		},

		methods: {

			load (service) {

				this.loading = true
				axios.get('/distdrac/public/api/news/' + service).then((response) => {

					this.items = response.data
					this.loading = false
				})
			}
		},

		ready () {

			this.load('hackernews')
		}
	})

</script>

</body>
</html>
