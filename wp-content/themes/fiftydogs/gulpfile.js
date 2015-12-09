var gulp         = require('gulp'),
    sass         = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    compass      = require('gulp-compass'),
    minifycss    = require('gulp-minify-css'),
    concat       = require('gulp-concat'),
    wrap         = require('gulp-wrap'),
    fileinclude  = require('gulp-file-include'),
    rename       = require('gulp-rename'),
    flatten      = require('gulp-flatten'),
    svgstore     = require('gulp-svgstore'),
    svgmin       = require('gulp-svgmin'),
    sourcemaps   = require('gulp-sourcemaps'),
    gutil        = require('gulp-util'),
    uglify       = require('gulp-uglify'),
    imagemin     = require('gulp-imagemin'),
    livereload   = require('gulp-livereload'),
    pngquant     = require('imagemin-pngquant'),
    path         = require('path')

/**
 * Config
 */
var config = {
  port : 4000,
  lr_port : 4003
}
/**
 * Asset Paths
 */
var paths = {
  components : './assets/components/',
  assets     : './assets/',
  css        : './assets/css',
  js         : './assets/js'
}
/**
 * Bower Components
 */
var components = {

  // Javascript
  js : [

  ],

  // CSS
  css : [
    './assets/components/font-awesome/css/font-awesome.min.css',
    './assets/components/animate.css/animate.min.css',
  ]
}



/**
 * TASK: Live Reload
 */
var tinylr    = require('tiny-lr'),
    lr_server = tinylr();



/**
 * Debugging Methods
 */
function notifyLiveReload(event) {
  var fileName = require('path').relative(__dirname + '/app', event.path)

  tinylr.changed({
    body: {
      files: [fileName]
    }
  })

  // Get filename from path
  var filename = event.path.match(/\/[^\/]+$/g)[0].replace('/', '')

  // Logging
  gutil.log( gutil.colors.black.bgGreen( ' ' + event.type.toUpperCase() + ' '), gutil.colors.yellow( filename ) )

}
function logError(error) {

    var err = formatError(error)

    // Logging
    gutil.log( gutil.colors.bgRed(' ERROR '), gutil.colors.bgBlue( ' ' + err.plugin + ' ' ), gutil.colors.black.bgWhite( ' ' + err.message + ' ' ) )
    gutil.beep()

    this.emit('end')

    function formatError(obj) {

      var obj     = obj || {},
          msg     = obj.message || obj[0],
          plugin  = obj.plugin || null

      // clean up
      msg = msg.replace('error ', '')

      return {
        message: msg,
        plugin : plugin
      }

    }
}



/**
 * TASK: Styles
 */
gulp.task('styles', function() {
  return sass( paths.assets + 'sass/', { style: 'expanded' })
    .on('error', logError)
    .pipe(sourcemaps.init())
    .pipe(gulp.dest( paths.assets + '/css' ))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(livereload(lr_server))
    .pipe(gulp.dest( paths.assets + '/css' ))
})





/**
 * TASK: Compress JS
 */
gulp.task('appjs', function() {
  
  return gulp.src( paths.js + '/app.js' )
    .on('error', logError)
    .pipe(uglify())
    .pipe(rename({suffix: '.min'}))
    .pipe(livereload(lr_server))
    .pipe(gulp.dest( paths.js ))

})

/**
 * TASK: Concatenate Javascript
 * @todo components/__/*.min.js
 */
gulp.task('concat-js', function() {
  
  return gulp.src( components.js )
    .pipe(concat('components.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest( paths.js ))

})

/**
 * TASK: Concatenate Stylesheets
 */
gulp.task('concat-css', function() {
  
  return gulp.src( components.css )
    .pipe(concat('components.min.css'))
    .pipe(minifycss())
    .pipe(gulp.dest( paths.css ))

})

/**
 * TASK: Concatenate JS + CSS
 */
gulp.task('concat', ['concat-css', 'concat-js'], function (callback) {})



/**
 * TASK: Image Optimization
 */
gulp.task('images', function() {
  
  return gulp.src([ paths.assets +'images/**/*'])
    .pipe(imagemin({
        progressive: true,
        optimizationLevel : 3,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()]
    }))
    .pipe(flatten())
    .pipe(gulp.dest(paths.build))

})


/**
 * TASK: Build
 */
gulp.task('build', function() {
  
})


/**
 * TASK: Watch
 */
gulp.task('watch', function() {

  lr_server.listen( config.lr_port, function (err) {

    console.log('lr.listen()')

    gulp.watch(['./assets/**/*.scss'], ['styles'], notifyLiveReload)
    gulp.watch(['./assets/**/*.css'], notifyLiveReload)
    
    gulp.watch(['./assets/js/app.js'], ['appjs'], notifyLiveReload)

  })
})

// tinylr.listen( config.lr_port, function (err) {

//   console.log('lr.listen()')

//   gulp.watch(['./assets/**/*.scss'], ['styles'], notifyLiveReload)
//   gulp.watch(['./assets/**/*.css'], notifyLiveReload)

// })

gulp.task('default', [
  'styles', 
  'appjs',
  'watch'
], function() {

  // Do stuff during default task

})