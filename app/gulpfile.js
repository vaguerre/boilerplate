var fs           = require('fs'),
    gulp         = require('gulp'),
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
    uncss        = require('gulp-uncss'),
    pngquant     = require('imagemin-pngquant'),
    path         = require('path')

/**
 * Config
 */
var config = {
  ports : {
    webserver  : 4000,
    livereload : 4002
  },
  debug : true
}


/**
 * Asset Paths
 */
var paths = {
  app        : './',
  components : './components/',
  assets     : './assets/',
  css        : './assets/css',
  js         : './assets/js',
  src        : './src/',
  partials   : './partials/',
  build      : './build/'
}
/**
 * Bower Components
 */
var components = {

  // Javascript
  js : [
    '/components/flexslider/jquery.flexslider.js',
    '/components/chosen/chosen.jquery.min.js',
    '/components/wowjs/dist/wow.min.js',
    '/components/classie/classie.js',
    '/components/object-fit/dist/polyfill.object-fit.min.js'
  ],

  // CSS
  css : [
    '/components/font-awesome/css/font-awesome.min.css',
    '/components/animate.css/animate.min.css',
  ]
}



/**
 * TASK: Express Server
 */
gulp.task('express', function() {
  var express = require('express')
  var app = express()
  app.use(require('connect-livereload')({ port: config.ports.livereload }))
  app.use(express.static(__dirname + '/.'))
  app.listen( config.ports.webserver )

  gutil.log( gutil.colors.black.bgYellow( ' EXPRESS SERVER RUNNING ' ), gutil.colors.bgCyan.black( ' http://localhost:' + config.ports.webserver + ' ') )
})



/**
 * TASK: Live Reload
 */
var tinylr
gulp.task('livereload', function() {
  tinylr = require('tiny-lr')()
  tinylr.listen( config.ports.livereload )
})


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
    .pipe(gulp.dest( paths.assets + '/css' ))
})


/**
 * TASK: Partials
 */
gulp.task('partials', function() {
  return gulp.src([ paths.src + '**/*.html'])
    .pipe(fileinclude({
      prefix: '@@',
      basepath: './partials/'
    }))
    .pipe(rename({
      extname : ''
    }))
    .pipe(rename({
      extname : '.html'
    }))
    .pipe(gulp.dest(paths.app))
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
 * TASK: SVG
 */
 gulp.task('svg', function () {
   return gulp
     .src( paths.assets + 'images/svg/src/*.svg')
     .pipe(svgmin())
     .pipe(svgstore())
     .pipe(gulp.dest( paths.assets + 'images/svg/' ))
 })


/**
 * TASK: Build
 */
gulp.task('build', function() {
  
})


/**
 * TASK: Optimize
 */
gulp.task('optimize', [
  'concat', 
  'images',
  'svg'
], function (data) {
  console.log('Asset optimization complete', data)
})


/**
 * TASK: UnCSS
 */
// gulp.task('distrib', function () {
//   return gulp.src('./assets/css/style.css')
//     .pipe(uncss({
//       html: ['/shop.html', 'http://localhost:4000']
//     }))
//     .pipe(gulp.dest('./assets/out'))
// })


/**
 * TASK: Deploy
 */
// gulp.task('deploy', function() {
//   return gulp.src('./**')
//     .pipe(s3({
//       Bucket: 'lifestraw-html', 
//       ACL:    'public-read'
//   }))
// })


/**
 * TASK: Watch
 */
gulp.task('watch', function() {
  gulp.watch(['./assets/**/*.scss'], ['styles'], notifyLiveReload)
  gulp.watch(['./src/*.html', './partials/*.tpl.html'], ['partials'])
  gulp.watch(['./src/*.html', './partials/*.tpl.html']) // @removed notifyLiveReload
  gulp.watch(['./assets/**/*.css'], notifyLiveReload)
})

gulp.task('default', [
  'express', 
  'livereload', 
  'partials', 
  'styles', 
  'watch'
], function() {

  // Do stuff during default task

})



/**
 * Private Methods
 *
 * notifyLiveReload()
 * logError()
 * formatError()
 */

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