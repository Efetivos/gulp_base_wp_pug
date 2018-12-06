var gulp = require ('gulp');
var changed = require ('gulp-changed');
var sass = require ('gulp-sass');
var browserSync = require('browser-sync').create();
var uglify = require ('gulp-uglify');
var pug = require('gulp-pug');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
const babel = require('gulp-babel');

//Vars  Changed
var SRC = './sass/**/*.sass';
var DEST = 'dist';

//BABEL
gulp.task('default', () =>
    gulp.src('src/app.js')
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulp.dest('dist'))
);

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
		proxy:'localhost/Gulp_Base_Pug_WP/',
		online: true,
		tunnel: true
	})
});


//Watch
gulp.watch('./sass/**/*.sass',['sass']);
gulp.watch('./pug/**/*.pug',['views']);
gulp.watch('./js/*.js',['concat']);
gulp.watch(['./pug/**/*.pug','*.php','./partials/**/*.php' ]).on('change', browserSync.reload);
gulp.watch('./js/*js').on('change', browserSync.reload);
gulp.watch('./*html').on('change', browserSync.reload);


//sass
gulp.task('sass', function() {
 gulp.src('sass/*.sass')
	.pipe(sass({outputStyle:'compressed'}))
	.pipe(sass({outputStyle:'compressed'}))
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
	.pipe(babel({
		presets: ['@babel/env']
	}))
	.pipe(uglify())
	.pipe(gulp.dest('./js-compiled/'))
	.pipe(browserSync.stream({stream: true}));
});
	

gulp.task('default', ['serve','views','concat']);