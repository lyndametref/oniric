/*
* Basic Gulp.js workflow
* for simple front-end projects
* author: Lynda Metref, Aaron John Schlosser
*/

var gulp = require('gulp');
var copy = require('gulp-contrib-copy');
var watch = require("gulp-watch");
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var jade = require("gulp-jade-php");
var plumber = require("gulp-plumber");
var bower = require('main-bower-files');
var bowerNormalizer = require('gulp-bower-normalize');

var paths = {
	styles: {
		src: "./src/scss/*.scss",
		dest: "./target/oniric/"
	},
	templates: {
		src: "./src/templates/*.jade",
		dest: "./target/oniric/"
	},
	php:{
		src:"./src/php/*.php",
		dest: "./target/oniric/"
	},
	bower:{
		src: "./bower_components",
		dest:"./target/oniric/lib/",
		conf: "./bower.json"
	}
};

gulp.task('styles', function() {
	gulp.src(paths.styles.src)
	.pipe(sass())
	.pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(gulp.dest(paths.styles.dest));
});

gulp.task('templates', function() {
	gulp.src(paths.templates.src)
	.pipe(plumber())
	.pipe(jade({
		pretty: '\t'	// Set to false to minify/uglify the PHP
	}))
	.pipe(plumber.stop())
	.pipe(gulp.dest(paths.templates.dest));
});

gulp.task('copy', function() {
	gulp.src(paths.php.src)
	.pipe(copy())
	.pipe(gulp.dest(paths.php.dest));
});

gulp.task('bower', function() {
	gulp.src(bower(), {base: paths.bower.src})
	.pipe(bowerNormalizer({bowerJson: paths.bower.conf}))
	.pipe(gulp.dest(paths.bower.dest))
});

gulp.task('full', ['bower', 'copy','templates','styles']);

gulp.task("default", function() {
	gulp.watch(paths.styles.src, ["styles"]);
	gulp.watch(paths.templates.src, ["templates"]);
	gulp.watch(paths.php.src, ["php"]);
	gulp.watch(paths.bower.src, ["bower"]);
});
