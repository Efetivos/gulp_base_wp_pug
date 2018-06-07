var gulp = require ('gulp');
var changed = require ('gulp-changed');
var scss = require ('gulp-sass');
var browserSync = require('browser-sync').create();
var uglify = require ('gulp-uglify');
var pug = require('gulp-pug');
var concat = require('gulp-concat');
var rename = require('gulp-rename');

//Vars  Changed
var SRC = './scss/**/*.scss';
var DEST = 'dist';


//PUG
gulp.task('views', function buildHTML() {
	return gulp.src('pug/**/*.pug')
	.pipe(pug({
	  pretty: true
	}))
	.pipe(rename({
		extname: '.php'
	}))
	.pipe(gulp.dest('./'))
  });

  
//HotReaload
gulp.task('serve', ['sass','views'], function(){
	injectChanges: true,
	browserSync.init({
		proxy:'http://gulpbasewp.local/'
	})
});


//Watch
gulp.watch('./scss/**/*.scss',['sass']);
gulp.watch('./pug/**/*.pug',['views']);
gulp.watch('./js/*.js',['concat']);
gulp.watch(['./pug/**/*.pug','*.php','./partials/**/*.php' ]).on('change', browserSync.reload);
gulp.watch('./js/*js').on('change', browserSync.reload);
gulp.watch('./*html').on('change', browserSync.reload);


//Scss
gulp.task('sass', function() {
 gulp.src('scss/*.scss')
	.pipe(scss({outputStyle:'compressed'}))
	.pipe(gulp.dest('css'))
	.pipe(browserSync.stream());
});


//Changed
gulp.task('changed', function (){
	return gulp.src(SRC)
	.pipe(changed(DEST))
	.pipe(gulp.dest(DEST));
});


gulp.task('watch', function(){
	gulp.watch(SRC, ['sass', 'serve','views']);
})




//Concat
gulp.task('concat', function() {
	return gulp.src('./js/*.js')
	.pipe(concat('main.js'))
	.pipe(gulp.dest('./js-compiled/'))
	.pipe(browserSync.stream({stream: true}));
});

gulp.task('default', ['serve','views','concat']);