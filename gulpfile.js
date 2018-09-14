var gulp = require('gulp');
var sass = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var cleanCSS = require('gulp-clean-css');
var cssnano = require( 'gulp-cssnano' );
var concat = require('gulp-concat');
var plumber = require( 'gulp-plumber' );
var rename = require('gulp-rename');
var gulpSequence = require('gulp-sequence');
var sourcemaps = require('gulp-sourcemaps');
var watch = require( 'gulp-watch' );
var uglify = require('gulp-uglify');
var wait = require('gulp-wait');

// Configuration file to keep your code DRY
var cfg = require( './gulpconfig.json' );
var paths = cfg.paths;

gulp.task('adminsass', function(callback){
    var stream = gulp.src(paths.adminsass + '/*.scss')
    .pipe( plumber( {
        errorHandler: function( err ) {
            console.log( err );
            this.emit( 'end' );
        }
    } ) )
    .pipe( sourcemaps.init({loadMaps: true}))
    .pipe( wait(200)) 
    .pipe( sass( { errLogToConsole: true, includePaths: [paths.adminsass + '/src/**/*'] } ) )
    .pipe( autoprefixer( 'last 2 versions' ) )
    .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
    .pipe(gulp.dest(paths.admincss))
    return stream;
  });

gulp.task('publicsass', function(){
    var stream = gulp.src(paths.publicsass + '/*.scss')
    .pipe( plumber( {
        errorHandler: function( err ) {
            console.log( err );
            this.emit( 'end' );
        }
    } ) )
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe( wait(200)) 
    .pipe( sass( { errLogToConsole: true, includePaths: [paths.adminsass + '/src/**/*'] } ) )
    .pipe( autoprefixer( 'last 2 versions' ) )
    .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
    .pipe(gulp.dest(paths.publiccss))
    return stream;
  });


gulp.task( 'watch', function() {
    gulp.watch( paths.adminsass + '/**/*.scss',['adminstyles']);
    gulp.watch( paths.publicsass + '/**/*.scss',['publicstyles']);
    gulp.watch( paths.adminjs + '/*.js',['adminjsify','adminjsifybootstrap']);
    gulp.watch( paths.publicjs + '/*.js', ['publicjsify']);
});


gulp.task( 'cssnano-admin', function() {
    return gulp.src( paths.admincss + '/advance-green-plugin-admin.css' )
      .pipe( sourcemaps.init( { loadMaps: true } ) )
      .pipe( plumber( {
              errorHandler: function( err ) {
                  console.log( err );
                  this.emit( 'end' );
              }
          } ) )
      .pipe( rename( { suffix: '.min' } ) )
      .pipe( cssnano( { discardComments: { removeAll: true } } ) )
      .pipe( sourcemaps.write( './' ) )
      .pipe( gulp.dest( paths.admindistcss ) );
  });
  
  
  gulp.task( 'minifycss-admin', function() {
    return gulp.src( paths.admincss + '/advance-green-plugin-admin.css' )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
      .pipe( cleanCSS( { compatibility: '*' } ) )
      .pipe( plumber( {
              errorHandler: function( err ) {
                  console.log( err ) ;
                  this.emit( 'end' );
              }
          } ) )
      .pipe( rename( { suffix: '.min' } ) )
       .pipe( sourcemaps.write( './' ) )
      .pipe( gulp.dest( paths.admindistcss ) );
  });
  
  gulp.task( 'minifycss-public', function() {
    return gulp.src( paths.publiccss + '/advance-green-plugin-public.css' )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
      .pipe( cleanCSS( { compatibility: '*' } ) )
      .pipe( plumber( {
              errorHandler: function( err ) {
                  console.log( err ) ;
                  this.emit( 'end' );
              }
          } ) )
      .pipe( rename( { suffix: '.min' } ) )
       .pipe( sourcemaps.write( './' ) )
      .pipe( gulp.dest( paths.publicdistcss ) );
  });

  gulp.task('adminjsify', function(){
    return gulp.src(paths.adminjs + '/*.js' )
    .pipe(concat('advance-green-plugin-admin.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.admindistjs + '/'));
 });
  gulp.task('adminjsifybootstrap', function(){
    return gulp.src(paths.adminjs + '/bootstrap/*.js' )
    .pipe(concat('advance-green-plugin-admin-bootstrap.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.admindistjs + '/'));
 });
  gulp.task('publicjsify', function(){
    return gulp.src(paths.publicjs + '/*.js' )
    .pipe(concat('advance-green-plugin-public.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.publicdistjs + '/'));
 });
 
  
 
 gulp.task( 'adminstyles', function( callback ) {
     gulpSequence( 'adminsass', 'minifycss-admin')( callback );
 } );
 gulp.task( 'publicstyles', function( callback ) {
     gulpSequence('publicsass', 'minifycss-public')( callback );
 } );
  

  